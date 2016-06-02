<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Reponse extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model('md_reponse');
	}
	
	public function index(){
		$this->liste_quizz();
	}
	
	public function save_reponse()
	{
		$res_insert = false;
		$etudiant = $this->session->userdata('logged_in');
		$data['lancement_id'] = $this->session->userdata("quiz_en_cours");
		$data['etudiant_id'] = $etudiant['et_ID'];
		$data['justification'] = $this->input->post("justification");
		$nb_rep = $this->input->post("nb_rep");
		if($nb_rep == 0)
		{
			echo "ok";
			return true;
		}
		$reponses = $this->input->post("reponse");
		for ($i=0; $i<$nb_rep; $i++)
		{
			$data['reponse_id'] = $reponses[$i];
			$id = $this->md_reponse->insert_reponse($data);
			if ($id)
				$res_insert = true;
			else 
				$res_insert = false;
		}
		if ($res_insert)
		{
			echo "ok";
			return true;
		}
		else
		{
			echo "error";
			echo $nb_rep;
			return false;
		}
		
	}
}
?>