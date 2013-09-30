<?php

  class Social_Network_Model extends CI_Model {

    public function __construct() {
      parent::__construct();
      $this->load->database();
    }

    public function all() {
      $social_networks = $this->db->get('social_networks');
      return $social_networks->result_array();
    }

    public function get_user_connections($user_id) {
      $this->db->where('user_id', $user_id);
      $this->db->join('social_networks', 'user_networks.social_network_id = social_networks.id', 'inner');
      $connections = $this->db->get('user_networks');
      return $connections->result_array();
    }

    public function get_user_connection($user_id, $social_network_id) {
      $this->db->where(array('user_id' => $user_id, 'social_network_id' => $social_network_id));
      $connection = $this->db->get('user_networks');
      return $connection->row_array();
    }

    public function create_connection($connection) {
      $this->db->insert('user_networks', $connection);
    }

    public function update_connection($connection) {
      $this->db->where(array('user_id' => $connection['user_id'], 'social_network_id' => $connection['social_network_id']));
      $this->db->update('user_networks', $connection);
    }

    public function delete_connection($connection) {
      $this->db->where($connection);
      $this->db->delete('user_networks');
    }

  }