

<div class="row" style="height:40px;margin-top:10px;">

	<div class="col-sm-3 col-sm-push-9  ">
		<button class="btn btn-primary btn-md pull-right" style="margin-right:10px;margin-left:10px;"data-toggle="modal"
		data-target="#myModal">Deconnexion</button>
	</div>
	
	<div class="col-sm-3 col-sm-pull-3"  >
		<a href="<?php echo base_url()?>index.php/connexion/creer" class="btn btn-md btn-primary btn-block pull-right" style="width:220px;">Creation Quizz</a>
	</div>

</div>
	
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content col-xs-8	col-xs-offset-2" style="margin-top:50px">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
					
				<h4 class="modal-title " id="myModalLabel">Deconnexion</h4>
			</div>
			<div class="modal-body">

				<p> Etes vous sur de vouloir vous deconnecter ?</p>

			</div>
						
			<div class="modal-footer">
			<!--<button class="btn btn-default center-block" name=""  onclick="<?php echo base_url()?>	index.php/connexion">Deconnexion</button> -->
			
			<a href="<?php echo base_url()?>index.php/connexion" class="btn btn-md btn-danger btn-block">Deconnexion</a>
			
				</form>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>


