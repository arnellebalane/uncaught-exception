var BASE_URL = "http://localhost/uncaught-exception/index.php/";

$(document).ready(function() {
  notifications.initialize();
  markdown.initialize();
  loadMore.initialize();
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
  }
};

var loadMore = {
  initialize: function() {
    $("#load-more").click(function(e) {
      e.preventDefault();
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
          $("#load-more").hide();
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
          $("#load-more").hide();
        }
      }
    });
  },
  appendPosts: function(posts) {
    for (var i = 0; i < posts.length; i++) {
      var post = posts[i];
      var template = "<div class='item-thumbnail'> \
                        <a href='" + post.url + "' class='title'>" + post.title + "</a> \
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