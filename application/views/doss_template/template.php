<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Première_page" content="">
<meta name="Rin_rom" content="">

<title>Edusmart</title>

<!-- Bootstrap Core CSS -->
<link
	href="<?php  echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">

<!-- Header CSS -->
<link href="<?php  echo base_url()?>assets/css/header.css"
	rel="stylesheet">
<!-- MetisMenu CSS -->
<link
	href="<?php  echo base_url()?>assets/bower_components/metisMenu/dist/metisMenu.min.css"
	rel="stylesheet">

<!-- DataTables CSS -->
<link
	href="<?php  echo base_url()?>assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css"
	rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link
	href="<?php  echo base_url()?>assets/bower_components/datatables-responsive/css/responsive.dataTables.css"
	rel="stylesheet">

<!-- icheck blue CSS -->
<link
	href="<?php  echo base_url()?>assets/bower_components/icheck/skins/square/blue.css"
	rel="stylesheet">
<link
	href="<?php  echo base_url()?>assets/bower_components/icheck/skins/line/blue.css"
	rel="stylesheet">
<link href="<?php  echo base_url()?>assets/bower_components/icheck/skins/line/purple.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="<?php  echo base_url()?>assets/dist/css/sb-admin-2.css"
	rel="stylesheet">

<!-- Custom Fonts -->
<link
	href="<?php  echo base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css"
	rel="stylesheet" type="text/css">

<!-- Own style -->
<link href="<?php  echo base_url()?>assets/css/template.css"
	rel="stylesheet" type="text/css">


<!-- jQuery -->
<script
	src="<?php  echo base_url()?>assets/bower_components/jquery/dist/jquery.js"></script>
<script
	src="<?php  echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>



	<div id="wrapper">

		<nav class="navbar navbar-default navbar-static-top" role="navigation"
			style="margin-bottom: 0">
			<div class=" img-header-left col-xs-4  ">
				<img class="img-responsive"
					src="<?php echo base_url()?>assets/pictures/uvhc.png" />
			</div>
			<div class="col-xs-4  header-title text-center">
				<a href="<?php echo base_url()?>index.php/quizz/liste_quizz" class="header-title-txt">Edusmart</a>
			</div>
			<!--   -->
			<div class="col-xs-4 ">
				<img class="img-responsive pull-right"
					src="<?php echo base_url()?>assets/pictures/ensiame.png" />

			</div>
			<!-- /.navbar-header -->
		</nav>
		
		<?php $user = $this->session->userdata('logged_in')?>


		<script type="text/javascript">
			$(document).ready(function() {
				var $is_in_login_page = (window.location.href === "<?php echo base_url('connexion') ?>");
				<?php if ($user==NULL) :?>
				 if (!$is_in_login_page)
					window.location.href = "<?php echo base_url('connexion') ?>";
				<?php endif;?>
			});
		</script>
		
		<?php if ($user!=NULL) :?>
		<div class="row" style="height: 40px; margin-top: 10px;">

			<div class="col-sm-3 col-sm-push-9  ">
				<button class="btn btn-danger btn-md pull-right"
					style="margin-right: 10px; margin-left: 10px;" data-toggle="modal"
					data-target="#modal_deconnexion">Deconnexion</button>
			</div>

			<div class="modal fade" id="modal_deconnexion" tabindex="-1"
				role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content col-xs-8	col-xs-offset-2"
						style="margin-top: 50px">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"
								aria-hidden="true">&times;</button>
							<h4 class="modal-title ">Deconnexion</h4>
						</div>
						<div class="modal-body">

							<p>Etes vous sur de vouloir vous deconnecter ?</p>

						</div>

						<div class="modal-footer">
							<!--<button class="btn btn-default center-block" name=""  onclick="<?php echo base_url()?>	index.php/connexion">Deconnexion</button> -->
							<a href="<?php echo base_url()?>index.php/connexion/deconnexion"
								class="btn btn-md btn-danger btn-block">Deconnexion</a>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>

			<?php echo $bouton_header;?>

		</div>
		<!-- Modal -->
		
		<?php endif;?>
				
		<?php
		echo $content;
		?>

	

    </div>
	<!-- /#wrapper -->


	<!-- Bootstrap Core JavaScript -->
	<script
		src="<?php  echo base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

	<!-- Icheck JavaScript -->
	<script
		src="<?php  echo base_url()?>assets/bower_components/icheck/icheck.js"></script>

	<!-- Metis Menu Plugin JavaScript -->
	<script
		src="<?php  echo base_url()?>assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

	<!-- DataTables JavaScript -->
	<script
		src="<?php  echo base_url()?>assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script
		src="<?php  echo base_url()?>assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

	<!-- Custom Theme JavaScript -->
	<script src="<?php  echo base_url()?>assets/dist/js/sb-admin-2.js"></script>

	<!-- Page-Level Demo Scripts - Tables - Use for reference -->

	<script>

    </script>


	<script>
	$(document).ready(function(){
	  $("<?php if (isset($this->session->userdata ( 'logged_in' )['et_ID'])) echo'.square-blue'; else echo 'input'?>").iCheck({
	    checkboxClass: 'icheckbox_square-blue',
	    radioClass: 'iradio_square-blue'
	  });
	});
	</script>

</body>

</html>

