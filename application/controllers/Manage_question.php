<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_question extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('isLogin')) {
            redirect('/');
        }
    }

    public function index() {
        $data = array(
            "title" => "Question - ",
            'container' => 'pages/question/Index',
            'page' => 'manage-question'
        );
        $this->load->view('App', $data);
    }
    
    public function add() {
        $data = array(
            "title" => "New Question - ",
            'container' => 'pages/question/new',
            'page' => 'manage-question'
        );
        $this->load->view('App', $data);
    }

    public function created() {
        $action = 1;

        $question = $this->input->post("question");
        $answer = $this->input->post("answer");
        $type = $this->input->post("type");

        if (empty($question)) {
            $action = 0;
            redirect("/manage-question/new");
        }

        if ($action) {
            $code = rand(111111, 999999);
            $insQuestion = $this->question->create([
                "code" => $code,
                "question" => $question
            ]);

            if ($insQuestion) {
                for ($i = 0; $i < count($answer); $i++) {
                    $this->answer->create([
                        "question_id" => $code,
                        "answer" => $answer[$i],
                        "type" => $type[$i]
                    ]);
                } 
            }
            redirect("/manage-question");
        }
    }

    public function edit($code) {
        $data = array(
            "title" => "New Question - ",
            'container' => 'pages/question/edit',
            "find" => $this->question->find($code),
            'page' => 'manage-question'
        );
        $this->load->view('App', $data);
    }

    public function updated($code) {
        $action = 1;

        $question = $this->input->post("question");

        $id = $this->input->post("id");
        $answer = $this->input->post("answer");
        $type = $this->input->post("type");

        if (empty($question)) {
            $action = 0;
            redirect("/manage-question/edit/" . $code);
        }

        if ($action) {
            $insQuestion = $this->question->update($code, [
                "question" => $question
            ]);

            if ($insQuestion) {
                for ($i = 0; $i < count($id); $i++) {
                    $this->answer->update($id[$i], [
                        "answer" => $answer[$i],
                        "type" => $type[$i]
                    ]);
                } 
            }
            redirect("/manage-question");
        }
    }

    public function delete($code) {
        $this->answer->delete($code);
        $this->question->delete($code);
        redirect("/manage-question");
    }

}