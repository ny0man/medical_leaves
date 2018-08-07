<section class="content">
	<div class="row">
		<form id="form_ajax">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><?= $this->nama_menu ?><small> - <?= ucfirst($this->input->post('aksi')) ?></small></h3>
					</div>					
					<div class="box-body">
						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								Nama
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<?php 
								$paramFormInput = array(
									'name'        => 'refSubMenuNama',
									'id'          => 'refSubMenuNama',
									'value'       => (isset($refSubMenuNama))?$refSubMenuNama:null,					
									'class'			=> 'form-control',
									'style'         => '',
									'placeholder'	=> ''
								);
								
								echo form_input($paramFormInput);
								?>
							</div>
						</div>

						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								Menu
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<?php
								$options = $list_menu;
								$optionsSelected = (isset($refMenuId))?$refMenuId:null;
								$extra = array(
									'class' => 'form-control'
								);
								echo form_dropdown('refMenuId', $options, $optionsSelected,$extra);
								?>
							</div>
						</div>

						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								Controller
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<?php
								$options = $list_controller;
								$optionsSelected = (isset($refControllerId))?$refControllerId:null;
								$extra = array(
									'class' => 'form-control'
								);
								echo form_dropdown('refControllerId', $options, $optionsSelected,$extra);
								?>
							</div>
						</div>

						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								Urutan
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<?php 
								$paramFormInput = array(
									'name'        => 'refSubMenuUrutan',
									'id'          => 'refSubMenuUrutan',
									'value'       => (isset($refSubMenuUrutan))?$refSubMenuUrutan:0,					
									'class'			=> 'form-control'
								);
								
								echo form_input($paramFormInput);
								?>
							</div>
						</div>

						<div class="row" style="margin-bottom: 10px">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								Icon
							</div>
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
								<?php 
								$paramFormInput = array(
									'name'        => 'refSubMenuIcon',
									'id'          => 'refSubMenuIcon',
									'value'       => (isset($refSubMenuIcon))?$refSubMenuIcon:null,					
									'class'			=> 'form-control',
									'placeholder'	=> 'pilih icon di bawah, tidak wajib diisi',
			        				'readonly' => 'readonly'
								);
								
								echo form_input($paramFormInput);
								?>
							</div>
							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
								<p class="btn btn-lg btn-default fa fa-trash-o" onclick="$('#refSubMenuIcon').val('')"></p>
							</div>
						</div>

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

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Font Awesome Icon
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="fa col-lg-3">
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML);"  class="btn btn-white fa fa-glass"> fa fa-glass </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-music"> fa fa-music </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-search"> fa fa-search </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-envelope-o"> fa fa-envelope-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-heart"> fa fa-heart </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-star"> fa fa-star </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-star-o"> fa fa-star-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-user"> fa fa-user </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-film"> fa fa-film </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-th-large"> fa fa-th-large </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-th"> fa fa-th </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-th-list"> fa fa-th-list </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-check"> fa fa-check </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-times"> fa fa-times </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-search-plus"> fa fa-search-plus </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-search-minus"> fa fa-search-minus </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-power-off"> fa fa-power-off </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-signal"> fa fa-signal </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-gear"> fa fa-gear </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-cog"> fa fa-cog </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-trash-o"> fa fa-trash-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-home"> fa fa-home </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-file-o"> fa fa-file-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-clock-o"> fa fa-clock-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-road"> fa fa-road </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-download"> fa fa-download </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-arrow-circle-o-down"> fa fa-arrow-circle-o-down </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-arrow-circle-o-up"> fa fa-arrow-circle-o-up </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-inbox"> fa fa-inbox </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-play-circle-o"> fa fa-play-circle-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-rotate-right"> fa fa-rotate-right </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-repeat"> fa fa-repeat </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-refresh"> fa fa-refresh </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-list-alt"> fa fa-list-alt </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-lock"> fa fa-lock </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-flag"> fa fa-flag </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-headphones"> fa fa-headphones </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-volume-off"> fa fa-volume-off </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-volume-down"> fa fa-volume-down </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-volume-up"> fa fa-volume-up </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-qrcode"> fa fa-qrcode </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-barcode"> fa fa-barcode </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-tag"> fa fa-tag </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-tags"> fa fa-tags </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-book"> fa fa-book </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-bookmark"> fa fa-bookmark </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-print"> fa fa-print </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-camera"> fa fa-camera </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-font"> fa fa-font </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-bold"> fa fa-bold </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-italic"> fa fa-italic </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-text-height"> fa fa-text-height </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-text-width"> fa fa-text-width </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-align-left"> fa fa-align-left </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-align-center"> fa fa-align-center </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-align-right"> fa fa-align-right </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-align-justify"> fa fa-align-justify </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-list"> fa fa-list </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-dedent"> fa fa-dedent </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-outdent"> fa fa-outdent </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-indent"> fa fa-indent </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-video-camera"> fa fa-video-camera </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-photo"> fa fa-photo </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-image"> fa fa-image </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-picture-o"> fa fa-picture-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-pencil"> fa fa-pencil </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-map-marker"> fa fa-map-marker </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-adjust"> fa fa-adjust </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-tint"> fa fa-tint </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-edit"> fa fa-edit </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-pencil-square-o"> fa fa-pencil-square-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-share-square-o"> fa fa-share-square-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-check-square-o"> fa fa-check-square-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-arrows"> fa fa-arrows </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-step-backward"> fa fa-step-backward </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-fast-backward"> fa fa-fast-backward </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-backward"> fa fa-backward </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-play"> fa fa-play </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-pause"> fa fa-pause </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-stop"> fa fa-stop </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-forward"> fa fa-forward </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-fast-forward"> fa fa-fast-forward </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-step-forward"> fa fa-step-forward </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-eject"> fa fa-eject </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-chevron-left"> fa fa-chevron-left </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-chevron-right"> fa fa-chevron-right </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-plus-circle"> fa fa-plus-circle </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-minus-circle"> fa fa-minus-circle </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-times-circle"> fa fa-times-circle </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-check-circle"> fa fa-check-circle </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-question-circle"> fa fa-question-circle </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-info-circle"> fa fa-info-circle </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-crosshairs"> fa fa-crosshairs </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-times-circle-o"> fa fa-times-circle-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-check-circle-o"> fa fa-check-circle-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-ban"> fa fa-ban </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-arrow-left"> fa fa-arrow-left </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-arrow-right"> fa fa-arrow-right </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-arrow-up"> fa fa-arrow-up </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-arrow-down"> fa fa-arrow-down </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-mail-forward"> fa fa-mail-forward </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-share"> fa fa-share </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-expand"> fa fa-expand </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-compress"> fa fa-compress </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-plus"> fa fa-plus </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-minus"> fa fa-minus </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-asterisk"> fa fa-asterisk </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-exclamation-circle"> fa fa-exclamation-circle </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-gift"> fa fa-gift </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-leaf"> fa fa-leaf </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-fire"> fa fa-fire </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-eye"> fa fa-eye </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-eye-slash"> fa fa-eye-slash </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-warning"> fa fa-warning </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-exclamation-triangle"> fa fa-exclamation-triangle </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-plane"> fa fa-plane </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-calendar"> fa fa-calendar </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-random"> fa fa-random </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-comment"> fa fa-comment </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-magnet"> fa fa-magnet </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-chevron-up"> fa fa-chevron-up </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-chevron-down"> fa fa-chevron-down </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-retweet"> fa fa-retweet </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-shopping-cart"> fa fa-shopping-cart </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-folder"> fa fa-folder </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-folder-open"> fa fa-folder-open </p>
						<br/><br/>
					</div>
					<!-- /.col-lg-6 (nested) -->
					<div class="fa col-lg-3">
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-arrows-v"> fa fa-arrows-v </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-arrows-h"> fa fa-arrows-h </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-bar-chart-o"> fa fa-bar-chart-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-twitter-square"> fa fa-twitter-square </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-facebook-square"> fa fa-facebook-square </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-camera-retro"> fa fa-camera-retro </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-key"> fa fa-key </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-gears"> fa fa-gears </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-cogs"> fa fa-cogs </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-comments"> fa fa-comments </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-thumbs-o-up"> fa fa-thumbs-o-up </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-thumbs-o-down"> fa fa-thumbs-o-down </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-star-half"> fa fa-star-half </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-heart-o"> fa fa-heart-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-sign-out"> fa fa-sign-out </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-linkedin-square"> fa fa-linkedin-square </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-thumb-tack"> fa fa-thumb-tack </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-external-link"> fa fa-external-link </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-sign-in"> fa fa-sign-in </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-trophy"> fa fa-trophy </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-github-square"> fa fa-github-square </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-upload"> fa fa-upload </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-lemon-o"> fa fa-lemon-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-phone"> fa fa-phone </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-square-o"> fa fa-square-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-bookmark-o"> fa fa-bookmark-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-phone-square"> fa fa-phone-square </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-twitter"> fa fa-twitter </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-facebook"> fa fa-facebook </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-github"> fa fa-github </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-unlock"> fa fa-unlock </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-credit-card"> fa fa-credit-card </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-rss"> fa fa-rss </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-hdd-o"> fa fa-hdd-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-bullhorn"> fa fa-bullhorn </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-bell"> fa fa-bell </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-certificate"> fa fa-certificate </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-hand-o-right"> fa fa-hand-o-right </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-hand-o-left"> fa fa-hand-o-left </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-hand-o-up"> fa fa-hand-o-up </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-hand-o-down"> fa fa-hand-o-down </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-arrow-circle-left"> fa fa-arrow-circle-left </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-arrow-circle-right"> fa fa-arrow-circle-right </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-arrow-circle-up"> fa fa-arrow-circle-up </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-arrow-circle-down"> fa fa-arrow-circle-down </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-globe"> fa fa-globe </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-wrench"> fa fa-wrench </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-tasks"> fa fa-tasks </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-filter"> fa fa-filter </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-briefcase"> fa fa-briefcase </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-arrows-alt"> fa fa-arrows-alt </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-group"> fa fa-group </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-users"> fa fa-users </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-chain"> fa fa-chain </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-link"> fa fa-link </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-cloud"> fa fa-cloud </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-flask"> fa fa-flask </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-cut"> fa fa-cut </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-scissors"> fa fa-scissors </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-copy"> fa fa-copy </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-files-o"> fa fa-files-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-paperclip"> fa fa-paperclip </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-save"> fa fa-save </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-floppy-o"> fa fa-floppy-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-square"> fa fa-square </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-navicon"> fa fa-navicon </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-reorder"> fa fa-reorder </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-bars"> fa fa-bars </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-list-ul"> fa fa-list-ul </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-list-ol"> fa fa-list-ol </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-strikethrough"> fa fa-strikethrough </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-underline"> fa fa-underline </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-table"> fa fa-table </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-magic"> fa fa-magic </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-truck"> fa fa-truck </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-pinterest"> fa fa-pinterest </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-pinterest-square"> fa fa-pinterest-square </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-google-plus-square"> fa fa-google-plus-square </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-google-plus"> fa fa-google-plus </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-money"> fa fa-money </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-caret-down"> fa fa-caret-down </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-caret-up"> fa fa-caret-up </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-caret-left"> fa fa-caret-left </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-caret-right"> fa fa-caret-right </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-columns"> fa fa-columns </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-unsorted"> fa fa-unsorted </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-sort"> fa fa-sort </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-sort-down"> fa fa-sort-down </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-sort-desc"> fa fa-sort-desc </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-sort-up"> fa fa-sort-up </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-sort-asc"> fa fa-sort-asc </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-envelope"> fa fa-envelope </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-linkedin"> fa fa-linkedin </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-rotate-left"> fa fa-rotate-left </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-undo"> fa fa-undo </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-legal"> fa fa-legal </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-gavel"> fa fa-gavel </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-dashboard"> fa fa-dashboard </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-tachometer"> fa fa-tachometer </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-comment-o"> fa fa-comment-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-comments-o"> fa fa-comments-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-flash"> fa fa-flash </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-bolt"> fa fa-bolt </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-sitemap"> fa fa-sitemap </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-umbrella"> fa fa-umbrella </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-paste"> fa fa-paste </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-clipboard"> fa fa-clipboard </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-lightbulb-o"> fa fa-lightbulb-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-exchange"> fa fa-exchange </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-cloud-download"> fa fa-cloud-download </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-cloud-upload"> fa fa-cloud-upload </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-user-md"> fa fa-user-md </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-stethoscope"> fa fa-stethoscope </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-suitcase"> fa fa-suitcase </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-bell-o"> fa fa-bell-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-coffee"> fa fa-coffee </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-cutlery"> fa fa-cutlery </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-file-text-o"> fa fa-file-text-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-building-o"> fa fa-building-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-hospital-o"> fa fa-hospital-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-ambulance"> fa fa-ambulance </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-medkit"> fa fa-medkit </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-fighter-jet"> fa fa-fighter-jet </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-beer"> fa fa-beer </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-h-square"> fa fa-h-square </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-plus-square"> fa fa-plus-square </p>
						<br/><br/>
					</div>
					<div class="fa col-lg-3">
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-angle-double-left"> fa fa-angle-double-left </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-angle-double-right"> fa fa-angle-double-right </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-angle-double-up"> fa fa-angle-double-up </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-angle-double-down"> fa fa-angle-double-down </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-angle-left"> fa fa-angle-left </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-angle-right"> fa fa-angle-right </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-angle-up"> fa fa-angle-up </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-angle-down"> fa fa-angle-down </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-desktop"> fa fa-desktop </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-laptop"> fa fa-laptop </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-tablet"> fa fa-tablet </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-mobile-phone"> fa fa-mobile-phone </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-mobile"> fa fa-mobile </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-circle-o"> fa fa-circle-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-quote-left"> fa fa-quote-left </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-quote-right"> fa fa-quote-right </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-spinner"> fa fa-spinner </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-circle"> fa fa-circle </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-mail-reply"> fa fa-mail-reply </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-reply"> fa fa-reply </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-github-alt"> fa fa-github-alt </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-folder-o"> fa fa-folder-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-folder-open-o"> fa fa-folder-open-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-smile-o"> fa fa-smile-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-frown-o"> fa fa-frown-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-meh-o"> fa fa-meh-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-gamepad"> fa fa-gamepad </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-keyboard-o"> fa fa-keyboard-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-flag-o"> fa fa-flag-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-flag-checkered"> fa fa-flag-checkered </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-terminal"> fa fa-terminal </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-code"> fa fa-code </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-mail-reply-all"> fa fa-mail-reply-all </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-reply-all"> fa fa-reply-all </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-star-half-empty"> fa fa-star-half-empty </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-star-half-full"> fa fa-star-half-full </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-star-half-o"> fa fa-star-half-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-location-arrow"> fa fa-location-arrow </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-crop"> fa fa-crop </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-code-fork"> fa fa-code-fork </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-unlink"> fa fa-unlink </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-chain-broken"> fa fa-chain-broken </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-question"> fa fa-question </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-info"> fa fa-info </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-exclamation"> fa fa-exclamation </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-superscript"> fa fa-superscript </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-subscript"> fa fa-subscript </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-eraser"> fa fa-eraser </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-puzzle-piece"> fa fa-puzzle-piece </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-microphone"> fa fa-microphone </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-microphone-slash"> fa fa-microphone-slash </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-shield"> fa fa-shield </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-calendar-o"> fa fa-calendar-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-fire-extinguisher"> fa fa-fire-extinguisher </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-rocket"> fa fa-rocket </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-maxcdn"> fa fa-maxcdn </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-chevron-circle-left"> fa fa-chevron-circle-left </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-chevron-circle-right"> fa fa-chevron-circle-right </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-chevron-circle-up"> fa fa-chevron-circle-up </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-chevron-circle-down"> fa fa-chevron-circle-down </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-html5"> fa fa-html5 </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-css3"> fa fa-css3 </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-anchor"> fa fa-anchor </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-unlock-alt"> fa fa-unlock-alt </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-bullseye"> fa fa-bullseye </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-ellipsis-h"> fa fa-ellipsis-h </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-ellipsis-v"> fa fa-ellipsis-v </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-rss-square"> fa fa-rss-square </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-play-circle"> fa fa-play-circle </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-ticket"> fa fa-ticket </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-minus-square"> fa fa-minus-square </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-minus-square-o"> fa fa-minus-square-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-level-up"> fa fa-level-up </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-level-down"> fa fa-level-down </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-check-square"> fa fa-check-square </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-pencil-square"> fa fa-pencil-square </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-external-link-square"> fa fa-external-link-square </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-share-square"> fa fa-share-square </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-compass"> fa fa-compass </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-toggle-down"> fa fa-toggle-down </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-caret-square-o-down"> fa fa-caret-square-o-down </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-toggle-up"> fa fa-toggle-up </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-caret-square-o-up"> fa fa-caret-square-o-up </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-toggle-right"> fa fa-toggle-right </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-caret-square-o-right"> fa fa-caret-square-o-right </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-euro"> fa fa-euro </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-eur"> fa fa-eur </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-gbp"> fa fa-gbp </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-dollar"> fa fa-dollar </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-usd"> fa fa-usd </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-rupee"> fa fa-rupee </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-inr"> fa fa-inr </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-cny"> fa fa-cny </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-rmb"> fa fa-rmb </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-yen"> fa fa-yen </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-jpy"> fa fa-jpy </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-ruble"> fa fa-ruble </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-rouble"> fa fa-rouble </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-rub"> fa fa-rub </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-won"> fa fa-won </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-krw"> fa fa-krw </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-bitcoin"> fa fa-bitcoin </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-btc"> fa fa-btc </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-file"> fa fa-file </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-file-text"> fa fa-file-text </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-sort-alpha-asc"> fa fa-sort-alpha-asc </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-sort-alpha-desc"> fa fa-sort-alpha-desc </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-sort-amount-asc"> fa fa-sort-amount-asc </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-sort-amount-desc"> fa fa-sort-amount-desc </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-sort-numeric-asc"> fa fa-sort-numeric-asc </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-sort-numeric-desc"> fa fa-sort-numeric-desc </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-thumbs-up"> fa fa-thumbs-up </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-thumbs-down"> fa fa-thumbs-down </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-youtube-square"> fa fa-youtube-square </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-youtube"> fa fa-youtube </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-xing"> fa fa-xing </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-xing-square"> fa fa-xing-square </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-youtube-play"> fa fa-youtube-play </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-dropbox"> fa fa-dropbox </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-stack-overflow"> fa fa-stack-overflow </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-instagram"> fa fa-instagram </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-flickr"> fa fa-flickr </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-adn"> fa fa-adn </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-bitbucket"> fa fa-bitbucket </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-bitbucket-square"> fa fa-bitbucket-square </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-tumblr"> fa fa-tumblr </p>
						<br/><br/>
					</div>
					<div class="fa col-lg-3">
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-tumblr-square"> fa fa-tumblr-square </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-long-arrow-down"> fa fa-long-arrow-down </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-long-arrow-up"> fa fa-long-arrow-up </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-long-arrow-left"> fa fa-long-arrow-left </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-long-arrow-right"> fa fa-long-arrow-right </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-apple"> fa fa-apple </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-windows"> fa fa-windows </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-android"> fa fa-android </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-linux"> fa fa-linux </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-dribbble"> fa fa-dribbble </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-skype"> fa fa-skype </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-foursquare"> fa fa-foursquare </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-trello"> fa fa-trello </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-female"> fa fa-female </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-male"> fa fa-male </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-gittip"> fa fa-gittip </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-sun-o"> fa fa-sun-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-moon-o"> fa fa-moon-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-archive"> fa fa-archive </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-bug"> fa fa-bug </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-vk"> fa fa-vk </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-weibo"> fa fa-weibo </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-renren"> fa fa-renren </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-pagelines"> fa fa-pagelines </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-stack-exchange"> fa fa-stack-exchange </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-arrow-circle-o-right"> fa fa-arrow-circle-o-right </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-arrow-circle-o-left"> fa fa-arrow-circle-o-left </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-toggle-left"> fa fa-toggle-left </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-caret-square-o-left"> fa fa-caret-square-o-left </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-dot-circle-o"> fa fa-dot-circle-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-wheelchair"> fa fa-wheelchair </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-vimeo-square"> fa fa-vimeo-square </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-turkish-lira"> fa fa-turkish-lira </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-try"> fa fa-try </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-plus-square-o"> fa fa-plus-square-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-space-shuttle"> fa fa-space-shuttle </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-slack"> fa fa-slack </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-envelope-square"> fa fa-envelope-square </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-wordpress"> fa fa-wordpress </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-openid"> fa fa-openid </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-institution"> fa fa-institution </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-bank"> fa fa-bank </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-university"> fa fa-university </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-mortar-board"> fa fa-mortar-board </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-graduation-cap"> fa fa-graduation-cap </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-yahoo"> fa fa-yahoo </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-google"> fa fa-google </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-reddit"> fa fa-reddit </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-reddit-square"> fa fa-reddit-square </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-stumbleupon-circle"> fa fa-stumbleupon-circle </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-stumbleupon"> fa fa-stumbleupon </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-delicious"> fa fa-delicious </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-digg"> fa fa-digg </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-pied-piper-square"> fa fa-pied-piper-square </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-pied-piper"> fa fa-pied-piper </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-pied-piper-alt"> fa fa-pied-piper-alt </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-drupal"> fa fa-drupal </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-joomla"> fa fa-joomla </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-language"> fa fa-language </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-fax"> fa fa-fax </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-building"> fa fa-building </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-child"> fa fa-child </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-paw"> fa fa-paw </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-spoon"> fa fa-spoon </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-cube"> fa fa-cube </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-cubes"> fa fa-cubes </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-behance"> fa fa-behance </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-behance-square"> fa fa-behance-square </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-steam"> fa fa-steam </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-steam-square"> fa fa-steam-square </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-recycle"> fa fa-recycle </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-automobile"> fa fa-automobile </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-car"> fa fa-car </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-cab"> fa fa-cab </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-taxi"> fa fa-taxi </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-tree"> fa fa-tree </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-spotify"> fa fa-spotify </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-deviantart"> fa fa-deviantart </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-soundcloud"> fa fa-soundcloud </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-database"> fa fa-database </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-file-pdf-o"> fa fa-file-pdf-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-file-word-o"> fa fa-file-word-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-file-excel-o"> fa fa-file-excel-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-file-powerpoint-o"> fa fa-file-powerpoint-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-file-photo-o"> fa fa-file-photo-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-file-picture-o"> fa fa-file-picture-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-file-image-o"> fa fa-file-image-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-file-zip-o"> fa fa-file-zip-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-file-archive-o"> fa fa-file-archive-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-file-sound-o"> fa fa-file-sound-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-file-audio-o"> fa fa-file-audio-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-file-movie-o"> fa fa-file-movie-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-file-video-o"> fa fa-file-video-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-file-code-o"> fa fa-file-code-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-vine"> fa fa-vine </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-codepen"> fa fa-codepen </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-jsfiddle"> fa fa-jsfiddle </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-life-bouy"> fa fa-life-bouy </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-life-saver"> fa fa-life-saver </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-support"> fa fa-support </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-life-ring"> fa fa-life-ring </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-circle-o-notch"> fa fa-circle-o-notch </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-ra"> fa fa-ra </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-rebel"> fa fa-rebel </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-ge"> fa fa-ge </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-empire"> fa fa-empire </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-git-square"> fa fa-git-square </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-git"> fa fa-git </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-hacker-news"> fa fa-hacker-news </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-tencent-weibo"> fa fa-tencent-weibo </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-qq"> fa fa-qq </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-wechat"> fa fa-wechat </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-weixin"> fa fa-weixin </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-send"> fa fa-send </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-paper-plane"> fa fa-paper-plane </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-send-o"> fa fa-send-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-paper-plane-o"> fa fa-paper-plane-o </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-history"> fa fa-history </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-circle-thin"> fa fa-circle-thin </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-header"> fa fa-header </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-paragraph"> fa fa-paragraph </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-sliders"> fa fa-sliders </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-share-alt"> fa fa-share-alt </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-share-alt-square"> fa fa-share-alt-square </p>
						<br/><br/>
						<p onclick="$('#refSubMenuIcon').focus();$('#refSubMenuIcon').val(this.innerHTML)" class="btn btn-white fa fa-bomb"> fa fa-bomb </p>
						<br/><br/>
					</div>
					<!-- /.col-lg-6 (nested) -->
				</div>
				<!-- /.row (nested) -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>

<script type="text/javascript">
	
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

	function simpan(){
		var parameter = {
			'aksi':'<?= $this->input->post('aksi') ?>',
			'id' :'<?= $this->input->post('id') ?>'
		};
		$.ajax(
		{
			url : '<?= site_url($this->nama_controller.'/simpan')?>',
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
					toastr['success'](hasil.message)
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