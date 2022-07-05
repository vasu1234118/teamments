<?php $this->load->view('include/header.php'); ?>
<?php $this->load->view('include/left_nav.php'); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Report/Projectwise</h1>
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
                  <?php $proadmin_data = $this->session->userdata('proadmin_data');
   $admin_id = $proadmin_data['TM_ID']; $user=$this->db->get_where('users', array('id'=>$admin_id))->row(); echo $user->role  ?>
                  <label>Employewise <span class="text-danger">*</span></label>
                  <select onchange="onProjectChange1(this.value),milestone(this.value),advanced()"  class="form-control validate[required]" name="emp_id" id="project_id">
                    <option value="">Select Employee</option>
                     <?php  $pr=$this->db->get_where('users', array('id !='=>$admin_id))->result(); echo $this->db->last_query(); foreach($pr as $pr2){  ?>
                        <option value="<?php echo $pr2->id; ?>"><?php echo $pr2->fname; ?><?php echo $pr2->lname; ?></option>
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
              <table id="referral_table" class="display responsive nowrap" cellspacing="0" width="100%">
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
                            
                            <th style="width: 9%;">Expected End Date</th>
                             <th style="width: 9%;">Actual Start Date</th>
                              <th style="width: 9%;">Actual End Date</th>
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
                          <td><?php echo date('d-m-Y',strtotime($row->estimated_ended_on)); ?></td>
                          <td><?php   $z=explode(',', $row->assigned_to);  foreach($z as $sk ){ $k=$this->db->get_where('tasks', array('user_id'=>$sk, 'createtask_id'=>$row->id,'actual_start_date!=' =>'0000-00-00'))->row(); if($k){ $u=$this->db->get_where('users', array('id'=>$sk))->row();$es= '('.$u->fname.')' .date('d-m-Y',strtotime($k->actual_start_date)).',' ; echo rtrim($es,','); }   }  ?></td>
                          <td><?php   $e=explode(',', $row->assigned_to);  foreach($e as $e1 ){ $e3=$this->db->get_where('tasks', array('user_id'=>$e1, 'createtask_id'=>$row->id,'actual_end_date!=' =>'0000-00-00'))->row(); if($e3){ $ue=$this->db->get_where('users', array('id'=>$e1))->row();$es3= '('.$ue->fname.')'  .date('d-m-Y',strtotime($e3->actual_end_date)).',' ; echo rtrim($es3,','); }   }  ?></td>
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
<script>



</script>

