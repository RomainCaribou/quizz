<div style="margin:20px;"></div>
<div>

<form method="post" class="marge" action="<?php echo base_url()?>	index.php/connexion/test_login">>


	<div class=" text-center" style="margin-bottom:40px;"> 
		<label >Creation d'un quizz</label>
	</div>
	
	
	
	<div class="form-group" style="margin-left:40px;">
	
		<div class="col-xs-12" style="height:100px;margin-bottom:40px;">
			<div class="col-md-2" style="margin-top:6px;" >
				<label>Nom du Quizz : </label> 
			</div>
		<input class="form-control col-md-3 " placeholder="Nom du Quizz ?" name="nomquizz" style="max-width:250px;">
	
	
		</div>
	<div class="col-xs-12" style="margin-bottom:20px;"name="1ereligne">
		<div class="col-xs-6" name="Question1">
				<div name="titre_question">
      	       		<label> Type de Quizz :</label>
   	       		</div>
                <div>
                	<div class="radio">
                       <label>
                              <input type="radio" name="type" id="optionsRadios1" value="sondage" checked="">Sondage
                        </label>
                    </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="type" id="optionsRadios1" value="prive">Prive
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="type" id="optionsRadios2" value="test">Test
                                                </label>
                                            </div>
                                            </div>
    	 </div>

    	 <div class="col-xs-6">
                                        
                                         <label> Affichage des questions :</label>
                                         
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="affichage_questions" value="non" checked="">Non
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="affichage_questions"  value="oui">Oui
                                                </label>
                                            </div>
  	 </div>
  	 </div>
  	<div class="col-xs-12" style="margin-bottom:20px;">
  	<div class="col-xs-6">
                                        
                                         <label> Affichage des reponses :</label>
                                         
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="affichage_reponses" value="non" checked="">Non
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="affichage_reponses"  value="oui">Oui
                                                </label>
                                            </div>
  	 </div>
  	 
  	   	<div class="col-xs-6">
                                        
                                         <label> Reponses multiples :</label>
                                         
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="reponse_multiple" value="non" checked="">Non
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="reponse_multiple"  value="oui">Oui
                                                </label>
                                            </div>
  	 </div>
	</div>
	<div class="col-xs-12" style="margin-bottom:20px;">
  	<div class="col-xs-6">
                                        
                                         <label> Timer : </label>
                                         
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="timer" value="global" checked="">Global
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="timer"  value="individuel">Individuel
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="timer"  value="non">Non
                                                </label>
                                            </div>
  	 </div>
  	 
  	   	<div class="col-xs-6">
                                        
                                         <label> Affichage des resultats :</label>
                                         
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="affichage_resultats" value="non" checked="">Non
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="affichage_resultats"  value="oui">Oui
                                                </label>
                                            </div>
  	 </div>
	</div>
	
	<div class="col-xs-12" style="margin-bottom:20px;">
  	<div class="col-xs-6">
                                        
                                         <label> Identification QR Code :</label>
                                         
                                          <div class="radio">
                                                <label>
                                                    <input type="radio" name="avec_qrcode" value="non" checked="">Non
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="avec_qrcode"  value="oui">Oui
                                                </label>
                                            </div>
  	 </div>
  	 
  	   	<div class="col-xs-6">
                                        
                                         <label> Justification des réponses :</label>
                                         
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="justification" value="non" checked="">Non
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="justification"  value="oui">Oui
                                                </label>
                                            </div>
  	 </div>
	</div>
	
	
	
	
	
	
	
	
  </div>  
  
 <div class="col-sm-12" style="margin-bottom:50px;">
 <button class="btn btn-default center-block col-sm-5" type="submit" name="" style=" width:180px;" >Envoyer</button>  
 <button class="btn btn-primary btn-md col-sm-5"
					style="margin-right: 10px; width:180px;" data-toggle="modal"
					data-target="#modal_deconnexion">Retour</button>            
					
</div>               
 </form>



			
			

			<div class="modal fade" id="modal_deconnexion" tabindex="-1"
				role="dialog" aria-labelledby="modal_deconnexion_label" aria-hidden="true">
				<div class="modal-dialog">
					<div class=""
						style="margin-top: 50px">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"
								aria-hidden="true">&times;</button>
							<h4 class="modal-title " id="modal_deconnexion_label">Deconnexion</h4>
						</div>
						<div class="modal-body">

							<p>Etes vous sur de vouloir vous deconnecter ?</p>

						</div>

						<div class="modal-footer">
							<!--<button class="btn btn-default center-block" name=""  onclick="<?php echo base_url()?>	index.php/connexion">Deconnexion</button> -->
							<a href="<?php echo base_url()?>connexion/deconnexion"
								class="btn btn-md btn-danger btn-block">Deconnexion</a>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->






</div>