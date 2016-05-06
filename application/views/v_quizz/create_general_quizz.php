<!-- Modal -->

<script type="text/javascript">

$(document).ready(function(){

//$("#Modalquestion").modal('show');

$("#cloneur").click(function(){
num=parseInt($("#num_question").val())+1;
$("#num_question").val(num);

$( "#clonage_1" ).clone(true).insertBefore( "#cloneur" ).attr('id','clonage_'+num);
$("input").iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue'
  });

$("#clonage_"+num+" > label:first").text("Question "+num);
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
	$("#clonage_"+num).remove();
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

<div class="modal fade" id="Modalquestion" tabindex="-1" role="dialog"
	style="overflow-y: auto;" aria-labelledby="myModalLabel"
	aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content col-xs-8	col-xs-offset-2"
			style="margin-top: 50px">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title " id="myModalLabel_Q1">Questions</h4>
			</div>
			<div class="modal-body">
				<form method="post" id="form_quest"
					action="<?php echo base_url()?>	index.php/question/set_question_quizz/">
					<input type="text" value="" id="id_quiz_modale_quest"
						name="id_quiz" />
					<div class="clonage" id="clonage_1">
						<label>Question 1 </label> <br> <br> <label>Enonc&eacute;</label>
						<input placeholder="Veuillez rentrer l'&eacute;nonc&eacute;"
							class="form-control enonce" name="enonce_1" type="text" required />
						<br> <label>R&eacute;ponse A</label> <input
							placeholder="Veuillez rentrer la r&eacute;ponse A"
							class="form-control ra" name="ra_1" type="text" required /> <br>
						<label>R&eacute;ponse B</label> <input
							placeholder="Veuillez rentrer la r&eacute;ponse B"
							class="form-control rb" name="rb_1" type="text" required /> <br>
						<label>R&eacute;ponse C</label> <input
							placeholder="Veuillez rentrer la r&eacute;ponse C"
							class="form-control rc" name="rc_1" type="text" required /> <br>
						<label>R&eacute;ponse D</label> <input
							placeholder="Veuillez rentrer la r&eacute;ponse D"
							class="form-control rd" name="rd_1" type="text" required /> <br>
						<div>
							<label>Timer :</label> <input class="form-control timer"
								name="timer_1" type="text" value="30" required /> <br>

							<div>
								<label>R&eacute;ponse : </label><br>
								<div class="col-xs-3 col-md-2">
									<label class="checkbox-inline" style="padding-left: 0px;"><input
										class="ra_ok" name="ra_ok_1" type="checkbox">A</label>
								</div>
								<div class="col-xs-3 col-md-2">
									<label class="checkbox-inline" style="padding-left: 0px;"><input
										class="rb_ok" name="rb_ok_1" type="checkbox">B</label>
								</div>
								<div class="col-xs-3 col-md-2">
									<label class="checkbox-inline" style="padding-left: 0px;"><input
										class="rc_ok" name="rc_ok_1" type="checkbox">C</label>
								</div>
								<div class="col-xs-3 col-md-2">
									<label class="checkbox-inline" style="padding-left: 0px;"><input
										class="rd_ok" name="rd_ok_1" type="checkbox">D</label>
								</div>
								<br>
								<div style="margin-top:25px;" class="clearfix"></div>

							</div>
						</div>

					</div>

					<button type="button" class="btn btn-primary center-block"
						id="cloneur">Ajouter question</button>
					<button type="button" class="btn btn-primary center-block"
						id="supp">Moins</button>

					<input placeholder="numero de question" class="form-control"
						id="num_question" name="nb_question" type="text"
						style="display: none;" value="1" /> <br>

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