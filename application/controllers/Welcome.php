<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct ();
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function test(){
		$this->template->write_view('content', 'question/list');
		$this->template->render();
	}

       /* else if($ok[0]==0) */
        	
		

}
