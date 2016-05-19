<!-- Custom CSS -->
<link href="<?php  echo base_url()?>assets/css/validation.css"
	rel="stylesheet">

<script type="text/javascript">
$(document).ready(function(){
	$("#modale_valide_1").modal('show');
});
</script>
<div class="modal fade" id="modale_valide_1" tabindex="-1" role="dialog"
	style="overflow-y: auto;" aria-labelledby="myModalLabel"
	aria-hidden="true">
	<div class="modal-dialog">
		<div
			class="modal-content col-xs-10	col-xs-offset-1 col-md-8 col-md-offset-2"
			style="margin-top: 50px">

			<div class="modal-body">
<div class="clearfix" style="margin-bottom:15px;">
			<img class="col-xs-8 col-xs-offset-2  " style="vertical-align:middle;" src="<?php echo base_url()?>assets/pictures/quizz_valide.gif" />
			<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2 validation" <p style="
									 margin-top:10%;
									 
									 
									 font-family:Sans MS;
									 text-align:center;"> Votre quizz a bien &eacute;t&eacute; modifi&eacute; ! 
			</p></div>
		</div>
		
				<div class="modal-footer">
					<button class="btn btn-default center-block"
						id="" name="" data-dismiss="modal"
					>OK !</button>

				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>