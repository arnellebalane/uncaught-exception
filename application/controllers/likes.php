<?php

  class Likes extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('like_model', 'like');
      $this->load->model('post_model', 'post');
      $this->load->model('screencast_model', 'screencast');
    }

    public function create($type, $id) {
      $like = array(
        'likeable_id' => $id,
        'likeable_type' => $type,
        'ip_address' => $this->input->ip_address()
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
        'ip_address' => $this->input->ip_address()
      );
      $this->like->destroy($like);
      if ($type == 'posts') {
        $likeable = $this->post->find($id);
      } else if ($type == 'screencasts') {
        $likeable = $this->screencast->find($id);
      }
      redirect($type . '/show/' . $likeable['slug']);
    }

  }