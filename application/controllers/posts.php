<?php

  class Posts extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->helper('profile');

      $this->_determine_route();
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

    private function _determine_route() {
      $controller = $this->uri->segment(1);
      $action = $this->uri->segment(2);
      $this->route['controller_name'] = ($controller) ? $controller : 'posts';
      $this->route['action_name'] = ($action) ? $action : 'index';
      $this->load->vars($this->route);
    }

  }