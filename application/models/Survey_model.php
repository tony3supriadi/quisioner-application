<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survey_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get() {
        $data = $this->db->get('survey');
        return $data->result();
    }

    public function where($clause = array()) {

        foreach ($clause as $key => $val) {
            $this->db->where($key, $val);
        }

        $data = $this->db->get('survey');
        return $data->result();
    }

    public function create($data = array()) {
        $data = $this->db->insert('survey', $data);
    }

    public function update($id, $data = array()) {
        $this->db->where('id', $id);
        $this->db->update('survey', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('survey');
    }

}