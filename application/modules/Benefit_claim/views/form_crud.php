<style type="text/css">
	.margin-bottom-10{
		margin-bottom: 10px
	}
</style>
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

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="row margin-bottom-10">
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
								Date
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
								<?= date('d-m-Y') ?>
							</div>
						</div>
						<div class="row margin-bottom-10">
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
								Claim number
							</div>
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
								<?= $kode ?>
							</div>
						</div>
					</div>
					
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-bottom-10 text-center">
						<button id="show_benefit" type="button" class="btn btn-xs btn-info">hide/show benefit</button>
					</div>

					<?php if(count($list_benefit) > 0): ?>

					<div id="list_benefit" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-bottom-10" style="display: none">
						<div class="panel panel-default">
							<div class="panel-body">
						  		<?php foreach($list_benefit as $key => $value): ?>
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										<input type="checkbox" id="checkbox_benefit_<?= $key ?>" onclick="add_list(this.checked,'<?= $key ?>')" ><?= $value ?>
									</div>
								<?php endforeach ?>
						    </div>
						</div>
					</div>					

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-bottom-10">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
							<b>Benefit name</b>
						</div>
						<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
							<b>Nominal</b>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<b>File, <small>max: 500KB, jpg/png</small></b>
						</div>
					</div>

					<form id="form_ajax" enctype="multipart/form-data" >
						<div class="row margin-bottom-10" id="dynamic_benefit">
							
						</div>
					</form>

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<center>
							<button type="button" id="back" class="btn btn-sm">Back</button>
							<button type="button" id="simpan" class="btn btn-sm btn-primary">Save</button>
							<button type="button" id="confirm" class="btn btn-sm btn-success">Confirm</button>
							
							<br><small><i>Data can't be edited once confirmed</i></small>

						</center>
					</div>

					<?php else: ?>
						-no benefit, please contact admin-
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</section>


<script src="<?= base_url('shisan/plugins/lazzynumeric/autoNumeric.js')?>"></script>
<script src="<?= base_url('shisan/plugins/lazzynumeric/jquery.lazzynumeric.js')?>"></script>

<script type="text/javascript">

	$( document ).ready(
		function(){
			if('<?= $data ?>'  != ''){
				data = JSON.parse('<?= $data ?>');
				for(i = 0;i < data.length;i++){
					$('#checkbox_benefit_'+data[i].benClmDetEmpBenId).prop('checked', true);

					if(data[i].benClmDetFile != null){
						file = '<?= base_url()?>'+data[i].benClmPathFile+data[i].benClmDetFile;
					}else{
						file = null;
					}
					add_list(1,data[i].benClmDetEmpBenId,data[i].benClmNominal,file);
				}

			
			}		
		}
	);
	

	$('#show_benefit').click(
		function(){
			if($('#list_benefit').css('display') == 'block'){
				$('#list_benefit').hide();
			}else{
				$('#list_benefit').show();
			}

		}
	);

	$('#back').click(
		function(){
			change_url('<?= site_url('Benefit_claim')?>');
		}
	);



	$('#simpan').click(
		function (){
			simpan();
		}
	);

	$('#confirm').click(
		function (){
			simpan('confirm');
		}
	);

	function simpan(confirm = null){
		var form_data = new FormData($('form')[0]);
		$('.file').each(
			function(){
				files = this.files;
				if(files && files[0]){
					form_data.append('benefit_file['+this.id+']',this.files[0]);
				}
				
			}
		);

		if('<?= $data ?>'  != ''){
			data = JSON.parse('<?= $data ?>');
			benClmDetMasterId = data[0].benClmDetMasterId;
			form_data.append('benClmDetMasterId',benClmDetMasterId);
			form_data.append('aksi','edit');
		}

		if(confirm != null){
			form_data.append('confirm','1');
		}

		$.ajax(
			{
				url : '<?= site_url('Benefit_claim/simpan')?>',
				type: 'post',
				contentType: false,
				processData : false,
				data : form_data,
				success: function(result,status,xhr){
					hasil = JSON.parse(result);
					if(hasil.status == 'session_expired'){
						alert('Session expired');
						window.location.replace('<?= site_url('Login')?>');
					}else if(hasil.status == true){
						toastr['success']('Success');
						change_url('<?= site_url('Benefit_claim')?>');
					}else{
						toastr['warning'](hasil.message);						
					}
				},
				error : function(xhr,status,error)	{
					toastr['error'](error,status);	
				}
			}
		)
	}

	function add_list(status_cek,benefit_id,nominal = null,file=null){
		if(status_cek === false){
			$('#benefit_'+benefit_id).remove();
		}else{
			$.ajax(
				{
					url : '<?= site_url('Benefit_claim/add_list')?>',
					type: 'post',
					data : {
						'benefit_id' : benefit_id,
						'nominal' : nominal,
						'file' : file
					},
					success: function(result,status,xhr){
						hasil = JSON.parse(result);
						if(hasil.status == 'session_expired'){
							alert('Session expired');
							window.location.replace('<?= site_url('Login')?>');
						}else if(hasil.status == true){
							if(nominal == null){
								nominal  = hasil.current_balance;
							}

							if(file != null){
								string_file  = '<a href="'+file+'" target="_blank">file saved';
							}else{
								string_file = '<small>-no file saved-</small>';
							}

							$('#dynamic_benefit').append(
								'<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-bottom-10" id="benefit_'+hasil.benefit_id+'">'
								+'<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">'
									+hasil.benefit_name
									+'<br><small>'+hasil.current_balance+'</small>'
								+'</div>'
								+'<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">'
									+'<input type="text" name="nominal['+hasil.benefit_id+']" id="nominal_'+hasil.benefit_id+'"  class="form-control" value="'+nominal+'">'
								+'</div>'
								+'<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">'
									+'<input type="file" id="'+hasil.benefit_id+'" name="file['+hasil.benefit_id+']" class="file" >'
									+string_file
								+'</div>'
								+'<div>'
								+'<input type="hidden" name="benefit_name['+hasil.benefit_id+']" value="'+hasil.benefit_name+'">'
							);
							$('#nominal_'+hasil.benefit_id).lazzynumeric({aSep: ".", aDec: ","});
						}else{
							toastr['warning'](hasil.message);						
						}
					},
					error : function(xhr,status,error)	{
						toastr['error'](error,status);		
					}
				}
			)
		}		
	}


</script>