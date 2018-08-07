<section class="content">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title"><?= $this->nama_menu ?></h3>
					<div class="pull-right">
						
					</div>
				</div>					
				<div class="box-body">
					<div class="row" style="margin-bottom: 20px">
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<?php
								$options = $tahun_benefit;
								$optionsSelected = (isset($_SESSION['Medical_approval']['filter']['tahun_benefit_selected']))?$_SESSION['Medical_approval']['filter']['tahun_benefit_selected']:null;
								$extra = array(
									'id' => 'tahun_benefit',
									'class' => 'form-control'
								);
								echo form_dropdown('tahun_benefit_selected', $options, $optionsSelected,$extra);
							?>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<?php
								$options = $list_office;
								$optionsSelected = (isset($_SESSION['Medical_approval']['filter']['empOfficeId']))?$_SESSION['Medical_approval']['filter']['empOfficeId']:null;
								$extra = array(
									'class' => 'form-control',
									'id' => 'empOfficeId'
								);
								echo form_dropdown('empOfficeId', $options, $optionsSelected,$extra);
							?>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<?php
								$options = array();
								$options[''] = 'Choose approval status';
								$options['all'] = 'All status';
								$options['null'] = 'Waiting approval';
								$options['0'] = 'Rejected';
								$options['1'] = 'Approved';

								$optionsSelected = (isset($_SESSION['Medical_approval']['filter']['benClmApproveStatus']))?$_SESSION['Medical_approval']['filter']['benClmApproveStatus']:null;
								$extra = array(
									'id' => 'benClmApproveStatus',
									'class' => 'form-control',
								);
								echo form_dropdown('benClmApproveStatus', $options, $optionsSelected,$extra);
							?>
						</div>
					</div>

					<div id="subcontent">
					</div>
					
				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">

	reload_data();

	$('#tahun_benefit').change(
		function(){
			reload_data();
		}
	);

	$('#empOfficeId').change(
		function(){
			reload_data();
		}
	);

	$('#benClmApproveStatus').change(
		function(){
			reload_data();
		}
	);

function reload_data(){
	$.ajax(
		{
			url : '<?= site_url('Medical_approval/reload_data')?>',
			type: 'post',
			data : {
				'tahun_benefit_selected' : $('#tahun_benefit').val(),
				'empOfficeId' : $('#empOfficeId').val(),
				'benClmApproveStatus' : $('#benClmApproveStatus').val(),
			},
			success: function(result,status,xhr){
				$('#subcontent').html(result);
			},
			error : function(xhr,status,error)	{
				toastr['error'](status,error);
			}
		}
	)	
}

</script>