<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Quiz_animateur extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model ( 'md_quizz' );
		$this->load->model ( 'md_etudiant' );
		$this->load->model ( 'md_etudiant_quiz' );
		$this->load->model ( 'md_question' );
		$this->load->model ( 'md_reponse' );
	}
	public function index() {
		redirect ( 'quizz' );
	}
	public function demarrer_quiz() {
		$data ['quiz_id'] = $this->input->post ( 'quiz_id_selected' );
		$data ['annee'] = $this->input->post ( 'choix_annee' );
		$data ['filiere'] = $this->input->post ( 'choix_filiere' );
		$data ['groupe'] = $this->input->post ( 'choix_groupe' );
		$id_lancement = $this->md_quizz->insert_lancement_quiz ( $data );
		$this->session->set_userdata ( 'lancement_en_cours', $id_lancement );
		$data_to_send ['nb_total'] = $this->md_etudiant_quiz->get_nb_etudiant_total ( $id_lancement );
		$nb_quest = $this->md_question->get_number_question ( $data ['quiz_id'] );
		$this->session->set_userdata ( 'nb_quest_quiz', $nb_quest );
		$this->template->write_view ( 'content', 'v_quizz/lancement_quiz/wait_participant', $data_to_send );
		$this->template->render ();
	}
	public function get_number_participant() {
		$lancement_id = $this->session->userdata ( 'lancement_en_cours' );
		echo $this->md_etudiant_quiz->get_nb_connected ( $lancement_id );
		return true;
	}
	public function run_quiz() {
		$lancement_id = $this->session->userdata ( 'lancement_en_cours' );
		$this->md_quizz->change_state_quiz ( $lancement_id );
		
		$this->session->set_userdata ( 'index_question', 0 );
		$this->run_question ();
	}
	public function run_question() {
		$this->test_if_session_quiz_is_set ();
		$lancement_id = $this->session->userdata ( 'lancement_en_cours' );
		$data ['quiz'] = $this->md_quizz->get_lancement_quiz_id ( $lancement_id );
		$i = $this->session->userdata ( 'index_question' );
		if ($i < $data ['quiz'] ['quiz_nb_quest'])
			$this->session->set_userdata ( 'index_question', $i + 1 );
		else
			redirect ( 'quiz_animateur/finish_quiz' );
		$data ['question'] = $this->md_question->get_quiz_question_by_number ( $data ['quiz'] ['quiz_id'], $i );
		$data ['reponse'] = $this->md_reponse->get_reponse_question ( $data ['question'] ['quest_id'] );
		$this->template->write_view ( 'content', 'v_quizz/lancement_quiz/run_quiz', $data );
		$this->template->render ();
	}
	public function test_if_session_quiz_is_set() {
		if ($this->session->userdata ( 'lancement_en_cours' ) != NULL)
			return true;
		else
			redirect ( '/quiz_animateur', 'refresh' );
	}
	public function finish_quiz() {
		$this->test_if_session_quiz_is_set ();
		$lancement_id = $this->session->userdata ( 'lancement_en_cours' );
		$this->md_quizz->finish_quiz ( $lancement_id );
		$this->session->unset_userdata ( 'lancement_en_cours' );
		$this->session->unset_userdata ( 'index_question' );
		redirect ( '/quiz_animateur/recap_participation/' . $lancement_id );
	}
	public function recap_participation($lancement_id) {
		$this->session->set_userdata ( "no_square", true );
		$data ['lancement_id'] = $lancement_id;
		$data ['etudiants'] = $this->md_etudiant_quiz->get_participants_quiz ( $lancement_id );
		$data ['quiz'] = $this->md_quizz->get_lancement_quiz_id ( $lancement_id );
		$data ['questions'] = $this->md_question->get_quiz_question ( $data ['quiz'] ['quiz_id'] );
		$nb_pts_total = 0;
		foreach ( $data ['questions'] as $question ) {
			$quest_id = $question ['quest_id'];
			$data ['reponses'] [$quest_id] = $this->md_reponse->get_reponse_question ( $quest_id );
			$data ['exists_valid_rep'] [$quest_id] = false;
			if ($this->test_if_valide_rep_exists ( $data ['reponses'] [$quest_id] )) {
				$data ['exists_valid_rep'] [$quest_id] = true;
				$nb_pts_total ++;
			}
			foreach ( $data ['etudiants'] as $etudiant ) {
				$id_et = $etudiant ['et_ID'];
				$data ['reponse_etudiant'] [$id_et] [$quest_id] = $this->md_reponse->get_reponse_etudiant ( $quest_id, $id_et, $lancement_id );
				$point_question [$id_et] [$quest_id] = $this->point_par_question ( $data ['reponse_etudiant'] [$id_et] [$quest_id], $data ['reponses'] [$quest_id] );
			}
		}
		if ($nb_pts_total != 0) {
			foreach ( $data ['etudiants'] as $etudiant ) {
				$id_et = $etudiant ['et_ID'];
				$point_tot = $this->count_point_total_par_et ( $point_question [$id_et] );
				$data ['note_totale'] [$id_et] = $point_tot * 20 / $nb_pts_total;
				$data ['pourcentage_totale'] [$id_et] = $point_tot * 100 / $nb_pts_total;
			}
		}
		$this->template->write_view ( 'content', 'v_quizz/resultat/individuel', $data );
		$this->template->write_view ( 'content', 'v_quizz/resultat/quest_reponse', $data );
		$this->template->render ();
		$this->session->set_userdata ( "no_square", false );
	}
	public function resultat_global($lancement_id) {
		$this->session->set_userdata ( "no_square", true );
		$data ['lancement_id'] = $lancement_id;
		$data ['etudiants'] = $this->md_etudiant_quiz->get_participants_quiz ( $lancement_id );
		$nb_et_total = count ( $data ['etudiants'] );
		$data ['quiz'] = $this->md_quizz->get_lancement_quiz_id ( $lancement_id );
		$data ['questions'] = $this->md_question->get_quiz_question ( $data ['quiz'] ['quiz_id'] );
		foreach ( $data ['questions'] as $question ) {
			$quest_id = $question ['quest_id'];
			
			$quest_id = $question ['quest_id'];
			$data ['reponses'] [$quest_id] = $this->md_reponse->get_reponse_question ( $quest_id );
			$nb_a = 0;
			$nb_b = 0;
			$nb_c = 0;
			$nb_d = 0;
			$nb_valide = 0;
			foreach ( $data ['etudiants'] as $etudiant ) {
				$id_et = $etudiant ['et_ID'];
				$data ['reponse_etudiant'] [$quest_id] [$id_et] = $this->md_reponse->get_reponse_etudiant ( $quest_id, $id_et, $lancement_id );
			}
			
			foreach ( $data ['reponse_etudiant'] [$quest_id] as $rep_quest ) {
				foreach ( $rep_quest as $rep ) {
					if ($rep ['abc'] == "a") $nb_a ++;
					if ($rep ['abc'] == "b") $nb_b ++;
					if ($rep ['abc'] == "c") $nb_c ++;
					if ($rep ['abc'] == "d") $nb_d ++;
					if ($rep ['valide'] == "on") $nb_valide ++;
				}
			}
			$data['nb_a'][$quest_id] = $nb_a * 100 / $nb_et_total;
			$data['nb_b'][$quest_id] = $nb_b * 100 / $nb_et_total;
			$data['nb_c'][$quest_id] = $nb_c * 100 / $nb_et_total;
			$data['nb_d'][$quest_id] = $nb_d * 100 / $nb_et_total;
			$data['nb_valide'][$quest_id] = $nb_valide * 100 / $nb_et_total;
		}
		$this->template->write_view ( 'content', 'v_quizz/resultat/global', $data );
		$this->template->write_view ( 'content', 'v_quizz/resultat/quest_reponse', $data );
		$this->template->render ();
		$this->session->set_userdata ( "no_square", false );
	}
	public function count_point_total_par_et($tab_point_par_question) {
		$point_total = 0;
		foreach ( $tab_point_par_question as $point ) {
			$point_total = $point_total + $point;
		}
		return $point_total;
	}
	public function test_if_valide_rep_exists($reponses) {
		foreach ( $reponses as $rep ) {
			if ($rep ['valide'] == "on")
				return true;
		}
		return false;
	}
	public function point_par_question($reponses_et, $reponses_possibles) {
		$nb_bonne_rep_quest = 0;
		foreach ( $reponses_possibles as $rep_pos ) {
			if ($rep_pos ['valide'] == "on")
				$nb_bonne_rep_quest ++;
		}
		$nb_bonne_rep_et = 0;
		foreach ( $reponses_et as $rep_pos ) {
			if ($rep_pos ['valide'] == "on")
				$nb_bonne_rep_et ++;
		}
		$nb_rep_fournies_et = count ( $reponses_et );
		if (($nb_rep_fournies_et > $nb_bonne_rep_quest) || ($nb_bonne_rep_quest == 0))
			return 0;
		else
			return $nb_bonne_rep_et / $nb_bonne_rep_quest;
	}
	public function delete_lancement($lancement_id) {
		$this->md_quizz->delete_lancement_quizz ( $lancement_id );
		return true;
	}
}