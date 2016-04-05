<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Md_question extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	function get_quiz_question($quiz_id){
		$res = $this->db->get_where('questions',array('quizz_id'=>$quiz_id));
		return $res->result_array();
	}
}