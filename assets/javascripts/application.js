$(document).ready(function() {
  notifications.initialize();
  markdown.initialize();
  loadMore.initialize();
  screencasts.initialize();
  profilePicture.initialize();
  textareas.initialize();
  captcha.initialize();
});

var notifications = {
  initialize: function() {
    if ($("p.notification").length > 0) {
      notifications.reveal($("p.notification").first());
    }
  },
  reveal: function(notification) {
    notification.css({"margin-left": -(notification.outerWidth() / 2) + "px"}).addClass("shown");
    setTimeout(function() {
      notification.removeClass("shown");
    }, 2500);
  }
};

var markdown = {
  initialize: function() {
    if ($(".markdown").length > 0) {
      markdown.parse($(".markdown").first());
    }
  },
  parse: function(element) {
    element.html(Markdown(element.html()));
    element.find("code").each(function() {
      $(this).html("<pre>" + $(this).html() + "</pre>");
    });
  }
};

var loadMore = {
  initialize: function() {
    $("#load-more").click(function(e) {
      e.preventDefault();
      $(this).addClass("loading");
      loadMore[$(this).data("type")]();
    });
  },
  posts: function() {
    var data = {};
    data.offset = $(".item-thumbnail").length;
    data.sort = $("#posts-filter .current").first().text().toLowerCase();
    $.ajax({
      url: BASE_URL + "posts/more",
      data: data,
      type: "POST",
      success: function(response) {
        response = JSON.parse(response);
        loadMore.appendPosts(response.posts);
        if ($(".item-thumbnail").length == response.total_count) {
          $("#load-more").removeClass("loading").hide();
        }
      }
    });
  },
  screencasts: function() {
    var data = {};
    data.offset = $(".item-thumbnail").length;
    data.sort = $("#posts-filter .current").first().text().toLowerCase();
    $.ajax({
      url: BASE_URL + "screencasts/more",
      data: data,
      type: "POST",
      success: function(response) {
        response = JSON.parse(response);
        loadMore.appendScreencasts(response.screencasts);
        if ($(".item-thumbnail").length == response.total_count) {
          $("#load-more").removeClass("oading").hide();
        }
      }
    });
  },
  appendPosts: function(posts) {
    for (var i = 0; i < posts.length; i++) {
      var post = posts[i];
      var template = "<div class='item-thumbnail'> \
                        <a href='" + post.url + "' class='title'>" + htmlspecialchars(post.title) + "</a> \
                        <footer> \
                          <span class='profile-picture' style='background-image: url(\"" + post.user.profile_picture + "\");'></span> \
                          <a href='" + post.user.url + "'>" + post.user.fullname + "</a> \
                          <time>" + post.date + "</time> \
                        </footer> \
                      </div>";
      $(".items-list").append(template);
    }
  },
  appendScreencasts: function(screencasts) {
    for (var i = 0; i < screencasts.length; i++) {
      var screencast = screencasts[i];
      var template = "<div class='item-thumbnail'> \
                        <div class='video'></div> \
                        <aside> \
                          <a href='" + screencast.url + "' class='title'></a> \
                          <footer> \
                            <span class='profile-picture' style='background-image: url(\"" + screencast.user.profile_picture + "\");'></span> \
                            <a href='" + screencast.user.url + "'>" + screencast.user.fullname + "</a> \
                            <time>" + screencast.date + "</time> \
                          </footer> \
                        </aside> \
                      </div>";
      $(".items-list").append(template);
    }
  }
};

var screencasts = {
  initialize: function() {
    $("#video iframe").load(function() {
      $("#video #loader").hide();
    });
    $("#video-url").change(function() {
      if ($(this).val().length > 0) {
        screencasts.loadVideo($(this).val());
      } else {
        $("#video-embed-url").val("");
        $("#video, #loader").hide();
      }
    });
    screencasts.redirectClick();
  },
  loadVideo: function(url) {
    $("#video").removeClass("hidden");
    $("#video #loader").show();
    $("#video iframe").hide();
    if (url.match("youtube.com")) {
      var id = url.split("=")[1];
      $("#video-embed-url").val("http://www.youtube.com/embed/" + id);
    } else if (url.match("vimeo.com")) {
      var id = url.split("/");
      id = id[id.length - 1];
      $("#video-embed-url").val("http://player.vimeo.com/video/" + id + "?title=0&byline=0&portrait=0");
    } else {
      $("#video-embed-url").val("");
      $("#video").addClass("hidden");
    }
    $("#video iframe").attr("src", $("#video-embed-url").val()).load(function() {
      $("#video iframe").show();
      $("#video #loader").hide();
    });
  },
  redirectClick: function() {
    $(".item-thumbnail .video").click(function(e) {
      e.preventDefault();
      e.stopPropagation();
      top.location.href = $(this).siblings("aside").find(".title").attr("href");
    });
  }
};

var profilePicture = {
  initialize: function() {
    $("#userfile-hook").click(function() {
      $("#userfile").click();
    });
    $("#cancel-profile-picture").click(function() {
      profilePicture.hidePreview();
    });
    $("#userfile").change(profilePicture.previewProfilePicture);
  },
  previewProfilePicture: function() {
    var file = document.getElementById("userfile").files[0];
    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function(e) {
      $("#new-profile-picture").css({"background-image": "url(" + e.target.result + ")"});
      $("#cancel-profile-picture").show();
      $("#userfile-hook").hide();
    }
  },
  hidePreview: function() {
    $("#new-profile-picture").css({"background-image": ""});
    $("#userfile-hook").show();
    $("#cancel-profile-picture").hide();
    $("#userfile").val("")
  }
};

var textareas = {
  initialize: function() {
    $("textarea").autosize();
    $(".format-option").click(function() {
      var range = $("textarea#textrange").textrange();
      var format = $(this).data("format");
      if (range.length > 0) {
        if ($(this).data("type") == "format") {
          var text = format.replace("{text}", range.text);
        } else if ($(this).data("type") == "link") {
          if (range.text.match(/(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/)) {
            var text = format.replace("{url}", range.text);
          } else {
            var text = format.replace(/\{(text|title)\}/g, range.text);
          }
          if ($(this).text() == "hyperlink") {
            text = text.replace(/\{text\}/g, "link text").replace(/\{url\}/g, "link url");
          } else if ($(this).text() == "image") {
            text = text.replace(/\{text\}/g, "alt text").replace(/\{url\}/g, "image url").replace(/\{title\}/g, "image title");
          }
        }
        $("textarea#textrange").textrange("replace", text);
      }
    });
  }
};

var captcha = {
  initialize: function() {
    $("#registration-form").motionCaptcha({
      errorMsg: "",
      successMsg: ""
    });
  }
};


function htmlspecialchars(string) {
  var escape = document.createElement('textarea');
  escape.innerHTML = string;
  return escape.innerHTML;
}