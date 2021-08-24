<?php $this->load->view('include/header.php'); ?>
<?php $this->load->view('include/left_nav.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Change Password</h1>
      <ol class="breadcrumb">
        <li>Note: <span class="text-danger">'*'</span> mark fields are mandatory.</li>
      </ol>
    </section>

    <form method="post" action="" id="ART_FORM" enctype="multipart/form-data">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="box-body">
          <div class="row">

    <?php if($this->session->flashdata('message')){ ?>
    <div class="alert alert-success">
      <?php echo $this->session->flashdata('message'); ?>
    </div>
    <?php } ?>
    <?php if($this->session->flashdata('error')){ ?>
    <div class="alert alert-danger">
      <?php echo $this->session->flashdata('error'); ?>
    </div>
    <?php } ?>

   
   
      
            <div class="col-md-12">
            <div class="form-group col-md-6">
            <label>Old Password<span class="text-danger">*</span></label>
            <input name="opass" type="password" class="form-control validate[required] "  id="opass">
            </div>
            </div>
            
            <div class="col-md-12">
            <div class="form-group col-md-6">
            <label>New Password<span class="text-danger">*</span></label>
            <input name="npass" type="password" class="form-control validate[required] text-center"  id="npass" >
            </div>
            </div>
            
            <div class="col-md-12">
            <div class="form-group col-md-6">
            <label>Confirm Password<span class="text-danger">*</span></label>
            <input name="cpass" type="password" class="form-control validate[required,equals[npass]] text-center" id="cpass" >
            </div>
            </div>
            

            <!-- /.col -->
          </div>
        </div>
      </div>
      
      <!-- /.box -->
      </div>
      <!-- /.row -->
      
      <div class="text-center"><input type="submit" class="btn btn-primary btn-md" name="submit" value="Change Password" /></div>
      
    </form>
    </section>
    <!-- /.content -->
  </div>
<?php $this->load->view('include/footer.php'); ?>