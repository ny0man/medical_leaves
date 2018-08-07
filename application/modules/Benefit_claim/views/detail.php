<section class="content">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Benefit claim - <small>detail</small></h3>
					<div class="pull-right">
						
					</div>
				</div>					
				<div class="box-body">

					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
							<b>Claim number</b>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<?= $data[0]['benClmKode'] ?>
						</div>
					</div>

					<div class="row" style="margin-bottom: 20px">
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
							<b>Date</b>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<?= $data[0]['benClmTanggal'] ?>
						</div>
					</div>

					<?php if(count($data) > 0): ?>
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
							Benefit
							</div>
							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
							Nominal
							</div>
							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
							Nominal Approved
							</div>
							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
							File
							</div>						
						</div>
						<?php foreach($data as $key => $value): ?>
							<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
								<?= $value['empBenLabel'] ?>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
								<?= number_format($value['benClmNominal'],0,",",".") ?>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
								<?= number_format($value['benClmNominalApprove'],0,",",".") ?>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
								<?php if($value['benClmDetFile'] != ''): ?>
									<a href="<?= base_url($value['benClmPathFile'].$value['benClmDetFile']) ?>" target="_blank">File</a>
								<?php else: ?>
									-
								<?php endif ?>

								</div>						
							</div>
						<?php endforeach?>
					<?php else: ?>
						<i> - Data tidak ditemukan - </i>
					<?php endif ?>

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px">
						<center>
							<button type="button" id="back" class="btn btn-sm">Back</button>
						</center>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	$('#back').click(
		function(){
			change_url('<?= site_url('Benefit_claim')?>');
		}
	);
</script>