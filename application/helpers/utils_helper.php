<?php
/*
 * formate la date en français sous forme 25 Juin 2016 à 19h:40
 */
function format_fr_date($str_date){
	$date_quiz = strtotime ( $str_date );
	setlocale ( LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1' );
	$date_fr_quiz = strftime ( "%d %B %Y", $date_quiz ) . " &agrave; " . date ( "h\h:i", $date_quiz );
	return  $date_fr_quiz;
}

/*
 * retourne oui si la valeur d'entrée vaut 1
 * 									0 sinon
 */
function oui_ou_non($val){
	if ($val == 1)
		return "Oui";
	else 
		return "Non";
}

function get_quiz_questions($quiz_id){
	$ci = & get_instance();
	$ci->load->model('md_question');
	$questions = $ci->md_question->get_quiz_question($quiz_id);
	return $questions;
}

function get_details($quizz_id){
	
	$ci = & get_instance();
	$ci->load->model('md_quizz');
	$details = $ci->md_question->get_details_quizz($quizz_id);
	return $details;
}