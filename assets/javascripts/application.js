$(document).ready(function() {
  notifications.initialize();
  markdown.initialize();
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