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
						<!-- info -->
						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								Employee No
							</div>
							<div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
								<?php 
									$k = 'empNoFormatted';
									echo isset($employee_info[$k]) ? $employee_info[$k] : '';
								?>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								Date
							</div>
							<div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
								<?php 
									echo date('d-m-Y');
								?>
							</div>
						</div>
						
						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								Name
							</div>
							<div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
								<?php 
									$k = 'empNama';
									echo isset($employee_info[$k]) ? $employee_info[$k] : '';
								?>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								Position
							</div>
							<div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
								<?php 
									$k = 'xxx';
									echo isset($employee_info[$k]) ? $employee_info[$k] : '';
								?>
							</div>
						</div>
						
						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								Office Location
							</div>
							<div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
								<?php 
									$k = 'officeLocNama';
									echo isset($employee_info[$k]) ? $employee_info[$k] : '';
								?>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								Location Code
							</div>
							<div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
								<?php 
									$k = 'officeLocKode';
									echo isset($employee_info[$k]) ? $employee_info[$k] : '';
								?>
							</div>
						</div>
						
						<!-- /info -->
						
						<!-- request -->
						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								Leaves Type
							</div>
							<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
								<?php 
									$options = $leave_type;
									$optionsSelected = (isset($lvTypId))?$lvTypId:null;
									$extra = array(
										'id' => 'lvTypId',
										'class' => 'form-control'
									);
									echo form_dropdown('lvTypId', $options, $optionsSelected,$extra);
								?>
							</div>
						</div>
						
						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								Leaves Periode
							</div>
							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5">
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" id="tanggal_awal" name="tanggal_awal" class="form-control pull-right datepicker checkTanggal" value="<?php 
										echo isset($lvreqTanggalAwal) ? date('d M Y', strtotime($lvreqTanggalAwal)) : '';
									?>">
								</div>
							</div>
							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 text-center">
								until
							</div>
							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5">
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" id="tanggal_akhir" name="tanggal_akhir" class="form-control pull-left datepicker checkTanggal" value="<?php 
										echo isset($lvreqTanggalAkhir) ? date('d M Y', strtotime($lvreqTanggalAkhir)) : '';
									?>">
								</div>
							</div>
						</div>
						
						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								Balance to Date
							</div>
							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5">
								<?php 
								$paramFormInput = array(
									'name'        => 'balanceDays',
									'id'          => 'balanceDays',
									'value'       => (isset($balanceDays))?$balanceDays:null,					
									'class'			=> 'form-control money',
									'style'         => '',
									'readonly'	=> 'readonly'
								);
								
								echo form_input($paramFormInput);
								?>
							</div>
							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
								days
							</div>
							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5">
								<?php 
								$paramFormInput = array(
									'name'        => 'balanceHours',
									'id'          => 'balanceHours',
									'value'       => (isset($balanceHours))?$balanceHours:null,					
									'class'			=> 'form-control numeric',
									'style'         => '',
									'readonly'	=> 'readonly'
								);
								
								echo form_input($paramFormInput);
								?>
							</div>
							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
								hours
							</div>
						</div>
						
						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								Taken This Time
							</div>
							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5">
								<?php 
								$paramFormInput = array(
									'name'        => 'takeDays',
									'id'          => 'takeDays',
									'value'       => (isset($takeDays))?$takeDays:null,					
									'class'			=> 'form-control',
									'style'         => '',
									'readonly'	=> 'readonly'
								);
								
								echo form_input($paramFormInput);
								?>
							</div>
							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
								days
							</div>
							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5">
								<?php 
								$paramFormInput = array(
									'name'        => 'takeHours',
									'id'          => 'takeHours',
									'value'       => (isset($takeHours))?$takeHours:null,					
									'class'			=> 'form-control',
									'style'         => '',
									'readonly'	=> 'readonly'
								);
								
								echo form_input($paramFormInput);
								?>
							</div>
							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
								hours
							</div>
						</div>
						
						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								Current Balance
							</div>
							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5">
								<?php 
								$paramFormInput = array(
									'name'        => 'endBalanceDays',
									'id'          => 'endBalanceDays',
									'value'       => (isset($endBalanceDays))?$endBalanceDays:null,					
									'class'			=> 'form-control',
									'style'         => '',
									'readonly'	=> 'readonly'
								);
								
								echo form_input($paramFormInput);
								?>
							</div>
							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
								days
							</div>
							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5">
								<?php 
								$paramFormInput = array(
									'name'        => 'endBalanceHours',
									'id'          => 'endBalanceHours',
									'value'       => (isset($endBalanceHours))?$endBalanceHours:null,					
									'class'			=> 'form-control',
									'style'         => '',
									'readonly'	=> 'readonly'
								);
								
								echo form_input($paramFormInput);
								?>
							</div>
							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
								hours
							</div>
						</div>
						
						<!-- /request -->
						

						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<center>
									<button type="button" class="btn btn-sm" onclick="change_url('<?= site_url($this->nama_controller)?>')">Back</button>
									&nbsp;
									<button type="button" id="simpan" class="btn btn-sm btn-primary">Save</button>
									&nbsp;
									<button type="button" id="confirm" class="btn btn-sm btn-warning">Confirm</button>
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
<script type="text/javascript">
Number.prototype.format = function( n, x, s, c ) {
	var re = '\\d(?=(\\d{' + ( x || 3 ) + '})+' + ( n > 0 ? '\\D' : '$' ) + ')',num = this.toFixed( Math.max( 0, ~~n ) );
	return ( c ? num.replace( '.', c ) : num ).replace( new RegExp( re, 'g' ), '$&' + ( s || ',' ) );
};

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

	$('#confirm').click(
		function(){
			simpan(true);	
		}		
	);

    $('.datepicker').datepicker({
    	autoclose: true,
    	format: 'dd M yyyy',
    	orientation : 'bottom'
    });
	
	function simpan(lock){
		var parameter = {
			'aksi':'<?= $this->input->post('aksi') ?>',
			'id' :'<?= $this->input->post('id') ?>'
		};
		$.ajax(
			{
				url : '<?= site_url($this->nama_controller.'/simpan')?>',
				type: 'post',
				data : $('#form_ajax').serialize()+ '&' + $.param(parameter) + '&lock=' + (lock ? 1 : 0),
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
	
	$('.checkTanggal').on('change', function(){
		// check tanggal
		var valid = true;
		$('.checkTanggal').each(function(){
			if(this.value == ''){
				valid = false;
			}
		});
		// hitung day server side
		if(valid){
			var parameter = {
				'tanggal_awal' : $('#tanggal_awal').val(),
				'tanggal_akhir' : $('#tanggal_akhir').val()
			};
			$.ajax(
				{
					url : '<?= site_url($this->nama_controller.'/hitung_days')?>',
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
							var balance = {
								'balanceDays'	: 0,
								'balanceHours'	: 0,
								'takeDays'		: 0,
								'takeHours'		: 0,
								'endBalanceDays'	: 0,
								'endBalanceHours'	: 0
							};
							
							for(var i in balance){
								balance[i] = parseFloat($('#' + i).val());
								if(isNaN(balance[i]))balance[i] = 0;
							}
							
							var typ = $('#lvTypId option:selected').text();
							var sub = 0;
							if(typeof refType[typ] !== 'undefined'){
								if(refType[typ]['empLvDayType'] == 'W'){
									sub = hasil['data']['days_off'];
								}
							}
							leaveTakeDays = hasil['data'];
							balance['takeDays'] = hasil['data']['total'] - sub;
							balance['takeHours'] = balance['takeDays'] * 24;
							balance['endBalanceDays'] = balance['balanceDays'] - balance['takeDays'];
							balance['endBalanceHours'] = balance['endBalanceDays'] * 24;
							
							for(var i in balance){
								$('#' + i).val(parseFloat(balance[i]).format(2));
							}
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
			);
		}
	});
	
	var refType = <?= isset($ref_leave_type) ? json_encode($ref_leave_type) : '{}' ?>;
	var leaveTakeDays = {'total' : 0, 'days_off' : 0};
	var typePeriodeOnChange = function(){
		var typ = $('#lvTypId option:selected').text();
		var balance = {
			'balanceDays'	: 0,
			'balanceHours'	: 0,
			'takeDays'		: leaveTakeDays['total'],
			'takeHours'		: 0,
			'endBalanceDays'	: 0,
			'endBalanceHours'	: 0
		};
		var sub = 0;
		if(refType[typ]['empLvDayType'] == 'W'){
			sub = leaveTakeDays['days_off'];
		}
		balance['takeDays'] -= sub;
		balance['takeHours'] = balance['takeDays'] * 24;
		if(typeof refType[typ] !== 'undefined'){
			if(refType[typ]['empLvMaxPerMonth'] > 0)balance['balanceDays'] = refType[typ]['empLvMaxPerMonth'] * 12;
			else balance['balanceDays'] = refType[typ]['empLvMaxPerYear'];
			balance['balanceHours'] = balance['balanceDays'] * 24;
			
			balance['endBalanceDays'] = balance['balanceDays'] - balance['takeDays'];
			balance['endBalanceHours'] = balance['endBalanceDays'] * 24;
		}
		
		for(var i in balance){
			$('#' + i).val(parseFloat(balance[i]).format(2));
		}
	};
	
	if('<?= isset($lvreqLvNama) ? $lvreqLvNama : ''; ?>' != ''){
		$('#lvTypId option').each(function(){
			if(this.innerHTML == '<?= isset($lvreqLvNama) ? $lvreqLvNama : '';?>')this.selected = true;
			else this.selected = false;
		});
	}
	
	$('#lvTypId').on('change', typePeriodeOnChange);
	
	$('#lvTypId').trigger('change');
	
	(function(){
		var valid = true;
		$('.checkTanggal').each(function(){
			if(this.value === '')valid = true;
		});
		if(valid)$($('.checkTanggal')[0]).trigger('change');
	})();
</script>