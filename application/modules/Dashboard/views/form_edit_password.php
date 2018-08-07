<div class="content-wrapper" id="content_ajax">
	<section class="content">
		<div class="row margin-bottom-10">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="box">
					<form id="form_ajax">
						<div class="box-header" style="margin-bottom: 20px">
							<center><h3 class="box-title">Please reset your password for the first time use</h3></center>
						</div>					
						<div class="box-body" style="min-height: 470px">
							<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
								<div class="row margin-bottom-10">
									<div class="col-lg-4 col-md-4  col-sm-4 col-xs-4">
										Name
									</div>
									<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
										<?= $this->session->userdata('refUserNamaAsli') ?>
									</div>
								</div>


								<div class="row margin-bottom-10">
									<div class="col-lg-4 col-md-4  col-sm-4 col-xs-4">
										Employee no
									</div>
									<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
										<?= $this->session->userdata('empNoFormatted') ?>
									</div>
								</div>


								<div class="row margin-bottom-10">
									<div class="col-lg-4 col-md-4  col-sm-4 col-xs-4">
										New password
									</div>
									<div class="col-lg-8 col-md-8  col-sm-8 col-xs-8">
										<?php 
										$paramFormInput = array(
											'name'        => 'refUserPassword',
											'id'          => 'refUserPassword',
											'value'       => (isset($refUserPassword))?$refUserPassword:null,					
											'class'			=> 'form-control',
											'style'         => '',
											'placeholder'	=> ''
										);

										echo form_password($paramFormInput);
										?>
									</div>
								</div>


								<div class="row margin-bottom-10">
									<div class="col-lg-4 col-md-4  col-sm-4 col-xs-4">
										Confirm password
									</div>
									<div class="col-lg-8 col-md-8  col-sm-8 col-xs-8">
										<?php 
										$paramFormInput = array(
											'name'        => 'confirmPassword',
											'id'          => 'confirmPassword',
											'value'       => (isset($confirmPassword))?$confirmPassword:null,					
											'class'			=> 'form-control',
											'style'         => '',
											'placeholder'	=> ''
										);

										echo form_password($paramFormInput);
										?>
									</div>
								</div>

								<div class="row" style="margin-top: 20px">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<center>
											<button type="button" id="simpan" class="btn btn-sm btn-primary">Save</button>
										</center>
									</div>
								</div>
							</div>

							

						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>

<script type="text/javascript">
	$(document).keypress(function (event) {            
		if (event.keyCode == 13) {
			event.preventDefault();
		}
	});
	
	$('#simpan').click(
		function(){
			simpan();	
		}		
		);

	function simpan(){
		$.ajax(
		{
			url : '<?= site_url('Dashboard/edit_password')?>',
			type: 'post',
			data : $('#form_ajax').serialize(),
			success: function(result,status,xhr){
				hasil = JSON.parse(result);
				if(hasil.status == 'session_expired'){
					alert('Session expired');
					window.location.replace('<?= site_url('login')?>');
				}else if(hasil.status == true){
					toastr['success']('Success');
					window.location.replace('<?= site_url('Dashboard')?>');
				}else{
					toastr['warning'](hasil.message);						
				}
			},
			error : function(xhr,status,error)	{
				toastr['error'](error,status);
			}
		}
		)	
	}
</script>