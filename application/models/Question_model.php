<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get() {
        $data = $this->db->get('question');
        return $data->result();
    }

    public function find($code) {
        $this->db->where("code", $code);
        $data = $this->db->get("question");
        return $data->row();
    }

    public function create($data = array()) {
        $this->db->insert('question', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data = array()) {
        $this->db->where('code', $id);
        $this->db->update('question', $data);
        return $id;
    }

    public function delete($id) {
        $this->db->where('code', $id);
        $this->db->delete('question');
    }

}