<script type="text/javascript">
$(document).ready(function(){
	$("#btn_participer_quiz_pub").click(function(){
		$("#modal_choix_type_quizz").modal('hide');
		$("#modal_choix_quizz_public").modal('show');
	});
	$("#btn_select_quiz").click(function(){
		var quiz = $("#liste_quiz").val();
		quiz = quiz.split("|");
		choix_quiz = {
				quiz_id : quiz[1],
				lancement_quiz_id: quiz[0],
				ajax: '1'
		};
		$.ajax({
			url: "<?php echo base_url('quiz_etudiant').'/participer_quiz' ?>",
			type: 'POST',
			async : false,
			data: choix_quiz,
			success: function(res) {
				document.location="<?php echo base_url('quiz_etudiant').'/wait_participant/'?>"+quiz[0];
			},
			error: function(err){
				$("#msg-error").show();
			}
		});
	});
});
</script>
<div class="col-xs-3">
	<button type="button" data-toggle="modal"
		data-target="#modal_choix_type_quizz" class="btn btn-info btn-outline">Participer
		&agrave; un Quiz</button>
</div>

<div class="modal fade" id="modal_choix_type_quizz" tabindex="-1"
	role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title ">Choix du type du quiz</h4>
			</div>
			<div class="modal-body">
				<button type="button" id="btn_participer_quiz_pub"
					class="btn btn-default btn-block">Quiz public</button>
				<br />
				<button type="button" class="btn btn-primary btn-block">Quiz
					priv&eacute;</button>
			</div>

		</div>
	</div>
</div>

<div class="modal fade" id="modal_choix_quizz_public" tabindex="-1"
	role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title ">S&eacute;lection du quiz</h4>
			</div>
			<div class="modal-body">
			 	<div id="msg-error" class="alert alert-danger alert-dismissable" hidden>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Vous avez d&eacute;j&agrave; une session sur ce quiz, veuillez vous en d&eacute;connecter.
                </div>
				<form role="form">
					<div class="form-group">
						<label>S&eacute;lectionner le quiz</label> <select class="form-control"
							id="liste_quiz">
						<?php $i = 1;?>
						<?php foreach ($public_quizs as $quiz) : ?>
							<option
								value="<?php echo $quiz['lancement_id']."|".$quiz['quiz_id']?>">Quiz n&deg; <?php echo $i?>: <?php echo $quiz['quiz_nom']. " (".$quiz['lancement_id'].")"?></option>
						<?php endforeach;?>
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger"
					data-dismiss="modal">Annuler</button>
				<button type="button" id="btn_select_quiz"
					class="btn btn-primary ">Valider</button>
			</div>
		</div>
	</div>
</div>