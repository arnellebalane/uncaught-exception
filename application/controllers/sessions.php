<?php

  class Sessions extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->helper('application');
      $this->load->helper('profile');
      $this->load->model('user_model', 'user');

      $this->_determine_route();
      $this->_signed_in_filter();
    }

    public function make() {
      $this->load->view('sessions/make');
    }

    public function create() {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $user = $this->user->authenticate($username, $password);
      if (empty($user)) {
        $this->session->set_flashdata('error', 'Incorrect username or password.');
        redirect('sessions/make');
      } else {
        $this->session->set_userdata('user_id', $user['id']);
        redirect('profile/show');
      }
    }

    public function destroy() {
      $this->session->sess_destroy();
      redirect('posts/index');
    }

    private function _determine_route() {
      $controller = $this->uri->segment(1);
      $action = $this->uri->segment(2);
      $this->route['controller_name'] = ($controller) ? $controller : 'sessions';
      $this->route['action_name'] = ($action) ? $action : 'make';
      $this->load->vars($this->route);
    }

    private function _signed_in_filter() {
      $actions = array('destroy');
      if (in_array($this->route['action_name'], $actions) && !$this->_user_logged_in()) {
        $this->session->set_flashdata('error', 'You must be logged in to view the page.');
        redirect('sessions/make');
      }
    }

    private function _user_logged_in() {
      return !!$this->session->userdata('user_id');
    }

  }