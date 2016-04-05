<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Md_quiz extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	
	function get_all_quiz($animateur_id){
		$res = $this->db->get_where('quizz',array('animateur_id'=>$animateur_id));
		return $res->result_array();
	}
}