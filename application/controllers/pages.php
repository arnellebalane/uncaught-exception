<?php

  class Pages extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->helper('application');
      $this->load->helper('profile');
      $this->load->model('user_model', 'user');

      $this->_determine_route();
      $this->_current_user();
    }

    public function about() {
      $this->load->view('pages/about');
    }

    private function _determine_route() {
      $controller = $this->uri->segment(1);
      $action = $this->uri->segment(2);
      $this->route['controller_name'] = ($controller) ? $controller : 'pages';
      $this->route['action_name'] = ($action) ? $action : 'about';
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