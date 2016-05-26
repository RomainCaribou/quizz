<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Md_reponse extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	function get_reponse_question($quest_id) {
		$res = $this->db->get_where ( 'reponses', array (
				'quest_id' => $quest_id 
		) );
		return $res->result_array ();
	}
	function insert_reponse($data) {
		$this->db->insert ( "reponse_etudiant", $data );
		return $this->db->insert_id ();
	}
	function get_reponse_etudiant($quest_id, $etudiant_id, $lancement_id) {
		$this->db->select ( '*' );
		$this->db->from ( "reponse_etudiant" );
		$this->db->join ( "reponses", "reponses.rep_id=reponse_etudiant.reponse_id" );
		$this->db->where ( "reponses.quest_id", $quest_id );
		$this->db->where ( "reponse_etudiant.etudiant_id", $etudiant_id );
		$this->db->where ( "reponse_etudiant.lancement_id", $lancement_id );
		$res = $this->db->get ();
	}
	function get_question_reponse($quest_id) {
		$res = $this->db->get_where ( 'reponses', array (
				'quest_id' => $quest_id 
		) );
		return $res->result_array ();
	}
	function update_reponse($data) {
		$this->db->where ( 'rep_id', $data ['rep_id'] );
		$this->db->update ( 'reponses', $data );
	}
}
