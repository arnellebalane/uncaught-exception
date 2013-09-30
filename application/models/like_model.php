<?php

  class Like_Model extends CI_Model {

    public function __construct() {
      parent::__construct();
      $this->load->database();
    }

    public function find_by($like) {
      $this->db->where($like);
      $like = $this->db->get('likes');
      return $like->row_array();
    }

    public function create($like) {
      $this->db->insert('likes', $like);
    }

    public function destroy($like) {
      $this->db->where($like);
      $this->db->delete('likes');
    }

  }