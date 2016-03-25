<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
	class Md_users extends CI_Model{

		function __construct(){
			parent::__construct ();
		}
		function checkconnexion($nom, $mdp){
			
// 			$sql='SELECT count(et_id) FROM etudiant WHERE et_login=\''.$nom.'\' AND et_mdp=\''.$mdp.'\'';
			
// 		     $query[0] = $this->db->query($sql)->result();
// 		     $query[0]);
			$q = $this->db->select('*')->from('etudiant')->where('et_login',$nom)->where('et_mdp',$mdp)->get();
			$query[0] = $q->num_rows();
		     $query[1] = "etudiant";
		     if($query[0]==0)
		     {
		     		$q = $this->db->select('*')->from('animateur')->where('animateur_login',$nom)->where('animateur_mdp',$mdp)->get();
					$query[0] = $q->num_rows();
		     	$query[1] = "animateur";
		     	
		     }
		     return $query;
		}
	}
	?>