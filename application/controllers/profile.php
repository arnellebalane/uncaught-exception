<?php

  class Profile extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->helper('application');
      $this->load->helper('profile');
      $this->load->model('user_model', 'user');

      $this->_determine_route();
      $this->_signed_in_filter();
      $this->_current_user();
    }

    public function show($id = null) {
      if (!$id) {
        $id = $this->session->userdata('user_id');
      }
      $data['user'] = $this->user->find($id);
      $this->load->view('profile/show', $data);
    }

    public function edit() {
      $data['user'] = $this->user->find($this->session->userdata('user_id'));
      $this->load->view('profile/edit', $data);
    }

    public function update() {
      $profile = array(
        'firstname' => $this->input->post('firstname'),
        'lastname' => $this->input->post('lastname'),
        'about' => $this->input->post('about')
      );
      $user_id = $this->session->userdata('user_id');
      $this->user->update_profile($user_id, $profile);
      redirect('profile/show');
    }

    private function _determine_route() {
      $controller = $this->uri->segment(1);
      $action = $this->uri->segment(2);
      $this->route['controller_name'] = ($controller) ? $controller : 'profile';
      $this->route['action_name'] = ($action) ? $action : 'show';
      $this->load->vars($this->route);
    }

    private function _signed_in_filter() {
      $actions = array('edit', 'update');
      if (in_array($this->route['action_name'], $actions) && !$this->_user_logged_in()) {
        $this->session->set_flashdata('error', 'You must be logged in to view the page.');
        redirect('sessions/make');
      }
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