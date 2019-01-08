<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        if ($this->session->userdata('isLogin')) {
            redirect('/');
        }
    }

    public function index() {
        $data = array(
            "title" => "Login - ",
            "container" => "pages/Login"
        );
        $this->load->view('App', $data);
    }

    public function auth() {
        $uname = $this->input->post("username");
        $paswd = $this->input->post("password");

        $data = $this->users->auth($uname, $paswd);
        if ($data) {
            $this->session->set_userdata([
                "id" => $data->id,
                "username" => $data->name,
                "isLogin" => true
            ]);
            redirect('/');
        } else {
            redirect("/login");
        }
    }
}