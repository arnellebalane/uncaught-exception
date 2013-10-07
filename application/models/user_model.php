<?php

  class User_Model extends CI_Model {

    public function __construct() {
      parent::__construct();
      $this->load->database();
    }

    public function authenticate($username, $password) {
      $this->db->where(array(
        'username' => $username,
        'password' => md5($password)
      ));
      $user = $this->db->get('users');
      return $user->row_array();
    }

    public function find($id) {
      return $this->find_by(array('id' => $id));
    }

    public function find_by($user) {
      $this->db->select('users.id, users.username, users.email, profiles.*');
      $this->db->where($user);
      $this->db->join('profiles', 'users.id = profiles.user_id', 'inner');
      $user = $this->db->get('users');
      return $user->row_array();
    }

    public function create($user, $profile) {
      $user['id'] = 0;
      $user_validation = $this->_validate_user($user);
      $profile_validation = $this->_validate_profile($profile);
      if (!$user_validation['result']) {
        return array('error' => $user_validation['message']);
      } else if (!$profile_validation['result']) {
        return array('error' => $profile_validation['message']);
      }
      unset($user['id']);
      unset($user['password_confirmation']);
      $user['password'] = md5($user['password']);
      $this->db->insert('users', $user);
      $user_id = $this->db->insert_id();
      $profile['user_id'] = $user_id;
      $this->db->insert('profiles', $profile);
      return $this->find($user_id);
    }

    public function update($user, $profile, $connections) {
      $user_id = $user['id'];
      $user_validation = $this->_validate_user($user);
      $profile_validation = $this->_validate_profile($profile);
      if (!$user_validation['result']) {
        return $user_validation;
      } else if (!$profile_validation['result']) {
        return $profile_validation;
      }
      unset($user['id']);
      unset($user['password_confirmation']);
      if (array_key_exists('remove_password', $user_validation) && $user_validation['remove_password']) {
        unset($user['password']);
      } else {
        $user['password'] = md5($user['password']);
      }
      $this->update_user($user_id, $user);
      $this->update_profile($user_id, $profile);
      $this->update_connections($user_id, $connections);
      return array('result' => true, 'message' => 'Profile successfully updated.');
    }

    public function update_user($id, $user) {
      $this->db->where('id', $id);
      $this->db->update('users', $user);
    }

    public function update_profile($id, $profile) {
      $this->db->where('user_id', $id);
      $this->db->update('profiles', $profile);
    }

    public function update_connections($id, $connections) {
      $this->load->model('social_network_model', 'social_network');
      foreach ($connections as $network_id => $handle) {
        $connection_data = array(
          'user_id' => intval($id),
          'social_network_id' => $network_id,
          'handle' => $handle
        );
        $connection = $this->social_network->get_user_connection($id, $network_id);
        if (strlen(trim($handle)) > 0) {
          if (empty($connection)) {
            $this->social_network->create_connection($connection_data);
          } else {
            $this->social_network->update_connection($connection_data);
          }
        } else {
          if (!empty($connection)) {
            $this->social_network->delete_connection($connection);
          }
        }
      }
    }

    public function get_networks($id) {
      $this->db->where('user_id', $id);
      $this->db->join('social_networks', 'user_networks.social_network_id = social_networks.id', 'inner');
      $networks = $this->db->get('user_networks');
      return $networks->result_array();
    }

    public function get_posts($id) {
      $this->load->model('post_model', 'post');
      return $this->post->where(array('user_id' => $id));
    }

    public function get_screencasts($id) {
      $this->load->model('screencast_model', 'screencast');
      return $this->screencast->where(array('user_id' => $id));
    }

    private function _validate_user($user) {
      if ($user['username'] == '') {
        return array('result' => false, 'message' => 'Please provide a username.');
      } else if ($user['email'] == '') {
        return array('result' => false, 'message' => 'Please provide your email address.');
      }
      $user_check = $this->find_by(array('username' => $user['username']));
      if (!empty($user_check) && $user_check['id'] != $user['id']) {
        return array('result' => false, 'message' => 'Username already taken.');
      }
      $user_check = $this->find_by(array('email' => $user['email']));
      if (!empty($user_check) && $user_check['id'] != $user['id']) {
        return array('result' => false, 'message' => 'Email address already taken.');
      }
      if ($user['password'] != $user['password_confirmation']) {
        return array('result' => false, 'message' => 'Passwords do not match.');
      }
      return array('result' => true, 'remove_password' => ($user['password'] == ''));
    }

    private function _validate_profile($profile) {
      if (!$profile['firstname'] || !$profile['lastname']) {
        return array('result' => false, 'message' => 'Please provide your name.');
      }
      return array('result' => true);
    }

  }