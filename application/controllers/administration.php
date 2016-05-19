<?php

defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class administration extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model('md_question');
		$this->load->model('md_quizz');
		$this->load->model('md_administration');
	}
	
	function add_user(){
		$data["username"]=$this->input->post('username');
		$data["nom"]=$this->input->post('nom');
		$data["prenom"]=$this->input->post('nom');
		$data["psw"]= $this->input->post('psw');
		$data["type"]= $this->input->post('profil');
		

		
		if($data["type"]==0)
		{
			$this->md_administration->add_user($data);
			
		}
		
		elseif($data["type"]==1)
		{
			$this->md_administration->add_animateur($data);
				
		}
		elseif($data["type"]==2)
		{
			$this->md_administration->add_administrateur($data);
				
		}
		
	}
}
