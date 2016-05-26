<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Quizz extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model('md_quizz');
		$this->load->model('md_etudiant_quiz');
		$this->load->model('md_question');
		$this->load->model('md_reponse');
	}
	
	public function index(){
		$user = $this->session->userdata('logged_in');
		if (isset($user['et_ID']))
			$this->list_quiz_etudiant();
		else
			$this->liste_quizz();
	}
	public function liste_quizz(){
		$animateur_id = $this->session->userdata('logged_in')['animateur_ID'];
		$data['quiz_admin'] = $this->md_quizz->get_all_quiz($animateur_id);
		$this->template->write_view('content', 'v_quizz/list_quizz_animateur', $data);
		$this->template->write_view('content', 'v_quizz/detail_quiz', $data);
		$this->template->write_view('content', 'v_quizz/create_basic_quizz_popup');
		$this->template->write_view('content', 'v_quizz/create_general_quizz_popup');
		$this->template->write_view('bouton_header','v_quizz/btn_ajout_quiz');
		$this->template->render();
	}
	
	public function list_quiz_etudiant(){
		$etudiant = $this->session->userdata('logged_in');
		$data['quiz_et'] = $this->md_quizz->get_quiz_et($etudiant['et_ID']);
		$data['public_quizs'] = $this->md_quizz->get_public_quiz($etudiant['et_annee'],$etudiant['et_filiere'],$etudiant['groupe']);
		$this->template->write_view ( 'content', 'v_quizz/list_quizz_etudiant', $data);
		$this->template->write_view('bouton_header','v_quizz/participer_quiz');
		$this->template->render();
	}
	
// 	public function creer()
// 	{
// 		$this->template->write_view('content','v_quizz/create_options');
// 		$this->template->render();
	
// 	}
	
	public function new_quizz()
	{
		$user = $this->session->userdata('logged_in');
		$data["animateur_id"]=$user["animateur_ID"];
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
		echo json_encode ( $detail );
		return true;
	}
	
	public function delete_quizz()
	{
		$quizz_id = $this->input->post('quiz_id');
		$this->md_quizz->delete_quizz($quizz_id);
		return true;
	}
	
	public function create_basic_questions()
	{
		$data["quiz_nb_quest"]=$this->input->post('nb_quest');
		$data["value_timer"]= $this->input->post('timer');
		$data["quiz_id"]= $this->input->post('quizz_id');
		$this->md_quizz->update($data);
		 
	}
	
	public function participer_quiz()
	{
		$user = $this->session->userdata('logged_in');
		$data['quizz_ID'] = $this->input->post('quiz_id');
		$data['lancement_quiz_id'] = $this->input->post('lancement_quiz_id');
		$data['etudiant_ID'] = $user['et_ID'];
		if ($this->md_etudiant_quiz->participer($data))
		{
			$this->session->set_userdata ( 'quiz_en_cours', $data['lancement_quiz_id'] );
			$nb_quest = $this->md_question->get_number_question($data['quizz_ID']); // à modifer
			$this->session->set_userdata ( 'nb_quest_quiz', $nb_quest );
			echo $data['lancement_quiz_id'];
			return true;
		}
		else 
		{
			echo "error";
			return false;
		}
	}
	
	public function wait_participant($lancement_id)
	{
		$this->test_if_session_quiz_is_set();
		$data['lancement_id'] = $lancement_id;
		$data['nb_total'] = $this->md_etudiant_quiz->get_nb_etudiant_total($lancement_id);
		$this->template->write_view ( 'content', 'v_quizz/loading',$data);
		$this->template->render();
	}
	
	public function get_number_participant($lancement_id)
	{
		echo $this->md_etudiant_quiz->get_nb_connected($lancement_id);
		return true;
	}
	
	// 2 => quiz en cours / 1 => quiz lancé par le prof / 0 => quiz non démarré
	public function get_state_quiz($lancement_id)
	{
		echo $this->md_etudiant_quiz->get_state_quiz($lancement_id);
		return true;
	}
	
	public function start_quiz($lancement_id)
	{
		$this->md_quizz->change_state_quiz($lancement_id); // met l'état en 2 => quiz démarré
		$this->session->set_userdata ( 'index_question', 0 );
		$this->run_question();
	}
	
	public function run_question()
	{
		$this->test_if_session_quiz_is_set();
		$lancement_id = $this->session->userdata('quiz_en_cours');
		$data['quiz'] = $this->md_quizz->get_lancement_quiz_id($lancement_id);
		$i = $this->session->userdata ('index_question');
		$this->session->set_userdata ( 'index_question', $i + 1 );
		$data['question'] = $this->md_question->get_quiz_question_by_number($data['quiz']['quiz_id'],$i);
		$data['reponse'] = $this->md_reponse->get_reponse_question($data['question']['quest_id']);
		$this->template->write_view ( 'content', 'v_quizz/launch_quizz', $data);
		$this->template->render();
	}
	
	public function finish_quiz(){
		$this->test_if_session_quiz_is_set();
		$lancement_id = $this->session->userdata('quiz_en_cours');
		$this->md_quizz->finish_quiz($lancement_id);
		$this->md_etudiant_quiz->quitter_quiz($lancement_id);
		$this->session->unset_userdata('quiz_en_cours');
		$this->session->unset_userdata('index_question');
		
		redirect('/quizz/recap_participation/'.$lancement_id, 'refresh');
		
	}
	
	public function recap_participation($lancement_id)
	{
		$user = $this->session->userdata('logged_in');
		
		$data['quiz'] = $this->md_quizz->get_lancement_quiz_id($lancement_id);
		$data['questions'] = $this->md_question->get_quiz_question($data['quiz']['quiz_id']);
		foreach ($data['questions'] as $question)
		{
			$quest_id = $question['quest_id'];
			$data['reponses'][$quest_id] = $this->md_reponse->get_reponse_question($quest_id);
			$data['reponse_etudiant'][$quest_id] = $this->md_reponse->get_reponse_etudiant($quest_id,$user['et_ID'],$lancement_id);
		}
		$this->template->write_view ( 'content', 'v_quizz/recap_participation_quiz', $data);
		$this->template->render();
	}
	
	public function test_if_session_quiz_is_set()
	{
		if ($this->session->userdata('quiz_en_cours')!=NULL)
			return true;
		else
			redirect('/quizz', 'refresh');
	}

}