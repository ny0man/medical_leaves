<section class="content">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title"><?= $this->nama_menu ?></h3>
					<div class="pull-right">
						<button onclick="change_url('<?= site_url($this->nama_controller.'/form_crud')?>',{'aksi':'add'})" title="add data" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add data</button>
					</div>
				</div>					
				<div class="box-body">
					<?php if(count($data) > 0): ?>
						<table id="datatable" class="table table-hover table-condensed">
							<thead>
								<tr>
									<th width="66px">Aksi</th>                    
									<th>Claim number</th>
									<th>Status</th>
									<th>Approval note</th>                                    
								</tr>
							</thead>
							<tbody>
							<?php foreach($data as $key => $value): ?>
								<?php
									if($value['benClmCancel'] == '1'){
										$approval_status = '<label style="color:red">Canceled</label>';
									}elseif($value['benClmSubmitStatus'] == '0'){
										$approval_status = '<label style="color:grey">Waiting user confirmation</label>';
									}elseif($value['benClmApproveStatus'] == null){
										$approval_status = '<label style="color:grey">Waiting approval</label>';
									}else if($value['benClmApproveStatus'] == 0){
										$approval_status = '<label style="color:red">Rejected</label>';
									}else if($value['benClmApproveStatus'] == 1){
										$approval_status = '<label style="color:blue">Approved</label>';
									}
								?>

								<tr>
									<td>
										<?php if($value['benClmCancel'] == '1'):?>
											
										<?php elseif($value['benClmSubmitStatus'] == '1'): ?>
											
										<?php else: ?>	
											<button onclick="change_url('<?= site_url($this->nama_controller.'/form_crud')?>',{'aksi':'edit','id':'<?= $value[$this->primary_tabel] ?>'})" title="Edit data" class="btn btn-xs btn-primary fa fa-edit"></button>
											<button title="Cancel" class="btn btn-xs btn-danger fa fa-times"
											onclick="confirm_delete('<?= $value['benClmKode'] ?>','<?= site_url($this->nama_controller.'/delete')?>','<?= $value[$this->primary_tabel] ?>')"></button>
										<?php endif ?>

										<button onclick="change_url('<?= site_url($this->nama_controller.'/detail')?>',{'aksi':'detail','id':'<?= $value[$this->primary_tabel] ?>'})" title="Detail data" class="btn btn-xs btn-info fa fa-info"></button>
										
									</td>                    
									<td><?= $value['benClmKode'] ?></td> 
									<td><?= $approval_status ?></td> 
									<td><?= $value['benClmApproveNote'] ?></td> 
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