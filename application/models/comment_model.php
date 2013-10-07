<?php

  class Comment_Model extends CI_Model {

    public function __construct() {
      parent::__construct();
      $this->load->database();
    }

    public function find($id) {
      return $this->find_by(array('id' => $id));
    }

    public function find_by($comment) {
      $this->db->where($comment);
      $comment = $this->db->get('comments');
      return $comment->row_array();
    }

    public function where($comment) {
      $this->db->where($comment);
      $comments = $this->db->get('comments');
      return $comments->result_array();
    }

    public function create($comment) {
      $this->db->insert('comments', $comment);
    }

    public function destroy($comment) {
      $this->db->where($comment);
      $this->db->delete('comments');
    }

    public function get_commentable($comment) {
      if ($comment['commentable_type'] == 'posts') {
        $this->load->model('post_model', 'post');
        return $this->post->find($comment['commentable_id']);
      } else if ($comment['commentable_type'] == 'screencasts') {
        $this->load->model('screencast_model', 'screencast');
        return $this->screencast->find($comment['commentable_id']);
      }
      return false;
    }

  }