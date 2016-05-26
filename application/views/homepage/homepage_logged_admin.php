<script type="text/javascript">
$(document).ready(function(){
	$("#myModal").modal('show');
});

</script>

<button class="btn btn-primary btn-md pull-left"
	style="margin-top: 10px; margin-right: 10px;" data-toggle="modal"
	data-target="#myModal1">Ajouter utilisateur</button>
<!-- Modal -->

<div class="modal fade" id="myModal1" tabindex="-1" role="dialog"
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