<section class="content">
	<div class="row">
		<form id="form_ajax">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><?= $this->nama_menu ?><small> - <?= ucfirst($this->input->post('aksi')) ?></small></h3>
					</div>					
					<div class="box-body">
						<?php if(isset($group_akses) && !empty($group_akses)): ?>
							<?php foreach($group_akses as $menu_nama => $value_group_akses): ?>
								<div class="col-md-6">
									<div class="panel panel-default">
										<div class="panel-heading"><b>
											<input type="checkbox" onclick="centangSemua(this.checked,'centang_<?=(str_replace(" ", "_", $menu_nama ))?>')">&nbsp;<?=$menu_nama?>
											</b>
										</div>
										<div class="panel-body">
										<?php 
											foreach($value_group_akses as $sub_menu_id => $sub_menu_nama){
												$paramCekBox = array(
												    'name'          => 'sub_menu_centang[]',
												    'class'	=> 'centang_'.(str_replace(" ", "_", $menu_nama)),
												    'value'         => $sub_menu_id,
												    'checked'       => (isset($sub_menu_centang[$sub_menu_id]) && $sub_menu_centang[$sub_menu_id] == '1')?TRUE:FALSE,
												    'style'         => ''
												);
											echo form_checkbox($paramCekBox).'&nbsp;'.$sub_menu_nama.'<br/>';
											} 
										?>
										</div>
									</div>
								</div>
							<?php endforeach ?>	
						<?php else : ?>
							<i> - Data tidak ditemukan - </i>
						<?php endif ?>
						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<center>
									<button type="button" class="btn btn-sm" onclick="change_url('<?= site_url($this->nama_controller)?>')">Back</button>
									<button type="button" id="simpan" class="btn btn-sm btn-primary">Save</button>
								</center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>


<script type="text/javascript">
	centangSemua = function(statusCentang,classCentang){
		$("."+classCentang).prop('checked', statusCentang);
	}

	$('#simpan').click(
		function(){
			simpan();	
		}		
	);

	function simpan(){
		var parameter = {
			'aksi':'<?= $this->input->post('aksi') ?>',
			'id' :'<?= $this->input->post('id') ?>'
		};
		$.ajax(
			{
				url : '<?= site_url($this->nama_controller.'/simpan_group_akses')?>',
				type: 'post',
				data : $('#form_ajax').serialize()+ '&' + $.param(parameter),
				beforeSend : function( xhr ){

				},
				success: function(result,status,xhr){
					hasil = JSON.parse(result);
					if(hasil.status == 'session_expired'){
						alert('Session expired');
						window.location.replace('<?= site_url('login')?>');
					}else if(hasil.status == true){
						toastr.clear();
						toastr['info']('Silahkan refresh halaman untuk menerapkan pereditan');
						toastr['success'](hasil.message);
						change_url('<?= site_url($this->nama_controller)?>');
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