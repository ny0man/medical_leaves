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

						<ul class="nav nav-tabs" style="margin-bottom: 20px">
							<li class="active"><a data-toggle="tab" href="#data_pegawai">Employee</a></li>
							<?php if(count($staff_relation) > 0): ?>
								<?php foreach($staff_relation as $key => $value): ?>
									<li><a data-toggle="tab" href="#relation<?=$key?>"><?= $value['staffRelNama'] ?></a></li>
								<?php endforeach ?>
							<?php else: ?>
							
							<?php endif ?>
						</ul>


						<div class="tab-content">
						    <div id="data_pegawai" class="tab-pane fade in active">
						        <?php if($this->input->post('aksi') != 'edit'): ?>
						        	<div class="row" style="margin-bottom: 10px">
										<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
											Email (username)
										</div>
										<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
											<?php 
											$paramFormInput = array(
												'name'        => 'empEmail',
												'id'          => 'empEmail',
												'value'       => (isset($empEmail))?$empEmail:null,					
												'class'			=> 'form-control',
												'style'         => 'width:50%',
												'placeholder'	=> 'email will be used as employee\'s username'
											);
											
											echo form_input($paramFormInput);
											?>
										</div>
									</div>
								<?php endif ?>					        						

								<div class="row" style="margin-bottom: 10px">
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
										Employee no
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
										

										<?php 
										$paramFormInput = array(
											'name'        => 'empNo',
											'id'          => 'empNo',
											'value'       => (isset($empNo))?$empNo:null,					
											'class'			=> 'form-control',
											'style'         => '',
											'placeholder'	=> '',
										);

										if($this->input->post('aksi') == 'edit'){
											$paramFormInput['disabled'] = 'disabled';
										}
										
										echo form_input($paramFormInput);
										?>
									</div>
									<div class="col-lg-1 col-md-1 col-sm-2 col-xs-2" style="padding-right: 0px">
										*Eno :
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="padding-left: 0px">
										<label id="no_pegawai_formatted"><?= isset($empNoFormatted)?$empNoFormatted:'' ?></label>
									</div>
								</div>

								<div class="row" style="margin-bottom: 10px">
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
										Name
									</div>
									<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
										<?php 
										$paramFormInput = array(
											'name'        => 'empNama',
											'id'          => 'empNama',
											'value'       => (isset($empNama))?$empNama:null,					
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
										Birthday
									</div>
									<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
										<div class="input-group date">
						                	<div class="input-group-addon">
						                    	<i class="fa fa-calendar"></i>
						                    </div>
						                    <input type="text" name="empBirthday" class="form-control pull-right tanggal_lahir" id="empBirthday" value="<?=(isset($empBirthday))?$empBirthday:null?>">
						                </div>
										
									</div>
								</div>

								<div class="row" style="margin-bottom: 10px">
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
										Join Date
									</div>
									<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
										<div class="input-group date">
						                	<div class="input-group-addon">
						                    	<i class="fa fa-calendar"></i>
						                    </div>
						                    <input type="text" name="empJoinedDate" class="form-control pull-right" id="datepicker" value="<?=(isset($empJoinedDate))?$empJoinedDate:null?>">
						                </div>
										
									</div>
								</div>

								

								<div class="row" style="margin-bottom: 10px">
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
										Location
									</div>
									<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
										<?php
											$options = $list_office;
											$optionsSelected = (isset($empOfficeId))?$empOfficeId:null;
											$extra = array(
												'class' => 'form-control'
											);
											echo form_dropdown('empOfficeId', $options, $optionsSelected,$extra);
										?>
									</div>
								</div>

								<div class="row" style="margin-bottom: 10px">
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
										Marital status
									</div>
									<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
										<?php
											$options = $marriage_status;
											$optionsSelected = (isset($empMrgSt))?$empMrgSt:null;
											$extra = array(
												'class' => 'form-control'
											);
											echo form_dropdown('empMrgSt', $options, $optionsSelected,$extra);
										?>
									</div>
								</div>

								<div class="row" style="margin-bottom: 10px">
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
										Employee status
									</div>
									<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
										<?php
											$options = $job_status;
											$optionsSelected = (isset($empJobStId))?$empJobStId:1;
											$extra = array(
												'class' => 'form-control',
												'id' => 'empJobStId'
											);
											echo form_dropdown('empJobStId', $options, $optionsSelected,$extra);
										?>
									</div>
								</div>

								<div class="row" id="div_empPeriod" style="margin-bottom: 10px;display: none">
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
										LSA period
									</div>
									<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
										<?php 
											$paramFormInput = array(
												'name'        => 'empPeriod',
												'id'          => 'empPeriod',
												'value'       => (isset($empPeriod))?$empPeriod:null,					
												'class'			=> 'form-control',
										        'style'         => 'width:60%',
										        'placeholder'	=> 'diisi dengan angka dalam satuan bulan. misal diisi angka 6 atau 12'
											);
										
											echo form_input($paramFormInput);
										?> 
									</div>
								</div>

								<div class="row" style="margin-bottom: 10px">
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
										Sex
									</div>
									<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
										<?php
											$options = array(
												'M' => 'Male',
												'F' => 'Female',
											);
											$optionsSelected = (isset($empGender))?$empGender:null;
											$extra = array(
												'class' => 'form-control'
											);
											echo form_dropdown('empGender', $options, $optionsSelected,$extra);
										?>
									</div>
								</div>

								<div class="row" style="margin-bottom: 10px">
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
										Record status
									</div>
									<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
										<?php
											$options = array(
												'0' => 'Inactive',
												'1' => 'Active',
											);
											$optionsSelected = (isset($empStatus))?$empStatus:1;
											$extra = array(
												'class' => 'form-control'
											);
											echo form_dropdown('empStatus', $options, $optionsSelected,$extra);
										?>
									</div>
								</div>						
						    </div>

						    <?php if(count($staff_relation) > 0): ?>
						    	<?php foreach($staff_relation as $key => $value): ?>
						    		<div id="relation<?=$key?>" class="tab-pane fade">
								        <div class="row" style="margin-bottom: 10px">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
												Name
											</div>
											<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
												<?php 
													$paramFormInput = array(
														'name'        => 'empDetNama['.$value['staffRelId'].']',
														'id'          => 'empDetNama['.$value['staffRelId'].']',
														'value'       => (isset($empDetNama[$value['staffRelId']]))?$empDetNama[$value['staffRelId']]:null,					
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
												Sub Eno
											</div>
											<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
												<label class="suffix_no_pegawai"><?= (isset($empNo)?$empNo:'') ?></label>.<?= $value['staffRelEmpSubNo'] ?>
												<input type="hidden" name="staffRelEmpSubNo[<?= $value['staffRelId']?>] " value="<?= $value['staffRelEmpSubNo'] ?>">
											</div>
										</div>

										<div class="row" style="margin-bottom: 10px">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
												Birthday
											</div>
											<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
												<div class="input-group date">
								                	<div class="input-group-addon">
								                    	<i class="fa fa-calendar"></i>
								                    </div>
								                    <input type="text" name="empDetBirthDate[<?= $value['staffRelId'] ?>]" class="form-control pull-right tanggal_lahir" value="<?=(isset($empDetBirthDate[$value['staffRelId']]))?$empDetBirthDate[$value['staffRelId']]:null?>">
								                </div>
												
											</div>
										</div>

										<div class="row" style="margin-bottom: 10px">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
												Sex
											</div>
											<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
												<?php
													$options = array(
														'M' => 'Male',
														'F' => 'Female',
													);
													$optionsSelected = (isset($empDetGender[$value['staffRelId']]))?$empDetGender[$value['staffRelId']]:null;
													$extra = array(
														'class' => 'form-control'
													);
													echo form_dropdown('empDetGender['.$value['staffRelId'].']', $options, $optionsSelected,$extra);
												?>
											</div>
										</div>

										<div class="row" style="margin-bottom: 10px">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
												Marital status
											</div>
											<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
												<?php
													$options = $marriage_status;
													$optionsSelected = (isset($empDetMrgSt[$value['staffRelId']]))?$empDetMrgSt[$value['staffRelId']]:null;
													$extra = array(
														'class' => 'form-control'
													);
													echo form_dropdown('empDetMrgSt['.$value['staffRelId'].']', $options, $optionsSelected,$extra);
												?>
											</div>
										</div>

										<div class="row" style="margin-bottom: 10px">
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
												Record status
											</div>
											<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
												<?php
													$options = array(
														'1' => 'Active',
														'0' => 'Inactive',
													);
													$optionsSelected = (isset($empDetStatus[$value['staffRelId']]))?$empDetStatus[$value['staffRelId']]:0;
													$extra = array(
														'class' => 'form-control'
													);
													echo form_dropdown('empDetStatus['.$value['staffRelId'].']', $options, $optionsSelected,$extra);
												?>
											</div>
										</div>

								    </div>
						    	<?php endforeach ?>
						    <?php else: ?>
						    
						    <?php endif ?>

						    
						    
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
<script src="<?= base_url('shisan/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>
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

    $('.tanggal_lahir').datepicker({
    	autoclose: true,
    	format: 'dd M yyyy',
    	orientation : 'bottom'
    });


	
	$('.money').lazzynumeric({aSep: ".", aDec: ","});

	$('#simpan').click(
		function(){
			simpan();	
		}		
	);

	$('#empNo').keyup(
		function(){
			$('.suffix_no_pegawai').each(
				function(){
					$(this).html($('#empNo').val());
				}
			);	

			$('#no_pegawai_formatted').html('00'+$('#empNo').val());	
		}
	);

	$('#empJobStId').change(
		function(){
			if($('#empJobStId').val() == '2'){
				$('#div_empPeriod').show();
			}else{
				$('#div_empPeriod').hide();
			}
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