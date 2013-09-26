<?php

  class Posts extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->helper('application');
      $this->load->helper('profile');
      $this->load->model('user_model', 'user');
      $this->load->model('post_model', 'post');

      $this->_determine_route();
      $this->_current_user();
    }

    public function index() {
      $this->load->view('posts/index');
    }

    public function make() {
      $this->load->view('posts/make');
    }

    public function create() {
      $post = array(
        'user_id' => $this->session->userdata('user_id'),
        'title' => $this->input->post('title'),
        'content' => $this->input->post('content'),
      );
      $tags = explode(',', $this->input->post('tags'));
      $post = $this->post->create($post);
      $this->post->tag($post, $tags);
      redirect('posts/show/' . $post['slug']);
    }

    public function show($slug) {
      $this->load->view('posts/show');
    }

    private function _determine_route() {
      $controller = $this->uri->segment(1);
      $action = $this->uri->segment(2);
      $this->route['controller_name'] = ($controller) ? $controller : 'posts';
      $this->route['action_name'] = ($action) ? $action : 'index';
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