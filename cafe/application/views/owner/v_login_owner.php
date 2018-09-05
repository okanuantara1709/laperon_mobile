<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sistem Keuangan</title>

    <!-- Inlcude css bostrap -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- include css style -->
    <link href="<?php echo base_url() ?>assets/css/style-login.css" rel="stylesheet">

     <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">   
</head>
<body>
    <div class="col-md-12 panel panel-login">
        <div class="panel-heading text-center" style="padding-top: 30px">
            <img src="<?php echo base_url() ?>assets/images/logo.png" width="150px">
        </div>
        <div class="panel-body" style="padding-top: 15px">
            <form action="<?php echo base_url() ?>owner/login/aksi_login" method="post">
                <div class="form-group">  
                    <div class="input-group date" data-provide="datepicker">
                        <div class="input-group-addon">
                            <span class="fa fa-user"></span>
                        </div>
                        <input class="form-control" type="text" name="username" placeholder="Username">   
                    </div>  
                                    
                </div>   
                <div class="form-group">                        
                    <div class="input-group date" data-provide="datepicker">
                        <div class="input-group-addon">
                            <span class="fa fa-lock"></span>
                        </div>
                         <input class="form-control" type="password" name="password" placeholder="Password">   
                    </div>                  
                </div>  
                <div class="btn-login">
                    <input type="submit" class="btn btn-default" style="color: #49210B;" value="Login">
                    <?php 
                        if(!empty($_GET['error'])):
                     ?>
                    <br><br><span style="color: #e01b1b;">Username atau Password salah !</span> 
                    <?php endif; ?>                                                 
                </div>
            </form>
        </div>
    </div>
</body>
</html>