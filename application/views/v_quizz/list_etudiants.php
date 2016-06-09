<div id="page-wrapper" class="no-margin-left">
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading" style="text-align:center;">Liste des &eacute;tudiants</div>
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
								<?php foreach ($etudiants as $etu): ?>
								<div class="modal fade" id="modal_supprimer<?php echo $etu['et_ID']?>" tabindex="-1"
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

												<p>Etes vous sur de vouloir supprimer l'&eacute;tudiant ? Toutes les
													donn&eacute;es seront perdues...</p>

											</div>

											<div class="modal-footer">
												<a 
													href="<?php echo base_url()?>administration/delete_etudiant/<?php echo $etu['et_ID']?>"
													class="btn btn-md btn-danger btn-block">Supprimer</a>
											</div>
										</div>
										<!-- /.modal-content -->
									</div>
									<!-- /.modal-dialog -->
								</div>
								<tr>
									<td><?php echo $etu['et_ID']?></td>
									<td><?php echo $etu['et_Nom']?></td>
									<td><?php echo $etu['et_Prenom']?></td>
									
					
									<td class="td-tooltip"><a data-toggle="modal"
										data-target="#modal_supprimer<?php echo $etu['et_ID']?>"
										class="btn btn-danger btn-circle"> <span
											class="glyphicon glyphicon-remove" aria-hidden="true"
											data-toggle="tooltip" data-placement="bottom"
											title="Supprimer ce quiz"></span>
									</a> 
									</a> </td>
								</tr>
								

								<?php endforeach;?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading" style="text-align:center;">Liste des animateurs</div>
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
								<?php foreach ($animateurs as $anim): ?>
								<div class="modal fade" id="modal_supprimer<?php echo $anim['animateur_ID']?>" tabindex="-1"
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

												<p>Etes vous sur de vouloir supprimer l'animateur ? Toutes les
													donn&eacute;es seront perdues...</p>

											</div>

											<div class="modal-footer">
												<a 
													href="<?php echo base_url()?>administration/delete_animateur/<?php echo $anim['animateur_ID']?>"
													class="btn btn-md btn-danger btn-block">Supprimer</a>
											</div>
										</div>
										<!-- /.modal-content -->
									</div>
									<!-- /.modal-dialog -->
								</div>
								<tr>
									<td><?php echo $anim['animateur_ID']?></td>
									<td><?php echo $anim['animateur_Nom']?></td>
									<td><?php echo $anim['animateur_Prenom']?></td>
									
					
									<td class="td-tooltip"><a data-toggle="modal"
										data-target="#modal_supprimer<?php echo $anim['animateur_ID']?>"
										class="btn btn-danger btn-circle"> <span
											class="glyphicon glyphicon-remove" aria-hidden="true"
											data-toggle="tooltip" data-placement="bottom"
											title="Supprimer ce quiz"></span>
									</a> 
									</a> </td>
								</tr>
								

								<?php endforeach;?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading" style="text-align:center;">Liste des administrateurs</div>
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
								<?php foreach ($administrateurs as $admin): ?>
								<div class="modal fade" id="modal_supprimer2<?php echo $admin['admin_ID']?>" tabindex="-1"
									role="dialog" aria-labelledby="modal_suppression_label2"
									aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content" style="margin-top: 50px">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"
													aria-hidden="true">&times;</button>
												<h4 class="modal-title " id="modal_suppression_label2">Annuler</h4>
											</div>
											<div class="modal-body">

												<p>Etes vous sur de vouloir supprimer l'admin ? Toutes les
													donn&eacute;es seront perdues...</p>

											</div>

											<div class="modal-footer">
												<a 
													href="<?php echo base_url()?>administration/delete_administrateur/<?php echo $admin['admin_ID']?>"
													class="btn btn-md btn-danger btn-block">Supprimer</a>
											</div>
										</div>
										<!-- /.modal-content -->
									</div>
									<!-- /.modal-dialog -->
								</div>
								<tr>
									<td><?php echo $admin['admin_ID']?></td>
									<td><?php echo $admin['admin_nom']?></td>
									<td><?php echo $admin['admin_prenom']?></td>
									
					
									<td class="td-tooltip"><a data-toggle="modal"
										data-target="#modal_supprimer2<?php echo $admin['admin_ID']?>"
										class="btn btn-danger btn-circle"> <span
											class="glyphicon glyphicon-remove" aria-hidden="true"
											data-toggle="tooltip" data-placement="bottom"
											title="Supprimer ce quiz"></span>
									</a> 
									</a> </td>
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





