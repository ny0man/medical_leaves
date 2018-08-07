<?php if(count($outpatient_leave) > 0): ?>
	Total active employe to be set : <b><?= number_format(count($employee),0,",",".") ?></b> employees.
	<br><br>
	
	<b>Leave type list</b>
	<br><br>


	<table id="datatable" class="table table-hover table-condensed">
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
		<?php foreach($outpatient_leave as $key => $value): ?>
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

	<div class="row" style="margin-top: 20px">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<center>
				<button type="button" id="save_leave" class="btn btn-primary">Save</button>
			</center>
		</div>
	</div>

<?php else: ?>
	<i>- No data -</i>
<?php endif ?>

<script type="text/javascript">
	$('#save_leave').click(
		function(){
			save_leave();
		}
	);

	function save_leave(){
		$.ajax(
			{
				url : '<?= site_url('Set_leave/save_leave')?>',
				type: 'post',
				data : {'year_selected':$('#tahun_leave').val()},
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
</script>