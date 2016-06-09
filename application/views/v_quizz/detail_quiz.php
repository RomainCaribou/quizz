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
							
							<?php if (count($questions)==0):?>
								<code>Aucune question enregistr&eacute;e</code>
							<?php endif;?>
							
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
								<h4>Historique de lancement de ce quiz</h4>
								<?php $liste_lancement = $lancement_quiz[$quiz['quiz_id']];?>
								<?php if (count($liste_lancement)==0):?>
									<code>Aucun lancement effectu&eacute;</code>
								<?php endif;?>
								<?php foreach ($liste_lancement as $l_quiz):?>
								<div id="div_lancement_<?php echo $l_quiz['lancement_id']?>">
									<p class="td-tooltip">
										<a id="delete_lancement_<?php echo $l_quiz['lancement_id']?>" class="btn btn-danger btn-circle delete_lancement" data-toggle="tooltip" data-placement="bottom"
											title="Supprimer cet historique" aria-hidden="true">
											<span class="glyphicon glyphicon-remove"></span>
										</a>
										<code>Effectu&eacute; le <?php echo format_fr_date($l_quiz['date_lancement']);?></code>
									</p>
									<table class="table">
										<tbody>
											<tr>
												<th style="width: 35%">Ann&eacute;e:</th>
												<td>
													<?php if($l_quiz['annee'])
														echo $l_quiz['annee'];
														else echo "Non sp&eacute;cifi&eacute;e"
													?>
												</td>
											</tr>
											<tr>
												<th style="width: 35%">Fili&egrave;re:</th>
												<td>
													<?php if($l_quiz['filiere'])
														echo $l_quiz['filiere'];
														else echo "Non sp&eacute;cifi&eacute;e"
													?>
												</td>
											</tr>
											<tr>
												<th style="width: 35%">Groupe:</th>
												<td>
													<?php if($l_quiz['groupe'])
														echo $l_quiz['groupe'];
														else echo "Non sp&eacute;cifi&eacute;"
													?>
												</td>
											</tr>	
											<tr>
												<th style="width: 35%">Etat:</th>
												<td class="td-tooltip">
													<?php 
														if($l_quiz['etat'] == "1") echo "En attente des participants";
														if($l_quiz['etat'] == "2") echo "En cours";
														if($l_quiz['etat'] == "0") 
														{
															echo "Achev&eacute;";
															?>
															<a class="btn btn-default btn-circle" data-toggle="tooltip" data-placement="bottom"
																title="Voir r&eacute;sultat du quiz" aria-hidden="true"
																href="<?php echo base_url('quiz_animateur').'/recap_participation/'.$l_quiz['lancement_id'];?>">
																<span class="glyphicon glyphicon-search"></span>
															</a>
															<?php
														}
													?>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<?php endforeach;?>
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


<div class="modal fade" id="modal_supprimer_lancement" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content" style="margin-top: 50px">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title " id="modal_suppression_label">Confirmation
					de suppression</h4>
			</div>
			<div class="modal-body">

				<p>Etes vous sur de vouloir supprimer cet historique ? Tous les
					r&eacute;sultats seront perdus</p>

			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
				<button class="btn btn-md btn-danger" id="confirm-delete-lancement">
					Supprimer</a>
			
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<script>
$(document).ready(function(){
  $('input').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue'
  });

  $('.td-tooltip').tooltip({
      selector: "[data-toggle=tooltip]",
      container: "body"
  });

  $(".delete_lancement").click(function(){
	  var div_id=$(this).attr("id");
	  var id = div_id.replace("delete_lancement_","");
	  $("#modal_supprimer_lancement").modal("show");
	  $("#confirm-delete-lancement").click(function(){
		  $("#modal_supprimer_lancement").modal("hide");
		  $("#div_lancement_"+id).remove();

			$.ajax({
					url: "<?php echo base_url('quiz_animateur').'/delete_lancement/' ?>"+id,
					type: 'POST',
					async : false,
					success: function(res) {
					}
			});
		  
		});
	});


  $('body').on('hidden.bs.modal', function () {
	    if($('.modal.in').length > 0)
	    {
	        $('body').addClass('modal-open');
	    }
	});
	
});
</script>