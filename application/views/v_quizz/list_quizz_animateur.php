<div id="page-wrapper" class="no-margin-left">
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Liste de vos quizs</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="table-responsive">
						<table
							class="datatable table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th width="15%">N&deg; Quiz</th>
									<th>Nom du Quiz</th>
									<th>Date de cr&eacute;ation</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($quiz_admin as $quiz): ?>
								<div class="modal fade" id="modal_supprimer<?php echo $quiz['quiz_id']?>" tabindex="-1"
									role="dialog" aria-labelledby="modal_suppression_label"
									aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content" style="margin-top: 50px">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"
													aria-hidden="true">&times;</button>
												<h4 class="modal-title " id="modal_suppression_label">Annuler</h4>
											</div>
											<div class="modal-body">

												<p>Etes vous sur de vouloir supprimer quizz ? Toutes les
													données seront perdues</p>

											</div>

											<div class="modal-footer">
												<a 
													href="<?php echo base_url()?>quizz/delete_quizz/<?php echo $quiz['quiz_id']?>"
													class="btn btn-md btn-danger btn-block">Supprimer</a>
											</div>
										</div>
										<!-- /.modal-content -->
									</div>
									<!-- /.modal-dialog -->
								</div>
								<tr>
									<td><?php echo $quiz['quiz_id']?></td>
									<td><?php echo $quiz['quiz_nom']?></td>
									<td>
										<?php
									/*
									 * Cette fonction format_fr_date a été définie dans helper/utils_helper
									 */
									echo format_fr_date ( $quiz ['quiz_date_creation'] );
									?>
									</td>
									<td class="td-tooltip"><a data-toggle="modal"
										data-target="#modal_supprimer<?php echo $quiz['quiz_id']?>"
										class="btn btn-danger btn-circle"> <span
											class="glyphicon glyphicon-remove" aria-hidden="true"
											data-toggle="tooltip" data-placement="bottom"
											title="Supprimer ce quiz"></span>
									</a> <a class="btn btn-warning btn-circle"
										data-toggle="tooltip" data-placement="bottom"
										title="Modifier ce quiz"> <span
											class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</a> <a class="btn btn-info btn-circle" data-toggle="modal"
										data-target="#modal-detail-<?php echo $quiz['quiz_id']?>"> <span
											data-toggle="tooltip" data-placement="bottom"
											title="D&eacute;tail de ce quiz"
											class="glyphicon glyphicon-search" aria-hidden="true"></span>
									</a> <a class="btn btn-success btn-circle"
										data-toggle="tooltip" data-placement="bottom"
										title="Lancer ce quiz"> <span class="glyphicon glyphicon-play"
											aria-hidden="true"></span>
									</a></td>
								</tr>
								

								<?php endforeach;?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>




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

<script>
    $(document).ready(function() {
        $('.datatable').dataTable();

        $('.td-tooltip').tooltip({
            selector: "[data-toggle=tooltip]",
            container: "body"
        });
    });
   </script>