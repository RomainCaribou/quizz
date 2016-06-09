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
								<li><a href="<?php echo base_url('quiz_animateur').'/resultat_global/'.$lancement_id?>">R&eacute;sultats globaux</a></li>
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
							<tbody id="dcontenu">
								<?php foreach ($etudiants as $etudiant):?>
									<tr>
									<td><?php echo $etudiant['et_Nom'].' '.$etudiant['et_Prenom']?></td>
									<td>
										<?php echo $pourcentage_totale[$etudiant ['et_ID']]?>
									</td>
									<td>
										<?php echo $note_totale[$etudiant ['et_ID']]?>
									</td>
											<?php foreach ($questions as $question):?>
											<td> 
											<?php
										foreach ( $reponse_etudiant [$etudiant ['et_ID']] [$question ['quest_id']] as $rep ) :
											?>
											<!-- <input type="checkbox" class="flat-purple">
											<label><?php echo $rep ['abc'] . ' : ' . $rep ['reponse'];?></label> -->
											<?php
											if ($rep ['valide'] == "on")
												$class_btn = "btn-success";
											else if($exists_valid_rep[$question ['quest_id']])
											{
												$class_btn = "btn-danger";
											}
											else
												$class_btn = "btn-default";
											?>
											<button class="btn btn-sm <?php echo $class_btn?>">
												<?php echo strtoupper ($rep ['abc']);?>
												<?php  if($rep ['reponse']!="") echo " : "?>
												<?php echo $rep ['reponse'];?>
											</button>
										<?php endforeach;?>
										</td>
										<?php endforeach;?>
									</tr>
								<?php endforeach;?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Graphe des r&eacute;sultats</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div id="individual_chart"></div>
				</div>
			</div>
		</div>
		
	</div>
</div>


<script>
    $(document).ready(function() {
        $('.datatable').dataTable();

        var table = $("#dcontenu");
        var tr = $(table).find("tr");

        data_bar = [];
        label_bar = [];
        $( tr).each(function( index, element ) {
            td =  $(element).find("td");
            var tab = {
                    y: $($(td)[0]).html().trim(),
                    a: $($(td)[1]).html().trim().replace("%","")
            };
            data_bar.push(tab);
            label_bar.push(tab.y);
        });
        $(function() {
        	Morris.Bar({
                element: 'individual_chart',
                data: data_bar,
                xkey: 'y',
                ykeys: 'a',
                labels: label_bar,
                hideHover: 'auto',
                resize: true
            });
        });
        
    });
 </script>
