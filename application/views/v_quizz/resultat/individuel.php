<div id="page-wrapper" class="no-margin-left">
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Liste de vos quizs</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<?php var_dump($reponse_etudiant);?>
					<div class="table-responsive">
						<table id="liste_quiz_tab"
							class="datatable table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>Etudiant</th>
									<th>% de bonnes reponses</th>
									<th>Note/20</th>
									<?php $i = 1;?>
									<?php foreach ($questions as $question):?>
										<th> Q<?php echo $i.' : '.$question['question']?></th>
										<?php $i++;?>
									<?php endforeach;?>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($etudiants as $etudiant):?>
									<tr>
										<td><?php echo $etudiant['et_Nom'].' '.$etudiant['et_Prenom']?></td>
										<td></td>
										<td></td>
											<?php foreach ($questions as $question):?>
											<td> <?php 
												foreach ($reponse_etudiant[$etudiant['et_ID']][$question['quest_id']] as $rep):
													echo $rep['reponse_id'].' ';
												endforeach;
											?></td>
										<?php endforeach;?>
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