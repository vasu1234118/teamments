<?php $this->load->view('include/header.php'); ?>
<?php $this->load->view('include/left_nav.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
    <section class="content">

      <?php if($this->session->flashdata('message')){ ?>
      <div class="alert alert-success">
        <?php echo $this->session->flashdata('message'); ?>
      </div>
      <?php } ?>

      <?php  if(isset($_POST['taskmerge']))
      {
        extract($_POST);

    //print_r($_POST);

$date=date('y-m-d');


   

    $updt=array('task_id'=>$task_id,
      'task_related_to'=>$task_related_to,
      'crdate'=>$date,


  );

    $res=$this->db->insert('mergetask',$updt);
    if($res)
    {
         echo '<script type="text/javascript">alert("  Successfully  Add Merge Task ")</script>';
      $this->session->set_flashdata('msg',"Successfully Changed Passwrd");

      //redirect('dashboard');
    }

  else
  {
    $this->session->set_flashdata('error',"New Password And Cofirm Password Should Be Same");
  }
      }
      ?>

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
         <!--  <h3 class="box-title"><?php echo $title; ?> </h3> -->

          <div class="box-tools pull-right">
            <a href="<?php echo site_url($pagename.'/add_new'); ?>" class="btn btn-danger btn-xs"><i class="fa fa-plus-circle"></i> Add New <?php echo $add_title; ?></a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
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
                      <?php //print_r($records);?>
                      <?php $index=1; foreach($records as $row){ ?>
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
    <!-- /.content -->
  </div>




<?php $this->load->view('include/footer.php'); ?>