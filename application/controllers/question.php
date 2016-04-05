<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Quiz extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model('md_question');
	}
	public function get_quiz_question($quiz_id){
		$questions = $this->md_question->get_quiz_question($quiz_id);
		return $questions;
	}
}