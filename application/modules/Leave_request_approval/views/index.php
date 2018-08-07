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
					<?php if(count($data) > 0): ?>
						<table id="" class="table table-hover table-bordered table-striped table-condensed">
							<thead>
								<tr>
									<th width="100px" rowspan="2">Aksi</th>                    
									<th rowspan="2">Emp No</th>
									<th rowspan="2" class="hidden-xs">Name</th>
									<th rowspan="2">Type</th>
									<th colspan="2" class="hidden-xs text-center">Date</th>
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
											if($value['lvreqApproveStatus'] == 0){
										?>
										<button onclick="change_url('<?= site_url($this->nama_controller.'/form_crud')?>',{'aksi':'edit','id':'<?= $value[$this->primary_tabel] ?>'})" title="Edit data" class="btn btn-sm btn-primary fa fa-edit"></button>
										<?php
											}
										?>
										<button onclick="change_url('<?= site_url($this->nama_controller.'/form_detail')?>',{'aksi':'edit','id':'<?= $value[$this->primary_tabel] ?>'})" title="Detail data" class="btn btn-sm btn-default fa fa-file"></button>
									</td>                    
									<td><?= $value['empNoFormatted'] ?></td> 
									<td class="hidden-xs"><?= $value['empNama'] ?></td> 
									<td><?= $value['lvreqLvNama'] ?></td> 
									<td class="hidden-xs"><?= date('d M Y', strtotime($value['lvreqTanggalAwal'])) ?></td> 
									<td class="hidden-xs"><?= date('d M Y', strtotime($value['lvreqTanggalAkhir'])) ?></td>
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