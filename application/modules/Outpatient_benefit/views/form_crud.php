<link rel="stylesheet" href="<?= base_url('shisan/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')?>">
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
								Outpatient Benefit
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<?php 
								$paramFormInput = array(
									'name'        => 'outBenNama',
									'id'          => 'outBenNama',
									'value'       => (isset($outBenNama))?$outBenNama:null,					
									'class'			=> 'form-control',
									'style'         => '',
									'placeholder'	=> 'example : Outpatient Married, Outpatient Single'
								);
								
								echo form_input($paramFormInput);
								?>
							</div>
						</div>

						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								Nominal
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<?php 
								$paramFormInput = array(
									'name'        => 'outBenNominal',
									'id'          => 'outBenNominal',
									'value'       => (isset($outBenNominal))?$outBenNominal:null,					
									'class'			=> 'form-control money',
									'style'         => '',
									'placeholder'	=> ''
								);
								
								echo form_input($paramFormInput);
								?>
							</div>
						</div>

						<div class="row margin-bottom-10">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								Marital status
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<?php
									$options = $marriage_status;
									$optionsSelected = (isset($outBenMaritalStatus))?$outBenMaritalStatus:null;
									$extra = array(
										'class' => 'form-control'
									);
									echo form_dropdown('outBenMaritalStatus', $options, $optionsSelected,$extra);
								?>
							</div>
						</div>

						<div class="row margin-bottom-10">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								End balance label
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<?php
									if(isset($outBenEndBalLabel) && $outBenEndBalLabel == '1'){
										$checked_true = 'checked="checked"';
										$checked_false = '';
									}else{
										$checked_false = 'checked="checked"';
										$checked_true = '';
									}
								?>
								<input type="radio" name="outBenEndBalLabel" value="1" <?= $checked_true ?>> Yes
								<input style="margin-left: 10px" type="radio" name="outBenEndBalLabel" value="0" <?= $checked_false ?>> No
							</div>
						</div>

						<div class="row margin-bottom-10">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								LSA minimum month
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								<?php 
									$paramFormInput = array(
										'name'        => 'outBenLsaMonth',
										'id'          => 'outBenLsaMonth',
										'value'       => (isset($outBenLsaMonth))?$outBenLsaMonth:null,					
										'class'			=> 'form-control',
								        'style'         => '',
								        'placeholder'	=> 'leave blank if none'
									);
								
									echo form_input($paramFormInput);
								?>
							</div>
						</div>

						<div class="row margin-bottom-10">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								Max claim count
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								<?php 
									$paramFormInput = array(
										'name'        => 'outBenMaxClaimCount',
										'id'          => 'outBenMaxClaimCount',
										'value'       => (isset($outBenMaxClaimCount))?$outBenMaxClaimCount:null,					
										'class'			=> 'form-control',
								        'style'         => '',
								        'placeholder'	=> 'leave blank if none'
									);
								
									echo form_input($paramFormInput);
								?>
							</div>
						</div>

						<div class="row margin-bottom-10">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								Set nominal to 0 after claimed
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<?php
									if(isset($outBenSetEmpty) && $outBenSetEmpty == '1'){
										$checked_true = 'checked="checked"';
										$checked_false = '';
									}else{
										$checked_false = 'checked="checked"';
										$checked_true = '';
									}
								?>
								<input type="radio" name="outBenSetEmpty" value="1" <?= $checked_true ?> > Yes
								<input style="margin-left: 10px" type="radio" name="outBenSetEmpty" value="0" <?= $checked_false ?> > No
							</div>
						</div>
						

						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								Period start
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<div class="input-group date">
				                	<div class="input-group-addon">
				                    	<i class="fa fa-calendar"></i>
				                    </div>
				                    <input type="text" name="outBenStart" class="form-control pull-right" id="datepicker" value="<?=(isset($outBenStart))?$outBenStart:null?>">
				                </div>
							</div>
						</div>

						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								Period end
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<div class="input-group date">
				                	<div class="input-group-addon">
				                    	<i class="fa fa-calendar"></i>
				                    </div>
				                    <input type="text" name="outBenEnd" class="form-control pull-right" id="datepicker2" value="<?=(isset($outBenEnd))?$outBenEnd:null?>">
				                </div>
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

<script src="<?= base_url('shisan/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>
<script src="<?= base_url('shisan/plugins/lazzynumeric/autoNumeric.js')?>"></script>
<script src="<?= base_url('shisan/plugins/lazzynumeric/jquery.lazzynumeric.js')?>"></script>

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

	$('#datepicker').datepicker({
    	autoclose: true,
    	format: 'dd M yyyy',
    	orientation : 'bottom'
    });

    $('#datepicker2').datepicker({
    	autoclose: true,
    	format: 'dd M yyyy',
    	orientation : 'bottom'
    });

    $('.money').lazzynumeric({aSep: ".", aDec: ","});

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