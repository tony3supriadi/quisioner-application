<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survey extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('isLogin')) {
            redirect('/');
        }
    }

    public function index() {
        $data = array(
            "title" => "Question - ",
            'container' => 'pages/survey/Index',
            "page" => "index"
        );
        $this->load->view('App', $data);
    }

    public function questions() {
        $data = array(
            "title" => "Question - ",
            'container' => 'pages/survey/Index',
            "page" => "questions"
        );
        $this->load->view('App', $data);
    }

}