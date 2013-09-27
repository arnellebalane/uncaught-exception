<?php

  function navigation_link_class($controller, $current_controller) {
    if ($controller == $current_controller) {
      return 'current';
    }
  }

  function post_filter_class($sort) {
    $CI =& get_instance();
    $current = $CI->uri->segment(3);
    $current = $current ? $current : 'fresh';
    if ($sort == $current) {
      return 'current';
    }
  }

  function user_logged_in() {
    $CI =& get_instance();
    return !!$CI->session->userdata('user_id');
  }

  function display_date($date) {
    return date('F d, Y', strtotime($date));
  }