<?php

  class Tag_Model extends CI_Model {

    public function __construct() {
      parent::__construct();
      $this->load->database();
    }

    public function create($tag) {
      $this->db->insert('tags', $tag);
      $this->db->where('id', $this->db->insert_id());
      $tag = $this->db->get('tags');
      return $tag->row_array();
    }

    public function find_by($tag) {
      $this->db->where($tag);
      $tag = $this->db->get('tags');
      return $tag->row_array();
    }

  }