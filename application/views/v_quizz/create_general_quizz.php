<!-- Modal -->
<div class="modal fade" id="Modalquestion" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content col-xs-8	col-xs-offset-2"
			style="margin-top: 50px">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title " id="myModalLabel">Question 1</h4>
			</div>
			<div class="modal-body">
				<form method="post" action="">

					<label>Enonc&eacute;</label> 
					<div class="col-xs-12">
					<input
						placeholder="Veuillez rentrer l'&eacute;nonc&eacute;" class="form-control"
						name="enonce" type="text" required /> 
					 <input type="radio" name="reponse_multiple" value="0"
										checked="">
					</div>
					
					<br> 
					<label>R&eacute;ponse A</label>
					<input placeholder="Veuillez rentrer la r&eacute;ponse A"
						class="form-control" name="ra" type="text" required /> <br> 
					<label>R&eacute;ponse B</label> 
					<input placeholder="Veuillez rentrer la r&eacute;ponse B"
						class="form-control" name="rb" type="text" required /> <br> 
					<label>R&eacute;ponse C</label> 
					<input placeholder="Veuillez rentrer la r&eacute;ponse C"
						class="form-control" name="rc" type="text" required /> <br> 
					<label>R&eacute;ponse D</label> 
					<input placeholder="Veuillez rentrer la r&eacute;ponse D"
						class="form-control" name="rd" type="text" required /> <br>
			
			</div>
			<div class="modal-footer">
				<button class="btn btn-default center-block" type="submit" name="">Valider</button>
				</form>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>