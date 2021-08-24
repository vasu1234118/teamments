<?php $this->load->view('include/header.php'); ?>
<?php $this->load->view('include/left_nav.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>View <?php echo $add_title; ?></h1>
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
            
                  <label>Problem Statement<span class="text-danger">*</span></label>
                  <input name="problem_statement" readonly value="<?php echo $record_info->problem_statement; ?>" type="text" class="form-control validate[required]" id="problem_statement">
                
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="form-group">
            
                  <label>Why it is a Problem<span class="text-danger">*</span></label>
                  <input name="why_problem" type="text"  readonly value="<?php echo $record_info->why_problem; ?>" class="form-control validate[required]" id="why_problem">
                
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Tiltle <span class="text-danger">*</span></label>
                <input name="name" type="text" readonly value="<?php echo $record_info->name; ?>" class="form-control validate[required]" id="name">
              </div>
            </div>
            <!-- <div class="col-md-3">
              <div class="form-group">
                <label>Complexity <span class="text-danger">*</span></label>
                <select class="form-control" name="complexity" id="complexity">
                  <option readonly value="">Status</option>
                  <?php foreach($complexity as $row){ ?>
                  <option readonly value="<?php echo $row->id; ?>"><?php echo $row->title; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div> -->

            <div class="col-md-6">
              <div class="form-group">
                <label>Category <span class="text-danger">*</span></label>
                <input name="category" readonly value="<?php echo $record_info->category; ?>"  type="text" class="form-control validate[required]" id="category">
              </div>
            </div>

           
            <!-- <div class="col-md-6">
              <div class="form-group">
                <label>Task Requrements <span class="text-danger">*</span></label>
                <textarea name="requrements" class="form-control validate[required]" id="requrements" rows="10" cols="80"><?php echo $record_info->requrements; ?></textarea>
              </div>
            </div> -->

           
           
           


            <div class="col-md-12">
            <div class="panel-group">
             
             <div class="panel panel-default">
               <div class="panel-heading">
                 <h4 class="panel-title">
                   <a data-toggle="collapse" href="#collapse1">Idea Description</a>
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
                   <a data-toggle="collapse" href="#collapse1"> Steps to execute </a>
                 </h4>
               </div>
               <div id="collapse1" class="panel-collapse collapse in">
                 <div class="panel-body"> <?php echo $record_info->description; ?></div>
                 <!-- <div class="panel-footer">Panel Footer</div> -->
               </div>
             </div>
           

           </div>



             
            </div>


                     
            <!-- <div class="col-md-6">
              <div class="form-group">
                <label>Upload Attachments (.doc, .jpg, .png, .pdf, .xls)</label>
                <input type="file" name="attachments[]" multiple id="attachments" class="form-control" />
              </div>
            </div> -->

            

            <?php if($attachments){ ?>
            <div class="col-md-12" style="padding-bottom: 10px;">
                <h4 class="tm_hr">Assigned Attachments</h4>
                <?php foreach($attachments as $attachment){ ?>
                  <div class="col-md-3">
                    <div style="padding: 5px; border:1px solid #CCC; margin: 5px 0; width: 100%; height: 30px;">
                    <div class="pull-left"><a href="<?php echo site_url('public/attachments/'.$attachment->file_name); ?>" target="_blank"><?php echo $attachment->file_name; ?></a>
                    </div>
                    <div class="pull-right"><a href="<?php echo site_url('ideas/edit/'.md5($record_info->id).'/'.md5($attachment->id)); ?>" onclick="return confirm('Are you sure you want to delete this Attachment?');">Delete</a></div>
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
      
      <div class="text-center"><a href="<?php echo site_url($pagename); ?>" class="btn btn-warning btn-md" name="submit">OK</a>&nbsp;&nbsp;&nbsp;&nbsp;<input type="hidden" name="edit_id" value="<?php echo md5($record_info->id); ?>" />
      <!-- <input type="submit" class="btn btn-primary btn-md" name="update" value="Update" />&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-warning btn-md" name="save">Save</button> -->
    </div>
      
    </form>
    </section>
    <!-- /.content -->
  </div>
<?php $this->load->view('include/footer.php'); ?>
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