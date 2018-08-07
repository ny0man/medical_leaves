<section class="content">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title"><?= $this->nama_menu ?></h3>
					<div class="pull-right">
						<?php
							$options = $tahun_benefit;
							$optionsSelected = (isset($tahun_benefit_selected))?$tahun_benefit_selected:null;
							$extra = array(
								'id' => 'tahun_benefit',
								'class' => 'form-control'
							);
							echo form_dropdown('tahun_benefit_selected', $options, $optionsSelected,$extra);
						?>
					</div>
				</div>					
				<div class="box-body" id="sub-content">
					
				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	if('<?= $year_selected ?>' != ''){
		$('#tahun_benefit').val('<?= $year_selected ?>');
		reload_data();
	}


	$('#tahun_benefit').change(
		function(){
			reload_data();
		}
	);

	function reload_data(){
		$.ajax(
			{
				url : '<?= site_url('Employee_benefit/reload_data')?>',
				type: 'post',
				data : {'year_selected':$('#tahun_benefit').val()},
				beforeSend : function( xhr ){
					
				},
				success: function(result,status,xhr){
					$('#sub-content').html(result);
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