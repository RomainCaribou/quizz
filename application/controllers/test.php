<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class test extends CI_Controller {
	
	function __construct(){
		parent::__construct ();
		$this->load->model ('md_etudiant', '', TRUE);
	}
	
	function insert(){
		$entree["nom"]=$this->input->post('nom');
	    $this->md_etudiant->insert($entree);
	    $this->fct();
		
	}
	public function fct(){

		$data['tab_etudiant']= $this->md_etudiant->getall();
		$this->load->view('page_test',$data);

		
	}
	
}