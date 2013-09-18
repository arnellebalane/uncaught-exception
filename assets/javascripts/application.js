$(document).ready(function() {
  post.initialize();
  screencast.initialize();
});

var post = {
  initialize: function() {
    var height = Math.max($(".post .content").outerHeight(), $(".post aside").outerHeight());
    $(".post .content, .post aside").outerHeight(height);
  }
};

var screencast = {
  initialize: function() {
    var height = Math.max($(".screencast .content").outerHeight(), $(".screencast aside").outerHeight());
    $(".screencast .content, .screencast aside").outerHeight(height);
  }
};