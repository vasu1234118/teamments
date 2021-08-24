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
    <?php if($this->session->flashdata('message')){ ?>
    <div class="alert alert-success">
      <?php echo $this->session->flashdata('message'); ?>
    </div>
    <?php } ?>
    
    <form method="post" action="" id="ART_FORM" enctype="multipart/form-data">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <?php if($record_info->flag==2){ ?>
        <div class="alert alert-warning">
          <i class="fa fa-save" style="font-size:20px;color:red"></i>&nbsp;&nbsp;This task was saved task.
        </div>
      <?php } ?>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="box-body">
          <div class="row">
            <?php //print_r($record_info)?>
            <div class="col-md-6">
                <div class="form-group">
                  <label>Project <span class="text-danger">*</span></label>
                  <select onchange="onProjectChange(this.value)" class="form-control validate[required]" name="project_id" id="project_id">
                    <option value="">Select Project</option>
                    <?php foreach($project as $row){ ?>
                    <option <?php echo $row->id==$record_info->project_id?"selected":''; ?> value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
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

             <div class="col-md-3">
                <div class="form-group">
                  <label>Milestone <span class="text-danger">*</span></label>
                  <select class="form-control validate[required]" name="milestone_id" id="milestone_id">
                    <option value="">Select Milestone</option>
                    
                  </select>
                </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Task Name <span class="text-danger">*</span></label>
                <input name="name" type="text" class="form-control validate[required]" id="name" value="<?php echo $record_info->name; ?>">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Complexity <span class="text-danger">*</span></label>
                <select class="form-control" name="complexity" id="complexity">
                  <option value="">Select Complexity</option>
                  <?php foreach($complexity as $row){ ?>
                  <option <?php if($row->id==$record_info->complexity) echo 'selected'; ?> value="<?php echo $row->id; ?>"><?php echo $row->title; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Priority <span class="text-danger">*</span></label>
                <select class="form-control" name="priority" id="priority">
                  <option value="">Select Priority</option>
                  <?php foreach($priority as $row){ ?>
                  <option <?php if($row->id==$record_info->priority) echo 'selected'; ?> value="<?php echo $row->id; ?>"><?php echo $row->title; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Task Goal <span class="text-danger">*</span></label>
                <textarea name="description" class="form-control validate[required]" id="description" rows="10" cols="80"><?php echo $record_info->description; ?></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Task Description <span class="text-danger">*</span></label>
                <textarea name="precautions" class="form-control validate[required]" id="precautions" rows="10" cols="80"><?php echo $record_info->precautions; ?></textarea>
              </div>
            </div>
            <!-- <div class="col-md-6">
              <div class="form-group">
                <label>Task Requrements <span class="text-danger">*</span></label>
                <textarea name="requrements" class="form-control validate[required]" id="requrements" rows="10" cols="80"><?php echo $record_info->requrements; ?></textarea>
              </div>
            </div> -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Task Step to be Executed <span class="text-danger">*</span></label>
                <textarea name="step_executed" class="form-control validate[required]" id="step_executed" rows="10" cols="80"><?php echo $record_info->step_executed; ?></textarea>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label>Assigned date<span class="text-danger">*</span></label>
                <div  class="input-group date" data-date-format="dd-mm-yyyy">
                <input type="text" name="assigned_date" id="started_on" class="form-control validate[required]"  readonly/>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>     
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label>To Start Date<span class="text-danger">*</span></label>
                <div  class="input-group date " data-date-format="dd-mm-yyyy">
                <input type="text" name="started_on" id="started_on" class="form-control validate[required]" value="<?php echo $record_info->started_on; ?>" readonly>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div> 
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label>Expected End Date<span class="text-danger">*</span></label>
                <div  class="input-group date " data-date-format="dd-mm-yyyy">
                <input type="text" name="estimated_ended_on" id="estimated_ended_on" class="form-control validate[required]" value="<?php echo $record_info->estimated_ended_on; ?>" readonly>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div> 
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label>Estimated Time Duration (hrs) <span class="text-danger">*</span></label>
                <input type="text" name="estimated_time_duration" id="estimated_time_duration" class="form-control validate[required] allow_number" value="<?php echo $record_info->estimated_time_duration; ?>" />
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="form-group">
                <label>Upload Attachments (.doc, .jpg, .png, .pdf, .xls)</label>
                <input type="file" name="attachments[]" multiple id="attachments" class="form-control" />
              </div>
            </div>

            <?php if($attachments){ ?>
            <div class="col-md-12" style="padding-bottom: 10px;">
                <h4 class="tm_hr">Assigned Attachments</h4>
                <?php foreach($attachments as $attachment){ ?>
                  <div class="col-md-3">
                    <div style="padding: 5px; border:1px solid #CCC; margin: 5px 0; width: 100%; height: 30px;">
                    <div class="pull-left"><a href="<?php echo site_url('public/attachments/'.$attachment->file_name); ?>" target="_blank"><?php echo $attachment->file_name; ?></a>
                    </div>
                    <div class="pull-right"><a href="<?php echo site_url('assignedtasks/edit/'.md5($record_info->id).'/'.md5($attachment->id)); ?>" onclick="return confirm('Are you sure you want to delete this Attachment?');">Delete</a></div>
                  </div></div>
                <?php } ?>
            </div>
            <?php } ?>            

            
            <div class="col-md-12">
              <div class="form-group">
                <label>Assigned To</label> <!-- disabled="true" -->
                <!-- <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                      style="width: 100%;" name="assigned_to[]">
                  <?php foreach($assigned_users as $user){ ?>
                  <option <?php if(in_array($user->id, explode(',', $record_info->assigned_to))) echo 'selected'; ?> value="<?php echo $user->id; ?>"><?php echo $user->display_name; ?> ( <?php echo $user->role_name; ?> )</option>
                  <?php } ?>
                </select> -->
               
                  

                <div id="select23">
                <select class="form-control select2" multiple="multiple" data-placeholder="Select a User"
                      style="width: 100%;" name="assigned_to[]" id="assigned_to">
                 
                  <option value="">--Select Assigned--</option>
                 
                </select>
                </div>

                
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Email CC:<span class="text-danger"></span></label>
                

                <input name="email_cc" value="<?php echo $record_info->email_cc ?>"ype="text" class="tag-input" value="">
                

              </div>
            </div>
          
            <div class="col-md-12">
              <div class="form-group">
                <label>Task Related to <span class="text-danger">*</span></label>
                <select class="form-control select2" multiple="multiple" data-placeholder="Select the taks related"
                      style="width: 100%;" name="task_related_to[]" id="task_related_to">
                  <?php foreach($allTasks as $related_task){ ?>
                  <option <?php if(in_array($related_task->id, explode(',', $record_info->task_related_to))) echo 'selected'; ?> value="<?php echo $related_task->id; ?>"><?php echo taskId($related_task->id); ?> </option>
                  <?php } ?>
                </select>
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
      
      <div class="text-center"><a href="<?php echo site_url($pagename); ?>" class="btn btn-default btn-md" name="submit">Cancel</a>&nbsp;&nbsp;&nbsp;&nbsp;<input type="hidden" name="edit_id" value="<?php echo md5($record_info->id); ?>" /><input type="submit" class="btn btn-primary btn-md" name="update" value="Update" />&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-warning btn-md" name="save">Save</button></div>
      
    </form>
    </section>
    <!-- /.content -->
  </div>
<?php $this->load->view('include/footer.php'); ?>
<script>
  /**Calling on function onProjectLoad(project_id,milestone_id ) */
  onProjectLoad('<?php echo $record_info->project_id?>','<?php echo $record_info->milestone_id?>')
  getProjectReqOnLoad('<?php echo $record_info->project_id?>','<?php echo $record_info->requirement_id?>')
  getOnLoadProjectAssignedUsers('<?php echo $record_info->project_id ?>','<?php echo $record_info->assigned_to ?>');
</script>

<script>


$("input[name=assigned_date]").datepicker({ 
        format: 'dd-M-yyyy',
        autoclose: true, 
        todayHighlight: true,
        //setValue:'01/10/2014'
  }).datepicker('update', '<?php echo date('d-M-Y',strtotime($record_info->assigned_date))?>');

$("input[name=started_on]").datepicker({ 
        format: 'dd-M-yyyy',
        autoclose: true, 
        todayHighlight: true,
        //setValue:'01/10/2014'
  }).datepicker('update', '<?php echo date('d-M-Y',strtotime($record_info->started_on))?>');

$("input[name=estimated_ended_on]").datepicker({ 
        format: 'dd-M-yyyy',
        autoclose: true, 
        todayHighlight: true,
        //setValue:'01/10/2014'
  }).datepicker('update', '<?php echo date('d-M-Y',strtotime($record_info->estimated_ended_on))?>');

  
$(function () {

  
  var date = new Date();
  date.setDate(date.getDate());
  $(".new_dates").datepicker({ 
        format: 'dd-M-yyyy',
        startDate: date,
        autoclose: true, 
        todayHighlight: true,
        //setValue:'01/10/2014'
  }).datepicker('update', '2011-03-05', '2011-03-07','2011-03-05');
});

/********  $('.datepicker').data({date: '2015-01-01'});
$('.datepicker').datepicker('update');  *********/
</script>

<!-- CK Editor -->
<script src="<?php echo site_url('public/bower_components/ckeditor/ckeditor.js'); ?>"></script>
<script>
  $(function () {
    // instance, using default configuration.
    CKEDITOR.replace('description');
    CKEDITOR.replace('precautions');
    //CKEDITOR.replace('requrements');
    CKEDITOR.replace('step_executed');
  })
</script>
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