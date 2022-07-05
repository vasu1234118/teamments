<?php $this->load->view('include/header.php'); ?>
<?php $this->load->view('include/left_nav.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Add New <?php echo $add_title; ?></h1>
      <ol class="breadcrumb">
        <li>Note: <span class="text-danger">'*'</span> mark fields are mandatory.</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php if(isset($error_message)){ ?>
    <div class="callout callout-danger">
      <?php for($i=0;$i<count($error_message);$i++){ ?>
      <h4><?php echo $error_message[$i]['error_title']; ?></h4>
      <p><?php echo $error_message[$i]['error']; ?></p>
      <?php } ?>
    </div>
    <?php } ?>
    
    <form method="post" action="" id="ART_FORM" enctype="multipart/form-data">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <!--<h3 class="box-title"><?php echo $add_title; ?> Login Info</h3>-->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>User Name <span class="text-danger">*</span></label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input name="username" type="text" class="form-control validate[required]" id="username">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Password <span class="text-danger">*</span></label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-unlock-alt"></i>
                  </div>
                  <input name="password" type="password" class="form-control validate[required]" id="password">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Role <span class="text-danger">*</span></label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-key"></i>
                  </div>
                  <select class="form-control" name="role">
                    <option value="">Select Role</option>
                    <?php foreach($roles as $role){ ?>
                    <option value="<?php echo $role->id; ?>"><?php echo $role->title; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-md-4" style="float:right" >  
                <div class="form-group">
                    <label>Status</label><br />
                <label>
                      <input name="status" type="radio" class="flat-red" value="1" checked>&nbsp;Active&nbsp;&nbsp;
                    <input name="status" type="radio" class="flat-red" value="0">&nbsp;In Active
                    </label>
                </div>
            </div>
            <div class="col-md-4" >  
                <div class="form-group">
                    <label>Employee Type</label><br />
                 <select class="form-control" name="etype">
                    <option value="">Select Employee Type</option>
                   
                    <option value="1">Internal</option>
                     <option value="2">External</option>
                
                  </select>
                </div>
            </div>
            
          </div>
        </div>
      </div>


      <div class="box-header with-border">
          <h3 class="box-title"><?php echo $add_title; ?> Details</h3>
      </div>
      <div class="box-body">
          <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>First Name <span class="text-danger">*</span></label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user-o"></i>
                  </div>
                  <input name="fname" type="text" class="form-control validate[required]" id="fname">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Last Name</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user-o"></i>
                  </div>
                  <input name="lname" type="text" class="form-control" id="lname">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Gender</label>
                <div class="input-group">
                  <label>
                      <input name="gender" type="radio" class="flat-red" value="M" checked>&nbsp;Male&nbsp;&nbsp;
                      <input name="gender" type="radio" class="flat-red" value="F">&nbsp;Female
                    </label>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Address</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user-o"></i>
                  </div>
                  <input name="address" type="text" class="form-control" id="address">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>City</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user-o"></i>
                  </div>
                  <input name="city" type="text" class="form-control" id="city">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>State</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user-o"></i>
                  </div>
                  <input name="state" type="text" class="form-control" id="state">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Country</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user-o"></i>
                  </div>
                  <input name="country" type="text" class="form-control" id="country">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Technology</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user-o"></i>
                  </div>
                  <input name="technology" type="text" class="form-control" id="technology">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Date of Joining</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user-o"></i>
                  </div>
                  <input name="doj" type="date" class="form-control" id="doj">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Date of Leaving</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user-o"></i>
                  </div>
                  <input name="dol" type="date" class="form-control" id="dol">
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Email <span class="text-danger">*</span></label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-at"></i>
                  </div>
                  <input name="email" type="text" class="form-control validate[required]" id="email">
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Alternate Email <span class="text-danger">*</span></label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-at"></i>
                  </div>
                  <input name="alternate_email" type="email" class="form-control " id="alternate_email">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Display Name <span class="text-danger">*</span></label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-eye"></i>
                  </div>
                  <input name="display_name" type="text" class="form-control validate[required]" id="display_name">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Phone Number</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input name="phone" type="text" class="form-control" id="phone">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Designation</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-suitcase"></i>
                  </div>
                  <input name="designation" type="text" class="form-control" id="designation">
                </div>
              </div>
            </div>
            
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      
      <!-- /.box -->
      </div>
      <!-- /.row -->
      
      <div class="text-center"><a href="<?php echo site_url($pagename); ?>" class="btn btn-default btn-md" name="submit">Cancel</a>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-primary btn-md" name="submit" value="Submit" /></div>
      
    </form>
    </section>
    <!-- /.content -->
  </div>
<?php $this->load->view('include/footer.php'); ?>