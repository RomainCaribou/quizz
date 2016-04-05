<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Quiz extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model('md_quiz');
	}
	public function liste_quiz(){
		$animateur_id = $this->session->userdata('logged_in')['animateur_ID'];
		$data['quiz_admin'] = $this->md_quiz->get_all_quiz($animateur_id);
		$this->template->write_view('content', 'v_quizz/list_quizz_animateur', $data);
		$this->template->render();
	}
}