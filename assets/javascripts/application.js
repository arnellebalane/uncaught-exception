$(document).ready(function() {
  item.initialize();
});

var item = {
  initialize: function() {
    var height = Math.max($(".item .main").outerHeight(), $(".item .sidebar").outerHeight());
    $(".item .main, .item .sidebar").outerHeight(height);
  }
};