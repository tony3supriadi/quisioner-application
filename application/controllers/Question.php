<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($id) {
        $data = array(
            "title" => "Question - ",
            'container' => 'pages/Question',
            "find" => $this->question->find($id)
        );
        $this->load->view('App', $data);
    }

    public function start() {
        $this->load->library('local');

        $survey_array = array();

        $person_array = array(
            "person" => array(
                "ip" =>  $this->local->get_client_ip_env(),
                "person" => $_SERVER['HTTP_USER_AGENT'],
            )
        );

        foreach ($this->question->get() as $key => $val) {
            $survey_array["survey"][] = array(
                "question_id" => $val->code,
                "answer_id" => "",
                "type" => ""
            );
        }

        $session_array = array(
            "person" => $person_array["person"],
            "survey" => $survey_array["survey"],
            "index" => 0
        );

        $this->session->set_userdata($session_array);
        redirect("/question/" . $this->session->userdata("survey")[0]["question_id"]);
    }
    
    public function answer($i) {
        $index = $i - 1;
        $getSession = $this->session->userdata("survey");

        $getSession[$index]["answer_id"] = $this->input->post("answer");
        $getSession[$index]["type"] = $this->input->post("type");

        $this->session->set_userdata([
            "survey" => $getSession,
            "index" => $i
        ]);

        if ($i < count($getSession)) {
            redirect("/question/" . $this->session->userdata("survey")[$i]["question_id"]);
        } else {
            redirect("/question/finish");
        }
    }

    public function finish() {
        $data = array(
            "title" => "Question - ",
            'container' => 'pages/Finish',
            'page' => 'finish'
        );
        $this->load->view('App', $data);
    }

    public function saved() {
        $person = $this->session->userdata("person");
        $survey = $this->session->userdata("survey");
        
        $dataPerson = $this->person->create($person);
        if ($dataPerson) {

            for ($i = 0; $i < count($survey); $i++) {
                $survey[$i]["person_id"] = $dataPerson;
                $this->survey->create($survey[$i]);
            }
        }

        $this->session->set_userdata([
            "person" => array(),
            "survey" => array()
        ]);
        redirect("/");
    }
}