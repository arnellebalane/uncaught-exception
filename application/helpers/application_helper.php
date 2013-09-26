<?php

  function navigation_link_class($controller, $current_controller) {
    if ($controller == $current_controller) {
      return 'current';
    }
  }

  function user_logged_in() {
    $CI =& get_instance();
    return !!$CI->session->userdata('user_id');
  }