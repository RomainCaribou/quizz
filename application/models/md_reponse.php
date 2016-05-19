<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Md_reponse extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	function get_question_reponse($quest_id){
		$res = $this->db->get_where('reponses',array('quest_id'=>$quest_id));
		return $res->result_array();
	}
	
	function update_reponse($data) {
	
		$this->db->where('rep_id', $data['rep_id']);
	
		$this->db->update ( 'reponses', $data );
	}

}