<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Md_reponse extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	function get_reponse_question($quest_id){
		$res = $this->db->get_where('questions',array('quest_id'=>$quest_id));
		return $res->result_array();
	}
}