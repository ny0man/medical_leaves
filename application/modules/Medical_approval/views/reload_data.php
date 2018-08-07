<?php if(count($data) > 0): ?>
	<table id="datatable" class="table table-hover table-condensed">
		<thead>
			<tr>
				<th width="66px">Action</th>                    
				<th>Claim code</th>									
				<th>Employee Number</th>
				<th>Name</th>
				<th>Status</th>                                    
			</tr>
		</thead>
		<tbody>
		<?php foreach($data as $key => $value): ?>
			<?php 
				$button_show = '0';
				if($value['benClmApproveStatus'] == '1'){
					$approval_status = '<label class="btn btn-primary btn-xs">Approved</button>';
				}elseif($value['benClmApproveStatus'] == '0'){
					$approval_status = '<label class="btn btn-danger btn-xs">Rejected</button>';
				}else{
					$button_show = '1';
					$approval_status = '<label class="btn btn-warning btn-xs">Waiting approval</button>';
				}
			?>
			

			<tr>
				<td>
					
					<button onclick="change_url('<?= site_url($this->nama_controller.'/form_crud')?>',{'aksi':'edit','id':'<?= $value[$this->primary_tabel] ?>'})" title="Approve data" class="btn btn-xs btn-primary fa fa fa-thumbs-o-up"></button>
					
				</td>                
				<td><?= $value['benClmKode'] ?></td>   
				<td><?= $value['empNoFormatted'] ?></td>   
				<td><?= $value['empNama'] ?></td>
				<td><?= $approval_status ?></td>
				
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
<?php else: ?>
	<i> - Data tidak ditemukan - </i>
<?php endif ?>