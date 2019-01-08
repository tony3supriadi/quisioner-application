<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error404 extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array(
            "title" => "Error 404 Page Not Found - ",
            "container" => 'pages/Error404'
        );
        $this->load->view('App', $data);
    }

}