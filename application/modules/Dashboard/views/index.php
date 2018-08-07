<div class="content-wrapper" id="content_ajax">
	<section class="content">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Welcome</h3>
					</div>					
					<div class="box-body" style="min-height: 470px">
						<div class="row margin-bottom-10">
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
								Name
							</div>
							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">
								<?= $this->session->userdata('refUserNamaAsli') ?>
							</div>
						</div>

						<div class="row margin-bottom-10">
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
								EN
							</div>
							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">
								<?= $this->session->userdata('empNoFormatted') ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>