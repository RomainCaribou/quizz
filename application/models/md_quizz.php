<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Md_etudiant extends CI_Model{
	
	function __construct(){
		parent::__construct ();
	}
	function getall(){
		$et=$this->db->get("quizz");
		return $et->result_array();
	}
	function insert($data){
		
		$this->db->insert('quizz',$data);
	}
	
}
?>