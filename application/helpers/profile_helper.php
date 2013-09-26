<?php

  function profile_picture($filename) {
    return '<span class="profile-picture" style="background-image: url(\'' . base_url() . 'public/profile-pictures/' . $filename . '\')"></span>';
  }

  function fullname($user) {
    return $user['firstname'] . ' ' . $user['lastname'];
  }