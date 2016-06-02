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
  $('.flat-purple').each(function(){
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
				<div class="panel-heading">R&eacute;capitulatif de votre
					participation au quiz</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
				<?php
				$i = 1;
				foreach ( $questions as $question ) :
					$quest_id = $question ['quest_id'];
					
					$repA = $repB = $repC = $repD = false;
					
					
					foreach ( $reponse_etudiant [$quest_id] as $rep_quest_et ) {
						if ($rep_quest_et ['rep_id'] == $reponses [$quest_id] [0] ['rep_id'])
							$repA = true;
						if ($rep_quest_et ['rep_id'] == $reponses [$quest_id] [1] ['rep_id'])
							$repB = true;
						if ((isset ( $reponses [$quest_id] [2] )) && ($rep_quest_et ['rep_id'] == $reponses [$quest_id] [2] ['rep_id']))
							$repC = true;
						if ((isset ( $reponses [$quest_id] [3] )) && ($rep_quest_et ['rep_id'] == $reponses [$quest_id] [3] ['rep_id']))
							$repD = true;
					}
					?>
					<div class="col-lg-4 col-sm-6 col-xs-12 col-md-4">
						<div class="well">
							<p><b> Question <?php echo $i ?> : <i><?php echo $question['question']?></i>
							</b></p>
							
							<div class="col-lg-6 col-md-6 col-sm-12 space_top">
								<input class="<?php if($repA) echo "flat-blue"; else echo "flat-purple"; ?>" id="repA" type="checkbox"
									name="reponse_<?php echo $quest_id?>" value="0"
									<?php if($repA) echo "checked='checked'";?> disabled> <label>A <?php if (isset($reponses[$quest_id][0])) echo ":".$reponses[$quest_id][0]['reponse']?></label>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 space_top">

								<input class="<?php if($repB) echo "flat-blue"; else echo "flat-purple"; ?>" type="checkbox"
									name="reponse_<?php echo $quest_id?>" value="0"
									<?php if($repB) echo "checked";?> disabled> <label>B <?php if (isset($reponses[$quest_id][1])) echo ":".$reponses[$quest_id][1]['reponse']?> </label>
							</div>
								
							<div class="col-lg-6 col-md-6 col-sm-12 space_top">
								<input class="<?php if($repC) echo "flat-blue"; else echo "flat-purple"; ?>" type="checkbox"
									name="reponse_<?php echo $quest_id?>" value="0"
									<?php if($repC) echo "checked";?> disabled> <label>C <?php if (isset($reponses[$quest_id][2])) echo ":".$reponses[$quest_id][2]['reponse']?> </label>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 space_top">
								<input class="<?php if($repD) echo "flat-blue"; else echo "flat-purple"; ?>" type="checkbox"
									name="reponse_<?php echo $quest_id?>" value="0"
									<?php if($repD) echo "checked";?> disabled> <label> D <?php if (isset($reponses[$quest_id][3])) echo ":".$reponses[$quest_id][0]['reponse']?></label>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<?php $i++; endforeach;?>
					<div class="clearfix"></div>
					<a type="button" class="btn btn-primary pull-right" href="<?php echo base_url("quiz_etudiant")?>">
						<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
						Page d'accueil
					</a>
				</div>
			</div>
		</div>
	</div>
</div>