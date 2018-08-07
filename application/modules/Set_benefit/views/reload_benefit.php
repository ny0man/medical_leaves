<?php if(count($outpatient_benefit) > 0): ?>
	Total active employe to be set : <b><?= number_format(count($employee),0,",",".") ?></b> employees.
	<br><br>
	
	<b>Benefit list</b>
	<br><br>


	<div class="row margin-bottom-10">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
			<u>Benefit name</u>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
			<u>Nominal</u> 
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
			<u>Period</u> 
		</div>
	</div>
	<?php foreach($outpatient_benefit as $key => $value): ?>
		<div class="row margin-bottom-10">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				<?= $value['outBenNama'] ?> 
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				<?= number_format($value['outBenNominal'],0,",",".") ?> 
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				<?= date("d M Y", strtotime($value['outBenStart'])) ?>  - <?= date("d M Y", strtotime($value['outBenEnd'])) ?> 
			</div>
		</div>
	<?php endforeach ?>

	<div class="row" style="margin-top: 20px">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<center>
				<button type="button" id="save_benefit" class="btn btn-primary">Save</button>
			</center>
		</div>
	</div>

<?php else: ?>
	<i>- No data -</i>
<?php endif ?>

<script type="text/javascript">
	$('#save_benefit').click(
		function(){
			save_benefit();
		}
	);

	function save_benefit(){
		$.ajax(
			{
				url : '<?= site_url('Set_benefit/save_benefit')?>',
				type: 'post',
				data : {'year_selected':$('#tahun_benefit').val()},
				beforeSend : function( xhr ){
					toastr['info']('Please wait');
					toastr.clear();
				},
				success: function(result,status,xhr){
					hasil = JSON.parse(result);
					if(hasil.status == 'session_expired'){
						alert('Session expired');
						window.location.replace('<?= site_url('home')?>');
					}else if(hasil.status == true){
						toastr['success'](hasil.message);
						change_url('<?= site_url('Set_benefit')?>');
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