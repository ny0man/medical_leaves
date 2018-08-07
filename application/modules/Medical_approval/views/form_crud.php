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
								Employee number
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								<?= $data[0]['empNoFormatted'] ?>
							</div>
						</div>

						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								Name
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								<?= $data[0]['empNama'] ?>
							</div>
						</div>

						<div class="row" style="margin-bottom: 20px">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								Office
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								<?= $data[0]['officeLocNama'] ?>
							</div>
						</div>

						<div class="row" style="margin-bottom: 20px">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								Claim number
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								<?= $data[0]['benClmKode'] ?>
							</div>
						</div>

						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								<b>Benefit</b>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								<b>Nominal</b>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								<b>Nominal Approved</b>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								<b>File</b>
							</div>
						</div>

						<?php if(count($data) > 0): ?>
							<?php foreach($data as $key => $value): ?>
								<div class="row" style="margin-bottom: 10px">
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
										<?= $value['empBenLabel'] ?>
									</div>
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
										<?= number_format($value['benClmNominal'],0,",",".") ?>
									</div>
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
										<?php 
											$paramFormInput = array(
												'name'        => 'benClmNominalApprove['.$value['benClmDetId'].']',
												'id'          => 'benClmNominalApprove['.$value['benClmDetId'].']',
												'value'       => (isset($value['benClmNominalApprove']))?$value['benClmNominalApprove']:$value['benClmNominal'],					
												'class'			=> 'form-control money',
										        'style'         => '',
										        'placeholder'	=> ''
											);
										
											echo form_input($paramFormInput);
										?>
									</div>
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
										<?php
											if($value['benClmDetFile'] != ''){
												$file = '<a href="'.base_url($value['benClmPathFile'].$value['benClmDetFile']).'" target="_blank">view</a>';
												
											}else{
												$file = '<small><i>-no file-</i></small>';
											}
										?>

										<?= $file ?>
									</div>
								</div>
								
							<?php endforeach ?>
						<?php else: ?>
						
						<?php endif ?>

						<div class="row" style="margin-top:30px;margin-bottom: 10px">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								Approval note
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<?php 
									$paramFormInput = array(
										'name'        => 'benClmApproveNote',
										'id'          => 'benClmApproveNote',
										'value'       => (isset($value['benClmApproveNote']))?$value['benClmApproveNote']:null,					
										'class'			=> 'form-control',
								        'rows' => "3",
								        'cols' => "20",
								        'placeholder'	=> ''
									);
								
									echo form_textarea($paramFormInput);
								?>
							</div>
						</div>

						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								Approval Status
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<?php
									if($value['benClmApproveStatus'] == '0'){
										$reject_checked = 'checked="checked"';
										$approve_checked = '';
									}else{
										$reject_checked = '';
										$approve_checked = 'checked="checked"';
									}
								?>

								<input type="radio" name="benClmApproveStatus" value="0" <?= $reject_checked ?>> Reject<br>
								<input type="radio" name="benClmApproveStatus" value="1" <?= $approve_checked ?>> Approve<br>
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