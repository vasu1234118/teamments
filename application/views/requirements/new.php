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
          <h3 class="box-title"><?php echo $add_title; ?> Details</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="box-body">
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label>Project <span class="text-danger">*</span></label>
                  <select class="form-control validate[required]" name="project_id" id="project_id">
                    <option value="">Select Project</option>
                    <?php foreach($project as $row){ ?>
                    <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                    <?php } ?>
                  </select>
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Requirement Name <span class="text-danger">*</span></label>
                <input name="name" type="text" class="form-control validate[required]" id="name">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Requirement Type <span class="text-danger">*</span></label>
                <input name="type" type="text" class="form-control validate[required]" id="type">
              </div>
            </div>


            <div class="col-md-3">
              <div class="form-group">
                <label>Start Date<span class="text-danger">*</span></label>
                <div  class="input-group date new_dates" data-date-format="dd-mm-yyyy">
                <input type="text"   name="start_date" id="started_on" class="form-control validate[required]" readonly/>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
              </div>
            </div>


            <div class="col-md-3">
              <div class="form-group">
                <label>End Date<span class="text-danger">*</span></label>
                <div  class="input-group date new_dates" data-date-format="dd-mm-yyyy">
                <input type="text"   name="end_date" id="estimated_ended_on" class="form-control validate[required]" readonly/>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Complexity <span class="text-danger">*</span></label>
                <select class="form-control" name="complexity" id="complexity">
                  <option value="">Select Complexity</option>
                  <?php foreach($complexity as $row){ ?>
                  <option value="<?php echo $row->id; ?>"><?php echo $row->title; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Priority <span class="text-danger">*</span></label>
                <select class="form-control" name="priority" id="priority">
                  <option value="">Select Priority</option>
                  <?php foreach($priority as $row){ ?>
                  <option value="<?php echo $row->id; ?>"><?php echo $row->title; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            
            <div class="col-md-6">  
                <div class="form-group">
                    <label>Scope</label><br />
                <label>
                      <input name="scope_of_work" type="radio" class="flat-red" value="1" checked>&nbsp;In-Scope&nbsp;&nbsp;
                    <input name="scope_of_work" type="radio" class="flat-red" value="0">&nbsp;Out-of-Scope
                    </label>
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Status <span class="text-danger">*</span></label>
                <select name="status" class="form-control">
                  <?php foreach($status as $row){ ?>
                  <option  value="<?php echo $row->id; ?>"><?php echo $row->title; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
         
   <!-- 
            <div class="col-md-3">
              <div class="form-group">
                <label>Priority <span class="text-danger">*</span></label>
                <select class="form-control" name="priority" id="priority">
                  <option value="">Select Priority</option>
                  <?php foreach($priority as $row){ ?>
                  <option value="<?php echo $row->id; ?>"><?php echo $row->title; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div> -->

            <div class="col-md-12">
              <div class="form-group">
                <label>Description <span class="text-danger"></span></label>
                <textarea name="requirement_goal" class="form-control validate[required]" id="description" rows="10" cols="80"></textarea>
              </div>
            </div>
          
          
          <!--************* Linking Customer ,User and Employees *************    -->
            
            <div class="col-md-6">
              <div class="form-group">
                <label>Select Customer</label>
                  <select name="customer_id" class="form-control">
                    <option  value="">--Select Customer--</option>
                  <?php foreach($all_users as $row){ ?>
                    <?php if($row->role=='8'){ ?>
                    <option  value="<?php echo $row->id; ?>"><?php echo $row->display_name; ?></option>
                  <?php }
                  } ?>
                </select>
              </div>
            </div>
            
            
            
            <div class="col-md-6">
              <div class="form-group">
                <label>Select Employee</label>
                  <select name="emp_id" class="form-control">
                  <option  value="">--Select Customer--</option>
                  <?php foreach($all_users as $row){ ?>
                    <?php if($row->role!='8'){ ?>
                  <option  value="<?php echo $row->id; ?>"><?php echo $row->display_name; ?></option>
                  <?php }
                  } ?>
                </select>
              </div>
            </div>
            <!-- ***************  ENDS Here *************  -->


            <div class="col-md-6">
              <div class="form-group">
                <label>Upload Attachments (.doc, .jpg, .png, .pdf, .xls)</label>
                <input type="file" name="attachments[]" multiple id="attachments" class="form-control" />
              </div>
            </div>


           


            

            <!-- /.col -->
          </div>
        </div>
      </div>
      
      <!-- /.box -->
      </div>
      <!-- /.row -->
      
      <div class="text-center"><a href="<?php echo site_url($pagename); ?>" class="btn btn-default btn-md" name="submit">Cancel</a>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-primary btn-md" name="submit" value="Submit" />&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-warning btn-md" name="save">Save</button></div>
      
    </form>
    </section>
    <!-- /.content -->
  </div>
<?php $this->load->view('include/footer.php'); ?>
<!-- CK Editor -->
<script src="<?php echo site_url('public/bower_components/ckeditor/ckeditor.js'); ?>"></script>
<script>
$(function () {
  var date = new Date();
  date.setDate(date.getDate());
  $(".new_dates").datepicker({ 
        format: 'dd-M-yyyy',
        startDate: date,
        autoclose: true, 
        todayHighlight: true,
  }).datepicker('update', new Date());
});
</script>
<script>
  $(function () {
    // instance, using default configuration.
    CKEDITOR.replace('description');
    CKEDITOR.replace('precautions');
    CKEDITOR.replace('requrements');
    CKEDITOR.replace('step_executed');
  })
</script>
