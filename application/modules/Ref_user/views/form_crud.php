<section class="content">
	<div class="row">
		<form id="form_ajax">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><?= $this->nama_menu ?><small> - <?= ucfirst($this->input->post('aksi')) ?></small></h3>
					</div>					
					<div class="box-body">
						<?php if($this->input->post('aksi') == 'add'): ?>
						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								Username (email)
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<?php 
								$paramFormInput = array(
									'name'        => 'refUserNama',
									'id'          => 'refUserNama',
									'value'       => (isset($refUserNama))?$refUserNama:null,					
									'class'			=> 'form-control',
									'style'         => '',
									'placeholder'	=> ''
								);
								
								echo form_input($paramFormInput);
								?>
							</div>
						</div>
						<?php endif?>

						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								Nama lengkap
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<?php 
								$paramFormInput = array(
									'name'        => 'refUserNamaAsli',
									'id'          => 'refUserNamaAsli',
									'value'       => (isset($refUserNamaAsli))?$refUserNamaAsli:null,					
									'class'			=> 'form-control',
									'style'         => '',
									'placeholder'	=> ''
								);
								
								echo form_input($paramFormInput);
								?>
							</div>
						</div>

						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								Password
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								<?php 
								$paramFormInput = array(
									'name'        => 'refUserPassword',
									'id'          => 'refUserPassword',
									'value'       => (isset($refUserPassword))?$this->data_process_library->decrypt_api($refUserPassword):null,					
									'class'			=> 'form-control',
									'style'         => '',
									'placeholder'	=> 'password'
								);
								
								echo form_password($paramFormInput);
								?>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								<?php 
								$paramFormInput = array(
									'name'        => 'confirmPassword',
									'id'          => 'confirmPassword',
									'class'			=> 'form-control',
									'value'       => (isset($refUserPassword))?$this->data_process_library->decrypt_api($refUserPassword):null,	
									'style'         => '',
									'placeholder'	=> 'konfirmasi password'
								);
								
								echo form_password($paramFormInput);
								?>
							</div>
						</div>

						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								Group
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<?php
									$options = $list_group;
									$optionsSelected = (isset($refGroupId))?$refGroupId:null;
									$extra = array(
										'class' => 'form-control'
									);
									echo form_dropdown('refGroupId', $options, $optionsSelected,$extra);
								?>
							</div>
						</div>

						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<center>
									<button type="button" class="btn btn-sm" onclick="change_url('<?= site_url($this->nama_controller)?>')">Back</button>
									<button type="button" id="simpan" class="btn btn-sm btn-primary">Save</button>
								</center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>

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
		var parameter = {
			'aksi':'<?= $this->input->post('aksi') ?>',
			'id' :'<?= $this->input->post('id') ?>'
		};
		$.ajax(
			{
				url : '<?= site_url($this->nama_controller.'/simpan')?>',
				type: 'post',
				data : $('#form_ajax').serialize()+ '&' + $.param(parameter),
				beforeSend : function( xhr ){

				},
				success: function(result,status,xhr){
					hasil = JSON.parse(result);
					if(hasil.status == 'session_expired'){
						alert('Session expired');
						window.location.replace('<?= site_url('login')?>');
					}else if(hasil.status == true){
						toastr.clear();
						toastr['success'](hasil.message);
						change_url('<?= site_url($this->nama_controller)?>');
					}else{
						toastr['warning'](hasil.message);						
					}
				},
				complete : function(xhr,status){

				},
				error : function(xhr,status,error)	{
					toastr['error'](error,status);
				}
			}
		)
	}
</script>