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
									<td><?php echo $quiz['quiz_nom']?></td>
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


<script>
    $(document).ready(function() {
        $('.datatable').dataTable();

        $('.td-tooltip').tooltip({
            selector: "[data-toggle=tooltip]",
            container: "body"
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