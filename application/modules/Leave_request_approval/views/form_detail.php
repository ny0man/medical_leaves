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
								<?= isset($jatah_hari) ? ($lvreqApproveStatus == 1 ? ($jatah_hari + $ambil_hari) : $jatah_hari) : ''; ?> days
							</div>
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
								<?= isset($jatah_jam) ? ($lvreqApproveStatus == 1 ? ($jatah_jam + $ambil_jam) : $jatah_jam) : ''; ?> hours
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
								<b><?= (isset($jatah_hari) and $lvreqApproveStatus == 1) ? $jatah_hari : ($lvreqApproveStatus == 2 ? $jatah_hari : $sisa_hari); ?></b> days
							</div>
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
								<b><?= (isset($jatah_jam) and $lvreqApproveStatus == 1) ? $jatah_jam : ($lvreqApproveStatus == 2 ? $jatah_jam : $sisa_jam); ?></b> hours
							</div>
						</div>
						
						<!-- /request -->
						
						<hr>
						
						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								Approval Status
							</div>
							<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
								<b><?= isset($status_approval) ? $status_approval : ''; ?></b>
							</div>
						</div>
						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								Note
							</div>
							<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
								<?= isset($lvreqApproveNote) ? $lvreqApproveNote : ''; ?>
							</div>
						</div>
						

						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<center>
									<button type="button" class="btn btn-sm" onclick="change_url('<?= site_url($this->nama_controller)?>')">Back</button>
								</center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>
