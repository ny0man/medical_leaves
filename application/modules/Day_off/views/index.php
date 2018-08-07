<link rel="stylesheet" href="<?= base_url('shisan/plugins/fullcalendar/dist/fullcalendar.min.css')?>">
<link rel="stylesheet" href="<?= base_url('shisan/plugins/fullcalendar/dist/fullcalendar.print.min.css')?>" media="print">
<section class="content">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title"><?= $this->nama_menu ?></h3>
				</div>					
				<div class="box-body">
					<div class="col-md-9">
						<div class="box box-primary">
							<div class="box-body no-padding">
								<!-- THE CALENDAR -->
								<div id="calendar"></div>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /. box -->
					</div>
					<div class="col-md-3">
						Tanggal terpilih: <br>
						<?php 
						$paramFormInput = array(
							'name'        => 'dayOffTanggal',
							'id'          => 'dayOffTanggal',
							'value'       => (isset($dayOffTanggal))?$dayOffTanggal:null,					
							'class'			=> 'form-control',
					        'placeholder'	=> 'Klik tanggal pada kalender',
					        'readonly' => 'readonly'
						);
					
						echo form_input($paramFormInput);
					?>

					<br>  						

					Keterangan : <br>
						<?php 
						$paramFormInput = array(
							'name'        => 'dayOffKeterangan',
							'id'          => 'dayOffKeterangan',
							'value'       => (isset($dayOffKeterangan))?$dayOffKeterangan:null,					
							'class'			=> 'form-control',
					        'placeholder'	=> ''
						);
					
						echo form_input($paramFormInput);
					?>

					<br>
					<center>
						<button id="set_libur" type="button" class="btn btn-primary">Set libur</button>
					</center>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script src="<?= base_url('shisan/plugins/moment/moment.js')?>"></script>
<script src="<?= base_url('shisan/plugins/fullcalendar/dist/fullcalendar.min.js')?>"></script>
<script type="text/javascript">
	$('#set_libur').click(
		function(){
			$.ajax(
  			{
  				url : '<?= site_url('Day_off/simpan')?>',
  				type: 'post',
  				data : {
  					'dayOffTanggal' : $('#dayOffTanggal').val(),
  					'dayOffKeterangan' : $('#dayOffKeterangan').val(),
  					'aksi' : 'add'
  				},
  				beforeSend : function( xhr ){
  					
  				},
  				success: function(result,status,xhr){
  					hasil = JSON.parse(result);
  					if(hasil.status == 'session_expired'){
  						alert('Session expired');
  						window.location.replace('<?= site_url('home')?>');
  					}else if(hasil.status == true){
  						toastr['success']('Success');
  						reload_tanggal();
  					}else{
  						toastr['warning'](hasil.message);						
  					}
  				},
  				complete : function(xhr,status){
  					
  				},
  				error : function(xhr,status,error)	{
  	
  				}
  			}
  		)	
		}
	);

	calendar_obj = $('#calendar').fullCalendar({
		eventClick: function(calEvent, jsEvent, view) {
			$.confirm({
				title: 'Konfirmasi delete',
				content: 'Delete '+calEvent.title+' '+calEvent.description+' tanggal '+calEvent.start.format('DD MMM Y')+'?',
				buttons: {
					cancel: function () {

					},
					delete: {
						text: 'Delete',
						btnClass: 'btn-red',
						action: function(){
							delete_tanggal(calEvent.start.format());
						}
					}		        
				}
			});
		},
		dayClick: function(date, jsEvent, view) {
			toastr.clear();
			toastr['success']('Tanggal terpilih adalah '+date.format('DD MMM Y')+', <br>Silahkan klik tombol "set libur" untuk melanjutkan');
			$('#dayOffTanggal').val(date.format());
		},
		eventRender: function(eventObj, $el) {
			/*$el.popover({
				title: eventObj.title,
				content: eventObj.description,
				trigger: 'hover',
				placement: 'top',
				container: 'body'
			});*/
	    },
		eventSources:[{
			url : '<?= site_url('Day_off/reload_tanggal')?>'
		}],
		'eventBackgroundColor' : 'red',
		'eventBorderColor' : 'red'
	});

	function delete_tanggal(tanggal){
		$.ajax(
			{
				url : '<?= site_url('Day_off/delete')?>',
				type: 'POST',
				data : {'tanggal':tanggal},
				beforeSend : function( xhr ){
					
				},
				success: function(result,status,xhr){
  					hasil = JSON.parse(result);
  					if(hasil.status == 'session_expired'){
  						alert('Session expired');
  						window.location.replace('<?= site_url('home')?>');
  					}else if(hasil.status == true){
  						toastr['success']('Success');
  						reload_tanggal();
  					}else{
  						toastr['warning'](hasil.message);						
  					}
  				},
				complete : function(xhr,status){
					
				},
				error : function(xhr,status,error)	{
	
				}
			}
		)	
	}

	function reload_tanggal(){
		$.ajax(
			{
				url : '<?= site_url('Day_off/reload_tanggal')?>',
				type: 'post',
				data : null,
				beforeSend : function( xhr ){
					
				},
				success: function(result,status,xhr){
					$('#calendar').fullCalendar('refetchEvents');


					//.fullCalendar( refetchResources );
				},
				complete : function(xhr,status){
					
				},
				error : function(xhr,status,error)	{

				}
			}
		)	
	}
</script>