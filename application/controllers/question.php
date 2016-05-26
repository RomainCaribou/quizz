<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Question extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model('md_question');
		$this->load->model('md_quizz');
		$this->load->model('md_reponse');
	}
	public function get_quiz_question($quiz_id){
		$questions = $this->md_question->get_quiz_question($quiz_id);
		return $questions;
	}
}
