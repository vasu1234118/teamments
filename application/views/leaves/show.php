<?php $this->load->view('include/header.php'); ?>
<?php $this->load->view('include/left_nav.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>View<?php echo $add_title; ?>(<?php $z=$this->db->get_where('users', array('id'=>$record_info->user_id))->row();  echo $z->fname;echo $z->lname; ?>)</h1>
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

    <script type="text/javascript">
  function leavelmanagement()
  {
   /////alert('hi');
  var dt= document.getElementById("reservation").value;
const words = dt.split(' ');
//alert(words[0]);
//alert(words[2]);
 //alert(dt);
 const date1 = new Date(words[0]);
const date2 = new Date(words[2]);
const diffTime = Math.abs(date2 - date1);
const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
console.log(diffTime + " milliseconds");
console.log(diffDays + " days");
//alert(diffDays);
var d=diffDays-0.5;
//alert(d);
var lstime=document.getElementById("lstime").value;
var letime=document.getElementById("letime").value;
if(words[0]==words[2]){
if(lstime==letime){
  var d=0.5
  document.getElementById("ldays").value=d;

}else  if(lstime!=letime){
  var d=1
 document.getElementById("ldays").value=d;
}
}else if(words[0]!=words[2]){
  if(lstime==letime){
    var d=diffDays+1-0.5;
     document.getElementById("ldays").value=d;
  }
  if(lstime!=letime){
  var d=diffDays+1;
 document.getElementById("ldays").value=d;
}
  }
}
</script>
    
    <form method="post" action="" id="ART_FORM" enctype="multipart/form-data">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <!-- <div class="box-header with-border">
          <h3 class="box-title"><?php echo $add_title; ?> Details</h3>
        </div> -->
        <!-- /.box-header -->
        <div class="box-body">
          <div class="box-body">
          <div class="row">
            
            <div class="col-md-6">
              <div class="form-group">
                <label>Subject <span class="text-danger">*</span></label>
                <input name="title" type="text" class="form-control validate[required]" value="<?php echo $record_info->title; ?>" id="name">
              </div>
            </div>
            
            <div class="col-md-6">
            <div class="form-group">
                <label>Leave From-To <span class="text-danger">*</span></label>

                <div class="input-group">
                  <input name="from_date" type="text" class="form-control validate[required]" class="form-control pull-right" id="leave_edit">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                </div>
                <!-- /.input group -->
              </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                 <label>Leave Start Time <span class="text-danger"></span></label>
                 <select class="form-control validate[required] " name="lstime" id="lstime" on>
                  <option value="">Select Leave Start Time</option>
                   <option value="firsthalf" <?php  if($record_info->lstime=='firsthalf'){echo 'selected';} ?>>First Half</option>
                    <option value="secondhalf" <?php if($record_info->lstime=='secondhalf'){echo 'selected';} ?>>Second Half</option>
                     
                       </select>
                 
               </div>
           </div>
            
            <div class="col-md-6">
               <div class="form-group">
                 <label>Leave End Time <span class="text-danger"></span></label>
                 <select class="form-control validate[required] " name="letime" id="letime" onchange="leavelmanagement()">
                  <option value="">Select Leave End Time</option>
                   <option value="firsthalf" <?php  if($record_info->letime=='firsthalf'){echo 'selected';} ?>>First Half</option>
                    <option value="secondhalf" <?php if($record_info->letime=='secondhalf'){echo 'selected';} ?>>Second Half</option>
                     
                       </select>
                 
               </div>
           </div>

           

              <div class="col-md-6">
               <div class="form-group">
                 <label>Leave Days <span class="text-danger"></span></label>
                
                        <input name="ldays" type="text" class="form-control validate[required]" placeholder="Leave Days" id="ldays" readonly="readonly" value="<?php echo $record_info->ldays; ?>">
                 
               </div>
           </div>

            <div class="col-md-6">
               <div class="form-group">
                 <label>Leave Type <span class="text-danger"></span></label>
                 <select class="form-control validate[required] " name="lreason" id="leave_reason">
                   <option value="">Select Leave Reasons</option>
                    <option value="1" <?php  if($record_info->lreason=='1'){echo 'selected';} ?>>Special Leave </option>
                     <option value="2" <?php  if($record_info->lreason=='2'){echo 'selected';} ?>>Sick Leave</option>
                      <option value="3" <?php  if($record_info->lreason=='3'){echo 'selected';} ?>>Casual leave</option>
                       </select>
                 
               </div>
           </div>
          
            <div class="col-md-12">
                <div class="form-group">
                  <?php $proadmin_data = $this->session->userdata('proadmin_data');
   $admin_id = $proadmin_data['TM_ID']; $user=$this->db->get_where('users', array('id'=>$admin_id))->row();  ?>
                  <label>supervisorwise <span class="text-danger">*</span></label>
                  <select class="form-control select2" multiple="multiple" data-placeholder="Select The Employee"
                      style="width: 100%;" name="assigned_to[]" id="taskpr" required="required">
                    
                     <?php  $pr=$this->db->get_where('users', array('id !='=>$admin_id, 'status'=>'1'))->result();  foreach($pr as $pr2){  ?>
                        <option  <?php if(in_array($pr2->id, explode(',', $record_info->assigned_to))) echo 'selected'; ?> value="<?php echo $pr2->id; ?>"><?php echo $pr2->fname; ?><?php echo $pr2->lname; ?></option>
                        <?php } ?>
                  </select>
                </div>
            </div> 
          

           
            <!-- <div class="col-md-3">
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
                <label>Leave Reason  <span class="text-danger">*</span></label>
                <textarea name="description" class="form-control validate[required]" id="description" rows="10" cols="80"><?php echo $record_info->description; ?></textarea>
              </div>
            </div>
          
                                   

            <!-- /.col -->
          </div>
        </div>
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

<script>
  document.addEventListener('DOMContentLoaded', function() {
   // your code here
    
$('#leave_edit').daterangepicker(
      {
        locale: { format: 'MM/DD/YYYY ' },
        "startDate": "<?php echo date('m/d/Y',strtotime($record_info->from_date))?>",
        "endDate": "<?php echo date('m/d/Y',strtotime($record_info->to_date))?>"
      }
    )


  
  }, false);

</script>
