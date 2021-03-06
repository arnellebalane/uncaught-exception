<?php

  class Registrations extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->helper('application');
      $this->load->model('user_model', 'user');

      $this->_determine_route();
    }

    public function make() {
      $data['registration'] = array();
      if ($this->session->flashdata('registration')) {
        $data['registration'] = $this->session->flashdata('registration');
      }
      $this->load->view('registrations/make', $data);
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
      $registration = array_merge($user, $profile);
      $user = $this->user->create($user, $profile);
      if (array_key_exists('error', $user)) {
        $this->session->set_flashdata('registration', $registration);
        $this->session->set_flashdata('error', $user['error']);
        redirect('registrations/make');
      } else {
        $this->session->set_userdata('user_id', $user['id']);
        $this->session->set_flashdata('notice', 'Welcome to Uncaught Exception!');
        redirect('profile/show');
      }
    }

    private function _determine_route() {
      $controller = $this->uri->segment(1);
      $action = $this->uri->segment(2);
      $this->route['controller_name'] = ($controller) ? $controller : 'registrations';
      $this->route['action_name'] = ($action) ? $action : 'make';
      $this->load->vars($this->route);
    }

  }