<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Digitowork : Task Management | Signin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo site_url("public/css/art_style.css"); ?>">
  <link rel="stylesheet" href="<?php echo site_url("public/bower_components/bootstrap/dist/css/bootstrap.min.css"); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo site_url("public/bower_components/font-awesome/css/font-awesome.min.css"); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo site_url("public/bower_components/Ionicons/css/ionicons.min.css"); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo site_url("public/css/AdminLTE.min.css"); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo site_url("public/plugins/iCheck/square/blue.css"); ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<?php  if(isset($error['h4'])){ ?>
<div class="alert alert-success">
    <h4><?php echo $error['h4']; ?></h4>
    <p><?php echo $error['message']; ?></p>
</div>
<?php } ?>

<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo site_url('signin'); ?>"><b>TaskManagement</b>Signin</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body" style="padding: 5px 20px;">
    <div class="row" >
    	<img src="<?php echo site_url('public/img/logo.png'); ?>" class="img img-responsive center-block" style="border: 2px dashed black; border-radius: 15px;
    height: 120px;
    padding-left: 85px;
    width: 100;
    padding-right: 85px;
    padding-bottom: 10px;
    padding-top: 10px;">
    </div>
    <p class="login-box-msg" style="padding: 20px;"><b>ForgotPassword</b></p>
    <form action="" method="post" id="ART_FORM_EID">
    <div class="form-group has-feedback">
      <input name="email" type="text" class="form-control validate[required]" id="username" placeholder="email">
      <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    
    <div class="row">
      <!-- /.col -->
      <div class="col-sm-12" >
        <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit">Forgot password</button>
        
        <!--<div class="text-center social-btn">
                  <a href="<?php echo isset($_GET['Redirect_url'])?$loginURL.'&state='.$_GET['Redirect_url']:$loginURL; ?>" class="btn btn-danger btn-block"><i class="fa fa-google"></i> Sign in with <b>Google</b></a>
        </div>-->
        <div class="clearfix"></div>
      </div>
              
        <!-- /.col -->
        <div class="clearfix"></div>
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo site_url("public/bower_components/jquery/dist/jquery.min.js"); ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo site_url("public/bower_components/bootstrap/dist/js/bootstrap.min.js"); ?>"></script>

</body>
</html>