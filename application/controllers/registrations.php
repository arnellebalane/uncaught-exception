<?php

  class Registrations extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->helper('application');
      $this->load->model('user_model', 'user');

      $this->_determine_route();
    }

    public function make() {
      $this->load->view('registrations/make');
    }

    public function create() {
      $user = array(
        'username' => $this->input->post('username'),
        'email' => $this->input->post('email'),
        'password' => $this->input->post('password'),
        'password_confirmation' => $this->input->post('password_confirmation')
      );
      $profile = array(
        'firstname' => $this->input->post('firstname'),
        'lastname' => $this->input->post('lastname')
      );
      $user = $this->user->create($user, $profile);
      if (array_key_exists('error', $user)) {
        $this->session->set_flashdata('error', $user['error']);
        redirect('registrations/make');
      } else {
        $this->session->set_userdata('user_id', $user['id']);
        $this->session->set_flashdata('notice', 'Welcome to Uncaught Exception!');
        redirect('profile/show/' . $user['id']);
      }
    }

    private function _determine_route() {
      $controller = $this->uri->segment(1);
      $action = $this->uri->segment(2);
      $this->route['controller_name'] = ($controller) ? $controller : 'profile';
      $this->route['action_name'] = ($action) ? $action : 'show';
      $this->load->vars($this->route);
    }

  }