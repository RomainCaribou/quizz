
    <!-- Custom CSS -->
    <link href="<?php  echo base_url()?>assets/css/identification.css" rel="stylesheet">

<form method="post" class=" pull-left marge" action="connexion.php/test_login"> 

 <input placeholder="Login" class="form-control" name="login" type="text" required/> 
 <br>
 <input placeholder="Mot de passe" class="form-control" name="psw" type="password" required/> 


<?php if(isset($res)) { ?>
<p class="erreur"> Erreur d'identification. </p>
<?php } ?>


	<button class="btn btn-default position" type="submit" name="">Connexion</button>
</form>
