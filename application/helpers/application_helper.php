<?php

  function navigation_link_class($controller, $current_controller) {
    if ($controller == $current_controller) {
      return 'current';
    }
  }