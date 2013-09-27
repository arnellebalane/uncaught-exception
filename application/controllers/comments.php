<?php 

  class Comments extends CI_Controller {

    public function __construct() {
      parent::__construct();
      $this->load->model('post_model', 'post');
      $this->load->model('comment_model', 'comment');
    }

    public function create() {
      $comment = $this->input->post();
      $this->comment->create($comment);
      $post = $this->post->find($comment['commentable_id']);
      redirect($comment['commentable_type'] . '/show/' . $post['slug']);
    }

  }