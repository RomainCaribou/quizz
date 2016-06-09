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
		return $this->db->insert_id();
	}
	function insert_lancement_quiz($data){
		$this->db->insert('lancement_quiz',$data);
		return $this->db->insert_id();
	}
	function get_public_quiz($annee,$filiere,$groupe)
	{
		
		$sql1 = "SELECT * FROM quizz JOIN lancement_quiz 
				ON quizz.quiz_id=lancement_quiz.quiz_id 
				WHERE type_quiz='1'
				AND etat = '1' 
				AND (filiere IS NULL OR filiere='".$filiere."')
				AND (annee IS NULL OR annee='".$annee."')";
		
		if (isset($groupe))
			$sql2="	AND (groupe IS NULL OR groupe='".$groupe."')";
		else 
			$sql2 = "AND (groupe IS NULL)";

		$sql = $sql1 ."". $sql2;
		$res = $this->db->query($sql);
		return $res->result_array();
	}
	function get_quiz_et($et_id){
		$this->db->select('*');
		$this->db->from('quizz');
		$this->db->join('etudiant_quizz', 'quizz.quiz_id = etudiant_quizz.quizz_ID');
		$this->db->where("etudiant_quizz.etudiant_ID",$et_id);
		$res = $this->db->get();
		return $res->result_array();
	}
	function get_all_quiz($animateur_id){
		$res = $this->db->get_where('quizz',array('animateur_id'=>$animateur_id));
		return $res->result_array();
	}
	
	function get_lancement_quiz($quiz_id)
	{
		$res = $this->db->get_where('lancement_quiz',array("quiz_id"=>$quiz_id));
		return $res->result_array();
	}
	
	function delete_quizz($quizz_id){
                $this->db->where('quiz_id', $quizz_id);
                $this->db->delete('quizz');
	}
	
	function delete_lancement_quizz($lancement_id){
		$this->db->where('lancement_id', $lancement_id);
		$this->db->delete('lancement_quiz');
	}
	
	function update($data){	
		$this->db->where('quiz_id', $data['quiz_id']);
		$this->db->update('quizz',$data);
	}
	
	
	function get_detail_quiz($id_quiz)
	{
		$res = $this->db->get_where('quizz',array('quiz_id'=>$id_quiz));
		return $res->result_array()[0];
	}
	
	//change l'état du quiz en 2 => en cours
	function change_state_quiz($lancement_id)
	{
		$this->db->where('lancement_id', $lancement_id);
		$this->db->update('lancement_quiz',array("etat"=>2));
	}

	function get_lancement_quiz_id($lancement_id)
	{
		$this->db->select('*');
		$this->db->from('quizz');
		$this->db->join('lancement_quiz', 'quizz.quiz_id = lancement_quiz.quiz_id');
		$this->db->where("lancement_quiz.lancement_id",$lancement_id);
		$res = $this->db->get();
		return $res->result_array()[0];
	}
	
	function finish_quiz($lancement_id)
	{
		$this->db->where('lancement_id', $lancement_id);
		$this->db->update('lancement_quiz',array("etat"=>0));
	}
	
	function get_question_reponse($id_quiz)
	{
		
		$res=get_detail_quiz($id_quiz);

	}

	function get_state_quiz($lancement_id)
	{
		$this->db->select('etat');
		$res = $this->db->get_where('lancement_quiz',array("lancement_id"=>$lancement_id));
		return $res->result_array()[0]['etat'];
	}
}
?>
