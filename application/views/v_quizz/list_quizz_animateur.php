<div id="page-wrapper" class="no-margin-left">
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Liste de vos quizs</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="table-responsive">
						<table id="liste_quiz_tab"
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
								
								<tr>
									<td><?php echo $quiz['quiz_id']?></td>
									<td id="quiz_nom_<?php echo $quiz['quiz_id']?>"><?php echo $quiz['quiz_nom']?></td>
									<td>
										<?php
									/*
									 * Cette fonction format_fr_date a été définie dans helper/utils_helper
									 */
									echo format_fr_date ( $quiz ['quiz_date_creation'] );
									?>
									</td>
									<td class="td-tooltip"><a
										class="btn btn-danger btn-circle btn-delete-quiz"
										id="delete_quiz_<?php echo $quiz['quiz_id']?>"> <span
											class="glyphicon glyphicon-remove" aria-hidden="true"
											data-toggle="tooltip" data-placement="bottom"
											title="Supprimer ce quiz"></span>
									</a> <a href="<?php echo base_url()?>quizz/modification/<?php echo $quiz['quiz_id']?>"   class="btn btn-warning btn-circle"
										data-toggle="tooltip" data-placement="bottom"
										title="Modifier ce quiz"> <span
											class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</a> <a class="btn btn-info btn-circle" data-toggle="modal"
										data-target="#modal-detail-<?php echo $quiz['quiz_id']?>"> <span
											data-toggle="tooltip" data-placement="bottom"
											title="D&eacute;tail de ce quiz"
											class="glyphicon glyphicon-search" aria-hidden="true"></span>
									</a> <a id="btn_lancement_<?php echo $quiz['quiz_id']?>" class="btn btn-success btn-circle btn_lancement"
										data-toggle="tooltip" data-placement="bottom"
										title="Lancer ce quiz"> <span class="glyphicon glyphicon-play"
											aria-hidden="true"></span>
									</a>
									<i id="nb_quest_<?php echo $quiz['quiz_id']?>" hidden><?php echo $quiz['quiz_nb_quest']?></i>
									</td>
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

<div class="modal fade" id="modal_supprimer" tabindex="-1" role="dialog"
	aria-labelledby="modal_suppression_label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content" style="margin-top: 50px">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title " id="modal_suppression_label">Confirmation
					de suppression</h4>
			</div>
			<div class="modal-body">

				<p>Etes vous sur de vouloir supprimer ce quizz ? Toutes les
					donn&eacute;es seront perdues</p>

			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
				<button class="btn btn-md btn-danger" id="confirm-delete">
					Supprimer</a>
			
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<div class="modal fade" id="select_groupe" tabindex="-1" role="dialog"aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content" style="margin-top: 50px">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title ">Selectionner les param&egrave;tres du quiz</h4>
			</div>
			<div class="modal-body">
				<div class="well">
					<div class="col-xs-6">
						<b>Nom du quizz : </b>
					</div>
					<div class="col-xs-6" id="modal_nom_quiz">
					</div>
					<div class="clearfix"></div>
					<br/>
					<div class="col-xs-6">
						<b>Nombre de question : </b>
					</div>
					<div class="col-xs-6" id="modal_nb_quest">
					</div>
					<div class="clearfix"></div>
				</div>
				
				<form role="form" id="form_choix_param" action="<?php echo base_url('quiz_animateur').'/demarrer_quiz/'?>" method="post">
					<input type="hidden" id="quiz_id_selected" name="quiz_id_selected"/>
					<div class="form-group">
						<label>S&eacute;lectionner la filiere</label> 
						<select class="form-control" name="choix_filiere">
							<option disabled selected value> -- Choisir une option -- </option>
							<option value="IMS">IMS</option>
							<option value="ME">ME</option>
							<option value="MT">MT</option>
						</select>
					</div>
					<div class="form-group">
						<label>S&eacute;lectionner l'ann&eacute;e</label> 
						<select class="form-control" name="choix_annee">
							<option disabled selected value> -- Choisir une option -- </option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
						</select>
					</div>
					<div class="form-group">
						<label>S&eacute;lectionner le groupe</label> 
						<select class="form-control" name="choix_groupe">
							<option disabled selected value> -- Choisir une option -- </option>
							<option value="G1">G1</option>
							<option value="G2">G2</option>
							<option value="G3">G3</option>
						</select>
					</div>
				</form>

			</div>

			<div class="modal-footer">
				<button class="btn btn-md btn-danger" >Annuler</button>
				<button type="button" id="btn_validate_choix_form" class="btn btn-primary" data-dismiss="modal">Valider</button>
			
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<script>
    $(document).ready(function() {
        $('.datatable').dataTable();

        $('.td-tooltip').tooltip({
            selector: "[data-toggle=tooltip]",
            container: "body"
        });

        $("#btn_validate_choix_form").click(function(){
            $("#form_choix_param").submit();
        });

        $(".btn_lancement").click(function(){
        	quiz_id = $(this).attr("id"); 
			id = quiz_id.replace("btn_lancement_","");
			nom = $("#quiz_nom_"+id).text();
			nbquest = $("#nb_quest_"+id).text();
			$("#quiz_id_selected").val(id);
			$("#modal_nom_quiz").text(nom);
			$("#modal_nb_quest").text(nbquest);
			$("#select_groupe").modal("show");
        });

        $(document).on('click','.btn-delete-quiz',function(){
            td_id = $(this).attr("id"); 
			id = td_id.replace("delete_quiz_","");
			delete_quiz(id);
        });

        $(document).on('click','.btn-delete-quiz-2',function(){
            tmodal_id = $(this).attr("id"); 
			id = tmodal_id.replace("delete_quiz_mod_","");
			delete_quiz(id);
			$("#confirm-delete").click(function(){
				$("#modal-detail-"+id).modal('hide');
				});
        });
        

        function delete_quiz(id)
        {
        	$("#modal_supprimer").appendTo("body").modal('show');
	        $("#confirm-delete").click(function(){
	            var quiz = {
	                    quiz_id : id,
	                    ajax : '1'
	            }
	    		$.ajax({
	    				url: "<?php echo base_url('quizz').'/delete_quizz/' ?>",
	    				type: 'POST',
	    				async : false,
	    				data: quiz,
	    				success: function(res) {
	    					var table = $('#liste_quiz_tab').DataTable();
	    					row = $("#delete_quiz_"+id).closest('tr');
	    					table.row(row).remove().draw( false );
	    				}
	    		});
				$("#modal_supprimer").modal('hide');
	        });
        }
        
    });
   </script>
