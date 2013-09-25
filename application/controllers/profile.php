<?php

  class Profile extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->helper('application');
      $this->load->helper('profile');

      $this->_determine_route();
    }

    public function show() {
      $this->load->view('profile/show');
    }

    private function _determine_route() {
      $controller = $this->uri->segment(1);
      $action = $this->uri->segment(2);
      $this->route['controller_name'] = ($controller) ? $controller : 'profile';
      $this->route['action_name'] = ($action) ? $action : 'show';
      $this->load->vars($this->route);
    }

  }