<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('isLogin')) {
            redirect('/');
        }
    }

    public function index() {
        $this->session->set_userdata([
            "id" => "",
            "username" => "",
            "isLogin" => false
        ]);
        redirect("/");
    }

}