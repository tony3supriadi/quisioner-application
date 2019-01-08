<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	public function index()
	{
		$data = array(
			"title" => "",
			"container" => "pages/Main"
		);
		$this->load->view('App', $data);
	}

}
