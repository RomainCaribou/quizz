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
	function get_quiz_question_by_number($quiz_id,$offset){
		// LIMIT , OFFSET
		$res = $this->db->get_where('questions',array('quizz_id'=>$quiz_id),1, $offset);
		return $res->result_array()[0];
	}
	function get_number_question($quiz_id)
	{
		$this->db->where('quizz_id', $quiz_id);
		$this->db->from('questions');
		return $this->db->count_all_results();
	}
}