$(document).ready(function() {
  item.initialize();
  notifications.initialize();
});

var item = {
  initialize: function() {
    var height = Math.max($(".item .main").outerHeight(), $(".item .sidebar").outerHeight());
    $(".item .main, .item .sidebar").outerHeight(height);
  }
};

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