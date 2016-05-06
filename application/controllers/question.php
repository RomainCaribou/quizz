<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class question extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model('md_question');
		$this->load->model('md_quizz');
	}
	public function get_quiz_question($quiz_id){
		$questions = $this->md_question->get_quiz_question($quiz_id);
		return $questions;
	}
	
	public function set_question_quizz()
	{

		$nb_quest= $this->input->post('nb_question');
		$data["quizz_id"]= $this->input->post('id_quiz');
		$data3["quiz_id"]=$data["quizz_id"];
		$data3["quiz_nb_quest"]=$nb_quest;
		$this->md_quizz->update($data3);
		
		
		for($i=1; $i<=$nb_quest; $i++)
		{
			
		$data["question"]= $this->input->post('enonce_'.$i);
		$data["tps_reponse"]=$this->input->post('timer_'.$i);
		$data2["quest_id"] = $this->md_question->insert_question($data);
		
		
		$data2["reponse_a"]= $this->input->post('ra_'.$i);
		$data2["reponse_a_ok"]= $this->input->post('ra_ok_'.$i);
		$data2["reponse_b"]= $this->input->post('rb_'.$i);
		$data2["reponse_b_ok"]= $this->input->post('rb_ok_'.$i);
		$data2["reponse_c"]= $this->input->post('rc_'.$i);
		$data2["reponse_c_ok"]= $this->input->post('rc_ok_'.$i);
		$data2["reponse_d"]= $this->input->post('rd_'.$i);
		$data2["reponse_d_ok"]= $this->input->post('rd_ok_'.$i);
		$this->md_question->insert_4reponses($data2);
		
		}
	
	}
}

