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
           
            <!-- <div class="col-md-3">
              <div class="form-group">
                <label>Project Name <span class="text-danger">*</span></label>
                <input name="project_name" type="text" class="form-control validate[required]" id="project_name">
              </div>
            </div> -->
            <div class="col-md-6">
                <div class="form-group">
                  <label>Project <span class="text-danger">*</span></label>
                  <select onchange="onProjectChange1(this.value),milestone(this.value), assignproject(this.value) "  class="form-control validate[required]" name="project_id" id="project_id">
                    <option value="">Select Project</option>
                    <?php foreach($project as $row){ ?>
                    <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                    <?php } ?>
                  </select>
                </div>
            </div> 
            <div class="col-md-3">
               <div class="form-group">
                 <label>Requirement <span class="text-danger"></span></label>
                 <select class="form-control " name="requirement_id" id="requirement_id">
                   <option value="">Select Requirement</option>
                   
                 </select>
               </div>
           </div>
           <script type="text/javascript">
  function onProjectChange1(value)
  {
   
    $.ajax({
        url:"<?php echo base_url();?>assignedtasks/getrequirement/"+value,
        method:"GET",
        success: function(data) {
         
    $("#requirement_id").html(data);
   
      },
      error: function(err) {
       console.log(err);
      }
    })

  }
</script>
             <div class="col-md-3">
                <div class="form-group">
                  <label>Milestone <span class="text-danger">*</span></label>
                  <select class="form-control validate[required]" name="milestone_id" id="milestone_id">
                    <option value="">Select Milestone</option>
                    
                  </select>
                </div>
            </div>
            <script type="text/javascript">
  function milestone(value)
  {
   
    $.ajax({
        url:"<?php echo base_url();?>assignedtasks/getmilestone/"+value,
        method:"GET",
        success: function(data) {
         
    $("#milestone_id").html(data);
   
      },
      error: function(err) {
       console.log(err);
      }
    })

  }
</script>
            
            <div class="col-md-6">
              <div class="form-group">
                <label>Task Name <span class="text-danger">*</span></label>
                <input name="name" type="text" class="form-control validate[required]" id="name">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Complexity <span class="text-danger">*</span></label>
                <select class="form-control validate[required]" name="complexity" id="complexity">
                  <option value="">Select Complexity</option>
                  <?php foreach($complexity as $row){ ?>
                  <option value="<?php echo $row->id; ?>"><?php echo $row->title; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label>Priority <span class="text-danger">*</span></label>
                <select class="form-control validate[required]" name="priority" id="priority">
                  <option value="">Select Priority</option>
                  <?php foreach($priority as $row){ ?>
                  <option value="<?php echo $row->id; ?>"><?php echo $row->title; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Task Goal <span class="text-danger">*</span></label>
                <textarea name="description" class="form-control validate[required]" id="description" rows="10" cols="80"></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Task Description <span class="text-danger">*</span></label>
                <textarea name="precautions" class="form-control validate[required]" id="precautions" rows="10" cols="80"></textarea>
              </div>
            </div>
           
            <div class="col-md-6">
              <div class="form-group">
                <label>Task Step to be Executed <span class="text-danger">*</span></label>
                <textarea name="step_executed" class="form-control validate[required]" id="step_executed" rows="10" cols="80"></textarea>
              </div>
            </div>
              <div class="col-md-2">
              <div class="form-group date" >
                
              
                <label>Assigned date<span class="text-danger">*</span></label>
                  <div  class="input-group date new_dates" data-date-format="dd-mm-yyyy">
                    <input class="form-control validate[required]" name="assigned_date" type="text" readonly />
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                  </div>

                <!-- input type="text" placeholder="dd-mm-yyyy" name="assigned_date" id="started_on" class="form-control validate[required]" /> -->
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label>To Start Date<span class="text-danger">*</span></label>
                <div  class="input-group date new_dates" data-date-format="dd-mm-yyyy">
                <input type="text"   name="started_on" id="started_on" class="form-control validate[required]" readonly/>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label>Expected End Date<span class="text-danger">*</span></label>
                <div  class="input-group date new_dates" data-date-format="dd-mm-yyyy">
                <input type="text"   name="estimated_ended_on" id="estimated_ended_on" class="form-control validate[required]" readonly/>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label>Estimated Time Duration (hrs) <span class="text-danger">*</span></label>
                <input type="text" name="estimated_time_duration" id="estimated_time_duration" class="form-control validate[required] allow_number" />
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="form-group">
                <label>Upload Attachments (.doc, .jpg, .png, .pdf, .xls)</label>
                <input type="file" name="attachments[]" multiple id="attachments" class="form-control" />
              </div>
            </div>
             
            <div class="col-md-12">

              <div class="form-group">
                <label>Assigned To <span class="text-danger">*</span></label>
                
                <div id="select23">
                <select class="form-control select2" multiple="multiple" data-placeholder="Select a User"
                      style="width: 100%;" name="assigned_to[]" id="assigned_to">
                 
                  <option value="">--Select Assigned--</option>
                 
                </select>
                </div>

              </div>
<script type="text/javascript">
  function assignproject(value)
  {
   
    $.ajax({
        url:"<?php echo base_url();?>assignedtasks/getproject/"+value,
        method:"GET",
        success: function(data) {
         
    $("#assigned_to").html(data);
   
      },
      error: function(err) {
       console.log(err);
      }
    })

  }
</script>

            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Email CC:<span class="text-danger"></span></label>
                

                <input name="email_cc" type="text" class="tag-input" value="">
                

              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Task Related to <span class="text-danger">*</span></label>
                <select class="form-control select2" multiple="multiple" data-placeholder="Select the taks related"
                      style="width: 100%;" name="task_related_to[]" id="task_related_to">
                  <?php foreach($allTasks as $related_task){ ?>
                  <option value="<?php echo $related_task->id; ?>"><?php echo taskId($related_task->id); ?> </option>
                  <?php } ?>
                </select>
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

document.addEventListener('DOMContentLoaded', function() {
   // your code here
   
ccAutocomplete('<?php echo json_encode($users_email,true) ?>');
}, false);

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
<script>



</script>

