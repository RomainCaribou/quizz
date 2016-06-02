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
									<th>N&deg; Quiz</th>
									<th>Nom du Quiz</th>
									<th>Date de participation</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($quiz_et as $quiz): ?>
								
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
									<td align="center">
										<a class="btn btn-primary" href="<?php echo base_url("quiz_etudiant")."/recap_participation/".$quiz['lancement_quiz_id']?>">
											<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
											D&eacute;tail
										</a>
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


<script>
    $(document).ready(function() {
        $('.datatable').dataTable();
    });
 </script>