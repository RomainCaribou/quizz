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
  
 <button class="btn btn-default center-block" type="submit" name="" style="margin-bottom:50px;">Envoyer</button>                              
 </form>

</div>