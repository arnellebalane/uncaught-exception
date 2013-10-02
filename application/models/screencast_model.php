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
      $screencast_validation = $this->_validate_screencast($screencast);
      if (!$screencast_validation['result']) {
        return array('error' => $screencast_validation['message']);
      }
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
      if (strlen(trim($tags)) > 0) {
        $tags = explode(',', $tags);
        $this->load->model('tag_model', 'tag');
        foreach ($tags as $t) {
          if (strlen(trim($t)) > 0) {
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
      }
    }

    public function get($limit, $offset, $sort) {
      if ($sort == 'fresh') {
        $this->db->order_by('created_at', 'desc');
        $screencasts = $this->db->get('screencasts', $limit, $offset);
      } else if ($sort == 'popular') {
        $this->db->select('screencasts.*');
        $this->db->join('(SELECT likeable_id FROM likes WHERE likeable_type = "screencasts") likes', 'likes.likeable_id = screencasts.id', 'left');
        $this->db->group_by('screencasts.id');
        $this->db->order_by('COUNT(likeable_id)', 'desc');
        $screencasts = $this->db->get('screencasts', $limit, $offset);
      }
      return $screencasts->result_array();
    }

    public function get_user($screencast) {
      $this->load->model('user_model', 'user');
      $user = $this->user->find($screencast['user_id']);
      $user['networks'] = $this->user->get_networks($user['id']);
      return $user;
    }

    public function get_tags($screencast) {
      $this->load->model('tag_model', 'tag');
      return $this->tag->find_by_taggable(array('taggable_type' => 'screencasts', 'taggable_id' => $screencast['id']));
    }

    public function get_comments($screencast) {
      $this->load->model('comment_model', 'comment');
      return $this->comment->find_by(array('commentable_type' => 'screencasts', 'commentable_id' => $screencast['id']));
    }

    public function liked($screencast, $like) {
      $this->load->model('like_model', 'like');
      $like = array(
        'likeable_id' => $screencast['id'],
        'likeable_type' => 'screencasts',
        'ip_address' => $like['ip_address'],
        'user_id' => $like['user_id']
      );
      $like = $this->like->find_by($like);
      return !empty($like);
    }

    private function _validate_screencast($screencast) {
      if (strlen(trim($screencast['title'])) == 0) {
        return array('result' => false, 'message' => 'Please provide a screencast title.');
      } else if (strlen(trim($screencast['video_url'])) == 0) {
        return array('result' => false, 'message' => 'Please provide the URL to the screencast video.');
      }
      return array('result' => true);
    }

  }