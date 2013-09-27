<?php

  class Screencast_Model extends CI_Model {

    public function __construct() {
      parent::__construct();
      $this->load->database();
    }

    public function find($id) {
      return $this->find_by(array('id' => $id));
    }

    public function find_by($screencast) {
      $this->db->where($screencast);
      $screencast = $this->db->get('screencasts');
      return $screencast->row_array();
    }

    public function create($screencast) {
      $this->db->insert('screencasts', $screencast);
      $screencast = $this->find($this->db->insert_id());
      $screencast['slug'] = $screencast['id'] . '-' . url_title($screencast['title'], '-', true);
      $this->db->where('id', $screencast['id']);
      $this->db->update('screencasts', $screencast);
      return $screencast;
    }

    public function count() {
      return $this->db->count_all('screencasts');
    }

    public function tag($screencast, $tags) {
      $this->load->model('tag_model', 'tag');
      foreach ($tags as $t) {
        $tag = $this->tag->find_by(array('name' => trim($t)));
        if (empty($tag)) {
          $tag = $this->tag->create(array('name' => trim($t)));
        }
        $taggable_tag = array(
          'tag_id' => $tag['id'],
          'taggable_id' => $screencast['id'],
          'taggable_type' => 'screencasts'
        );
        $this->db->insert('taggable_tags', $taggable_tag);
      }
    }

    public function get($limit, $offset = 0) {
      $posts = $this->db->get('screencasts', $limit, $offset);
      return $posts->result_array();
    }

    public function get_user($screencast) {
      $this->load->model('user_model', 'user');
      return $this->user->find($screencast['user_id']);
    }

    public function get_tags($screencast) {
      $this->load->model('tag_model', 'tag');
      return $this->tag->find_by_taggable(array('taggable_type' => 'screencasts', 'taggable_id' => $screencast['id']));
    }

    public function get_comments($screencast) {
      $this->load->model('comment_model', 'comment');
      return $this->comment->find_by(array('commentable_type' => 'screencasts', 'commentable_id' => $screencast['id']));
    }

  }