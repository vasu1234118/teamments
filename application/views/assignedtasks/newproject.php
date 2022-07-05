<?php $this->load->view('include/header.php'); ?>
<?php $this->load->view('include/left_nav.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Employee Wise Search</h1>
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
  

	
	


    <form method="post" action="" id="ART_FORM" enctype="multipart/form-data" name="upload" onsubmit="return validate();">

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
            <?php $proadmin_data = $this->session->userdata('proadmin_data');
	 $admin_id = $proadmin_data['TM_ID']; $user=$this->db->get_where('users', array('id'=>$admin_id))->row() ?>
            <div class="col-md-6">
                <div class="form-group">
                  <label>Project <span class="text-danger">*</span></label>
                  <select onchange="onProjectChange1(this.value),milestone(this.value), assignproject(this.value) "  class="form-control"  name="pr_id" id="project_id" required="required">
                    <option value="">Select Project</option>
                    <?php if(($user->role=='1') || ($user->role=='2') ||($user->role=='3')){ ?> 
                    <?php foreach($project as $row){ ?>
                    <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                    <?php } ?>
                    <?php } else if($user->role=='4'){ ?>
                    
                    <?php  $this->db->from('tm_projects'); $this->db->where("FIND_IN_SET($admin_id, assigned_to)");  $pr=$this->db->get()->result(); 
 foreach($pr as $r){ ?>
                        <option value="<?php echo $r->id; ?>"><?php echo $r->name; ?></option>
                        <?php } ?>
                  <?php  } ?>
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
                 
                  <label>Employee <span class="text-danger">*</span></label>
                  

                   <select class="form-control select2" multiple="multiple" data-placeholder="Select The Employee"
                      style="width: 100%;" name="emp_id[]" id="taskpr" required="required">
                  
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
         
    $("#taskpr").html(data);
   
      },
      error: function(err) {
       console.log(err);
      }
    })

  }
</script>

           
            


            <!-- /.col -->
          </div>
        </div>
      </div>
      
      <!-- /.box -->
      </div>
      <!-- /.row -->
      
      <div class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-primary btn-md" name="submit" value="Search" /></div>
      
    </form>
    </section>
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
        <div class="box-body" id="result">
        <div class="row">
            <div class="col-md-12">
              <table id="referral_table1" class="display responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                        <tr>
                            <th style="width: 1%;">S.no</th>
                            <th style="width: 1%;">TASK-ID</th>
                            <th style="width: 9%;">To Date</th>
                            <th style="width: 12%;">Project </th>
                            <th style="width: 12%;">Milestone </th>
                            <th style="width: 21%;">Task Name</th>
                            <th style="width: 10%;">Assigned to (with status)</th>
                            <th style="width: 10%;">Est Time (Hrs)</th>
                            <th style="width: 9%;">Priority</th>
                            <th style="width: 9%;">Complexity</th>
                            <th style="width: 1%;">REQ-ID</th>
                            
                            
                          
                            <th style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                      <?php $index=1; foreach($records as $row){ ?>
                        <tr>
                          <td><?php echo $index; ?></td>
                          <td><?php echo taskId($row->id); ?></td>
                          <td><?php echo date('d-m-Y',strtotime($row->started_on)); ?></td>
                          
                          <td><?php echo $row->project_name;  ?></td>
                          <td><?php echo $row->milestone_name;  ?></td>
                          <td><?php echo $row->name; if($row->flag==2) echo '&nbsp;[ <i class="fa fa-save" style="font-size:20px;color:red"></i> ]'; ?></td>
                          <td><span class="tooltiper" title="<?php echo $row->users_status; ?>"><?php echo $row->users_status; ?></span>
                        </td>
                          <td><?php echo $row->estimated_time_duration; ?></td>
                          <td><?php echo $row->priority_name; ?></td>
                          <td><?php echo $row->complexity_name; ?></td>
                          <td>PJ4REQ000<?php echo ($row->project_id); ?></td>
                         
                         
                         
                          <td>
                            <a href="<?php echo site_url($pagename.'/copy/'.md5($row->id)); ?>"   title="Copy" onclick="return confirm('Are you sure you want to copy this Task?');"><i class="fa fa-copy"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="<?php echo site_url($pagename.'/show/'.md5($row->id)); ?>"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp;

                            <?php if($row->created_by==$ADMIN_ID||$ADMIN_ID=='20'){?>
                            <a href="<?php echo site_url($pagename.'/edit/'.md5($row->id)); ?>"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="<?php echo site_url($pagename.'/delete/'.md5($row->id)); ?>" onclick="return confirm('Are you sure you want to delete this Task?');"><i class="fa fa-trash-o"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                             <a data-toggle="modal" data-target=".a<?php echo $row->id; ?>exampleModal"  href="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i font-size="18px"; class="fa fa-plus-circle"></i></a>

   

                          </td>
                            <?php } ?>
                        </tr>
                                                  <!-- Edit Modal -->



<div class="modal fade a<?php echo $row->id; ?>exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">

<div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel"> Project Task Merge;</h4>
                        </div>
<div class="modal-body">



  <form  method="post" enctype="multipart/form-data" class="needs-validation"  novalidate>
         

<div class="form-body pal">

<?php $re=$this->db->get_where('tm_createtasks', array('id'=>$row->id))->row(); ?>

 <input type="text" name="task_id" hidden value="<?php echo $row->id ?>">
<div class="row form-group mbn">
    <label for="inputUsername" class="col-md-4 control-label">Task List
    <span class='require'>*</span></label>
<?php $ca= $this->db->get_where('tm_createtasks', array('project_id'=>$re->project_id, 'id !='=>$row->id))->result();   ?>
    <div class="col-md-8 input-icon right">
     <select class="form-control js-example-basic-multiple"  data-placeholder="Select the taks related" name="task_related_to">
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
                <button type="submit" class="btn btn-primary" name="taskmerge">Merge Task</button>
                &nbsp;
          </div>
          </div>      
            </div>

        </form>
 
</div>

</div>
</div>

</div>
  <!-- Edit Modal -->
                        <?php $index++;} ?>
                    </tbody>
                </table>
                
            </div>
          </div> 

        </div>
     </div>
    </section>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<?php $this->load->view('include/footer.php'); ?>
<!-- CK Editor -->
<script src="<?php echo site_url('public/bower_components/ckeditor/ckeditor.js'); ?>"></script>

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


$('#taskpr').select2()
</script>

