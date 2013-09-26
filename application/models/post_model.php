<?php

  class Post_Model extends CI_Model {

    public function __construct() {
      parent::__construct();
      $this->load->database();
    }

    public function find($id) {
      $this->db->where('id', $id);
      $post = $this->db->get('posts');
      return $post->row_array();
    }

    public function find_by($post) {
      $this->db->where($post);
      $post = $this->db->get('posts');
      return $post->row_array();
    }

    public function create($post) {
      $this->db->insert('posts', $post);
      $post = $this->find($this->db->insert_id());
      $post['slug'] = $post['id'] . '-' . url_title($post['title'], '-', true);
      $this->db->where('id', $post['id']);
      $this->db->update('posts', $post);
      return $post;
    }

    public function count() {
      return $this->db->count_all('posts');
    }

    public function tag($post, $tags) {
      $this->load->model('tag_model', 'tag');
      foreach ($tags as $t) {
        $tag = $this->tag->find_by(array('name' => trim($t)));
        if (empty($tag)) {
          $tag = $this->tag->create(array('name' => trim($t)));
        }
        $taggable_tag = array(
          'tag_id' => $tag['id'],
          'taggable_id' => $post['id'],
          'taggable_type' => 'posts'
        );
        $this->db->insert('taggable_tags', $taggable_tag);
      }
    }

    public function get($limit, $offset = 0) {
      $posts = $this->db->get('posts', $limit, $offset);
      return $posts->result_array();
    }

    public function get_user($post) {
      $this->load->model('user_model', 'user');
      return $this->user->find($post['user_id']);
    }

    public function get_tags($post) {
      $this->load->model('tag_model', 'tag');
      return $this->tag->find_by_taggable(array('taggable_type' => 'posts', 'taggable_id' => $post['id']));
    }

    public function get_comments($post) {
      $this->load->model('comment_model', 'comment');
      return $this->comment->find_by(array('commentable_type' => 'posts', 'commentable_id' => $post['id']));
    }

  }