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

    public function update($user, $profile) {
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

    private function _validate_user($user_update) {
      if ($user_update['username'] == '') {
        return array('result' => false, 'message' => 'Please provide a username.');
      } else if ($user_update['email'] == '') {
        return array('result' => false, 'message' => 'Please provide your email address.');
      }
      $user = $this->find_by(array('username' => $user_update['username']));
      if (!empty($user) && $user['id'] != $user_update['id']) {
        return array('result' => false, 'message' => 'Username already taken.');
      }
      $user = $this->find_by(array('email' => $user_update['email']));
      if (!empty($user) && $user['id'] != $user_update['id']) {
        return array('result' => false, 'message' => 'Email address already taken.');
      }
      if ($user_update['password'] != $user_update['password_confirmation']) {
        return array('result' => false, 'message' => 'Passwords do not match.');
      }
      return array('result' => true, 'remove_password' => ($user_update['password'] == ''));
    }

    private function _validate_profile($profile_update) {
      if (!$profile_update['firstname'] || !$profile_update['lastname']) {
        return array('result' => false, 'message' => 'Please provide your name.');
      }
      return array('result' => true);
    }

  }