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
    <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="box-body">
          <div class="row">
            <div class="col-md-12  page-header">
            <div class="col-md-8" style="padding-left: 0px;">
                <h3 style="margin-top: 0px; margin-bottom: 0px;"><b>TASK-ID:</b><?php echo taskId($record_info->id); ?></h3>
            </div>
            <div class="col-md-2">
                <label style="font-size: 14px; font-weight: normal;">Complexity: 
                  <?php if($record_info->complexity==1){ ?>
                  <span class="label label-danger" style="font-size: 14px;"><?php echo $record_info->complexity_title; ?></span></label>
                  <?php }if($record_info->complexity==2){ ?>
                  <span class="label label-warning" style="font-size: 14px;"><?php echo $record_info->complexity_title; ?></span></label>
                  <?php }if($record_info->complexity==3){ ?>
                  <span class="label label-primary" style="font-size: 14px;"><?php echo $record_info->complexity_title; ?></span></label>
                  <?php } ?>
            </div>

            <div class="col-md-2">
                <label style="font-size: 14px; font-weight: normal;">Priority: 
                  <?php if($record_info->priority==1){ ?>
                  <span class="label label-danger" style="font-size: 14px;"><?php echo $record_info->priority_title; ?></span></label>
                  <?php }if($record_info->priority==2){ ?>
                  <span class="label label-warning" style="font-size: 14px;"><?php echo $record_info->priority_title; ?></span></label>
                  <?php }if($record_info->priority==3){ ?>
                  <span class="label label-primary" style="font-size: 14px;"><?php echo $record_info->priority_title; ?></span></label>
                  <?php } ?>
            </div>

          </div>


          <div class="col-md-12">               
            <div class="col-md-4">
                <label style="font-size: 14px; font-weight: normal;"><strong>Task Name:</strong> </label> <?php echo $record_info->name; ?> 
                  
              </div>
               <div class="col-md-4">
                <label style="font-size: 14px; font-weight: normal;"><strong>Project-ID:</strong> </label><?php echo projectId($record_info->project_id) ?> 
                  
              </div>
               <div class="col-md-4">
                <label style="font-size: 14px; font-weight: normal;"><strong>REQ-ID:</strong> </label><?php echo $record_info->requ_id ?> 
                  
              </div>
            </div>
          <div class="col-md-12">



          <div class="dates">
              <div class="col-md-4">
                  <strong>Start Date</strong> <?php echo date('jS M, Y', strtotime($record_info->started_on)); ?>
                  <span></span>
              </div>
              <div class="col-md-4">
                  <strong>End Date</strong> <?php echo date('jS M, Y', strtotime($record_info->estimated_ended_on)); ?>
                  <span></span>
              </div>
              <div class=" col-md-4">
                  <strong>Estimated Time Duration (hrs)</strong> <?php echo $record_info->estimated_time_duration; ?> (hrs)
                 
              </div>
                            
            </div>

                    
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse1">Task Goal</a>
                  </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">
                  <div class="panel-body"> <?php echo $record_info->description; ?></div>
                  <!-- <div class="panel-footer">Panel Footer</div> -->
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse2">Task Description</a>
                  </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                  <div class="panel-body"><?php echo $record_info->precautions; ?></div>
                  <!-- <div class="panel-footer">Panel Footer</div> -->
                </div>
              </div>
              
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse3">Step to be Executed</a>
                  </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse">
                  <div class="panel-body"><?php echo $record_info->step_executed; ?></div>
                  <!-- <div class="panel-footer">Panel Footer</div> -->
                </div>
              </div>

            </div>

  <!-- <div class="form-group">
    <h4 class="tm_hr">Task Goal</h4>
    <?php echo $record_info->description; ?>
  </div> -->
