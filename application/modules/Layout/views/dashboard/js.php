<script src="<?= base_url('shisan/plugins/jquery/dist/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('shisan/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('shisan/plugins/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('shisan/theme/adminLTE_2_4_5/js/adminlte.min.js') ?>"></script>
<script src="<?= base_url('shisan/plugins/toastr/toastr.min.js') ?>"></script>
<script src="<?= base_url('shisan/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('shisan/plugins/datatables/dataTables.bootstrap.min.js') ?>"></script>
<script src="<?= base_url('shisan/plugins/jquery-confirm/jquery-confirm.js') ?>"></script>
<script type="text/javascript">

	function change_url(url,data = null){
		$.ajax(
		{
			url : url,
			type: 'POST',
			data : data,
			beforeSend : function( xhr ){
					//toastr['info']('Memuat halaman');
				},
				success: function(result,status,xhr){
					$('#content_ajax').html(result);
					FormatTabel();					
				},
				complete : function(xhr,status){
					//toastr.clear();					
				},
				error : function(xhr,status,error)	{
					toastr['error'](error,status);
				}
			}
			)	
	}

	function FormatTabel(){
		if($('#datatable')){
			$('#datatable').DataTable({
				"order": []
				/*language: {
					search: "Pencarian",
					searchPlaceholder: "kata kunci",
					emptyTable:"data tidak ditemukan",
					zeroRecords:"data tidak ditemukan",
					"info":           "Menampilkan _START_ - _END_ dari _TOTAL_ data",
					"infoEmpty":      "Menampilkan 0 - 0 dari 0 data",
					"infoFiltered":   "(Difilter dari _MAX_ total data)",
					"lengthMenu":     "Tampilkan _MENU_ data",
					"paginate": {
						"first":      "Awal",
						"last":       "Akhir",
						"next":       ">",
						"previous":   "<"
					},
				}*/
			});
		}
	}

	function confirm_delete(label,url,id){
		$.confirm({
			title: 'Confirm delete',
			content: 'Delete '+label+' ?',
			buttons: {
				cancel: function () {

				},
				delete: {
					text: 'Delete',
					btnClass: 'btn-red',
					action: function(){
						delete_data(url,{'id':id});
					}
				}		        
			}
		});
	}

	function delete_data(url,data = null){
		$.ajax(
		{
			url : url,
			type: 'POST',
			data : data,
			beforeSend : function( xhr ){
					//toastr['info']('Memuat halaman');
				},
				success: function(result,status,xhr){
					hasil = JSON.parse(result);
					if(hasil.status == 'session_expired'){
						alert('Session expired');
						window.location.replace('<?= site_url('login')?>');
					}else if(hasil.status == true){
						toastr['success']('Success');
						change_url(hasil.url);
					}else{
						toastr['warning'](hasil.message);						
					}
				},
				complete : function(xhr,status){
					//toastr.clear();					
				},
				error : function(xhr,status,error)	{
					toastr['error'](error,status);
				}
			}
		)	
	}

	$('#confirm_logout').click(
        function(){
            confirm_logout();        
        }
    );

    function confirm_logout(){
        $.confirm({
            title: 'Konfirmasi logout',
            content: 'Anda akan logout?',
            buttons: {
                cancel: function () {

                },
                ya: {
                    text: 'logout',
                    btnClass: 'btn-red',
                    action: function(){
                        window.location.replace('<?= site_url('Login/logout')?>');
                    }
                }               
            }
        });
    }
</script>

