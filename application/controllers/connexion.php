<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class connexion extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model ( 'md_users', '', TRUE );
	}
	public function index() {
		$this->template->write_view ( 'content', 'homepage/identification' );
		$this->template->render ();
	}
	public function test_login() {
		$login = $this->input->post ( 'login' );
		$mdp = $this->input->post ( 'psw' );
		$ok = $this->md_users->checkconnexion ( $login, $mdp );
		if ($ok [0]) {
			if ($ok [1] == "etudiant") {
				$user_detail = $ok [2] [0];
				$this->session->set_userdata ( 'logged_in', $user_detail );
				$this->template->write_view ( 'content', 'v_quizz/list_quizz_etudiant' );
			} else if ($ok [1] == "animateur") {
				$user_detail = $ok [2] [0];
				$this->session->set_userdata ( 'logged_in', $user_detail );
				redirect('quiz/liste_quiz');
			}
		} else {
			$data ['res'] = 1; /* cree la variable res et on test avec isset si elle existe */
			$this->template->write_view ( 'content', 'homepage/identification', $data );
		}
		$this->template->render ();
	}
	public function deconnexion() {
		$this->session->unset_userdata('logged_in');
		$this->index();
	}
	
	public function creer()
	{
		$this->template->write_view('content','v_quizz/create_options');
		$this->template->render();
	
	}
	
	public function new_quizz()
	{
		$data["nom"]= $this->input->post('nomquizz');
		$data["type"]= $this->input->post('type');
		$data["affichage_questions"]= $this->input->post('affichage_questions');
		$data["affichage_reponses"]= $this->input->post('affichage_reponses');
		$data["reponse_multiple"]= $this->input->post('reponse_multiple');
		$data["timer"]= $this->input->post('timer');
		$data["affichage_resultats"]= $this->input->post('affichage_resultats');
		$data["avec_qrcode"]= $this->input->post('avec_qrcode');
		$data["justification"]= $this->input->post('justification');
		
		$this->md_quizz->insert($data);
	
	}
}
