<?php

defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class administration extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model('md_question');
		$this->load->model('md_quizz');
		$this->load->model('md_administration');
		$this->load->model('md_reponse');
		
	}
	
	public function index(){
		$this->liste_quizz();
	}
	
	public function liste_quizz()
	{

		$data['quiz_admin'] = $this->md_quizz->getall();

		$this->template->write_view('content', 'v_quizz/liste_quizz_admin', $data);
		$this->template->write_view('content', 'v_quizz/create_basic_quizz_popup');
		$this->template->write_view('content', 'v_quizz/create_general_quizz');
		//$this->template->write_view('content', 'homepage/homepage_logged_admin');
		$this->template->write_view('bouton_header','v_quizz/btn_ajout_quiz_admin');
		//		$this->template->write_view('content', 'v_quizz/quizz_validated');
	
	
		$this->template->render();
	}
	
	public function modification($quiz_id) {
		$data ["quizz"] = $this->md_quizz->get_detail_quiz ( $quiz_id );
		$data ["questions"] = $this->md_question->get_quiz_question ( $quiz_id );
	
		foreach ( $data ["questions"] as $question ) {
			$quest_id = $question ['quest_id'];
			$data ["reponse"] [$quest_id] = $this->md_reponse->get_question_reponse ( $quest_id );
		}
	
		$this->template->write_view ( 'content', 'v_quizz/modify_quizz', $data );
		//$this->template->render ();
		$this->liste_quizz ();
	}
	
	public function liste_etudiant(){
		
		$data['etudiants'] = $this->md_etudiant->getall();
		$data['animateurs'] = $this->md_animateurs->getall();
		$data['administrateurs'] = $this->md_administration->getall();
		
		
		$this->template->write_view('content', 'v_quizz/list_etudiants', $data);
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
		$this->liste_quizz();
	}
}

