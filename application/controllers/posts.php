<?php

  class Posts extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->helper('application');
      $this->load->helper('profile');
      $this->load->model('user_model', 'user');
      $this->load->model('post_model', 'post');

      $this->BATCH_SIZE = 8;

      $this->_determine_route();
      $this->_current_user();
    }

    public function index($sort = 'fresh') {
      $data['posts'] = $this->post->get(8);
      $data['has_more_posts'] = $this->post->count() > $this->BATCH_SIZE;
      $this->load->view('posts/index', $data);
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
      $data['post'] = $this->post->find_by(array('slug' => $slug));
      $data['user'] = $this->post->get_user($data['post']);
      $data['tags'] = $this->post->get_tags($data['post']);
      $data['comments'] = $this->post->get_comments($data['post']);
      $this->load->view('posts/show', $data);
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