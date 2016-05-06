<!-- Modal -->

<script type="text/javascript">

$(document).ready(function(){

$("#cloneur").click(function(){
num=parseInt($("#num_question").val())+1;
$("#num_question").val(num);

$( "#clonage_1" ).clone().insertBefore( "#cloneur" ).attr('id','clonage_'+num);
$("#clonage_"+num+" > label:first").text("Question "+num);
$("#clonage_"+num+" > input").val("");

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
});
</script>

<div class="modal fade" id="Modalquestion" tabindex="-1" role="dialog" style="overflow-y:auto;"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content col-xs-8	col-xs-offset-2"
			style="margin-top: 50px">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title " id="myModalLabel_Q1">Questions</h4>
			</div>
			<div class="modal-body">
				<form method="post" action="">
					<div class="clonage" id="clonage_1">
					<label>Question 1 </label>  <br><br>
						<label>Enonc&eacute;</label> <input
							placeholder="Veuillez rentrer l'&eacute;nonc&eacute;"
							class="form-control" name="enonce" type="text" required /> <br> <label>R&eacute;ponse
							A</label> <input
							placeholder="Veuillez rentrer la r&eacute;ponse A"
							class="form-control" name="ra" type="text" required /> <br> <label>R&eacute;ponse
							B</label> <input
							placeholder="Veuillez rentrer la r&eacute;ponse B"
							class="form-control" name="rb" type="text" required /> <br> <label>R&eacute;ponse
							C</label> <input
							placeholder="Veuillez rentrer la r&eacute;ponse C"
							class="form-control" name="rc" type="text" required /> <br> <label>R&eacute;ponse
							D</label> <input
							placeholder="Veuillez rentrer la r&eacute;ponse D"
							class="form-control" name="rd" type="text" required /> <br>

							
					</div>
					
					<button type="button" class="btn btn-primary center-block"
						id="cloneur">Ajouter question</button>
					<button type="button" class="btn btn-primary center-block"
						id="supp">Moins</button>
						
					<input
							placeholder="numero de question"
							class="form-control" id="num_question" type="text" style="display:none;" value="1" /> <br>
							
				</form>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default center-block" type="submit" name="">Valider</button>

			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>