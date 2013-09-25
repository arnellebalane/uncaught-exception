<?php

  class Sessions extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->helper('application');
      $this->load->helper('profile');

      $this->_determine_route();
    }

    public function make() {
      $this->load->view('sessions/make');
    }

    private function _determine_route() {
      $controller = $this->uri->segment(1);
      $action = $this->uri->segment(2);
      $this->route['controller_name'] = ($controller) ? $controller : 'screencasts';
      $this->route['action_name'] = ($action) ? $action : 'index';
      $this->load->vars($this->route);
    }

  }