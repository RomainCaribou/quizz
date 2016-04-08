<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Md_quizz extends CI_Model{
	
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
	
	function get_all_quiz($animateur_id){
		$res = $this->db->get_where('quizz',array('animateur_id'=>$animateur_id));
		return $res->result_array();
	}
	
	function delete_quizz($quizz_id){
                $this->db->where('quiz_id', $quizz_id);
                $this->db->delete('quizz');
	}
}
?>