<link rel="stylesheet" href="<?= base_url('shisan/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')?>">
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
					<form id="form_ajax">
					<div class="row" style="margin-bottom: 10px">
						<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
							Leaves Periode
						</div>
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" id="tanggal_awal" name="tanggal_awal" class="form-control pull-right datepicker checkTanggal" value="<?php 
									echo isset($tanggalAwal) ? date('d M Y', strtotime($tanggalAwal)) : '';
								?>">
							</div>
						</div>
						<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12 text-center">
							until
						</div>
						<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" id="tanggal_akhir" name="tanggal_akhir" class="form-control pull-left datepicker checkTanggal" value="<?php 
									echo isset($tanggalAkhir) ? date('d M Y', strtotime($tanggalAkhir)) : '';
								?>">
							</div>
						</div>
					</div>
					<div class="row" style="margin-bottom: 10px">
						<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
							Employee No
						</div>
						<div class="col-lg-7 col-md-7 col-sm-9 col-xs-12">
							<?php 
							$paramFormInput = array(
								'name'        => 'empNo',
								'id'          => 'empNo',
								'value'       => (isset($empNo))?$empNo:null,					
								'class'			=> 'form-control',
								'style'         => ''
							);
							
							echo form_input($paramFormInput);
							?>
						</div>
					</div>
					<div class="row" style="margin-bottom: 10px">
						<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
							Employee
						</div>
						<div class="col-lg-7 col-md-7 col-sm-9 col-xs-12">
							<?php 
							$paramFormInput = array(
								'name'        => 'empNama',
								'id'          => 'empNama',
								'value'       => (isset($empNama))?$empNama:null,					
								'class'			=> 'form-control',
								'style'         => ''
							);
							
							echo form_input($paramFormInput);
							?>
						</div>
					</div>
					
					<div class="row" style="margin-bottom: 10px">
						<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
							<center>
								<button type="button" id="showReport" class="btn btn-sm btn-primary">Show</button>
							</center>
						</div>
					</div>
					</form>
					
					<?php if(count($data) > 0): ?>
						<table id="" class="table table-hover table-bordered table-striped table-condensed">
							<thead>
								<tr>
									<th colspan="2" class="hidden-xs text-center">Location</th>
									<th rowspan="2">Emp No</th>
									<th rowspan="2" class="hidden-xs">Name</th>
									<th rowspan="2">Type</th>
									<th rowspan="2" class="hidden-xs">Joined Date</th>
									<th rowspan="2">YOS</th>
									<th rowspan="2">Ending Max</th>
									<th rowspan="2">Beginning</th>
									<th rowspan="2">Plus</th>
									<th rowspan="2">Minus</th>
									<th rowspan="2">Ending</th>
								</tr>
								<tr>
									<th class="hidden-xs">Code</th>
									<th class="hidden-xs">Name</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach($data as $key => $value): ?>
								<tr>                  
									<td class="hidden-xs"><?= $value['officeLocKode'] ?></td> 
									<td class="hidden-xs"><?= $value['officeLocNama'] ?></td> 
									<td><?= $value['empNoFormatted'] ?></td> 
									<td class="hidden-xs"><?= $value['empNama'] ?></td> 
									<td><?= $value['lvreqLvNama'] ?></td>
									<td class="hidden-xs"><?= date('d M Y', strtotime($value['empJoinedDate'])) ?></td>
									<td><?= $value['YOS'] ?></td>
									<td><?= $value['empLvMaxPerYearInitial'] ?></td>
									<td><?= $value['balance_start'] ?></td>
									<td><?= ($value['jumlah'] < 0) ? ($value['jumlah'] * -1) : '' ?></td>
									<td><?= ($value['jumlah'] > 0) ? $value['jumlah'] : '' ?></td>
									<td><?= $value['balance_end'] ?></td>
								</tr>
							<?php endforeach ?>
							</tbody>
						</table>
					<?php else: ?>
						<i> - Data tidak ditemukan - </i>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</section>

<script src="<?= base_url('shisan/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>
<script>
    $('.datepicker').datepicker({
    	autoclose: true,
    	format: 'dd M yyyy',
    	orientation : 'bottom'
    });
	
	$('#showReport').click(
		function(){
			showReport();	
		}		
	);

	function showReport(lock){
		var parameter = {
			'aksi':'<?= $this->input->post('aksi') ?>',
			'id' :'<?= $this->input->post('id') ?>'
		};
		$.ajax(
			{
				url : '<?= site_url($this->nama_controller)?>',
				type: 'post',
				data : $('#form_ajax').serialize()+ '&' + $.param(parameter),
				beforeSend : function( xhr ){

				},
				success: function(result,status,xhr){
					$('#content_ajax').html(result);
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