<button class="btn btn-primary btn-md pull-right"
	style="margin-top: 10px; margin-right: 10px;" data-toggle="modal"
	data-target="#myModal">Questions</button>
	
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
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

					<label>Enoncé</label> <input
						placeholder="Veuillez rentrer l'énoncé" class="form-control"
						name="enonce" type="text" required /> <br> <label>Réponse A</label>
					<input placeholder="Veuillez rentrer la réponse A"
						class="form-control" name="ra" type="text" required /> <br> <label>Réponse
						B</label> <input placeholder="Veuillez rentrer la réponse B"
						class="form-control" name="rb" type="text" required /> <br> <label>Réponse
						C</label> <input placeholder="Veuillez rentrer la réponse C"
						class="form-control" name="rc" type="text" required /> <br> <label>Réponse
						D</label> <input placeholder="Veuillez rentrer la réponse D"
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