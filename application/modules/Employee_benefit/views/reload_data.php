<?php if(count($data) > 0): ?>
	<table id="datatable" class="table table-hover table-condensed">
		<thead>
			<tr>
				<th width="66px">Action</th>                    
				<th>Employee number</th>
				<th>Employee name</th>
				<th>Total benefit</th>                                    
			</tr>
		</thead>
		<tbody>
		<?php foreach($data as $key => $value): ?>
			<tr>
				<td>
					<button onclick="change_url('<?= site_url($this->nama_controller.'/form_crud')?>',{'aksi':'edit','id':'<?= $value['empId'] ?>','year':'<?= $value['outBenStart']?>'})" title="Edit data" class="btn btn-xs btn-primary fa fa-edit"></button>
				</td>                    
				<td><?= $value['empNoFormatted'] ?></td>
				<td><?= $value['empNama'] ?></td>
				<td><?= number_format($value['empBenNominal'],0,",",".") ?></td> 
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
<?php else: ?>
	<i> - Data tidak ditemukan - </i>
<?php endif ?>

<script type="text/javascript">
	FormatTabel();
</script>