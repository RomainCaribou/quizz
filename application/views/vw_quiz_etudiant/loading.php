<script type="text/javascript">

$(document).ready(function(){
	
	var nb_total = $("#nb_total_participant").val();

	var refreshInt = setInterval(refresh_nb_participant, 2000);
	
	function refresh_nb_participant()
	{
		var lancement_id = $("#lancement_id").val(); 
		res = $("#nb-pers").text();
		$.ajax({
			url: "<?php echo base_url('quiz_etudiant').'/get_number_participant/' ?>"+lancement_id,
			type: 'POST',
			async : false,
			success: function(i) {
				$("#nb-pers").text(i);
				if (i===nb_total)
				{
					clearInterval(refreshInt);
					document.location="<?php echo base_url('quiz_etudiant').'/start_quiz/'?>"+lancement_id;
				}
			}
		});
		$.ajax({
			url: "<?php echo base_url('quiz_etudiant').'/get_state_quiz/' ?>"+lancement_id,
			type: 'POST',
			async : false,
			success: function(state) {
				if (state==="2") // 2 => quiz en cours / 1 => quiz lancé par le prof / 0 => quiz non démarré
				{
					clearInterval(refreshInt);
					document.location="<?php echo base_url('quiz_etudiant').'/start_quiz/'?>"+lancement_id;
				}
			} 
		});
	}


});
</script>
<div id="page-wrapper" class="no-margin-left">
<input type="hidden" id="lancement_id" value="<?php echo $lancement_id?>"/>
<input type="hidden" id="nb_total_participant" value="<?php echo $nb_total?>"/>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Attente de d&eacute;marrage du quiz</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<img alt="Wait please" class="center-block" src="<?php  echo base_url()?>assets/pictures/loading.gif">
					<p class="text-center">
						<b>Attente du d&eacute;but du quiz</b> <br/>
						Nombre de personnes connect&eacute;es: 
						<i id="nb-pers">1</i> / <?php echo $nb_total;?>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>