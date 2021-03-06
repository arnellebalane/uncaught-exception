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

    public function get_tagged($tag, $taggable_type) {
      $tag = $this->find_by($tag);
      if (empty($tag)) {
        return array('result' => false);
      } else {
        $this->db->select($taggable_type . '.*');
        $this->db->where(array('tags.tag_id' => $tag['id'], 'taggable_type' => $taggable_type));
        $this->db->join('(SELECT * FROM taggable_tags WHERE taggable_type = "' . $taggable_type . '") tags', 'tags.taggable_id = ' . $taggable_type . '.id', 'inner');
        $taggables = $this->db->get($taggable_type);
        return $taggables->result_array();
      }
    }

    public function taggable_tagged($taggable_tag) {
      $this->db->where($taggable_tag);
      $taggable_tag = $this->db->get('taggable_tags');
      return $taggable_tag->num_rows() > 0;
    }

    public function untag($tag) {
      $this->db->where($tag);
      $this->db->delete('taggable_tags');
    }

  }