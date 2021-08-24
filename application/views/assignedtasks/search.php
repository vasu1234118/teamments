<?php $this->load->view('include/header.php'); ?>
<?php $this->load->view('include/left_nav.php'); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Search</h1>
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
    

     
</script>
    <form method="post" action="" id="ART_FORM" enctype="multipart/form-data">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <!-- <h3 class="box-title"><?php echo $add_title; ?> Details</h3> -->
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
                 <select class="form-control " name="requirement_id" id="requirement_id" onchange="advanced()">
                   <option value="">Select Requirement</option>
                   
                 </select>
               </div>
           </div>
           <script type="text/javascript">
  function onProjectChange1(value)
  {
    //alert(value);
   
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
                  <select class="form-control validate[required]" name="milestone_id" id="milestone_id" onchange="advanced()">
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
                <label>Complexity <span class="text-danger">*</span></label>
                <select class="form-control validate[required]" name="complexity" id="complexity" onchange="advanced()">
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
                <select class="form-control validate[required]" name="priority" id="priority" onchange="advanced()">
                  <option value="">Select Priority</option>
                  <?php foreach($priority as $row){ ?>
                  <option value="<?php echo $row->id; ?>"><?php echo $row->title; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

           <div class="col-md-6">
              <div class="form-group">
                <label>Status <span class="text-danger">*</span></label>
                <?php   $mi= $this->db->get_where('status')->result();   ?>
                <select name="status" class="form-control" onchange="onProjectChange2(this.value)" id="status_id">
                   <option value="">Select Status</option>
                  <?php foreach($mi as $row){ ?>
                  <option value="<?php echo $row->id; ?>"><?php echo $row->title; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <script type="text/javascript">
  function onProjectChange2(value)
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
<div class="col-md-6">
               <div class="form-group">
                 
                  <label>Sub Status <span class="text-danger">*</span></label>
                  <select class="form-control validate[required]" name="sub_status" id="sub_status_id">
                    
                 </select>
               </div>
           </div>

           
            
            
<div class="col-md-12">

              <div class="form-group">
                <label>Assigned To <span class="text-danger">*</span></label>
                
                <div id="select23">
                <select class="form-control select2"  data-placeholder="Select a User"
                      name="assigned_to" id="assigned_to">
                 
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
            
            
            <div class="col-md-3">
              <div class="form-group">
                <label>To Start Date<span class="text-danger">*</span></label>
                <div  class="input-group date new_dates" data-date-format="dd-mm-yyyy">
                <input type="text"   name="started_on" id="started_on" class="form-control validate[required]" readonly/>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Expected End Date<span class="text-danger">*</span></label>
                <div  class="input-group date new_dates" data-date-format="dd-mm-yyyy">
                <input type="text"   name="estimated_ended_on" id="estimated_ended_on" class="form-control validate[required]" readonly/>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
              </div>
            </div>
           
           

           

            <!-- /.col -->
          </div>
        </div>
      </div>
      
      <!-- /.box -->
      </div>
      <!-- /.row -->
      
    <div class="text-center"><input type="submit" class="btn btn-primary btn-md" name="submit" value="Submit" />&nbsp;&nbsp;&nbsp;&nbsp;<!-- <button type="submit" class="btn btn-warning btn-md" name="save">Save</button> --></div>
      
    </form>
    </section>
    <!-- /.content -->

     <section class="content-header">
      <?php if($this->uri->segment(2)=="alltasks" && $this->uri->segment(1)=="assignedtasks" ){ ?>
      <h1>ALL Tasks</h1>
      <?php }  else if($this->uri->segment(2)=="mysavedtasks" && $this->uri->segment(1)=="assignedtasks" ){ ?>
        <h1>My Saved Tasks</h1>
    <?php } else if($this->uri->segment(1)=="assignedtasks"){ ?>
      <h1>Assigned Tasks</h1>
    <?php } ?>
    </section>

    <!-- Main content -->
    <section class="content" >

      <?php if($this->session->flashdata('message')){ ?>
      <div class="alert alert-success">
        <?php echo $this->session->flashdata('message'); ?>
      </div>
      <?php } ?>

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
         <!--  <h3 class="box-title"><?php echo $title; ?> </h3> -->

          <div class="box-tools pull-right">
            <a href="<?php echo site_url($pagename.'/add_new'); ?>" class="btn btn-danger btn-xs"><i class="fa fa-plus-circle"></i> Add New <?php echo $add_title; ?></a>
          </div>
        </div>
        <!-- /.box-header -->
        <?php $admin= $this->data['ADMIN_ID']; if($admin=='20'){ ?>
                <div class="box-body" id="result">
        <div class="row">
            <div class="col-md-12">
              <table id="referral_table" class="display responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                        <tr>
                            <th style="width: 1%;">S.no</th>
                            <th style="width: 1%;">TASK-ID</th>
                            <th style="width: 1%;">REQ-ID</th>
                            <th style="width: 21%;">Project </th>
                            <th style="width: 21%;">Milestone </th>
                            <th style="width: 21%;">Task Name</th>
                            <th style="width: 10%;">Assigned to (with status)</th>
                            <th style="width: 10%;">Est Time</th>
                            <th style="width: 9%;">Priority</th>
                            <th style="width: 9%;">Complexity</th>
                            <th style="width: 9%;">To Start Date</th>
                            <th style="width: 9%;">Expected End Date</th>
                             <th style="width: 9%;">Actual Start Date</th>
                              <th style="width: 9%;">Actual End Date</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if(isset($_POST['submit'])) { $project_id=$_POST['project_id'];
$requirement_id=$_POST['requirement_id'];
$milestone_id=$_POST['milestone_id'];
$complexity=$_POST['complexity'];
$priority=$_POST['priority'];

$admin= $this->data['ADMIN_ID'];
if($admin){
  //echo "tpeschool";
$this->db->where('created_by',$admin);

}
if($project_id){
  //echo "tpeschool";
$this->db->where('project_id',$project_id);

}
if($requirement_id){
  //echo "tpeschool";
$this->db->where('requirement_id',$requirement_id);

}
if($milestone_id){
  //echo "tpeschool";
$this->db->where('milestone_id',$milestone_id);

}
if($complexity){
  //echo "tpeschool";
$this->db->where('complexity',$complexity);

}
if($priority){
  //echo "tpeschool";
$this->db->where('priority',$priority);

}






$res=$this->db->get('createtasks')->result();






                     $index=1; foreach($res as $row){ ?>
                        <tr>
                          <td><?php echo $index; ?></td>
                          <td><?php echo taskId($row->id); ?></td>
                          <td>PJ4REQ000<?php echo ($row->project_id); ?></td>
                          <td><?php echo $row->project_name;  ?></td>
                          <td><?php echo $row->milestone_name;  ?></td>
                          <td><?php echo $row->name; if($row->flag==2) echo '&nbsp;[ <i class="fa fa-save" style="font-size:20px;color:red"></i> ]'; ?></td>
                          <td><span class="tooltiper" title="<?php echo $row->users_status; ?>"><?php echo $row->users_status; ?></span>
                        </td>
                          <td><?php echo $row->estimated_time_duration; ?></td>
                          <td><?php echo $row->priority_name; ?></td>
                          <td><?php echo $row->complexity_name; ?></td>
                          <td><?php echo date('d-m-Y',strtotime($row->started_on)); ?></td>
                          <td><?php echo date('d-m-Y',strtotime($row->estimated_ended_on)); ?></td>
                          <td><?php echo date('d-m-Y',strtotime($row->actual_start_date)); ?></td>
                          <td><?php echo date('d-m-Y',strtotime($row->actual_end_date)); ?></td>
                          <td>
                            <a href="<?php echo site_url($pagename.'/copy/'.md5($row->id)); ?>"   title="Copy" onclick="return confirm('Are you sure you want to copy this Task?');"><i class="fa fa-copy"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="<?php echo site_url($pagename.'/show/'.md5($row->id)); ?>"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp;

                            <?php if($row->created_by==$ADMIN_ID||$ADMIN_ID=='20'){?>
                            <a href="<?php echo site_url($pagename.'/edit/'.md5($row->id)); ?>"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="<?php echo site_url($pagename.'/delete/'.md5($row->id)); ?>" onclick="return confirm('Are you sure you want to delete this Task?');"><i class="fa fa-trash-o"></i></a>
                             <a data-toggle="modal" data-target=".a<?php echo $row->id; ?>exampleModal"  href="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa-plus-circle font-size-18"></i></a>

   

                          </td>
                            <?php } ?>
                        </tr>
                                                  <!-- Edit Modal -->

<div class="modal fade a<?php echo $row->id; ?>exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<script type="text/javascript">
                  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
                </script>
<div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel"> Project Task Merge;</h4>
                        </div>
<div class="modal-body">



  <form  method="post" enctype="multipart/form-data" class="needs-validation" action="<?php echo base_url(); ?>employee/index/<?php echo $row->id; ?>" novalidate>
         

<div class="form-body pal">

<?php $re=$this->db->get_where('tm_createtasks', array('id'=>$row->id))->row(); ?>


<div class="row form-group mbn">
    <label for="inputUsername" class="col-md-4 control-label">Task List
    <span class='require'>*</span></label>
<?php $ca= $this->db->get_where('tm_createtasks', array('project_id'=>$re->project_id))->result();  ?>
    <div class="col-md-8 input-icon right">
     <select class="form-control js-example-basic-multiple" multiple="multiple" data-placeholder="Select the taks related" name="task_related_to[]">
        <?php  foreach ($ca as $ks) { ?>
   <option value="<?php echo $ks->id ?>"  ><?php echo taskId($ks->id); ?></option>
   <?php  } ?>
    </select>
       
   
    </div>
</div> 






 




 

              








</div>

<div class="row form-group mbn">
    <div class="col-md-4"></div>
    <div class="col-md-8">
        <div class="form-actions pll prl pull-right">
                <button type="submit" class="btn btn-primary" name="update">Update</button>
                &nbsp;
          </div>
          </div>      
            </div>

        </form>
 
</div>
</div>
</div>
<script src='<?php echo site_url("public/bower_components/select2/dist/js/select2.full.min.js"); ?>'></script>
</div>
  <!-- Edit Modal -->
                        <?php $index++;} } ?>
                    </tbody>
                </table>
                
            </div>
          </div> 

        </div>
      <?php } else { ?> 
        <div class="box-body" id="result">
        <div class="row">
            <div class="col-md-12">
              <table id="referral_table" class="display responsive nowrap" cellspacing="0" width="100%">
                 <thead>
                        <tr>
                            <th style="width: 1%;">S.no</th>
                            <th style="width: 1%;">Task-ID</th>
                            <th style="width: 47%;">Task Name</th>
                            <th style="width: 8%;">Assigned by</th>
                            <th style="width: 8%;">Prority</th>
                            <th style="width: 8%;">Complexity</th>
                            <th style="width: 8%;">Status</th>
                            <th style="width: 9%;">Started On</th>
                            <th style="width: 9%;">End Date</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if(isset($_POST['submit'])) { $project_id=$_POST['project_id'];
$requirement_id=$_POST['requirement_id'];
$milestone_id=$_POST['milestone_id'];
$complexity=$_POST['complexity'];
$priority=$_POST['priority'];
$status=$_POST['status'];
$sub_status=$_POST['sub_status'];


if($admin=='20'){
  }else {
if($admin){
 $this->db->where('user_id',$admin);

}
}
if($project_id){
  //echo "tpeschool";
$this->db->where('project_id',$project_id);

}
if($status){
$s1=$status;

}
if($status){
$sub=$sub_status;

}
if($requirement_id){
  //echo "tpeschool";
$this->db->where('requirement_id',$requirement_id);

}
if($milestone_id){
  //echo "tpeschool";
$this->db->where('milestone_id',$milestone_id);

}
if($complexity){
  //echo "tpeschool";
$this->db->where('complexity',$complexity);

}
if($priority){
  //echo "tpeschool";
$this->db->where('priority',$priority);

}






/*$res=$this->db->get('createtasks')->result();*/
$this->db->select('ct.*,t.display, t.createtask_id,u.display_name, c.title as complexity_name, p.title as priority_name,s.title as status_name'); 
    $this->db->from('createtasks'.' ct');
   
  $this->db->join('complexity'.' c', 'ct.complexity = c.id');
    $this->db->join('priority'.' p', 'ct.priority = p.id');
    $this->db->join('users'.' u', 'ct.created_by = u.id');

    $this->db->join('tasks'.' t', ' t.createtask_id=ct.id');
    if($status){
    $this->db->where('t.status', $status);
  }
  if($sub_status){
    $this->db->where('t.sub_status', $sub);
  }
$this->db->join('status'.' s', 't.status = s.id');
    $this->db->order_by('id','DESC');
    
    $records =$this->db->get()->result();
echo $this->db->last_query();




                     $index=1; foreach($records as $row){ ?>
                        <tr <?php if($row->display=='N'){ echo 'class="at_bold"'; } ?>>
                          <td><?php echo $index; ?></td>
                          <td><?php echo taskId($row->createtask_id); ?></td>
                          <td><?php echo $row->name; ?></td>
                          <td><?php echo $row->display_name; ?></td>
                          <td><?php echo $row->priority_name; ?></td>
                          <td><?php echo $row->complexity_name; ?></td>
                          <td><?php echo $row->status_name; ?></td>
                          <td><?php echo date('d-m-Y',strtotime($row->started_on)); ?></td>
                          <td><?php echo date('d-m-Y',strtotime($row->estimated_ended_on)); ?></td>
                          <td><a href="<?php echo site_url($pagename.'/edit/'.md5($row->id)); ?>"><i class="fa fa-eye"></i> View</a></td>
                        </tr>
                        <?php $index++;} } ?>
                    </tbody>
                </table>
                
            </div>
          </div> 

        </div>
      <?php } ?>
     </div>
    </section>
  </div>

<?php $this->load->view('include/footer.php'); ?>
<!-- CK Editor -->
<script src="<?php echo site_url('public/bower_components/ckeditor/ckeditor.js'); ?>"></script>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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


