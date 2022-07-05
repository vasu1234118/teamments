<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DigitoWork-Task Management</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href='<?php echo site_url("public/css/art_style.css"); ?>'>
  
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href='<?php echo site_url("public/bower_components/bootstrap/dist/css/bootstrap.min.css"); ?>'>
  <!-- Font Awesome -->
  <link rel="stylesheet" href='<?php echo site_url("public/bower_components/font-awesome/css/font-awesome.min.css"); ?>'>
  <!-- Ionicons -->
  <link rel="stylesheet" href='<?php echo site_url("public/bower_components/Ionicons/css/ionicons.min.css"); ?>'>
  <!-- daterange picker -->
  <link rel="stylesheet" href='<?php echo site_url("public/bower_components/bootstrap-daterangepicker/daterangepicker.css"); ?>'>
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href='<?php echo site_url("public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"); ?>'>
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href='<?php echo site_url("public/plugins/iCheck/all.css"); ?>'>
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href='<?php echo site_url("public/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css"); ?>'>
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href='<?php echo site_url("public/plugins/timepicker/bootstrap-timepicker.min.css"); ?>'>
  <!-- Select2 -->
  <link rel="stylesheet" href='<?php echo site_url("public/bower_components/select2/dist/css/select2.min.css"); ?>'>
  <!-- Theme style -->
  <link rel="stylesheet" href='<?php echo site_url("public/css/AdminLTE.min.css"); ?>'>

  <link rel="stylesheet" href="<?php echo site_url("public/bower_components/fullcalendar/dist/fullcalendar.min.css")?>" >
  <link rel="stylesheet" href="<?php echo site_url("public/bower_components/fullcalendar/dist/fullcalendar.print.min.css")?>"  media="print">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href='<?php echo site_url("public/css/skins/_all-skins.min.css"); ?>'>
  <link rel="stylesheet" href="https://www.jqueryscript.net/demo/jQuery-Tags-Input-Plugin-with-Autocomplete-Support-Mab-Tag-Input/mab-jquery-taginput.css?v2">
  <link rel="stylesheet" href="<?php echo site_url("public/bower_components/bootstrap-daterangepicker/daterangepicker.css")?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- Tooltip -->
  <link rel="stylesheet" type="text/css" href="<?php echo site_url("public/tooltipster/"); ?>dist/css/tooltipster.bundle.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url("public/tooltipster/"); ?>dist/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-borderless.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url("public/tooltipster/"); ?>dist/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-light.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url("public/tooltipster/"); ?>dist/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-noir.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url("public/tooltipster/"); ?>dist/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-punk.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url("public/tooltipster/"); ?>dist/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-shadow.min.css" />
<link rel="stylesheet" type="text/css" href="//louisameline.github.io/tooltipster-follower/dist/css/tooltipster-follower.min.css" />
  <!-- End of Tooltip -->

  <style>.dates{
	border:1px solid #ebeff2;
	border-radius:5px;
	padding:20px 0px;
	margin:12px 0px;
	font-size:16px;
	color:#5aadef;
	font-weight:600;	
	overflow:auto;
}
.dates div{
	float:left;
	width:33.3%;
	text-align:center;
	position:relative;
}
.dates strong,
.stats strong{
	display:block;
	color:#adb8c2;
	font-size:11px;
	font-weight:700;
}
.dates span{
	width:1px;
	height:40px;
	position:absolute;
	right:0;
	top:0;	
	background:#ebeff2;
}
.mab-jquery-taginput {
    border: 1px solid #ccc;
    height: auto;
    margin: 0;
    padding: 5px;
}
.mab-jquery-taginput input {

    width: 14em;
  
}
.tt-suggestion {
    margin: 0;
    padding: 3px 20px;
    line-height: 20px;
    clear: both;
    white-space: nowrap;
    background-color: #f7f6f6;
}
.mab-jquery-taginput.form-control {
    height: auto;
    padding-bottom: 0;
    border: 6px solid #0000ff ;
}
.mab-jquery-taginput.form-control{
border: 1px solid #ccc;
height: auto;
    padding-bottom: 0;
}
.form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
} 
</style>      
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href=<?php echo site_url("dashboard"); ?> class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>T</b>M</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Task </b>Management</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
  
          <li <?php echo $CLASS_NAME=='calendar'?'class = "dropdown messages-menu active"':'class = "dropdown messages-menu "' ?> >
            <a href="<?php echo site_url('calendar'); ?>">
              <i class="fa fa-calendar"></i> 
            </a>
          </li>
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">0</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Empty Messages</li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
            
              <span class="label label-warning">1</span>
            </a>
            <ul class="dropdown-menu">
             <!-- <li class="header"><a href="<?php echo base_url() ?>remainder">Remind me on</a></li>-->
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src='<?php echo $ADMIN_PICTURE!=''?$ADMIN_PICTURE:site_url("public/img/lc.png"); ?>' class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $ADMIN_DISPLAY_NAME; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src='<?php echo $ADMIN_PICTURE!=''?$ADMIN_PICTURE:site_url("public/img/lc.png"); ?>' class="img-circle" alt="User Image">

                <p>
                  <?php echo $ADMIN_ROLE; ?>
                  <small><?php echo $ADMIN_EMAIL; ?></small>
                </p>
              </li>
              <!-- Menu Body 
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
              </li> -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <!-- <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div> -->
                <div class="pull-right">
                  <a href="<?php echo site_url('welcome/logout'); ?>" class="btn btn-success btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>