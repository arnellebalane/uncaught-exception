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
      $this->db->select('users.id, users.username, profiles.*');
      $this->db->where('id', $id);
      $this->db->join('profiles', 'users.id = profiles.user_id', 'inner');
      $user = $this->db->get('users');
      return $user->row_array();
    }

    public function update_profile($id, $profile) {
      $this->db->where('user_id', $id);
      $this->db->update('profiles', $profile);
    }

  }