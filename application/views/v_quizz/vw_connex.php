<script type="text/javascript">
</script>
<form id="" method="post" action="<?php ?>test_login"> 

Login :  <input name="login" type="text" required/> 
    </br>
    </br>
Password :  <input name="psw" type="password" required/> 

<?php if(isset($res)) { ?>
<p> Erreur d'identifiants </p>
<?php } ?>


	<button type="submit" name="">Send</button>
</form>
