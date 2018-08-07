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
						<table id="datatable" class="table table-hover table-condensed" >
							<thead>
								<tr>
									<th width="66px">Aksi</th>                    
									<th>Job status</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach($data as $key => $value): ?>
								<?php 
									if($value['jobStatusId'] == '1' || $value['jobStatusId'] == '2'){
										$style_button = 'display:none';
									}else{
										$style_button = '';
									}
								?>
								<tr>
									<td>
										<button onclick="change_url('<?= site_url($this->nama_controller.'/form_crud')?>',{'aksi':'edit','id':'<?= $value[$this->primary_tabel] ?>'})" title="Edit data" class="btn btn-xs btn-primary fa fa-edit"></button>
										<button style="<?= $style_button ?>" title="Delete data" class="btn btn-xs btn-danger fa fa-trash-o"
										onclick="confirm_delete('<?= $value['jobStatusNama'] ?>','<?= site_url($this->nama_controller.'/delete')?>','<?= $value[$this->primary_tabel] ?>')"></button>
									</td>                    
									<td><?= $value['jobStatusNama'] ?></td> 
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