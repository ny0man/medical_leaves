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
						<table id="" class="table table-hover table-bordered table-striped table-condensed">
							<thead>
								<tr>
									<th width="66px" rowspan="2">Aksi</th>                    
									<th rowspan="2">Type</th>
									<th colspan="2" class="hidden-xs text-center">Date</th>
									<th rowspan="2">Confirmed</th>
									<th rowspan="2">Approved</th>
								</tr>
								<tr>
									<th class="hidden-xs">Start</th>
									<th class="hidden-xs">End</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach($data as $key => $value): ?>
								<tr>
									<td>
										<?php
											if($value['lvreqSubmitStatus'] == 0){
										?>
										<button onclick="change_url('<?= site_url($this->nama_controller.'/form_crud')?>',{'aksi':'edit','id':'<?= $value[$this->primary_tabel] ?>'})" title="Edit data" class="btn btn-xs btn-primary fa fa-edit"></button>
										<button title="Delete data" class="btn btn-xs btn-danger fa fa-trash-o"
										onclick="confirm_delete('<?= $value['lvreqLvNama'] ?>','<?= site_url($this->nama_controller.'/delete')?>','<?= $value[$this->primary_tabel] ?>')"></button>
										<?php
											}
										?>
									</td>                    
									<td><?= $value['lvreqLvNama'] ?></td> 
									<td class="hidden-xs"><?= date('d M Y', strtotime($value['lvreqTanggalAwal'])) ?></td> 
									<td class="hidden-xs"><?= date('d M Y', strtotime($value['lvreqTanggalAkhir'])) ?></td> 
									<td><?= ($value['lvreqSubmitStatus'] == 1 ? 'Yes' : 'No') ?></td> 
									<td><?= ($value['lvreqApproveStatus'] == 0 ? 'Not Yet' : ($value['lvreqApproveStatus'] == 1 ? 'Approved' : 'Rejected')) ?></td> 
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