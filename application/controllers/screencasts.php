<?php

  class Screencasts extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->helper('application');
      $this->load->helper('profile');
      $this->load->model('user_model', 'user');
      $this->load->model('screencast_model', 'screencast');

      $this->BATCH_SIZE = 8;

      $this->_determine_route();
      $this->_signed_in_filter();
      $this->_current_user();
    }

    public function index($sort = 'fresh') {
      $data['screencasts'] = $this->screencast->get(8);
      $data['has_more'] = $this->screencast->count() > $this->BATCH_SIZE;
      $this->load->view('screencasts/index', $data);
    }

    public function show($slug) {
      $data['screencast'] = $this->screencast->find_by(array('slug' => $slug));
      $data['user'] = $this->screencast->get_user($data['screencast']);
      $data['tags'] = $this->screencast->get_tags($data['screencast']);
      $data['comments'] = $this->screencast->get_comments($data['screencast']);
      $this->load->view('screencasts/show', $data);
    }

    public function make() {
      $this->load->view('screencasts/make');
    }

    public function create() {
      $screencast = array(
        'user_id' => $this->session->userdata('user_id'),
        'title' => $this->input->post('title'),
        'description' => $this->input->post('description'),
        'video_url' => $this->input->post('video_url')
      );
      $tags = $this->input->post('tags');
      $screencast = $this->screencast->create($screencast);
      if (array_key_exists('error', $screencast)) {
        $this->session->set_flashdata('error', $screencast['error']);
        redirect('screencasts/make');
      } else {
        $this->screencast->tag($screencast, $tags);
        $this->session->set_flashdata('notice', 'Screencast posted.');
        redirect('screencasts/show/' . $screencast['slug']);
      }
    }

    private function _determine_route() {
      $controller = $this->uri->segment(1);
      $action = $this->uri->segment(2);
      $this->route['controller_name'] = ($controller) ? $controller : 'screencasts';
      $this->route['action_name'] = ($action) ? $action : 'index';
      $this->load->vars($this->route);
    }

    private function _signed_in_filter() {
      $actions = array('make', 'create');
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