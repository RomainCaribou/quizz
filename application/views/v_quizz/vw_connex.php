<script type="text/javascript">
</script>
<form id="" method="post" action="<?php ?>test_login"> 

Login :  <input name="login" type="text" required/> 
    </br>
    </br>
Password :  <input name="psw" type="password" required/> 

<?php if(isset($res)) { ?>
<p> Tu t'es plant&eacute; trou de balle </p>
<?php } ?>


	<button type="submit" name="">Send</button>
</form>
