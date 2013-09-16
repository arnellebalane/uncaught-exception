$(document).ready(function() {
  post.initialize();
});

var post = {
  initialize: function() {
    var height = Math.max($(".post .content").outerHeight(), $(".post aside").outerHeight());
    $(".post .content, .post aside").outerHeight(height);
  }
};