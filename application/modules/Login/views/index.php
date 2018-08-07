<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form id="form_ajax">
            <div class="form-group has-feedback">
                <input type="text" name="username" class="form-control" placeholder="Username">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                  
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="button" id="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
       
    </div>
    <!-- /.login-box-body -->
</div>

<script src="<?= base_url('shisan/plugins/jquery/dist/jquery.min.js') ?>"></script>
<script src="<?= base_url('shisan/plugins/toastr/toastr.min.js') ?>"></script>

<script type="text/javascript">
    $('#submit').click(
        function(){
            submit();
        }
    );

    function submit(){
        $.ajax(
            {
                url : '<?= site_url('Login/cek')?>',
                type: 'POST',
                data : $('#form_ajax').serialize(),
                beforeSend : function( xhr ){
                },
                success: function(result,status,xhr){
                    hasil = JSON.parse(result);
                    if(hasil.status == true){
                        toastr['success']('Success');
                        window.location.replace('Dashboard');
                    }else{
                        toastr['warning'](hasil.message);                        
                    }
                },
                complete : function(xhr,status){
                    
                },
                error : function(xhr,status,error)    {
    
                }
            }
        )    
    }
</script>