<script>
$(document).ready(function(){
  $('.flat-blue').each(function(){
    var self = $(this),
      label = self.next(),
      label_text = label.text();

    label.remove();
    self.iCheck({
      checkboxClass: 'icheckbox_line-blue',
      radioClass: 'iradio_line-blue',
      insert: '<div class="icheck_line-icon"></div>' + label_text
    });
  });
  $('input').each(function(){
	    var self = $(this),
	      label = self.next(),
	      label_text = label.text();

	    label.remove();
	    self.iCheck({
	      checkboxClass: 'icheckbox_line-purple',
	      radioClass: 'iradio_line-purple',
	      insert: '<div class="icheck_line-icon"></div>' + label_text
	    });
	  });
});
</script>
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
										foreach ( $reponse_etudiant [$etudiant ['et_ID']] [$question ['quest_id']] as $rep ) :?>
											<input type="checkbox" class="flat-purple">
											<label><?php echo $rep ['abc'] . ' : ' . $rep ['reponse'];?></label>
									
											
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
	</div>
</div>


<script>
    $(document).ready(function() {
        $('.datatable').dataTable();
    });
 </script>
