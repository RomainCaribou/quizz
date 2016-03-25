<script type="text/javascript">
<?php if(isset($res)) { ?>
$(document).ready(function(){
	$("#myModal").modal('show');
});
<?php } ?>
</script>

<!-- Custom CSS -->
<link href="<?php  echo base_url()?>assets/css/identification.css" rel="stylesheet">


<button class="btn btn-primary btn-md pull-right" style="margin-top:10px;"data-toggle="modal"
	data-target="#myModal">Connexion</button>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content col-xs-7	col-xs-offset-3" style="margin-top:50px">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title " id="myModalLabel">Login</h4>
			</div>
			<div class="modal-body">


				<form method="post" class="marge" action="<?php echo base_url()?>index.php/connexion/test_login">

					<input placeholder="Login" class="form-control" name="login"
						type="text" required /> <br> <input placeholder="Mot de passe"
						class="form-control" name="psw" type="password" required /> 


				

			</div>
						<?php if(isset($res)) { ?>
						<p class="erreur">Erreur d'identification.</p>
						<?php } ?>
						
			<div class="modal-footer">
			<button class="btn btn-default center-block" type="submit" name="">Connexion</button>
				</form>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

