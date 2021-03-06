
<script type="text/javascript">

$(document).ready(function() {
	$("#btn_ajout_quiz").click(function(){

		var newquiz = {
				nomquizz : $('#nomquizz').val(),
				type : $('input[name=type]:checked').val(),
				affichage_questions : $('input[name=affichage_questions]:checked').val(),
				affichage_reponses : $('input[name=affichage_reponses]:checked').val(),
				reponse_multiple : $('input[name=reponse_multiple]:checked').val(),
				timer : $('input[name=timer]:checked').val(),
				affichage_resultats : $('input[name=affichage_resultats]:checked').val(),
				avec_qrcode : $('input[name=avec_qrcode]:checked').val(),
				justification : $('input[name=justification]:checked').val(),
				ajax : '1'
		};


		$.ajax({
				url: "<?php echo base_url('quizz').'/new_quizz_admin' ?>",
				type: 'POST',
				async : false,
				data: newquiz,
				success: function(res) {

					 if(res)
	                    {

						 	var response = JSON.parse(res);
						 	id = response.quiz_id;
		                    cell_action = "<a data-toggle='modal' data-target='#modal_supprimer"+id+"' class='btn btn-danger btn-circle'>"+
		                    " <span class='glyphicon glyphicon-remove' aria-hidden='true' data-toggle='tooltip' data-placement='bottom' title='Supprimer ce quiz'></span> </a>"+
		                    " <a class='btn btn-warning btn-circle' data-toggle='tooltip' data-placement='bottom' title='Modifier ce quiz'>"+
		                    " <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> </a> "+
		                    "<a class='btn btn-info btn-circle' data-toggle='modal' data-target='#modal-detail-"+id+"'>"+
		                    "<span data-toggle='tooltip' data-placement='bottom' title='D&eacute;tail de ce quiz' class='glyphicon glyphicon-search' aria-hidden='true'></span>"+
							"</a> <a class='btn btn-success btn-circle' data-toggle='tooltip' data-placement='bottom' title='Lancer ce quiz'>"+ 
							"<span class='glyphicon glyphicon-play' aria-hidden='true'></span> </a>";
		                    var t = $('#liste_quiz_tab').DataTable();

		                    t.row.add( [
		                                response.quiz_id,
		                                response.quiz_nom,
		                                response.quiz_date_creation,
		                                cell_action
		                    ] ).draw( false );
		                    $("#modal_creation").modal('hide');
		                    if ((response.affichage_question=="0") && (response.affichage_reponse=="0"))
		                    {
		                    	$("#myModal_basic_quizz").modal('show');
		                    	$("#id_quiz_modale_quest_basic").attr("value",id);
		                    }else
			                    {

		                    	$("#Modalquestion").modal('show');
		                    	$("#id_quiz_modale_quest").attr("value",id);
		                	    }
		                    
		                    if (response.affichage_question=="0")
		                    {
			                    $(".div_enonce").hide();
			                }
		                    if (response.affichage_reponse=="0")
		                    {
			                    $(".div_reponse").hide();
			                }
			                
		                    if (response.timer=="0"||response.timer=="1")
		                    {
			                    $(".div_timer").hide();
			                }

		                    if (response.type_quiz=="0")
		                    {
			                    $(".div_bonne_reponse").hide();
			                }

	                    }
				}
		});
	});
});
	
</script>
<div class="pull-left">
	<a data-toggle="modal" data-target="#modal_creation"
		class="btn btn-md btn-info btn-outline pull-left"
		style="width: 117px;  margin-left:20px; margin-bottom:10px;"><b>Creation Quizz</b></a>
	
</div>
<div class="col-xs-12 col-md-9" >
<button class=" col-xs-4  col-sm-6 btn btn-md  btn-info btn-outline "
	style="width: auto; margin-left:5px;" data-toggle="modal"
	data-target="#myModal12" ><b>Cr&eacuteer compte</b>
	</button>

	<a class=" col-xs-4 col-sm-6 btn btn-md  btn-info btn-outline pull-right "
	style="width:auto; margin-right:5px;"
	href="<?php echo base_url()?>	administration/liste_etudiant" ><b>Liste compte</b>
	</a>
</div>


