<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Answer_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get() {
        $data = $this->db->get('answer');
        return $data->result();
    }

    public function where($clause = array()) {

        foreach ($clause as $key => $val) {
            $this->db->where($key, $val);
        }

        $data = $this->db->get('answer');
        return $data->result();
    }

    public function create($data = array()) {
        $data = $this->db->insert('answer', $data);
    }

    public function update($id, $data = array()) {
        $this->db->where('id', $id);
        $this->db->update('answer', $data);
    }

    public function delete($id) {
        $this->db->where('question_id', $id);
        $this->db->delete('answer');
    }

}