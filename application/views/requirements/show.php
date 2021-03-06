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
            
          <!--  <div class="col-md-6" style="padding-left: 0px;">
                <h3 style="margin-top: 0px; margin-bottom: 0px;"><b>Project Name:</b><?php $z=$this->db->get_where('projects', array('id'=>$record_info->project_id))->row(); echo $z->name; ?></h3>
            </div>-->
            <div class="col-md-6">
              <h3 style="margin-top: 0px; margin-bottom: 0px;"><b>Project Name:</b><?php $z=$this->db->get_where('projects', array('id'=>$record_info->project_id))->row(); echo $z->name; ?></h3>
            </div>
            
           
            <div class="col-md-6">
             
                  
                  <h3 style="margin-top: 0px; margin-bottom: 0px;"><b>Requirement Name:</b><?php echo $record_info->name; ?></h3>
                
             
            </div>
             <br/><br/><br/><br/>
            <div class="col-md-6">
                <h3 style="margin-top: 0px; margin-bottom: 0px;"><b>Requirement Type:</b><?php echo $record_info->type; ?></h3>
              
            </div>


            <div class="col-md-3">
                <h3 style="margin-top: 0px; margin-bottom: 0px;"><b>Start Date:</b><?php echo $record_info->start_date; ?></h3>
              
            </div>


            <div class="col-md-3">
                <h3 style="margin-top: 0px; margin-bottom: 0px;"><b>End Date:</b><?php echo $record_info->end_date ; ?></h3>
             
            </div>
<br/><br/><br/>
            <div class="col-md-6">
                <h3 style="margin-top: 0px; margin-bottom: 0px;"><b>Complexity:</b><?php $c=$this->db->get_where('complexity', array('id'=>$record_info->complexity))->row(); echo $c->title; ?></h3>

              
            </div>
            <div class="col-md-6">
                 <h3 style="margin-top: 0px; margin-bottom: 0px;"><b>Priority:</b><?php $p=$this->db->get_where('priority', array('id'=>$record_info->priority))->row(); echo $p->title; ?></h3>

              
            </div>

           <br/><br/><br/> 
            
            <div class="col-md-6">  
            <label style="font-size: 25px; font-weight: 700;">Scope: </label>
                  <?php if($record_info->scope_of_work==1){ ?>
                  <span class="label label-danger" style="font-size: 15px;">In-Scope</span></label>
                  <?php }if($record_info->scope_of_work==0){ ?>
                  <span class="label label-warning" style="font-size: 15px;">Out-of-Scope</span></label>
                  <?php } ?>
               
            </div>
            
            <div class="col-md-6">
                <h3 style="margin-top: 0px; margin-bottom: 0px;font-size: 25px;"><b style="font-weight: 700;">Status:</b><?php $s=$this->db->get_where('status', array('id'=>$record_info->status))->row(); echo $s->title; ?></h3>

             
            </div>
<br/><br/><br/>
            <div class="col-md-12">
             
                <label style="font-size: 25px;font-weight: 700;">Description <span class="text-danger"></span></label><br/>
                <label style="font-size: 17px; font-weight: normal;"><?php echo $record_info->requirement_goal?> </label>
                
             
            </div>

           
           <div class="col-md-6">
                <h3 style="margin-top: 0px; margin-bottom: 0px;"><b>Customer:</b><?php $us=$this->db->get_where('users', array('id'=>$record_info->customer_id))->row(); echo @$us->display_name; ?></h3>

           <!--<div class="form-group">
                <label>Select Customer</label>
                  <select name="customer_id" class="form-control">
                    <option  value="">--Select Customer--</option>
                  <?php foreach($all_users as $row){ ?>
                    <?php if($row->role=='8'){ ?>
                    <option <?php echo $record_info->customer_id==$row->id?'selected':'' ?>  value="<?php echo $row->id; ?>"><?php echo $row->display_name; ?></option>
                  <?php }
                  } ?>
                </select>
              </div>-->
            </div>
            
            
            
            <div class="col-md-6">
                <h3 style="margin-top: 0px; margin-bottom: 0px;"><b>Customer:</b><?php $us=$this->db->get_where('users', array('id'=>$record_info->emp_id))->row(); echo @$us->display_name; ?></h3>
             <!-- <div class="form-group">
                <label>Select Employee</label>
                  <select name="emp_id" class="form-control">
                  <option  value="">--Select Employee--</option>
                  <?php foreach($all_users as $row){ ?>
                    <?php if($row->role!='8'){ ?>
                  <option <?php echo $record_info->emp_id==$row->id?'selected':'' ?> value="<?php echo $row->id; ?>"><?php echo $row->display_name; ?></option>
                  <?php }
                  } ?>
                </select>
              </div>-->
            </div>


            <!-- <div class="col-md-6">
              <div class="form-group">
                <label>Task Requrements <span class="text-danger">*</span></label>
                <textarea name="requrements" class="form-control validate[required]" id="requrements" rows="10" cols="80"><?php echo $record_info->requrements; ?></textarea>
              </div>
            </div> -->
          


            <!-- <div class="col-md-6">
              <div class="form-group">
                <label>Sort Order <span class="text-danger">*</span></label>
                <input name="sort_order" type="text" class="form-control validate[required]" id="sort_order" value="<?php echo $record_info->sort_order; ?>">
              </div>
            </div> -->

           
           
            

            

            <?php if($attachments){ ?>
            <div class="col-md-12" style="padding-bottom: 10px;">
                <h4 class="tm_hr"> Attachments</h4>
                <?php foreach($attachments as $attachment){ ?>
                  <div class="col-md-3">
                    <div style="padding: 5px; border:1px solid #CCC; margin: 5px 0; width: 100%; height: 30px;">
                    <div class="pull-left"><a href="<?php echo site_url('public/attachments_mytask/'.$attachment->file_name); ?>" target="_blank"><?php echo $attachment->file_name; ?></a>
                    </div>
                    <div class="pull-right"><a href="<?php echo site_url('learnings/edit/'.md5($record_info->id).'/'.md5($attachment->id)); ?>" onclick="return confirm('Are you sure you want to delete this Attachment?');">Delete</a></div>
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
      
      <!--<div class="text-center"><a href="<?php echo site_url($pagename); ?>" class="btn btn-default btn-md" name="submit">Cancel</a>&nbsp;&nbsp;&nbsp;&nbsp;<input type="hidden" name="edit_id" value="<?php echo md5($record_info->id); ?>" /><input type="submit" class="btn btn-primary btn-md" name="update" value="Update" />&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-warning btn-md" name="save">Save</button></div>
    -->  
    </form>
    </section>
    <!-- /.content -->
  </div>
<?php $this->load->view('include/footer.php'); ?>
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