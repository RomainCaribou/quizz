<script type="text/javascript">
<?php if(isset($res)) { ?>
$(document).ready(function(){
	$("#myModal").modal('show');
});
<?php } ?>
</script>

<!-- Custom CSS -->
<link href="<?php  echo base_url()?>assets/css/identification.css"
	rel="stylesheet">

<?php $user = $this->session->userdata('logged_in')?>

<?php if ($user == NULL):?>
<button class="btn btn-primary btn-md pull-right"
	style="margin-top: 10px; margin-right: 10px;" data-toggle="modal"
	data-target="#myModal">Connexion</button>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content col-xs-8	col-xs-offset-2"
			style="margin-top: 50px">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title " id="myModalLabel">Login</h4>
			</div>
			<div class="modal-body">
				<form method="post" class="marge"
					action="<?php echo base_url()?>	index.php/connexion/test_login">
					<input placeholder="Login" class="form-control" name="login"
						type="text" required /> <br> <input placeholder="Mot de passe"
						class="form-control" name="psw" type="password" />
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
<?php endif;?>


<div class="" style="margin-top: 50px;"></div>
<div>

	<div class=" col-sm-4 test">
              <img class="img-responsive img_style1" style="" src="<?php echo base_url()?>assets/pictures/interactive_meeting.jpg" />
    </div>
	<div class=" col-sm-7 well well-lg" style=" margin:10px;border-radius:15px;" name="description" >
                        <h4>Description</h4>
                        <p>Edusmart est un outil d'interaction multiplateforme qui vous permettra d'animer vos r&eacute;unions de maniere interactive et d'en conserver un historique. Int&eacute;grant de nombreuses fonctionnalit&eacute;s, cet outil vous permettra de r&eacute;aliser des sondages et questionnaires de mani&egrave;re simple et intuitive. </p>
                        <p>S&eacute;curis&eacute; &agrave; l'aide d'un VPN local sur GL-inet et int&eacute;grant le cryptage automatique des donn&eacute;es qui transitent, ce module pourra &ecirc;tre utilis&eacute; lors de r&eacute;unions confidentielles en toute s&eacute;curit&eacute;.</p>
    </div>

</div>


