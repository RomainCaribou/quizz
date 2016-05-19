<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
	class md_administration extends CI_Model {
		function __construct() {
			parent::__construct();
			
		}
		
		function add_animateur($data)
		{
			$this->db->insert ( 'animateur', array (
					"animateur_login" => $data ["username"],
					"animateur_nom" => $data ["nom"],
					"animateur_prenom" => $data ["prenom"],
					"animateur_mdp" => $data ["psw"]));
		
		
		}
		
		function add_user($data)
		{
			var_dump($data);
			$this->db->insert ( 'etudiant', array (
					"et_login" => $data ["username"],
					"et_nom" => $data ["nom"],
					"et_prenom" => $data ["prenom"],
					"et_mdp" => $data ["psw"]));
					
			
		}
		
		function add_administrateur($data)
		{
			$this->db->insert ( 'administrateur', array (
					"admin_login" => $data ["username"],
					"admin_nom" => $data ["nom"],
					"admin_prenom" => $data ["prenom"],
					"admin_mdp" => $data ["psw"]));
				
				
				
		}
	}
			