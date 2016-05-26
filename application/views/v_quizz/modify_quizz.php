<script type="text/javascript">

$(document).ready(function(){

	$("#Modalmodify").modal("show");

	$("#cloneur").click(function(){
		num=parseInt($("#num_question").val());
		$("#num_question").val(num+1);


		$( "#clonage_0" ).clone(true).insertBefore( "#cloneur" ).attr('id','clonage_'+num);
		$("input").iCheck({
		    checkboxClass: 'icheckbox_square-blue',
		    radioClass: 'iradio_square-blue'
		  });

		$("#clonage_"+num+" > label:first").text("Question "+(num+1));
		$("#clonage_"+num+" > input").val("");

		$("#clonage_"+num+" >.enonce:first").attr('name',"enonce_"+num);
		$("#clonage_"+num+" >.ra:first").attr('name',"ra_"+num);
		$("#clonage_"+num+" >.ra:first").val("");
		$("#clonage_"+num+" >.rb:first").attr('name',"rb_"+num);
		$("#clonage_"+num+" >.rb:first").val("");
		$("#clonage_"+num+" >.rc:first").attr('name',"rc_"+num);
		$("#clonage_"+num+" >.rc:first").val("");
		$("#clonage_"+num+" >.rd:first").attr('name',"rd_"+num);
		$("#clonage_"+num+" >.rd:first").val("");

		$("#clonage_"+num).find('.ra_ok').attr("name","ra_ok_"+num);
		$("#clonage_"+num).find('.rb_ok').attr('name',"rb_ok_"+num);
		$("#clonage_"+num).find('.rc_ok').attr('name',"rc_ok_"+num);
		$("#clonage_"+num).find('.rd_ok').attr('name',"rd_ok_"+num);
		$("#clonage_"+num).find("input").iCheck('uncheck');

		});
	
$("#supp").click(function(){

	num=parseInt($("#num_question").val());

	if(num>1)
	{
		id = $("input[name=quest_id_"+(num-1)+"]").val();
		if(id)
		{

			texte=$("#quest_to_delete").val();
			texte=texte+id+"|";
			$("#quest_to_delete").val(texte);
		}
		$("#clonage_"+(num-1)).remove();
		$("#num_question").val(num-1);
	}
	else 
		alert("Pourquoi supprimer toutes les questions ? ='( ");
	
	});

	

$("#submit_form").click(function(){
	$("#form_quest").submit();
	});
});

</script>

