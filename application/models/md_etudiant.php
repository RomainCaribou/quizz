<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Md_etudiant extends CI_Model{
	
	function __construct(){
		parent::__construct ();
	}
	function getall(){
		$et=$this->db->get("Etudiant");
		return $et->result_array();
	}
	function insert($data){
		
		$this->db->insert('Etudiant',$data);
	}
	function update($id,$data){
		
		$this->db->update('Etudiant',$data,array('id'=>$id)); // on modifie tous les champs qui correspondent, champs unique si clé primaire
	}
}
?>