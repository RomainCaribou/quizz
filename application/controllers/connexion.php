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
				redirect('quizz/liste_quizz');
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
}
