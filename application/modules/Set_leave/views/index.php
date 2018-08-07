<section class="content">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Set leave</h3>
				</div>					
				<div class="box-body" id="sub-content">
					
					<?php if(count($data) > 0): ?>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					Total active employe to be set : <b><?= number_format(count($employee),0,",",".") ?></b> employees.
						</div>
					</div>
					
					<div class="row" style="margin-top: 20px">
						<div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
							Year
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
						<?php
							$options = $tahun_leave;
							$optionsSelected = (isset($tahun_leave_selected))?$tahun_leave_selected:null;
							$extra = array(
								'id' => 'tahun_leave',
								'class' => 'form-control',
								'required' => 'required'
							);
							echo form_dropdown('tahun_leave_selected', $options, $optionsSelected,$extra);
						?>
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<b>Leave type list</b>
					<br><br>
					<table class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th width="66px" rowspan="2">No</th>                    
								<th rowspan="2">Nama</th>
								<th rowspan="2">LSA Min</th>
								<th rowspan="2">Gender</th>
								<th rowspan="2">Day Type</th>
								<th colspan="2" class="text-center">Days</th>
							</tr>
							<tr>
								<th>Per Year</th>
								<th>Per Month</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach($data as $key => $value): ?>
							<tr>
								<td><?= $value['num'] ?></td> 
								<td><?= $value['lvTypNama'] ?></td> 
								<td><?= $value['lvMinLSA'] ?></td> 
								<td><?= $value['lvGender'] ?></td> 
								<td><?= $value['lvDayType'] ?></td> 
								<td><?= $value['lvMaxPerYear'] ?></td> 
								<td><?= $value['lvMaxPerMonth'] ?></td> 
							</tr>
						<?php endforeach ?>
						</tbody>
					</table>
						</div>
					</div>
					<div class="row" style="margin-top: 20px">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<center>
								<button type="button" id="save_leave" class="btn btn-primary">Save</button>
							</center>
						</div>
					</div>

					<?php else: ?>
						<i> - Data tidak ditemukan - </i>
					<?php endif ?>
					
				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	$('#save_leave').click(
		function(){
			save_leave();
		}
	);

	function save_leave(){
		var val = parseInt($('#tahun_leave').val());
		if(isNaN(val)){
			alert('Please select year');
			$('#tahun_leave').focus();
		}else{
			$.ajax(
				{
					url : '<?= site_url('Set_leave/save_leave')?>',
					type: 'post',
					data : {'year_selected':val},
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
							change_url('<?= site_url('Set_leave')?>');
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
	}
</script>