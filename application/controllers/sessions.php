<?php

  class Sessions extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->helper('application');
      $this->load->helper('profile');
      $this->load->model('user_model', 'user');

      $this->_determine_route();
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
        redirect('profile/show/' . $user['id']);
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

  }