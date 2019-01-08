<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Person_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get() {
        $data = $this->db->get('person');
        return $data->result();
    }

    public function where($clause = array()) {

        foreach ($clause as $key => $val) {
            $this->db->where($key, $val);
        }

        $data = $this->db->get('person');
        return $data->result();
    }

    public function create($data = array()) {
        $this->db->insert('person', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data = array()) {
        $this->db->where('id', $id);
        $this->db->update('person', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('person');
    }

}