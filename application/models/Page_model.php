<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function find() {
        $this->db->where('id', 1);
        $data = $this->db->get('page');
        return $data->row();
    }
    
    public function update($data = array()) {
        $this->db->where('id', 1);
        $this->db->update('page', $data);
    }

}