<div id="page-wrapper" class="no-margin-left">
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					R&eacute;sultats individuels
					<div class="pull-right">
						<div class="btn-group">
							<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-chevron-down"></i>
                            </button>
							<ul class="dropdown-menu pull-right" role="menu">
								<li><a data-toggle="modal" data-target="#modal_recap">R&eacute;capitulation du quiz</a></li>
								<li><a href="<?php echo base_url('quiz_animateur').'/recap_participation/'.$lancement_id?>">R&eacute;sultats individuels</a></li>
								<li><a href="<?php echo base_url('quizz')?>">Liste des quizs</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="table-responsive">
						<table id="liste_quiz_tab"
							class="datatable table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>Question n&deg;</th>
									<th>R&eacute;ponse A</th>
									<th>R&eacute;ponse B</th>
									<th>R&eacute;ponse C</th>
									<th>R&eacute;ponse D</th>
									<th>% Bonne r&eacute;ponse</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1;?>
								<?php foreach ($questions as $question):?>
								<tr>
									<td><?php echo $i. ' : '.$question['question']?></td>
									<td>
										<?php echo $nb_a[$question['quest_id']]?> %
									</td>
									<td>
										<?php echo $nb_b[$question['quest_id']]?> %
									</td>
									<td>
										<?php echo $nb_c[$question['quest_id']]?> %
									</td>
									<td>
										<?php echo $nb_d[$question['quest_id']]?> %
									</td>
									<td>
										<?php echo $nb_valide[$question['quest_id']]?> %
									</td>
								</tr>
								<?php $i++;?>
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
