<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get() {
        $data = $this->db->get('users');

        return $data->result();
    }

    public function auth($uname, $paswd) {
        $this->db->where('username', $uname);
        $this->db->where('password', md5($paswd));
        $data = $this->db->get('users');

        return $data->row();
    }

    public function create($data = array()) {
        $this->db->insert('users', $data);
    }

    public function update($id, $data = array()) {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('users');
    }

}