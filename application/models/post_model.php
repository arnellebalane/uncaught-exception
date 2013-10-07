<?php

  class Post_Model extends CI_Model {

    public function __construct() {
      parent::__construct();
      $this->load->database();
    }

    public function find($id) {
      return $this->find_by(array('id' => $id));
    }

    public function find_by($post) {
      $this->db->where($post);
      $post = $this->db->get('posts');
      return $post->row_array();
    }

    public function where($post) {
      $this->db->where($post);
      $posts = $this->db->get('posts');
      return $posts->result_array();
    }

    public function find_by_tag($tag) {
      $this->db->select('posts.*');
      $this->db->join('taggable_tags', 'posts.id = taggable_tags.taggable_id', 'inner');
      $this->db->join('tags', 'taggable_tags.tag_id = tags.id', 'inner');
      $this->db->where(array('tag_id' => $tag['id'], 'taggable_type' => 'posts'));
      $posts = $this->db->get('posts');
      return $posts->result_array();
    }

    public function create($post) {
      $post_validation = $this->_validate_post($post);
      if (!$post_validation['result']) {
        return array('error' => $post_validation['message']);
      }
      $this->db->insert('posts', $post);
      $post = $this->find($this->db->insert_id());
      $post['slug'] = $post['id'] . '-' . url_title($post['title'], '-', true);
      $this->db->where('id', $post['id']);
      $this->db->update('posts', $post);
      return $post;
    }

    public function destroy($id) {
      $this->load->model('like_model', 'like');
      $this->load->model('comment_model', 'comment');
      $this->load->model('tag_model', 'tag');
      $this->db->where('id', $id);
      $this->db->delete('posts');
      $this->like->destroy(array('likeable_id' => $id, 'likeable_type' => 'posts'));
      $this->comment->destroy(array('commentable_id' => $id, 'commentable_type' => 'posts'));
      $this->tag->untag(array('taggable_id' => $id, 'taggable_type' => 'posts'));
    }

    public function count() {
      return $this->db->count_all('posts');
    }

    public function tag($post, $tags) {
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
              'taggable_id' => $post['id'],
              'taggable_type' => 'posts'
            );
            $this->db->insert('taggable_tags', $taggable_tag);
          }
        }
      }
    }

    public function get($limit, $offset, $sort) {
      if ($sort == 'fresh') {
        $this->db->order_by('created_at', 'desc');
        $posts = $this->db->get('posts', $limit, $offset);
      } else if ($sort == 'popular') {
        $this->db->select('posts.*');
        $this->db->join('(SELECT likeable_id FROM likes WHERE likeable_type = "posts") likes', 'likes.likeable_id = posts.id', 'left');
        $this->db->group_by('posts.id');
        $this->db->order_by('COUNT(likeable_id)', 'desc');
        $posts = $this->db->get('posts', $limit, $offset);
      }
      return $posts->result_array();
    }

    public function get_user($post) {
      $this->load->model('user_model', 'user');
      $user = $this->user->find($post['user_id']);
      $user['networks'] = $this->user->get_networks($user['id']);
      return $user;
    }

    public function get_tags($post) {
      $this->load->model('tag_model', 'tag');
      return $this->tag->find_by_taggable(array('taggable_type' => 'posts', 'taggable_id' => $post['id']));
    }

    public function get_comments($post) {
      $this->load->model('comment_model', 'comment');
      return $this->comment->find_by(array('commentable_type' => 'posts', 'commentable_id' => $post['id']));
    }

    public function get_related_posts($post) {
      $RELATED_ITEMS_COUNT = 5;
      $tags = $this->get_tags($post);
      $related_posts = array();
      foreach ($tags as $tag) {
        $posts = $this->find_by_tag($tag);
        foreach ($posts as $p) {
          if (!in_array($p, $related_posts) && $p['id'] != $post['id']) {
            array_push($related_posts, $p);
          }
        }
      }
      shuffle($related_posts);
      return array_slice($related_posts, 0, $RELATED_ITEMS_COUNT);
    }

    public function get_likes($post) {
      $this->load->model('like_model', 'like');
      return $this->like->where(array('likeable_id' => $post['id'], 'likeable_type' => 'posts'));
    }

    public function liked($post, $like) {
      $this->load->model('like_model', 'like');
      $like = array(
        'likeable_id' => $post['id'],
        'likeable_type' => 'posts',
        'ip_address' => $like['ip_address'],
        'user_id' => $like['user_id']
      );
      $like = $this->like->find_by($like);
      return !empty($like);
    }

    private function _validate_post($post) {
      if (strlen(trim($post['title'])) == 0) {
        return array('result' => false, 'message' => 'Please provide a post title');
      } else if (strlen(trim($post['content'])) == 0) {
        return array('result' => false, 'message' => 'Post content should not be empty.');
      }
      return array('result' => true);
    }

  }