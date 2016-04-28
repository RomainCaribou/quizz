
<!-- Modal -->
<div class="modal fade" id="myModal_basic_quizz" tabindex="-1" role="dialog"
	 aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content col-xs-8	col-xs-offset-2"
			style="margin-top: 50px">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title " id="myModalLabel1">Details quizz</h4>
			</div>
			<div class="modal-body">
				<form method="post" action="<?php echo base_url()?>	index.php/quizz/create_basic_questions/">

					<label>Nombre de questions</label> <input
						placeholder="Combien de question comporte votre quizz ?" class="form-control"
						name="nb_quest" type="int" required /> <br> 
					<label>Timer global</label>
					<input placeholder="Secondes par question ?"
						class="form-control" name="timer" type="int" required /> <br> 
					<input 
						class="form-control" name="quizz_id" type="hidden" value="33"  />
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