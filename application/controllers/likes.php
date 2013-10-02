<?php

  class Likes extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('like_model', 'like');
      $this->load->model('user_model', 'user');
      $this->load->model('post_model', 'post');
      $this->load->model('screencast_model', 'screencast');

      $this->_current_user();
    }

    public function create($type, $id) {
      $like = array(
        'likeable_id' => $id,
        'likeable_type' => $type,
        'ip_address' => $this->input->ip_address(),
        'user_id' => $this->_user_logged_in() ? $this->current_user['id'] : 0
      );
      $this->like->create($like);
      if ($type == 'posts') {
        $likeable = $this->post->find($id);
      } else if ($type == 'screencasts') {
        $likeable = $this->screencast->find($id);
      }
      redirect($type . '/show/' . $likeable['slug']);
    }

    public function destroy($type, $id) {
      $like = array(
        'likeable_id' => $id,
        'likeable_type' => $type,
        'ip_address' => $this->input->ip_address(),
        'user_id' => $this->_user_logged_in() ? $this->current_user['id'] : 0
      );
      $this->like->destroy($like);
      if ($type == 'posts') {
        $likeable = $this->post->find($id);
      } else if ($type == 'screencasts') {
        $likeable = $this->screencast->find($id);
      }
      redirect($type . '/show/' . $likeable['slug']);
    }

    private function _current_user() {
      if ($this->_user_logged_in()) {
        $this->current_user = $this->user->find($this->session->userdata('user_id'));
      }
    }

    private function _user_logged_in() {
      return !!$this->session->userdata('user_id');
    }

  }