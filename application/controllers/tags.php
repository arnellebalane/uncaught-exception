<?php

  class Tags extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->helper('application');
      $this->load->helper('profile');
      $this->load->model('user_model', 'user');
      $this->load->model('post_model', 'post');
      $this->load->model('screencast_model', 'screencast');
      $this->load->model('tag_model', 'tag');

      $this->_determine_route();
      $this->_current_user();
    }

    public function show($name) {
      $data['query'] = $name;
      $data['posts'] = $this->tag->get_tagged(array('name' => urldecode($name)), 'posts');
      $data['screencasts'] = $this->tag->get_tagged(array('name' => urldecode($name)), 'screencasts');
      $this->load->view('tags/show', $data);
    }

    private function _determine_route() {
      $controller = $this->uri->segment(1);
      $action = $this->uri->segment(2);
      $this->route['controller_name'] = ($controller) ? $controller : 'tags';
      $this->route['action_name'] = ($action) ? $action : 'show';
      $this->load->vars($this->route);
    }

    private function _current_user() {
      if ($this->_user_logged_in()) {
        $this->data['current_user'] = $this->user->find($this->session->userdata('user_id'));
        $this->load->vars($this->data);
      }
    }

    private function _user_logged_in() {
      return !!$this->session->userdata('user_id');
    }

  }