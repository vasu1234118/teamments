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
    <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="box-body">
          <div class="row">
            <div class="col-md-12  page-header">
            <div class="col-md-8" style="padding-left: 0px;">
                <h1 style="margin-top: 0px; margin-bottom: 0px;"><?php echo $record_info->name; ?></h1>
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
              <div class="form-group">
                <h4 class="tm_hr">Task Goal</h4>
                <?php echo $record_info->description; ?>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <h4 class="tm_hr">Task Description</h4>
                <?php echo $record_info->precautions; ?>
              </div>
            </div>
            <!-- <div class="col-md-12">
              <div class="form-group">
                <div class="alert alert-info ">
                  <h4 class="tm_margin_0">Requrements</h4>
                </div>
                <?php //echo $record_info->requrements; ?>
              </div>
            </div> -->
            <div class="col-md-12">
              <div class="form-group">
                <h4 class="tm_hr">Step Executed</h4>
                <?php echo $record_info->step_executed; ?>
              </div>
            </div>
            <?php if($attachments){ ?>
            <div class="col-md-12" style="padding-bottom: 10px;">
                <h4 class="tm_hr">Attachments</h4>
                <?php foreach($attachments as $attachment){ ?>
                  <div class="col-md-3"><a href="<?php echo site_url('public/attachments/'.$attachment->file_name); ?>" target="_blank"><?php echo $attachment->file_name; ?></a></div>
                <?php } ?>
            </div>
            <?php } ?>



            <!-- ***********OLD view for start date taks details************************  -->
            <!-- <div class="col-md-12 alert alert-warning tm_margin_0" style="padding: 10px;">
              <div class="col-md-3">
                <h4>Start Date:<br /><?php echo date('jS M, Y', strtotime($record_info->started_on)); ?></h4>
              </div>
              <div class="col-md-3">
                <h4>Estimated Ended Date:<br /><?php echo date('jS M, Y', strtotime($record_info->estimated_ended_on)); ?></h4>
              </div>
              <div class="col-md-4">
                <h4>Estimated Time Duration (hrs): <br /><?php echo $record_info->estimated_time_duration; ?></h4>
              </div>
              <div class="col-md-2">
                <h4>Priority: <br /><?php echo $record_info->priority_title; ?></h4>
              </div>
            </div> -->
           <!-- ***********OLD view for start date taks details************************    -->



            <div class="col-md-12  " style="padding: 10px;">
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
            </div>            
            
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      
      <!-- /.box -->
      </div>
      <!-- /.row -->
    
    
    <?php foreach($tasks_info as $task_info){ ?>
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $task_info->display_name; ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="box-body">
          <div class="row">
            
            <div class="col-md-12">
              <div class="form-group">
                <label>Outcome Generated</label>
                <?php echo $task_info->outcome_generated; ?>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Problems Faced</label>
                <?php echo $task_info->problems_faced; ?>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Learning</label>
                <?php echo $task_info->learning; ?>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Time Duration (hrs): </label>
                <?php echo $task_info->time_duration; ?>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Status: </label>
                <?php echo $task_info->status; ?>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Actual Start Date: </label>
                <?php echo $task_info->actual_start_date; ?>
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
      
    <?php } ?>
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