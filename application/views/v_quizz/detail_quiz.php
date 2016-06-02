<?php foreach ($quiz_admin as $quiz): ?>
<div class="modal fade" id="modal-detail-<?php echo $quiz['quiz_id']?>"
	tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">D&eacute;tail quiz</h4>
			</div>
			<div class="modal-body">
				<div>
					<ul class="nav nav-tabs">
						<li class="active"><a
							href="#tab_detail_<?php echo $quiz['quiz_id'];?>"
							data-toggle="tab">D&eacute;tail</a></li>
						<li><a href="#tab_questions_<?php echo $quiz['quiz_id'];?>"
							data-toggle="tab">Questions</a></li>
						<li><a href="#tab_historique_<?php echo $quiz['quiz_id'];?>"
							data-toggle="tab">Historique</a></li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane fade in active"
							id="tab_detail_<?php echo $quiz['quiz_id'];?>">
							<div class="table-responsive">
								<br />
								<p>
									<code>D&eacute;tail du quiz</code>
								</p>
								<table class="table">
									<tbody>
										<tr>
											<th style="width: 35%">Nom du quiz:</th>
											<td><?php echo $quiz['quiz_nom']?></td>
										</tr>
										<tr>
											<th>Date de cr&eacute;ation:</th>
											<td><?php echo format_fr_date($quiz['quiz_date_creation']);?></td>
										</tr>
										<tr>
											<th>Nombre de question:</th>
											<td><?php echo $quiz['quiz_nb_quest']?></td>
										</tr>
										<tr>
											<th>Timer:</th>
											<td><?php
	if ($quiz ['quiz_Timer'] != NULL)
		echo $quiz ['quiz_Timer'];
	else
		echo "Aucun timer pr&eacute;defini";
	?>
											</td>
										</tr>
										<tr>
											<th>Afficher question:</th>
											<td><?php echo oui_ou_non($quiz['affichage_question']);?></td>
										</tr>
										<tr>
											<th>Afficher r&eacute;ponse:</th>
											<td><?php echo oui_ou_non($quiz['affichage_reponse']);?></td>
										</tr>
										<tr>
											<th>QR Code:</th>
											<td>
											<?php
	if ($quiz ['qr_code'])
		echo $quiz ['qr_code'];
	else
		echo "Aucun QR Code pr&eacute;defini";
	?>
											</td>
										</tr>
										<tr>
											<th>Type du quiz:</th>
											<td>
											<?php
	switch ($quiz ['type_quiz']) {
		case 1 :
			echo "Public";
			break;
		
		case 2 :
			echo "Priv&eacute;";
			break;
		
		default :
			echo "Aucun type pr&eacute;defini";
			break;
	}
	?>
											</td>
										</tr>
										<tr>
											<th>R&eacute;ponse mutltiple:</th>
											<td><?php echo oui_ou_non($quiz['reponse_multiple']);?></td>
										</tr>
										<tr>
											<th>Afficher r&eacute;sultat:</th>
											<td><?php echo oui_ou_non($quiz['affichage_resultat']);?></td>
										</tr>
										<tr>
											<th>Justification:</th>
											<td><?php echo oui_ou_non($quiz['justification']);?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="tab-pane fade"
							id="tab_questions_<?php echo $quiz['quiz_id'];?>">
							<br />
							<h4>Liste des questions associ&eacute;es &agrave; ce quiz</h4>
							<?php $questions = get_quiz_questions ( $quiz ['quiz_id'] );?>
							<?php $i = 1;?>
							<?php foreach ($questions as $question):?>
								<p>
								<code>Question <?php echo $i;?></code>
							</p>
							<div class="table-responsive">
								<table class="table">
									<tbody>
										<tr>
											<th style="width: 35%">Question:</th>
											<td><?php echo $question['question']?></td>
										</tr>
										<tr>
											<th style="width: 35%">Temps de r&eacute;ponse:</th>
											<td>
												<?php
		if ($question ['tps_reponse'])
			echo $question ['tps_reponse'] . " secondes";
		else
			echo "Aucun temps de r&eacute;ponse d&eacute;fini";
		?>
												</td>
										</tr>
									</tbody>
								</table>
							</div>
								<?php $i++;?>
							<?php endforeach;?>
                        </div>
						<div class="tab-pane fade"
							id="tab_historique_<?php echo $quiz['quiz_id'];?>">
							<br />
							<p>
								<code>Historique de lancement de ce quiz</code>
							</p>
						</div>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Modifier</button>
				<button type="button" class="btn btn-danger">Supprimer</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php endforeach;?>
</div>
<script>
$(document).ready(function(){
  $('input').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue'
  });
});
</script>