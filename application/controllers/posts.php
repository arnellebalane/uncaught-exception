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
      $this->_signed_in_filter();
      $this->_current_user();
    }

    public function index($sort = 'fresh') {
      $data['posts'] = $this->post->get($this->BATCH_SIZE, 0, $sort);
      $data['has_more'] = $this->post->count() > $this->BATCH_SIZE;
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
      $tags = $this->input->post('tags');
      $post = $this->post->create($post);
      if (array_key_exists('error', $post)) {
        $this->session->set_flashdata('error', $post['error']);
        redirect('posts/make');
      } else {
        $this->post->tag($post, $tags);
        $this->session->set_flashdata('notice', 'Post submitted.');
        redirect('posts/show/' . $post['slug']);
      }
    }

    public function show($slug) {
      $data['post'] = $this->post->find_by(array('slug' => $slug));
      $data['user'] = $this->post->get_user($data['post']);
      $data['tags'] = $this->post->get_tags($data['post']);
      $data['comments'] = $this->post->get_comments($data['post']);
      $data['related_posts'] = $this->post->get_related_posts($data['post']);
      $data['likes_count'] = count($this->post->get_likes($data['post']));
      $like = array(
        'ip_address' => $this->input->ip_address(),
        'user_id' => $this->_user_logged_in() ? $this->data['current_user']['id'] : 0
      );
      $data['liked'] = $this->post->liked($data['post'], $like);
      $this->load->view('posts/show', $data);
    }

    public function edit($slug) {
      $data['post'] = $this->post->find_by(array('slug' => $slug));
      $tags = $this->post->get_tags($data['post']);
      $data['post']['tags'] = array();
      foreach ($tags as $tag) {
        array_push($data['post']['tags'], $tag['name']);
      }
      $data['post']['tags'] = implode(', ', $data['post']['tags']);
      $this->load->view('posts/edit', $data);
    }

    public function update() {
      $post = array(
        'id' => $this->input->post('id'),
        'title' => $this->input->post('title'),
        'content' => $this->input->post('content')
      );
      $tags = $this->input->post('tags');
      $post = $this->post->update($post);
      if (array_key_exists('error', $post)) {
        $this->session->set_flashdata('error', $post['error']);
        redirect('posts/edit/' . $post['slug']);
      } else {
        $this->post->retag($post, $tags);
        $this->session->set_flashdata('notice', 'Post updated.');
        redirect('posts/show/' . $post['slug']);
      }
    }

    public function destroy($id) {
      $this->post->destroy($id);
      $this->session->set_flashdata('notice', 'Post deleted.');
      redirect('profile/show');
    }

    public function more() {
      $offset = $this->input->post('offset');
      $sort = $this->input->post('sort');
      $posts = $this->post->get($this->BATCH_SIZE, $offset, $sort);
      $data['total_count'] = $this->post->count();
      foreach ($posts as $i => $post) {
        $user = $this->post->get_user($post);
        $data['posts'][$i]['title'] = $post['title'];
        $data['posts'][$i]['url'] = site_url('posts/show/' . $post['slug']);
        $data['posts'][$i]['date'] = date('F d, Y', strtotime($post['created_at']));
        $data['posts'][$i]['user']['fullname'] = $user['firstname'] . ' ' . $user['lastname'];
        $data['posts'][$i]['user']['url'] = site_url('profile/show/' . $user['id']);
        $data['posts'][$i]['user']['profile_picture'] = base_url() . 'public/profile-pictures/' . $user['profile_picture'];
      }
      echo json_encode($data);
    }

    private function _determine_route() {
      $controller = $this->uri->segment(1);
      $action = $this->uri->segment(2);
      $this->route['controller_name'] = ($controller) ? $controller : 'posts';
      $this->route['action_name'] = ($action) ? $action : 'index';
      $this->load->vars($this->route);
    }

    private function _signed_in_filter() {
      $actions = array('make', 'create', 'destroy', 'edit', 'update');
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