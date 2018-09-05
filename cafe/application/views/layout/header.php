<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Sistem Keuangan</title>


	<!-- Inlcude css bostrap -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- include css style -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

     <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">  

      <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/js/plugin/datetimepicker/bootstrap-datetimepicker.css"> 
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugin/select2/css/select2.css">
	

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	
	<!-- AWAL HEADER -->
	<header>
	
		<div class="header-right col-md-12">			
			<div class="col-md-6 sistem-title">				
				SISTEM AKUTANSI				
			</div>
			<div class="col-md-6">				

			<ul class="nav navbar-right top-nav">                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Administrator <b class="caret"></b></a>
                    <ul class="dropdown-menu">                        
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url(); ?>login/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>

		    </div>	    	
		</div>

	</header>
	<!-- AKHIR HEADER -->