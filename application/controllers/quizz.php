<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Quizz extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model('md_quizz');
	}
	
	public function index(){
		$this->liste_quizz();
	}
	public function liste_quizz(){
		$animateur_id = $this->session->userdata('logged_in')['animateur_ID'];
		$data['quiz_admin'] = $this->md_quizz->get_all_quiz($animateur_id);
		$this->template->write_view('content', 'v_quizz/list_quizz_animateur', $data);
		$this->template->write_view('content', 'v_quizz/create_basic_quizz_popup');
		$this->template->write_view('bouton_header','v_quizz/btn_ajout_quiz');
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
	
	public function delete_quizz($quizz_id)
	{
		$this->md_quizz->delete_quizz($quizz_id);
		redirect('quizz/liste_quizz');
	}
	
	public function create_basic_questions()
	{
		$data["quiz_nb_quest"]=$this->input->post('nb_quest');
		$data["value_timer"]= $this->input->post('timer');
		$data["quiz_id"]= $this->input->post('quizz_id');
		$this->md_quizz->update($data);
		 
	}

}