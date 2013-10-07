<?php

  class Comment_Model extends CI_Model {

    public function __construct() {
      parent::__construct();
      $this->load->database();
    }

    public function find_by($comment) {
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

  }