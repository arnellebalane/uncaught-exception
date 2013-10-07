<?php 

  class Comments extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('post_model', 'post');
      $this->load->model('screencast_model', 'screencast');
      $this->load->model('comment_model', 'comment');
    }

    public function create() {
      $comment = $this->input->post();
      if ($this->_user_logged_in()) {
        $comment['commentor_id'] = $this->session->userdata('user_id');
      }
      $this->comment->create($comment);
      if ($comment['commentable_type'] == 'posts') {
        $object = $this->post->find($comment['commentable_id']);
      } else if ($comment['commentable_type'] == 'screencasts') {
        $object = $this->screencast->find($comment['commentable_id']);
      }
      redirect($comment['commentable_type'] . '/show/' . $object['slug']);
    }

    private function _user_logged_in() {
      return !!$this->session->userdata('user_id');
    }

  }