<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Md_animateur extends CI_Model{
	
	function __construct(){
		parent::__construct ();
	}
	function getall(){
		$et=$this->db->get("animateur");
		return $et->result_array();
	}
	function insert($data){
		
		$this->db->insert('animateur',$data);
	}
	function update($id,$data){
		
		$this->db->update('animateur',$data,array('id'=>$id)); // on modifie tous les champs qui correspondent, champs unique si clé primaire
	}
	
	function delete_animateur($anim_id){
		$this->db->where('animateur_ID', $anim_id);
		$this->db->delete('animateur');
	}
}
?>