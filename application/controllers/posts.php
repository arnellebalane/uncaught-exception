<?php

  class Posts extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->helper('profile');
    }

    public function index() {
      $this->load->view('posts/index');
    }

    public function make() {
      $this->load->view('posts/make');
    }

    public function show() {
      $this->load->view('posts/show');
    }

  }