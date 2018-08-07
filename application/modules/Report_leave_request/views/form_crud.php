<link rel="stylesheet" href="<?= base_url('shisan/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')?>">
<section class="content">
	<div class="row">
		<form id="form_ajax">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><?= $this->nama_menu ?><small> - <?= ucfirst($this->input->post('aksi')) ?></small></h3>
					</div>					
					<div class="box-body">
						<!-- info -->
						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								Employee No
							</div>
							<div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
								<?= isset($empNoFormatted) ? $empNoFormatted : ''; ?>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								Date
							</div>
							<div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
								<?= isset($lvreqTanggalPengajuan) ? date('d M Y', strtotime($lvreqTanggalPengajuan)) : ''; ?>
							</div>
						</div>
						
						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								Name
							</div>
							<div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
								<?= isset($empNama) ? $empNama : ''; ?>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								Position
							</div>
							<div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
								<?= isset($xxx) ? $xxx : ''; ?>
							</div>
						</div>
						
						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								Office Location
							</div>
							<div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
								<?= isset($officeLocNama) ? $officeLocNama : ''; ?>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								Location Code
							</div>
							<div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
								<?= isset($officeLocKode) ? $officeLocKode : ''; ?>
							</div>
						</div>
						
						<!-- /info -->
						
						<hr>
						
						<!-- request -->
						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								Leaves Type
							</div>
							<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
								<b><?= isset($lvreqLvNama) ? $lvreqLvNama : ''; ?></b>
							</div>
						</div>
						
						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								Leaves Periode
							</div>
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
								<b><?= isset($lvreqTanggalAwal) ? date('d M Y', strtotime($lvreqTanggalAwal)) : ''; ?></b>
							</div>
							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 ">
								until
							</div>
							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5">
								<b><?= isset($lvreqTanggalAkhir) ? date('d M Y', strtotime($lvreqTanggalAkhir)) : ''; ?></b>
							</div>
						</div>
						
						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								Balance to Date
							</div>
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
								<?= isset($jatah_hari) ? $jatah_hari : ''; ?> days
							</div>
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
								<?= isset($jatah_jam) ? $jatah_jam : ''; ?> hours
							</div>
						</div>
						
						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								Taken This Time
							</div>
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
								<?= isset($ambil_hari) ? $ambil_hari : ''; ?> days
							</div>
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
								<?= isset($ambil_jam) ? $ambil_jam : ''; ?> hours
							</div>
						</div>
						
						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								Current Balance
							</div>
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
								<b><?= isset($sisa_hari) ? $sisa_hari : ''; ?></b> days
							</div>
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
								<b><?= isset($sisa_jam) ? $sisa_jam : ''; ?></b> hours
							</div>
						</div>
						
						<!-- /request -->
						
						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								Note
							</div>
							<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
								<textarea name="note" rows="5" style="width:100%"></textarea>
							</div>
						</div>
						

						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<center>
									<button type="button" class="btn btn-sm" onclick="change_url('<?= site_url($this->nama_controller)?>')">Back</button>
									&nbsp;
									<button type="button" id="simpan" class="btn btn-sm btn-primary">Approve</button>
									&nbsp;
									<button type="button" id="confirm" class="btn btn-sm btn-danger">Reject</button>
								</center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>

<script src="<?= base_url('shisan/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>
<script type="text/javascript">
Number.prototype.format = function( n, x, s, c ) {
	var re = '\\d(?=(\\d{' + ( x || 3 ) + '})+' + ( n > 0 ? '\\D' : '$' ) + ')',num = this.toFixed( Math.max( 0, ~~n ) );
	return ( c ? num.replace( '.', c ) : num ).replace( new RegExp( re, 'g' ), '$&' + ( s || ',' ) );
};

	$(document).keypress(function (event) {            
		if (event.keyCode == 13) {
			event.preventDefault();
		}
	});
	
	$('#simpan').click(
		function(){
			simpan();	
		}		
	);

	$('#confirm').click(
		function(){
			simpan(true);	
		}		
	);

	function simpan(lock){
		var parameter = {
			'aksi':'<?= $this->input->post('aksi') ?>',
			'id' :'<?= $this->input->post('id') ?>'
		};
		$.ajax(
			{
				url : '<?= site_url($this->nama_controller.'/simpan')?>',
				type: 'post',
				data : $('#form_ajax').serialize()+ '&' + $.param(parameter) + '&lock=' + (lock ? 1 : 0),
				beforeSend : function( xhr ){

				},
				success: function(result,status,xhr){
					hasil = JSON.parse(result);
					if(hasil.status == 'session_expired'){
						alert('Session expired');
						window.location.replace('<?= site_url('login')?>');
					}else if(hasil.status == true){
						toastr.clear();
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