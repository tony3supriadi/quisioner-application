<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array(
            "title" => "About - ",
            "container" => 'pages/About',
            "page" => "about"
        );
        $this->load->view('App', $data);
    }

    public function edit() {
        $data = array(
            "title" => "About - ",
            'container' => 'pages/About',
            "page" => "edit"
        );
        $this->load->view('App', $data);
    }

    public function updated() {
        $this->page->update([
                "content" => $this->input->post("content")
            ]);
        redirect("/about");
    }

}