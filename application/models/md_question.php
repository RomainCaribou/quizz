<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Md_question extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	
	
	
	function get_quiz_question($quiz_id) {
		$res = $this->db->get_where ( 'questions', array (
				'quizz_id' => $quiz_id 
		) );
		return $res->result_array ();
	}
	
	
	
	function insert_question($data) {
		$this->db->insert ( 'questions', $data );
		return $this->db->insert_id ();
	}
	
	function update_question($data) {
		$this->db->where('quest_id', $data['quest_id']);
		$this->db->update ( 'questions', array (
				"question" => $data ["question"],
				"tps_reponse" => $data ["tps_reponse"] ));
	}
	
	function delete_question($data) {
		var_dump($data);
		$this->db->where('quest_id', $data);
		$this->db->delete ( 'questions');
	}

	
	function insert_4reponses($data2) {
		$this->db->insert ( 'reponses', array (
				"quest_id" => $data2 ["quest_id"],
				"reponse" => $data2 ["reponse_a"],
				"valide" => $data2 ["reponse_a_ok"] 
		) );
		$this->db->insert ( 'reponses', array (
				"quest_id" => $data2 ["quest_id"],
				"reponse" => $data2 ["reponse_b"],
				"valide" => $data2 ["reponse_b_ok"] 
		) );
		$this->db->insert ( 'reponses', array (
				"quest_id" => $data2 ["quest_id"],
				"reponse" => $data2 ["reponse_c"],
				"valide" => $data2 ["reponse_c_ok"] 
		) );
		$this->db->insert ( 'reponses', array (
				"quest_id" => $data2 ["quest_id"],
				"reponse" => $data2 ["reponse_d"],
				"valide" => $data2 ["reponse_d_ok"] 
		) );
	}
	
	
	function insert_basic_question($data2, $nb_quest) {
		for($i = 1; $i <= $nb_quest; $i ++) {
			$this->db->insert ( 'questions', $data2 );
			$quest_id = $this->db->insert_id ();
			

				$this->db->insert ( 'reponses', array (
						"quest_id" => $quest_id,
						"reponse" => "A" 
				) );
				$this->db->insert ( 'reponses', array (
						"quest_id" => $quest_id,
						"reponse" => "B"
				) );
				$this->db->insert ( 'reponses', array (
						"quest_id" => $quest_id,
						"reponse" => "C"
				) );
				$this->db->insert ( 'reponses', array (
						"quest_id" => $quest_id,
						"reponse" => "D"
				) );

		}
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
