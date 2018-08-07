<section class="content">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Set Benefit</h3>
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
	$('#tahun_benefit').change(
		function(){
			reload_benefit();
		}
	);

	function reload_benefit(){
		$.ajax(
			{
				url : '<?= site_url('Set_benefit/reload_benefit')?>',
				type: 'post',
				data : {'year_selected':$('#tahun_benefit').val()},
				beforeSend : function( xhr ){
					toastr['info']('Loading data');
					toastr.clear();
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