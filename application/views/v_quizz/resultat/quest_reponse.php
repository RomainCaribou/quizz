<div class="modal fade" id="modal_recap" tabindex="-1" role="dialog"aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Liste des questions associ&eacute;es &agrave; ce quiz</h4>
			</div>
			<div class="modal-body">
				<div>
					
					<?php if (count($questions)==0):?>
						<code>Aucune question enregistr&eacute;e</code>
					<?php endif;?>
					
					<?php $i = 1;?>
					<?php foreach ($questions as $question):?>
						<p>
							<code>Question <?php echo $i;?> : <?php echo $question['question']?></code>
						</p>	
						<?php $index = 'A'?>
						<?php foreach ($reponses[$question['quest_id']] as $rep): ?>
							<?php
								if ($rep ['valide'] == "on")
									$class_btn = "btn-success";
								else
									$class_btn = "btn-default";
							?>
							<div class="col-xs-6">
								<button class="btn <?php echo $class_btn;?> btn-block">	
									<?php echo $index;
									if ($rep['reponse']) echo ' : ';
									echo $rep['reponse'];?>
								</button>
							</div>
							<?php if ($index=="B") echo "<div class='clearfix'></div><br>"?>
							<?php $index++;?>
						<?php endforeach;?>
						<div class='clearfix'></div><br>
						<?php $i++;?>
					<?php endforeach;?>
					<div class="clearfix"></div>
				</div>

			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
</div>

<script>
$(document).ready(function(){


  $('body').on('hidden.bs.modal', function () {
	    if($('.modal.in').length > 0)
	    {
	        $('body').addClass('modal-open');
	    }
	});
	
});
</script>