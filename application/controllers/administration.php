<?php

defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class administration extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model('md_question');
		$this->load->model('md_quizz');
		$this->load->model('md_administration');
	}
	
	public function index(){
		$this->liste_quizz();
	}
	
	public function liste_quizz(){

		$data['quiz_admin'] = $this->md_quizz->getall();

		$this->template->write_view('content', 'v_quizz/liste_quizz_admin', $data);
		$this->template->write_view('content', 'v_quizz/create_basic_quizz_popup');
		$this->template->write_view('content', 'v_quizz/create_general_quizz');
		$this->template->write_view('content', 'homepage/homepage_logged_admin');
		$this->template->write_view('bouton_header','v_quizz/btn_ajout_quiz');
	
		//		$this->template->write_view('content', 'v_quizz/quizz_validated');
	
	
		$this->template->render();
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