<div class="modal fade" id="modal_creation" tabindex="-1" role="dialog"
	aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title ">Creation d'un quizz</h4>
			</div>
			<div class="modal-body">
				<form id="form-ajout" method="post" class="marge" action="<?php echo base_url()?>	quizz/new_quizz_admin">
					<div class="form-group" style="">
						<div class="col-xs-12" style="height: 100px; margin-bottom: 40px;">
							<div class="col-md-2" style="margin-top: 6px;">
								<label>Nom du Quizz : </label>
							</div>
							<input class="form-control col-md-3 "
								placeholder="Nom du Quizz ?" id="nomquizz" name="nomquizz"
								style="max-width: 250px;" required>
						</div>
						<div class="col-xs-12" style="margin-bottom: 20px;"
							name="1ereligne">
							<div class="col-xs-6" name="Question1">
								<div name="titre_question">
									<label> Type de Quizz :</label>
								</div>
								<div>
									<div class="radio">
										<label> <input type="radio" name="type" id="optionsRadios1"
											value="0" checked="">Sondage
										</label>
									</div>
									<div class="radio">
										<label> <input type="radio" name="type" id="optionsRadios1"
											value="1">Prive
										</label>
									</div>
									<div class="radio">
										<label> <input type="radio" name="type" id="optionsRadios2"
											value="2">Test
										</label>
									</div>
								</div>
							</div>

							<div class="col-xs-6">

								<label> Affichage des questions :</label>

								<div class="radio">
									<label> <input type="radio" name="affichage_questions"
										value="0" checked="">Non
									</label>
								</div>
								<div class="radio">
									<label> <input type="radio" name="affichage_questions"
										value="1">Oui
									</label>
								</div>
							</div>
						</div>
						<div class="col-xs-12" style="margin-bottom: 20px;">
							<div class="col-xs-6">

								<label> Affichage des reponses :</label>

								<div class="radio">
									<label> <input type="radio" name="affichage_reponses" value="0"
										checked="">Non
									</label>
								</div>
								<div class="radio">
									<label> <input type="radio" name="affichage_reponses" value="1">Oui
									</label>
								</div>
							</div>

							<div class="col-xs-6">

								<label> Reponses multiples :</label>

								<div class="radio">
									<label> <input type="radio" name="reponse_multiple" value="0"
										checked="">Non
									</label>
								</div>
								<div class="radio">
									<label> <input type="radio" name="reponse_multiple" value="1">Oui
									</label>
								</div>
							</div>
						</div>
						<div class="col-xs-12" style="margin-bottom: 20px;">
							<div class="col-xs-6">

								<label> Timer : </label>

								<div class="radio">
									<label> <input type="radio" name="timer" value="1" checked="">Global
									</label>
								</div>
								<div class="radio">
									<label> <input type="radio" name="timer" value="2">Individuel
									</label>
								</div>
								<div class="radio">
									<label> <input type="radio" name="timer" value="0">Non
									</label>
								</div>
							</div>

							<div class="col-xs-6">

								<label> Affichage des resultats :</label>

								<div class="radio">
									<label> <input type="radio" name="affichage_resultats"
										value="0" checked="">Non
									</label>
								</div>
								<div class="radio">
									<label> <input type="radio" name="affichage_resultats"
										value="1">Oui
									</label>
								</div>
							</div>
						</div>
						<div class="col-xs-12" style="margin-bottom: 20px;">
							<div class="col-xs-6">

								<label> Identification QR Code :</label>

								<div class="radio">
									<label> <input type="radio" name="avec_qrcode" value="0"
										checked="">Non
									</label>
								</div>
								<div class="radio">
									<label> <input type="radio" name="avec_qrcode" value="1">Oui
									</label>
								</div>
							</div>

							<div class="col-xs-6">

								<label> Justification des r&eacute;ponses :</label>

								<div class="radio">
									<label> <input type="radio" name="justification" value="0"
										checked="">Non
									</label>
								</div>
								<div class="radio">
									<label> <input type="radio" name="justification" value="1">Oui
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</form>
			</div>
			<div class="modal-footer">
				<div class="col-xs-12">
					<div class="col-xs-6 ">
						<button class="btn btn-lg btn-info btn-outline  pull-left col-xs-12" id="btn_ajout_quiz" style="max-width: 300px;">Envoyer</button>
					</div>
					<div class="col-xs-6">
						<a class="btn btn-primary btn-md btn-lg  col-xs-12"
							style="max-width: 300px;" data-toggle="modal"
							data-target="#modal_deconnexion_2">Annuler</a>
					</div>
				</div>
			</div>
		</div>

		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal_deconnexion_2" tabindex="-1"
	role="dialog" aria-labelledby="modal_deconnexion_label"
	aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content" style="margin-top: 50px">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title " id="modal_deconnexion_label">Annuler</h4>
			</div>
			<div class="modal-body">

				<p>Etes vous sur de vouloir annuler la cr&eacute;ation du quizz ? Toutes
					les donn&eacute;es rentr&eacute;es seront perdues</p>

			</div>

			<div class="modal-footer">
				<a href="<?php echo base_url()?>administration/liste_quizz"
					class="btn btn-md btn-danger btn-block">Annuler</a>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>


<div class="modal fade" id="myModal12" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content col-xs-8	col-xs-offset-2 col-md-10	col-md-offset-1"
			style="margin-top: 50px">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4 class="modal-title " id="myModalLabel">Ajouter un utilisateur</h4>
			</div>
			<div class="modal-body">
				<form method="post" class="marge"
					action="<?php echo base_url()?>	index.php/administration/add_user">
					<label> Nom d'utilisateur :</label><br>
					
					<input placeholder="Utilisateur" class="form-control" name="username"
						type="text" required /> <br> 
						
											<label> Nom :</label><br>
					
					<input placeholder="Utilisateur" class="form-control" name="nom"
						type="text" required /> <br> 
						
																	<label> Prenom :</label><br>
					
					<input placeholder="Utilisateur" class="form-control" name="prenom"
						type="text" required /> <br> 
									<label> Mot de passe :</label><br>
						<input placeholder="Mot de passe"
						class="form-control" name="psw" type="password" />
						
						 <label> Profil d'utilisateur : </label>
                                         
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="profil" value="0" checked="">Etudiant
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="profil"  value="1">Animateur
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="profil"  value="2">Administrateur
                                                </label>
                                            </div>
						
						
						
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

<script>
function valider_formulaire(){
	$("#form-ajout").submit();
}
</script>