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
                <select class="form-control" name="project_id" id="project_id">
                  <option value="">Select Project</option>
                  <?php foreach($project as $row){ ?>
                  <option <?php if($row->id==$record_info->project_id) echo 'selected'; ?> value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Milestone Name <span class="text-danger">*</span></label>
                <input name="name" type="text" class="form-control validate[required]" id="name" value="<?php echo $record_info->name; ?>">
              </div>
            </div>

           
            <!-- <div class="col-md-6">
              <div class="form-group">
                <label>Task Requrements <span class="text-danger">*</span></label>
                <textarea name="requrements" class="form-control validate[required]" id="requrements" rows="10" cols="80"><?php echo $record_info->requrements; ?></textarea>
              </div>
            </div> -->
            <div class="col-md-12">
              <div class="form-group">
                <label>Description <span class="text-danger">*</span></label>
                <textarea name="description" class="form-control validate[required]" id="description" rows="10" cols="80"><?php echo $record_info->description; ?></textarea>
              </div>
            </div>


            <!-- <div class="col-md-6">
              <div class="form-group">
                <label>Sort Order <span class="text-danger">*</span></label>
                <input name="sort_order" type="text" class="form-control validate[required]" id="sort_order" value="<?php echo $record_info->sort_order; ?>">
              </div>
            </div> -->

           <div class="col-md-3">
              <div class="form-group">
                <label>Start Date<span class="text-danger">*</span></label>
                <div  class="input-group date " data-date-format="dd-mm-yyyy">
                <input type="text"   name="start_date" id="started_on" class="form-control validate[required]"  readonly/>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
              </div>
            </div>


            <div class="col-md-3">
              <div class="form-group">
                <label>End Date<span class="text-danger">*</span></label>
                <div  class="input-group date " data-date-format="dd-mm-yyyy">
                <input type="text"   name="end_date" id="estimated_ended_on" class="form-control validate[required]" readonly/>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
              </div>
            </div>

            <div class="col-md-6">  
                <div class="form-group">
                    <label>Status</label><br />
                <label>
                      <input name="status" type="radio" class="flat-red" <?php if($record_info->status==1) echo 'checked="checked"'; ?> value="1">&nbsp;Active&nbsp;&nbsp;
                    <input name="status" type="radio" class="flat-red" <?php if($record_info->status==0) echo 'checked="checked"'; ?> value="0">&nbsp;In Active
                    </label>
                </div>
            </div>
            
 <div class="col-md-12">
              <div class="form-group">
                <label>Upload Attachments (.doc, .jpg, .png, .pdf, .xls) <span class="text-danger">*</span></label>
                
              </div>
            </div>
            <div class="row row mr field_wrapper">
            <div class="col-md-10">
              <div class="form-group">
                
                <input type="file" name="attachments[]" multiple id="attachments" class="form-control" />
              </div>
            </div>
            <div class="col-md-2">
                                <div class="form-group">
                               
                                    
                                    <button type="button" style="margin-top: 18px; padding: 0px 5px;" id="row0" class="btn btn-success pull-left add_button"><i class="fa fa-plus-square"></i></button>
                                    
                                </div>
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
                    <div class="pull-right"><a href="<?php echo site_url('milestones/edit/'.md5($record_info->id).'/'.md5($attachment->id)); ?>" onclick="return confirm('Are you sure you want to delete this Attachment?');">Delete</a></div>
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
      
      <div class="text-center"><a href="<?php echo site_url($pagename); ?>" class="btn btn-default btn-md" name="submit">Cancel</a>&nbsp;&nbsp;&nbsp;&nbsp;<input type="hidden" name="edit_id" value="<?php echo md5($record_info->id); ?>" /><input type="submit" class="btn btn-primary btn-md" name="update" value="Update" />&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-warning btn-md" name="save">Save</button></div>
      
    </form>
    </section>
    <!-- /.content -->
  </div>
<?php $this->load->view('include/footer.php'); ?>
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = "<div class='row mr field_wrapper'><div class='col-md-10'><div class='form-group'><div class='col-md-12'><input type='file'name='attachments[]'class='form-control documentname form-control-opposite'></div></div></div><div class='col-md-2 vasu' ><div class='form-group'><a type='button' style='padding: 0px 5px;margin-top:18px;' class='btn btn-danger pull-left remove_button '><i class='fa fa-minus-square'></i></a></div></div></div></div></div>"; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
       $(this).closest(".mr").remove();

 //Remove field html
        x--; //Decrement field counter
    });
});
</script>
<script>



$("input[name=start_date]").datepicker({ 
        format: 'dd-M-yyyy',
        autoclose: true, 
        todayHighlight: true,
        //setValue:'01/10/2014'
  }).datepicker('update', '<?php echo date('d-M-Y',strtotime($record_info->start_date))?>');

$("input[name=end_date]").datepicker({ 
        format: 'dd-M-yyyy',
        autoclose: true, 
        todayHighlight: true,
        //setValue:'01/10/2014'
  }).datepicker('update', '<?php echo date('d-M-Y',strtotime($record_info->end_date))?>');

  
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