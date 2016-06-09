 <!-- Page-Level Plugin CSS - Morris -->
<link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
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
							<tbody id="dcontenu">
								<?php $i = 1;?>
								<?php foreach ($questions as $question):?>
								<tr id="tr_<?php echo $question['quest_id']?>">
									<td><?php echo $i. ' : '.$question['question']?></td>
									<td id="td_a_<?php echo $question['quest_id']?>">
										<?php echo $nb_a[$question['quest_id']]?> %
									</td>
									<td id="td_b_<?php echo $question['quest_id']?>">
										<?php echo $nb_b[$question['quest_id']]?> %
									</td>
									<td id="td_c_<?php echo $question['quest_id']?>">
										<?php echo $nb_c[$question['quest_id']]?> %
									</td>
									<td id="td_d_<?php echo $question['quest_id']?>">
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
                    y: $($(td)[0]).html().trim().replace("%",""),
                    a: $($(td)[1]).html().trim().replace("%",""),
                    b: $($(td)[2]).html().trim().replace("%",""),
                    c: $($(td)[3]).html().trim().replace("%",""),
                    d: $($(td)[4]).html().trim().replace("%","")
            };
            data_bar.push(tab);
            label_bar.push(index+1);
        });

        alert(JSON.stringify(data_bar));
        alert(JSON.stringify(label_bar));
        $(function() {
        	Morris.Bar({
                element: 'individual_chart',
                data: data_bar,
                xkey: 'y',
                ykeys: ['a', 'b', 'c','d'],
                labels: label_bar,
                hideHover: 'auto',
                resize: true
            });
        });
        
    });
 </script>
