<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Quizz extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model ( 'md_quizz' );
		$this->load->model ( 'md_etudiant' );
		$this->load->model ( 'md_etudiant_quiz' );
		$this->load->model ( 'md_question' );
		$this->load->model ( 'md_reponse' );
	}
	public function index() {
		$user = $this->session->userdata ( 'logged_in' );
		if (isset ( $user ['et_ID'] ))
			redirect ( 'quiz_etudiant');
		elseif (isset ( $user ['admin_ID'] ))
			redirect ( 'administration');
		else
			$this->liste_quizz ();
	}
	public function liste_quizz() {
		$animateur_id = $this->session->userdata ( 'logged_in' )['animateur_ID'];
		$data ['quiz_admin'] = $this->md_quizz->get_all_quiz ( $animateur_id );
		foreach ($data['quiz_admin'] as $quiz)
		{
			$data ['lancement_quiz'][$quiz['quiz_id']] = $this->md_quizz->get_lancement_quiz($quiz['quiz_id']);
		}
		$this->template->write_view ( 'content', 'v_quizz/list_quizz_animateur', $data );
		$this->template->write_view ( 'content', 'v_quizz/detail_quiz', $data );
		$this->template->write_view ( 'content', 'v_quizz/create_basic_quizz_popup' );
		$this->template->write_view ( 'content', 'v_quizz/create_general_quizz' );
		$this->template->write_view ( 'bouton_header', 'v_quizz/btn_ajout_quiz' );
		$this->test_if_after_modif();
		$this->test_if_after_add();
		$this->template->render ();
	}

	function test_if_after_modif(){
		if ($this->session->userdata ( 'after_modif' ))
		{
			$this->template->write_view ( 'content', 'v_quizz/quizz_modified' );
			$this->session->unset_userdata('after_modif');
		}
	}
	function test_if_after_add(){
	if ($this->session->userdata ( 'after_add' ))
		{
			$this->template->write_view ( 'content', 'v_quizz/quizz_validated' );
			$this->session->unset_userdata('after_add');
		}
	}
	public function new_quizz() {
		$user = $this->session->userdata ( 'logged_in' );
		$data ["animateur_id"] = $user ["animateur_ID"];
		$data ["quiz_nom"] = $this->input->post ( 'nomquizz' );
		$data ["type_quiz"] = $this->input->post ( 'type' );
		$data ["affichage_question"] = $this->input->post ( 'affichage_questions' );
		$data ["affichage_reponse"] = $this->input->post ( 'affichage_reponses' );
		$data ["reponse_multiple"] = $this->input->post ( 'reponse_multiple' );
		$data ["quiz_timer"] = $this->input->post ( 'timer' );
		$data ["affichage_resultat"] = $this->input->post ( 'affichage_resultats' );
		$data ["qr_code"] = $this->input->post ( 'avec_qrcode' );
		$data ["justification"] = $this->input->post ( 'justification' );
		$id = $this->md_quizz->insert ( $data );
		$detail = $this->md_quizz->get_detail_quiz ( $id );
		echo json_encode ( $detail );
		
		return true;
	}
	public function new_quizz_admin()
	{
		$data["quiz_nom"]= $this->input->post('nomquizz');
		$data["type_quiz"]= $this->input->post('type');
		$data["affichage_question"]= $this->input->post('affichage_questions');
		$data["affichage_reponse"]= $this->input->post('affichage_reponses');
		$data["reponse_multiple"]= $this->input->post('reponse_multiple');
		$data["quiz_timer"]= $this->input->post('timer');
		$data["affichage_resultat"]= $this->input->post('affichage_resultats');
		$data["qr_code"]= $this->input->post('avec_qrcode');
		$data["justification"]= $this->input->post('justification');
		$id = $this->md_quizz->insert($data);
		$detail = $this->md_quizz->get_detail_quiz($id);
		echo json_encode ($detail);
	
		return true;
	}
	public function delete_quizz() {
		
		$quizz_id = $this->input->post ( 'quiz_id' );
		$this->md_quizz->delete_quizz ( $quizz_id );
		
		if ($this->session->userdata('logged_in')['admin_ID'])
			redirect('administration/liste_quizz');
			else
			redirect('quizz/liste_quizz');
		
		return true;
	}

	public function create_basic_questions() {
		$data ["quiz_nb_quest"] = $this->input->post ( 'nb_quest' );
		$data ["value_timer"] = $this->input->post ( 'timer' );
		$data ["quiz_id"] = $this->input->post ( 'quizz_id' );
		$this->md_quizz->update ( $data );
		
		$data2 ["tps_reponse"] = $data ["value_timer"];
		$data2 ["quizz_id"] = $data ["quiz_id"];
		$this->md_question->insert_basic_question ( $data2, $data ["quiz_nb_quest"] );
		
		$this->session->set_userdata ( 'after_modif', 1 );
		
		if ($this->session->userdata('logged_in')['admin_ID'])
			redirect('administration/liste_quizz');
		else
			redirect('quizz/liste_quizz');
	}
	

	
	public function set_question_quizz() {
		$nb_quest = $this->input->post ( 'nb_question' );
		$data ["quizz_id"] = $this->input->post ( 'id_quiz' );
		$data3 ["quiz_id"] = $data ["quizz_id"];
		$data3 ["quiz_nb_quest"] = $nb_quest;
		$this->md_quizz->update ( $data3 );
		
		for($i = 1; $i <= $nb_quest; $i ++) {
			
			$data ["question"] = $this->input->post ( 'enonce_' . $i );
			$data ["tps_reponse"] = $this->input->post ( 'timer_' . $i );
			$data2 ["quest_id"] = $this->md_question->insert_question ( $data );
			
			$data2 ["reponse_a"] = $this->input->post ( 'ra_' . $i );
			$data2 ["reponse_a_ok"] = $this->input->post ( 'ra_ok_' . $i );
			$data2 ["reponse_b"] = $this->input->post ( 'rb_' . $i );
			$data2 ["reponse_b_ok"] = $this->input->post ( 'rb_ok_' . $i );
			$data2 ["reponse_c"] = $this->input->post ( 'rc_' . $i );
			$data2 ["reponse_c_ok"] = $this->input->post ( 'rc_ok_' . $i );
			$data2 ["reponse_d"] = $this->input->post ( 'rd_' . $i );
			$data2 ["reponse_d_ok"] = $this->input->post ( 'rd_ok_' . $i );
			$this->md_question->insert_4reponses ( $data2 );
		}
		//$this->template->write_view ( 'content', 'v_quizz/quizz_modified' );
		$this->session->set_userdata ( 'after_add', 1 );
		
		
		if ($this->session->userdata('logged_in')['admin_ID'])
			redirect('administration/liste_quizz');
		else
			redirect('quizz/liste_quizz');
		//$this->liste_quizz ();
	}
	public function modification($quiz_id) {
		$data ["quizz"] = $this->md_quizz->get_detail_quiz ( $quiz_id );
		$data ["questions"] = $this->md_question->get_quiz_question ( $quiz_id );
		
		foreach ( $data ["questions"] as $question ) {
			$quest_id = $question ['quest_id'];
			$data ["reponse"] [$quest_id] = $this->md_reponse->get_question_reponse ( $quest_id );
		}
		
		$this->template->write_view ( 'content', 'v_quizz/modify_quizz', $data );
		//$this->template->render ();
		$this->liste_quizz ();
	}
	public function update_quizz($quiz_id) {
		$nb_quest = $this->md_quizz->get_detail_quiz ( $quiz_id )['quiz_nb_quest'];
		
		$nb_quest_final = $this->input->post ( 'nb_question_md' );
		$data ["quizz_id"] = $quiz_id;
		$data3 ["quiz_id"] = $data ["quizz_id"];
		$data3 ["quiz_nb_quest"] = $nb_quest_final;
		$this->md_quizz->update ( $data3 );
		
		if ($nb_quest_final <= $nb_quest) {
			for($i = 0; $i < $nb_quest_final; $i ++) {
				
				$data ["question"] = $this->input->post ( 'enonce_md_' . $i );
				$data ["tps_reponse"] = $this->input->post ( 'timer_md_' . $i );
				$data ["quest_id"] = $this->input->post ( 'quest_id_md_' . $i );
				$this->md_question->update_question ( $data );
				
				$data2 ["quest_id"] = $data ["quest_id"];
				$data2 ["rep_id"] = $this->input->post ( 'ra_id_md_' . $i );
				$data2 ["reponse"] = $this->input->post ( 'ra_md_' . $i );
				$data2 ["valide"] = $this->input->post ( 'ra_ok_md_' . $i );
				$this->md_reponse->update_reponse ( $data2 );
				
				$data2 ["rep_id"] = $this->input->post ( 'rb_id_md_' . $i );
				$data2 ["reponse"] = $this->input->post ( 'rb_md_' . $i );
				$data2 ["valide"] = $this->input->post ( 'rb_ok_md_' . $i );
				$this->md_reponse->update_reponse ( $data2 );
				
				$data2 ["rep_id"] = $this->input->post ( 'rc_id_md_' . $i );
				$data2 ["reponse"] = $this->input->post ( 'rc_md_' . $i );
				$data2 ["valide"] = $this->input->post ( 'rc_ok_md_' . $i );
				$this->md_reponse->update_reponse ( $data2 );
				
				$data2 ["rep_id"] = $this->input->post ( 'rd_id_md_' . $i );
				$data2 ["reponse"] = $this->input->post ( 'rd_md_' . $i );
				$data2 ["valide"] = $this->input->post ( 'rd_ok_md_' . $i );
				$this->md_reponse->update_reponse ( $data2 );
			}
			
			
			$tab = explode ( "|", $this->input->post ( "quest_to_delete_md" ) );
			unset ( $tab [count ( $tab ) - 1] );
			foreach ( $tab as $var ) {
				
				$this->md_question->delete_question ( $var );
			}
		} else if ($nb_quest_final > $nb_quest) {
			for($i = 0; $i < $nb_quest; $i ++) {
				
				$data ["question"] = $this->input->post ( 'enonce_md_' . $i );
				$data ["tps_reponse"] = $this->input->post ( 'timer_md_' . $i );
				$data ["quest_id"] = $this->input->post ( 'quest_id_md_' . $i );
				$this->md_question->update_question ( $data );
				
				$data2 ["quest_id"] = $data ["quest_id"];
				$data2 ["rep_id"] = $this->input->post ( 'ra_id_md_' . $i );
				$data2 ["reponse"] = $this->input->post ( 'ra_md_' . $i );
				$data2 ["valide"] = $this->input->post ( 'ra_ok_md_' . $i );
				$this->md_reponse->update_reponse ( $data2 );
				
				$data2 ["rep_id"] = $this->input->post ( 'rb_id_md_' . $i );
				$data2 ["reponse"] = $this->input->post ( 'rb_md_' . $i );
				$data2 ["valide"] = $this->input->post ( 'rb_ok_md_' . $i );
				$this->md_reponse->update_reponse ( $data2 );
				
				$data2 ["rep_id"] = $this->input->post ( 'rc_id_md_' . $i );
				$data2 ["reponse"] = $this->input->post ( 'rc_md_' . $i );
				$data2 ["valide"] = $this->input->post ( 'rc_ok_md_' . $i );
				$this->md_reponse->update_reponse ( $data2 );
				
				$data2 ["rep_id"] = $this->input->post ( 'rd_id_md_' . $i );
				$data2 ["reponse"] = $this->input->post ( 'rd_md_' . $i );
				$data2 ["valide"] = $this->input->post ( 'rd_ok_md_' . $i );
				$this->md_reponse->update_reponse ( $data2 );
			}
			
			for($i = $nb_quest; $i < $nb_quest_final; $i ++) 

			{
				
				$data4 ["quizz_id"] = $this->input->post ( 'id_quiz_md' );
				$data4 ["question"] = $this->input->post ( 'enonce_md_' . $i );
				$data4 ["tps_reponse"] = $this->input->post ( 'timer_md_' . $i );
				$data3 ["quest_id"] = $this->md_question->insert_question ( $data4 );
				
				$data3 ["reponse_a"] = $this->input->post ( 'ra_md_' . $i );
				$data3 ["reponse_a_ok"] = $this->input->post ( 'ra_ok_md_' . $i );
				$data3 ["reponse_b"] = $this->input->post ( 'rb_md_' . $i );
				$data3 ["reponse_b_ok"] = $this->input->post ( 'rb_ok_md_' . $i );
				$data3 ["reponse_c"] = $this->input->post ( 'rc_md_' . $i );
				$data3 ["reponse_c_ok"] = $this->input->post ( 'rc_ok_md_' . $i );
				$data3 ["reponse_d"] = $this->input->post ( 'rd_md_' . $i );
				$data3 ["reponse_d_ok"] = $this->input->post ( 'rd_ok_md_' . $i );
				$this->md_question->insert_4reponses ( $data3 );
			}
		}
		//$this->template->write_view ( 'content', 'v_quizz/quizz_modified' );
		$this->session->set_userdata ( 'after_modif', 1 );
		
		if ($this->session->userdata('logged_in')['admin_ID'])
			redirect('administration/liste_quizz');
		else
			redirect('quizz/liste_quizz');
		//$this->liste_quizz ();
	}
}