<div class="modal fade" id="Modalmodify" tabindex="-1" role="dialog"
	style="overflow-y: auto;" aria-labelledby="myModalLabel"
	aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content col-xs-10	col-xs-offset-1 col-md-8	col-md-offset-2"
			style="margin-top: 50px">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title " id="myModalLabel_Q1">Questions</h4>
			</div>
			<div class="modal-body">
				<form method="post" id="form_quest"
					action="<?php echo base_url()?>	index.php/quizz/update_quizz/<?php echo $quizz['quiz_id'] ?>">
					<input type="text" value="<?php echo $quizz['quiz_id'] ?>" id="id_quiz_modale_quest"
						name="id_quiz" style="display:none"; />
						
	<?php  		
	for($i=0; $i<=$quizz['quiz_nb_quest']-1; $i++) :
	
							$quest_id=$questions[$i]['quest_id'];
	

	?>
						
						
					<div class="clonage" id="clonage_<?php echo $i?>">
						<label>Question <?php echo $i+1?> </label> <br> <br> 
						
						
						<label>Enonc&eacute;</label>
						<input placeholder="Veuillez rentrer l'&eacute;nonc&eacute;" 
							class="form-control enonce" name="enonce_<?php echo $i?>" type="text" value="<?php echo $questions[$i]['question'] ?>" />
							
							
						<br> <label>R&eacute;ponse A</label> <input
							placeholder="Veuillez rentrer la r&eacute;ponse A"
							class="form-control ra" name="ra_<?php echo $i?>" value="<?php echo $reponse[$quest_id][0]['reponse'] ?>" /> <br>
						<label>R&eacute;ponse B</label> <input
							placeholder="Veuillez rentrer la r&eacute;ponse B"
							class="form-control rb" name="rb_<?php echo $i ?>" type="text" value="<?php echo $reponse[$quest_id][1]['reponse'] ?>"   /> <br>
						<label>R&eacute;ponse C</label> <input
							placeholder="Veuillez rentrer la r&eacute;ponse C"
							class="form-control rc" name="rc_<?php echo $i ?>" type="text" value="<?php echo $reponse[$quest_id][2]['reponse'] ?>"/> <br>
						<label>R&eacute;ponse D</label> <input
							placeholder="Veuillez rentrer la r&eacute;ponse D"
							class="form-control rd" name="rd_<?php echo $i ?>" type="text" value="<?php echo $reponse[$quest_id][3]['reponse'] ?>"  /> <br>
						
						
						
						<div>
							<label>Timer :</label> <input class="form-control timer"
								name="timer_<?php echo $i ?>" type="text" value="<?php echo $questions[$i]['tps_reponse'] ?>"  /> <br>



							<div>
								<label>R&eacute;ponse : </label><br>
								<div class="col-xs-3 col-md-2">
									<label class="checkbox-inline" style="padding-left: 0px;"><input
										class="ra_ok" name="ra_ok_<?php echo $i ?>" type="checkbox" <?php if($reponse[$quest_id][0]['valide']=='on') echo "checked='checked'" ?> >A</label>
								</div>
								<div class="col-xs-3 col-md-2">
									<label class="checkbox-inline" style="padding-left: 0px;"><input
										class="rb_ok" name="rb_ok_<?php echo $i ?>" type="checkbox" <?php if($reponse[$quest_id][1]['valide']=='on') echo "checked='checked'" ?>>B</label>
								</div>
								<div class="col-xs-3 col-md-2">
									<label class="checkbox-inline" style="padding-left: 0px;"><input
										class="rc_ok" name="rc_ok_<?php echo $i ?>" type="checkbox" <?php if($reponse[$quest_id][2]['valide']=='on') echo "checked='checked'" ?>>C</label>
								</div>
								<div class="col-xs-3 col-md-2">
									<label class="checkbox-inline" style="padding-left: 0px;"><input
										class="rd_ok" name="rd_ok_<?php echo $i ?>" type="checkbox" <?php if($reponse[$quest_id][3]['valide']=='on') echo "checked='checked'" ?>>D</label>
								</div>
								
								<input class="form-control quest_id" name="quest_id_<?php echo $i?>" style="display:none;" type="text" value="<?php echo $questions[$i]['quest_id'] ?>" />
								<input class="form-control ra_id" name="ra_id_<?php echo $i?>" type="text" value="<?php echo $reponse[$quest_id][0]['rep_id'] ?>" style="display:none;" />
								<input class="form-control rb_id" name="rb_id_<?php echo $i?>" type="text" value="<?php echo $reponse[$quest_id][1]['rep_id'] ?>" style="display:none;" />
								<input class="form-control rc_id" name="rc_id_<?php echo $i?>" type="text" value="<?php echo $reponse[$quest_id][2]['rep_id'] ?>" style="display:none;" />
								<input class="form-control rd_id" name="rd_id_<?php echo $i?>" type="text" value="<?php echo $reponse[$quest_id][3]['rep_id'] ?>" style="display:none;" />
								
								<br>
								<div style="margin-top:25px;" class="clearfix"></div>

							</div>
						</div>

					</div>
					 <?php endfor; 
		
					 ?>
					 
					 <input type="text" name="quest_to_delete" id="quest_to_delete" style="display:none;" />
					 
					 <div class="sm-col-12" style="margin-bottom:10px;">
					<button  type="button" class="xs-col-12 sm-col-6 btn btn-primary center-block " style="margin-top:20px; margin-bottom:5px;"
						id="cloneur">Ajouter question</button>
					<button type="button" class="xs-col-12 sm-col-6 btn btn-danger center-block "
						id="supp">Supprimer question</button>
						</div>

					<input placeholder="numero de question" class="form-control"
						id="num_question" name="nb_question" type="text"
						value="<?php echo $i?>" style="display:none;" /> <br>
						

				</form>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default center-block" type="submit"
					id="submit_form" name="">Valider</button>

			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>