<script type="text/javascript">
$(document).ready(function(){

	function count_down()
	{
		var tps_rep = parseInt($("#tps_rep").text());
		if (tps_rep!=0)
			$("#tps_rep").text(tps_rep-1);
		else
		{
			clearInterval(timer);
			var res = send_reponse();
			if(res==true)
				$(location).attr('href', "<?php echo base_url('quiz_etudiant').'/run_question/'?>");
		}
	}

	var t = parseInt($("#tps_rep").text());
	if(!isNaN(t))
		var timer = setInterval(count_down, 1000);

	$(".rep_btn").click(function(){
		$(this).toggleClass("btn-info");
		$(this).toggleClass("btn-primary");
		$(this).toggleClass("rep_selected");
	});

	$("#next_quest").click(function(){
		var res = send_reponse();
		if(res==true)
			$(location).attr('href', "<?php echo base_url('quiz_etudiant').'/run_question/'?>");
	});

	$("#end_quest").click(function(){
		if(send_reponse())
			$(location).attr('href', "<?php echo base_url('quiz_etudiant').'/finish_quiz/'?>");
	});

	function send_reponse(){
		var res = [];
		var i = 0;
		if ($("#repA").hasClass("rep_selected"))
		{
			res[i] = $("#val_rep_1").val();
			i++;
		}
		if ($("#repB").hasClass("rep_selected"))
		{
			res[i] = $("#val_rep_2").val();
			i++;
		}if ($("#repC").hasClass("rep_selected"))
		{
			res[i] = $("#val_rep_3").val();
			i++;
		}if ($("#repD").hasClass("rep_selected"))
		{
			res[i] = $("#val_rep_4").val();
			i++;
		}	
		console.log(res);

		var donnee = {
				reponse:res,
				justification: $("#justification").val(),
				nb_rep:i,
				ajax:1
		};
		var res_save;

		$.ajax({
				url: "<?php echo base_url('reponse').'/save_reponse' ?>",
				type: 'POST',
				async : false,
				data: donnee,
				success: function(rep) {
					 if(rep=="ok")
					 {
						 res_save = true;
					 }
					 else
					 {
						 $("#res").html(rep);
						 res_save = false;
					 }
				},
				error: function(err)
				{
					console.log(err);
					$("#res").html(err);
					res_save = false;
				}
		});

		return res_save;
	}



	
});
</script>
<div id="page-wrapper" class="no-margin-left">
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">QUIZ : <?php echo $quiz['quiz_nom']?></div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div id="res"></div>
					<form role="form">
						<div class="form-group">
							<input type="hidden">
							<label>Question 
									<b id="index_question"><?php echo $this->session->userdata ('index_question');?></b> : 
									<i id="question">
										<?php 
											if (($question['question']!="") && ($quiz['affichage_question']))
											echo $question['question'];
										?>
									</i>
							</label> 
							<div class="clearfix"></div>
							<br/>
							<div class="col-xs-5">
								<button id="repA" type="button" class="btn btn-primary btn-block rep_btn" <?php if (!isset($reponse[0])) echo "disabled"?>>
									<?php 
									if((isset($reponse[0])) && ($quiz['affichage_reponse']) &&($reponse[0]['reponse']!=""))
										echo $reponse[0]['reponse'];
									else 
										echo "A";
									?>
								</button>
								<input type="hidden" id="val_rep_1" value="<?php if (isset($reponse[0])) echo $reponse[0]['rep_id'];?>"/>
							</div>
							<div class="col-xs-5 col-xs-offset-2">
								<button id="repB" type="button" class="btn btn-primary btn-block rep_btn" <?php if (!isset($reponse[1])) echo "disabled"?>>
									<?php 
									if((isset($reponse[1])) && ($quiz['affichage_reponse']) && ($reponse[1]['reponse']!=""))
										echo $reponse[1]['reponse'];
									else 
										echo "B";
									?>
								</button>
								<input type="hidden" id="val_rep_2" value="<?php if (isset($reponse[1])) echo $reponse[1]['rep_id'];?>"/>
							</div>
							<div class="clearfix"></div>
							<div class="center-block">
								<h3 class="center-block text-center" id="tps_rep">
									<?php 
										if (isset($quiz['value_timer']))
											echo $quiz['value_timer'];
										elseif (isset($question['tps_reponse']))
											echo $question['tps_reponse'];
									?>
								</h3>
							</div>
							<div class="clearfix"></div>
							<div class="col-xs-5">
								<button id="repC" type="button" class="btn btn-primary btn-block rep_btn"<?php if (!isset($reponse[2])) echo "disabled"?>>
									<?php 
									if((isset($reponse[2])) && ($quiz['affichage_reponse']) && ($reponse[2]['reponse']!=""))
										echo $reponse[2]['reponse'];
									else 
										echo "C";
									?>
								</button>
								<input type="hidden" id="val_rep_3" value="<?php if (isset($reponse[2])) echo $reponse[2]['rep_id'];?>"/>
							</div>
							<div class="col-xs-5 col-xs-offset-2">
								<button id="repD" type="button" class="btn btn-primary btn-block rep_btn" <?php if (!isset($reponse[3])) echo "disabled"?>>
									<?php 
									if((isset($reponse[3])) && ($quiz['affichage_reponse']) && ($reponse[3]['reponse']!=""))
										echo $reponse[3]['reponse'];
									else 
										echo "D";
									?>
								</button>
								<input type="hidden" id="val_rep_4" value="<?php if (isset($reponse[3])) echo $reponse[3]['rep_id']?>"/>
							</div>
						</div>
						<div class="clearfix"></div>
						<br/>
						<br/>
						<div class="form-group">
							<label>Justification</label> 
							<textarea id="justification" class="form-control" rows="3"></textarea>
						</div>
						<?php if (!(isset($quiz['value_timer'])) && (!isset($question['tps_reponse']))):?>
						<div class="pull-right">
	                        <button type="reset" class="btn btn-outline btn-danger " disabled="disabled">Pr&eacute;c&eacute;dent</button>
							<?php if($this->session->userdata('nb_quest_quiz')!=$this->session->userdata ('index_question')):
							?>
								<button type="button" id="next_quest" class="btn btn-outline btn-success ">Suivant</button>
							<?php else:?>
								<button type="button" id="end_quest" class="btn btn-success ">Terminer</button>
							<?php endif;?>
	                     </div>
                        <?php endif;?>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>