</div>
            <?php if($attachments){ ?>
            <div class="col-md-12" style="padding-bottom: 10px;">
                <h4 class="tm_hr">Assigned Attachments</h4>
                <?php foreach($attachments as $attachment){ ?>
                  <div class="col-md-3"><a href="<?php echo site_url('public/attachments/'.$attachment->file_name); ?>" target="_blank"><?php echo $attachment->file_name; ?></a></div>
                <?php } ?>
            </div>
            <?php } ?>
           
            <!-- <div class="col-md-12  " style="padding: 10px;">
              <table class=" table table-hover">
                    <thead>
                      <tr>
                        <th>Start Date</th>
                        <th>Estimated End Date</th>
                        <th>Estimated Time Duration</th>
                        <th>Prority</th>
                        <th>Complexity</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                      <tr >
                        <td><?php echo date('jS M, Y', strtotime($record_info->started_on)); ?></td>
                        <td><?php echo date('jS M, Y', strtotime($record_info->estimated_ended_on)); ?></td>
                        <td><?php echo $record_info->estimated_time_duration; ?> (hours)</td>
                        <td>
                          <label style="font-size: 14px; font-weight: normal;">
                          <?php if($record_info->priority==1){ ?>
                          <span class="label label-danger" style="font-size: 14px;"><?php echo $record_info->priority_title; ?></span></label>
                          <?php }if($record_info->priority==2){ ?>
                          <span class="label label-warning" style="font-size: 14px;"><?php echo $record_info->priority_title; ?></span></label>
                          <?php }if($record_info->priority==3){ ?>
                          <span class="label label-primary" style="font-size: 14px;"><?php echo $record_info->priority_title; ?></span></label>
                          <?php } ?>
                        </td>
                        <td> 
                          <label style="font-size: 14px; font-weight: normal;"> 
                            <?php if($record_info->complexity==1){ ?>
                            <span class="label label-danger" style="font-size: 14px;"><?php echo $record_info->complexity_title; ?></span></label>
                            <?php }if($record_info->complexity==2){ ?>
                            <span class="label label-warning" style="font-size: 14px;"><?php echo $record_info->complexity_title; ?></span></label>
                            <?php }if($record_info->complexity==3){ ?>
                            <span class="label label-primary" style="font-size: 14px;"><?php echo $record_info->complexity_title; ?></span></label>
                            <?php } ?>
                        </td>
                      </tr>
                      
                    </tbody>
              </table>
            </div>    -->
            
            
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      
      <!-- /.box -->
      </div>
      <!-- /.row -->
    
    <form method="post" action="" id="ART_FORM" enctype="multipart/form-data">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $add_title; ?> Update</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="box-body">
          <div class="row">
            
            <div class="col-md-6">
              <div class="form-group">
                <label>Outcome Generated <span class="text-danger">*</span></label>
                <textarea name="outcome_generated" class="form-control validate[required]" id="outcome_generated" rows="10" cols="80"><?php echo $task_info->outcome_generated; ?></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Problems Faced <span class="text-danger">*</span></label>
                <textarea name="problems_faced" class="form-control validate[required]" id="problems_faced" rows="10" cols="80"><?php echo $task_info->problems_faced; ?></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Learning <span class="text-danger">*</span></label>
                <textarea name="learning" class="form-control validate[required]" id="learning" rows="10" cols="80"><?php echo $task_info->learning; ?></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Time Duration (Hrs)<span class="text-danger">*</span></label>
                <input type="text" name="time_duration" class="form-control validate[required]" id="time_duration" value="<?php echo $task_info->time_duration; ?>" />
              </div>
            </div>

            

            <!-- <div class="col-md-2">
              <div class="form-group">
                <label>Actual Start Date <span class="text-danger">*</span></label>
                <input type="date" name="actual_start_date" id="actual_start_date" value="<?php echo $task_info->actual_start_date; ?>">
              </div>
            </div> -->
          
            <div class="col-md-2">
              <div class="form-group">
                <label>Actual Start Date<span class="text-danger">*</span></label>
                <div  class="input-group date " data-date-format="dd-mm-yyyy">
                <input type="text" name="actual_start_date" id="actual_start_date" class="form-control validate[required]" value="<?php echo $task_info->actual_start_date; ?>" readonly>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div> 
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label>Actual End Date<span class="text-danger">*</span></label>
                <div  class="input-group date " data-date-format="dd-mm-yyyy">
                <input type="text" name="actual_end_date" id="actual_end_date" class="form-control validate[required]" value="<?php echo $task_info->actual_end_date; ?>" readonly>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div> 
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label>Remind me on <span class="text-danger">*</span></label>
                <div  class="input-group date " data-date-format="dd-mm-yyyy">
                <input type="text" name="remainder_date" id="remainder_date" class="form-control "  >
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div> 
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label>Done % <span class="text-danger">*</span></label>
                <select name="task_progress" class="form-control validate[required]" id="done" onchange="change();">
                  <!-- <option value=""> -----Select the Progress-----  </option> -->
                  <?php foreach($progress as $row){ ?>
                  <option <?php if($row->id==@$task_info->task_progress) echo 'selected'; ?> value="<?php echo $row->id; ?>"><?php echo $row->progress; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <script type="text/javascript">
              
function change() {
if (document.getElementById('done').value == '1')

  document.getElementById("status_id").value = '5';
 
K

};


            </script>

            
            <div class="col-md-2">
              <div class="form-group">
                <label>Status <span class="text-danger">*</span></label>
                <select name="status" class="form-control" onchange="onProjectChange1(this.value)" id="status_id">
                   
                  <?php foreach($status as $row){ ?>
                  <option <?php if($row->id==$task_info->status) echo 'selected'; ?> value="<?php echo $row->id; ?>"><?php echo $row->title; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <script type="text/javascript">
  function onProjectChange1(value)
  {
   //alert('hi');
    $.ajax({
        url:"<?php echo base_url();?>taskinbox/getrequirement/"+value,
        method:"GET",
        success: function(data) {
         //alert(data);
    $("#sub_status_id").html(data);
   
      },
      error: function(err) {
       console.log(err);
      }
    })

  }
</script>
<div class="col-md-2">
               <div class="form-group">
                 <?php   $mi= $this->db->get_where('sub_status', array('status_id'=>$task_info->status))->result();   ?>
                  <label>Sub Status <span class="text-danger">*</span></label>
                  <select class="form-control validate[required]" name="sub_status" id="sub_status_id">
                    <?php foreach ($mi as $se) {  ?>
   <option value="<?php echo $se->id ?>" <?php if($task_info->sub_status==$se->id){ echo "selected='selected'";} ?>><?php echo $se->name?></option>
   <?php  } ?>
                 </select>
               </div>
           </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Upload Attachments (.doc, .xls, .pdf, .jpg, .png) <span class="text-danger">*</span></label>
                <input type="file" name="attachments[]" multiple id="attachments">
              </div>
            </div>

            <?php if($myattachments){ ?>
            <div class="col-md-12" style="padding-bottom: 10px;">
                <h4 class="tm_hr">My Attachments</h4>
                <?php foreach($myattachments as $attachment){ ?>
                  <div class="col-md-3">
                    <div style="padding: 5px; border:1px solid #CCC; margin: 5px 0; width: 100%; height: 30px;">
                    <div class="pull-left"><a href="<?php echo site_url('public/attachments_mytask/'.$attachment->file_name); ?>" target="_blank"><?php echo $attachment->file_name; ?></a>
                    </div>
                    <div class="pull-right"><a href="<?php echo site_url('taskinbox/edit/'.md5($record_info->id).'/'.md5($attachment->id)); ?>" onclick="return confirm('Are you sure you want to delete this Attachment?');">Delete</a></div>
                  </div></div>
                <?php } ?>
            </div>
            <?php } ?>

            
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      
      <!-- /.box -->
      </div>
      <!-- /.row -->
      
      <div class="text-center"><a href="<?php echo site_url($pagename); ?>" class="btn btn-default btn-md" name="submit">Cancel</a>&nbsp;&nbsp;&nbsp;&nbsp;<input type="hidden" name="edit_id" value="<?php echo md5($record_info->id); ?>" /><input type="submit" class="btn btn-primary btn-md" name="update" value="Submit" /></div>
      
    </form>
    </section>
    <!-- /.content -->
  </div>
<?php $this->load->view('include/footer.php'); ?>
<!-- CK Editor -->
<script src="<?php echo site_url('public/bower_components/ckeditor/ckeditor.js'); ?>"></script>
<script>

  $(function () {
    // instance, using default configuration.
    CKEDITOR.replace('outcome_generated');
    CKEDITOR.replace('problems_faced');
    CKEDITOR.replace('learning');
  })
</script>
<script>

$("input[name=actual_start_date]").datepicker({ 
        format: 'dd-M-yyyy',
        autoclose: true, 
        todayHighlight: true,
        //setValue:'01/10/2014'
  }).datepicker('update', '<?php echo $task_info->actual_start_date=='0000-00-00'||$task_info->actual_end_date==''?date('d-M-Y'):date('d-M-Y',strtotime($task_info->actual_start_date)); ?>');
$("input[name=actual_end_date]").datepicker({ 
        format: 'dd-M-yyyy',
        autoclose: true, 
        todayHighlight: true,
        //setValue:'01/10/2014'
  }).datepicker('update', '<?php echo $task_info->actual_end_date=='0000-00-00'||$task_info->actual_end_date==''?date('d-M-Y'):date('d-M-Y',strtotime($task_info->actual_end_date)); ?>');

$("input[name=remainder_date]").datepicker({ 
        format: 'dd-M-yyyy',
        autoclose: true, 
        todayHighlight: true,
        //setValue:'01/10/2014'
  }).datepicker('update', '<?php echo $task_info->remainder_date=='0000-00-00'||$task_info->remainder_date==''?date('d-M-Y'):date('d-M-Y',strtotime($task_info->remainder_date)); ?>');

</script>
<?php echo $task_info->actual_end_date; ?>