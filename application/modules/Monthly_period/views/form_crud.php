<link rel="stylesheet" href="<?= base_url('shisan/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')?>">
<link rel="stylesheet" href="<?= base_url('shisan/plugins/bootstrap-switch-master/dist/css/bootstrap3/bootstrap-switch.min.css')?>">
 
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
								Nama periode
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<?php 
								$paramFormInput = array(
									'name'        => 'monthlyPeriodNama',
									'id'          => 'monthlyPeriodNama',
									'value'       => (isset($monthlyPeriodNama))?$monthlyPeriodNama:null,
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
								Tanggal mulai
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<div class="input-group date">
				                	<div class="input-group-addon">
				                    	<i class="fa fa-calendar"></i>
				                    </div>
				                    <input type="text" name="monthlyPeriodStart" class="form-control pull-right" id="datepicker" value="<?=(isset($monthlyPeriodStart))?$monthlyPeriodStart:null?>">
				                </div>
							</div>
						</div>

						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								Tanggal selesai
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<div class="input-group date">
				                	<div class="input-group-addon">
				                    	<i class="fa fa-calendar"></i>
				                    </div>
				                    <input type="text" name="monthlyPeriodEnd" class="form-control pull-right" id="datepicker2" value="<?=(isset($monthlyPeriodEnd))?$monthlyPeriodEnd:null?>">
				                </div>
							</div>
						</div>

						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								Status aktif
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<?php
									if(isset($monthlyPeriodStatus) && $monthlyPeriodStatus == '1'){
										$checked = 'checked';
									}else{
										$checked = '';
									}
								?>
								<input type="checkbox" name="monthlyPeriodStatus" id="monthlyPeriodStatus" <?= $checked ?> >
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
<script src="<?= base_url('shisan/plugins/bootstrap-switch-master/dist/js/bootstrap-switch.min.js') ?>"></script>
<script type="text/javascript">
	
	$(document).keypress(function (event) {            
		if (event.keyCode == 13) {
			event.preventDefault();
		}

		
	});
	
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

    $("#monthlyPeriodStatus").bootstrapSwitch({
    	onText :'Active',
    	offText :'Inactive',
    	size : 'small'

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