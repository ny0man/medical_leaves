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
									<th width="66px" rowspan="2">Aksi</th>                    
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
									<td>
										<button onclick="change_url('<?= site_url($this->nama_controller.'/form_crud')?>',{'aksi':'edit','id':'<?= $value[$this->primary_tabel] ?>'})" title="Edit data" class="btn btn-xs btn-primary fa fa-edit"></button>
										<button title="Delete data" class="btn btn-xs btn-danger fa fa-trash-o"
										onclick="confirm_delete('<?= $value['lvTypNama'] ?>','<?= site_url($this->nama_controller.'/delete')?>','<?= $value[$this->primary_tabel] ?>')"></button>
									</td>                    
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
					<?php else: ?>
						<i> - Data tidak ditemukan - </i>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</section>