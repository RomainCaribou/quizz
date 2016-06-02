<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Md_etudiant_quiz extends CI_Model{
	
	function __construct(){
		parent::__construct ();
	}
	function participer($data){
		if (!$this->is_already_doing($data['etudiant_ID'],$data['lancement_quiz_id']))
		{
			$this->db->insert('etudiant_quizz',$data);
			return true;
		}
		else
			return false;
	}
	function is_already_doing($etudiant_id,$lancement_id){
		$res = $this->db->get_where('etudiant_quizz',array("etudiant_ID"=>$etudiant_id,"lancement_quiz_id"=>$lancement_id,"etat_participation"=>1));
		if ($res->num_rows()>0)
			return true;
		else 
			return false;
	}
	function get_nb_etudiant_total($lancement_id){		
		$res = $this->db->get_where('lancement_quiz',array("lancement_id"=>$lancement_id));
		$lancement = $res->result_array()[0];
		$this->db->select('*');
		$this->db->from('etudiant');
		if($lancement['groupe']!="")
			$this->db->where('groupe',$lancement['groupe']);
		if($lancement['filiere']!="")
			$this->db->where('et_filiere',$lancement['filiere']);
		if($lancement['annee']!="")
			$this->db->where('et_annee',$lancement['annee']);
		$resultat = $this->db->get();
		return $resultat->num_rows();
	}
	function get_nb_connected($lancement_id){
		$res = $this->db->get_where('etudiant_quizz',array("lancement_quiz_id"=>$lancement_id,"etat_participation"=>1));
		return $res->num_rows();
	}
	function quitter_quiz($etudiant_id,$lancement_id){
		$this->db->where('etudiant_ID',$etudiant_id);
		$this->db->where('lancement_quiz_id',$lancement_id);
		$this->db->update('etudiant_quizz',array("etat_participation"=>0));
	}
	function get_participants_quiz($lancement_id){		
		$res = $this->db->get_where('lancement_quiz',array("lancement_id"=>$lancement_id));
		$lancement = $res->result_array()[0];
		$this->db->select('*');
		$this->db->from('etudiant');
		if($lancement['groupe']!="")
			$this->db->where('groupe',$lancement['groupe']);
		if($lancement['filiere']!="")
			$this->db->where('et_filiere',$lancement['filiere']);
		if($lancement['annee']!="")
			$this->db->where('et_annee',$lancement['annee']);
		$resultat = $this->db->get();
		return $resultat->result_array();
	}
}