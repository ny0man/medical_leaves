<section class="content">
	<div class="row">
		<form id="form_ajax">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><?= $this->nama_menu ?><small> - <?= ucfirst($this->input->post('aksi')) ?></small></h3>
					</div>					
					<div class="box-body">
						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								Type of leave
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<?php 
								$paramFormInput = array(
									'name'        => 'lvTypNama',
									'id'          => 'lvTypNama',
									'value'       => (isset($lvTypNama))?$lvTypNama:null,					
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
								Days Type
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<?php
									$options = array(
										'W' => 'Working Day',
										'C' => 'Calendar Day',
									);
									$optionsSelected = (isset($lvDayType))?$lvDayType:null;
									$extra = array(
										'class' => 'form-control'
									);
									echo form_dropdown('lvDayType', $options, $optionsSelected,$extra);
								?>
							</div>
						</div>
						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								Max Days Per Year
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<?php 
								$paramFormInput = array(
									'name'        => 'lvMaxPerYear',
									'id'          => 'lvMaxPerYear',
									'value'       => (isset($lvMaxPerYear))?$lvMaxPerYear:null,					
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
								Max Days Per Month
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<?php 
								$paramFormInput = array(
									'name'        => 'lvMaxPerMonth',
									'id'          => 'lvMaxPerMonth',
									'value'       => (isset($lvMaxPerMonth))?$lvMaxPerMonth:null,					
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
								Gender
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<?php
									$options = array(
										'' => 'All',
										'M' => 'Male',
										'F' => 'Female',
									);
									$optionsSelected = (isset($lvGender))?$lvGender:null;
									$extra = array(
										'class' => 'form-control'
									);
									echo form_dropdown('lvGender', $options, $optionsSelected,$extra);
								?>
							</div>
						</div>
						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								Min LSA
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<?php 
								$paramFormInput = array(
									'name'        => 'lvMinLSA',
									'id'          => 'lvMinLSA',
									'value'       => (isset($lvMinLSA))?$lvMinLSA:null,					
									'class'			=> 'form-control',
									'style'         => '',
									'placeholder'	=> ''
								);
								
								echo form_input($paramFormInput);
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