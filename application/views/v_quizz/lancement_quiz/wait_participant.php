<script type="text/javascript">

$(document).ready(function(){
	
	var nb_total = $("#nb_total_participant").val();

	var refreshInt = setInterval(refresh_nb_participant, 2000);
	
	function refresh_nb_participant()
	{
		var lancement_id = $("#lancement_id").val(); 
		res = $("#nb-pers").text();
		$.ajax({
			url: "<?php echo base_url('quiz_animateur').'/get_number_participant' ?>",
			type: 'POST',
			async : false,
			success: function(i) {
				$("#nb-pers").text(i);
				if (i===nb_total)
				{
					clearInterval(refreshInt);
					document.location="<?php echo base_url('quiz_animateur').'/run_quiz'?>";
				}
			}
		});
	}
});
</script>
<div id="page-wrapper" class="no-margin-left">
<input type="hidden" id="lancement_id" value="<?php echo $this->session->userdata ( 'lancement_en_cours' );?>"/>
<input type="hidden" id="nb_total_participant" value="<?php echo $nb_total?>"/>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Attente de connexion des participants</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<img alt="Wait please" class="center-block" src="<?php  echo base_url()?>assets/pictures/loading.gif">
					<p class="text-center">
						<b>Attente du d&eacute;but du quiz</b> <br/>
						Nombre de personnes connect&eacute;es: 
						<i id="nb-pers">0</i> / <?php echo $nb_total;?><br/><br/>
						<div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4">
						<a class="btn btn-md center-block btn-primary" href="<?php echo base_url('quiz_animateur').'/run_quiz/'?>">Lancer le quiz (<?php echo $this->session->userdata ( 'lancement_en_cours' );?>)</a>
						</div>
						
					</p>
				</div>
			</div>
		</div>
	</div>
</div>