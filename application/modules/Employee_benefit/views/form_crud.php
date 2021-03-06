<section class="content">
	<div class="row">
		<form id="form_ajax">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><?= $this->nama_menu ?><small> - <?= ucfirst($this->input->post('aksi')) ?></small></h3>
					</div>					
					<div class="box-body">
						<div class="row margin-bottom-10">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								Name
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<?= $benefit[0]['empNama'] ?>
							</div>
						</div>

						<div class="row margin-bottom-10">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								Emp No
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<?= $benefit[0]['empNoFormatted'] ?>
							</div>
						</div>

						<div class="row" style="margin-bottom: 20px">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								Year
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<?= $year ?>
							</div>
						</div>

						<?php if(count($benefit) > 0): ?>
							<div class="row margin-bottom-10">
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
									<u>Benefit name</u>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
									<u>Nominal</u>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<u>Description</u>
								</div>
							</div>
							<?php foreach($benefit as $key => $value): ?>
								<div class="row margin-bottom-10">
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
										<?= $value['empBenLabel'] ?>
									</div>
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
										<?php 
											$paramFormInput = array(
												'name'        => 'empBenNominal['.$value['empBenId'].']',
												'id'          => 'empBenNominal['.$value['empBenId'].']',
												'value'       => (isset($value['empBenNominal']))?$value['empBenNominal']:null,					
												'class'			=> 'form-control money',
										        'style'         => '',
										        'placeholder'	=> ''
											);
										
											echo form_input($paramFormInput);
										?>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										<?php 
											$paramFormInput = array(
												'name'        => 'empBenDesc['.$value['empBenId'].']',
												'id'          => 'empBenDesc['.$value['empBenId'].']',
												'value'       => (isset($value['empBenDesc']))?$value['empBenDesc']:null,					
												'class'			=> 'form-control',
										        'style'         => '',
										        'placeholder'	=> ''
											);
										
											echo form_input($paramFormInput);
										?>
									</div>
								</div>
							<?php endforeach ?>
						<?php else: ?>
						
						<?php endif ?>

						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<center>
									<button type="button" class="btn btn-sm" onclick="change_url('<?= site_url($this->nama_controller)?>',{'year':'<?= $year ?>'})">Back</button>
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
			'aksi':'<?= $this->input->post('aksi') ?>'
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
						change_url('<?= site_url($this->nama_controller)?>',{'year':'<?= $year ?>'});
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