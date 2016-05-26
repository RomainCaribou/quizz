<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Md_users extends CI_Model {
	function __construct() {
		parent::__construct ();
	}
	function checkconnexion($nom, $mdp) {
		$q = $this->db->select ( '*' )->from ( 'etudiant' )->where ( 'et_login', $nom )->where ( 'et_mdp', $mdp )->get ();
		$query [0] = $q->num_rows ();
		$query [1] = "etudiant";
		$query [2] = $q->result_array();
		if ($query [0] == 0) {
			$q = $this->db->select ( '*' )->from ( 'animateur' )->where ( 'animateur_login', $nom )->where ( 'animateur_mdp', $mdp )->get ();
			$query [0] = $q->num_rows ();
			$query [1] = "animateur";
			$query [2] = $q->result_array();
			
			if ($query [0] == 0) {
				$q = $this->db->select ( '*' )->from ( 'administrateur' )->where ( 'admin_login', $nom )->where ( 'admin_mdp', $mdp )->get ();
				$query [0] = $q->num_rows ();
				$query [1] = "administrateur";
				$query [2] = $q->result_array();
			}
		}
		return $query;
	}
}
?>