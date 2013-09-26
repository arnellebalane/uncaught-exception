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

    public function find_by_taggable($taggable) {
      $this->db->select('tags.*');
      $this->db->where($taggable);
      $this->db->join('tags', 'taggable_tags.tag_id = tags.id', 'inner');
      $tags = $this->db->get('taggable_tags');
      return $tags->result_array();
    }

  }