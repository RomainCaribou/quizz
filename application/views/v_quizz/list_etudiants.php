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
									<th width="15%">N&deg; ID</th>
									<th>Nom </th>
									<th>Prenom</th>
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
									</a> <a href="<?php echo base_url()?>quizz/modification/<?php echo $quiz['quiz_id']?>"   class="btn btn-warning btn-circle"
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

