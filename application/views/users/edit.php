<?php $this->load->view('include/header.php'); ?>
<?php $this->load->view('include/left_nav.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Edit <?php echo $add_title; ?></h1>
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
          <h3 class="box-title"><?php echo $add_title; ?> Login Info</h3>
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
                  <input name="username" type="text" class="form-control validate[required]" id="username" value="<?php echo $record_info->username; ?>" readonly>
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
                  <input name="password" type="password" class="form-control validate[required]" id="password" value="<?php echo base64_decode($record_info->password); ?>">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Role <span class="text-danger">*</span></label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-key"></i>
                  </div>
                  <select class="form-control" name="role">
                    <option value="">Select Role</option>
                    <?php foreach($roles as $role){ ?>
                    <option <?php if($record_info->role==$role->id) echo 'selected' ?> value="<?php echo $role->id; ?>"><?php echo $role->title; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">  
                <div class="form-group">
                    <label>Status</label><br />
                <label>
                      <input name="status" type="radio" class="flat-red" <?php if($record_info->status==1) echo 'checked="checked"'; ?> value="1">&nbsp;Active&nbsp;&nbsp;
                    <input name="status" type="radio" class="flat-red" <?php if($record_info->status==0) echo 'checked="checked"'; ?> value="0">&nbsp;In Active
                    </label>
                </div>
            </div>
          </div>
        </div>
      </div>

      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $add_title; ?> Login Info</h3>
      </div>
        <!-- /.box-header -->
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
                  <input name="fname" type="text" class="form-control validate[required]" id="fname" value="<?php echo $record_info->fname; ?>">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Last Name <span class="text-danger">*</span></label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user-o"></i>
                  </div>
                  <input name="lname" type="text" class="form-control validate[required]" id="lname" value="<?php echo $record_info->lname; ?>">
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
                  <input name="address" type="text" class="form-control" id="address" value="<?php echo $record_info->address; ?>">
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
                  <input name="city" type="text" class="form-control" id="city" value="<?php echo $record_info->city; ?>">
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
                  <input name="state" type="text" class="form-control" id="state" value="<?php echo $record_info->state; ?>">
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
                  <input name="country" type="text" class="form-control" id="country" value="<?php echo $record_info->country; ?>">
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
                  <input name="technology" type="text" class="form-control" id="technology" value="<?php echo $record_info->technology; ?>">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Date Of Join</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user-o"></i>
                  </div>
                  <input name="doj" type="date" class="form-control" id="doj" value="<?php echo $record_info->doj; ?>">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Date Of Leaveing</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user-o"></i>
                  </div>
                  <input name="dol" type="date" class="form-control" id="dol" value="<?php echo $record_info->dol; ?>">
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
                  <input name="email" type="text" class="form-control validate[required]" id="email" value="<?php echo $record_info->email; ?>">
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
                  <input name="alternate_email" type="email" class="form-control validate[required]" id="alternate_email" value="<?php echo $record_info->alternate_email; ?>">
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
                  <input name="display_name" type="text" class="form-control validate[required]" id="display_name" value="<?php echo $record_info->display_name; ?>">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Phone Number <span class="text-danger">*</span></label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input name="phone" type="text" class="form-control validate[required]" id="phone" value="<?php echo $record_info->phone; ?>">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Designation <span class="text-danger">*</span></label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-suitcase"></i>
                  </div>
                  <input name="designation" type="text" class="form-control validate[required]" id="designation" value="<?php echo $record_info->designation; ?>">
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
      
      <div class="text-center"><a href="<?php echo site_url($pagename); ?>" class="btn btn-default btn-md" name="submit">Cancle</a>&nbsp;&nbsp;&nbsp;&nbsp;<input type="hidden" name="edit_id" value="<?php echo md5($record_info->id); ?>" /><input type="submit" class="btn btn-primary btn-md" name="update" value="Update" /></div>
      
    </form>
    </section>
    <!-- /.content -->
  </div>
<?php $this->load->view('include/footer.php'); ?>