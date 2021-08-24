<?php $this->load->view('include/header.php'); ?>
<?php $this->load->view('include/left_nav.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Saved Task</h1>
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
        <div class="box-header with-border">
          <h3 class="box-title"><?php //echo $title; ?> </h3>
        </div>
        <!-- /.box-header -->
        <?php $proadmin_data =$this->session->userdata('proadmin_data');  $user_id= $proadmin_data['TM_ID'];  $todaydate = date('Y-m-d'); $rec=$this->db->get_where('tm_tasks', array('remainder_date'=>$todaydate,'user_id'=> $user_id))->result();
         ?> 

        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <table id="taskinbox_table" class="display responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                        <tr>
                            <th style="width: 1%;">S.no</th>
                            <th style="width: 1%;">Task-ID</th>
                            <th style="width: 47%;">Task Name</th>
                            <th style="width: 8%;">Assigned by</th>
                            <th style="width: 8%;">Prority</th>
                            <th style="width: 8%;">Complexity</th>
                         
                            <th style="width: 9%;">Started On</th>
                            <th style="width: 9%;">End Date</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php //print_r($records);exit; ?>
                      <?php $index=1; foreach($rec as $row1){ ?>
                        <tr>
                          <td><?php echo $index; /*echo $index;*/ ?></td>
                          <td><?php echo 'TASK0'.$row1->createtask_id; ?></td>
                          <td><?php  @$re=$this->db->get_where('tm_createtasks', array('id'=>$row1->createtask_id))->row();  echo $re->name; ?></td>
                          <td><?php  $user=$this->db->get_where('tm_users', array('id'=>$re->created_by))->row();  echo @$user->fname.$user->lname; ?></td>
                          <td><?php  $pr=$this->db->get_where('tm_priority', array('id'=>$re->priority))->row(); echo $pr->title; ?></td>
                          <td><?php  $co=$this->db->get_where('tm_complexity', array('id'=>$re->complexity))->row(); echo $co->title; ?></td>
                          
                          <td><?php echo date('d-m-Y',strtotime($re->started_on)); ?></td>
                          <td><?php echo date('d-m-Y',strtotime($re->estimated_ended_on)); ?></td>
                          <td><a href="<?php echo base_url(); ?>taskinbox/edit/<?php echo md5($row1->createtask_id); ?>"><i class="fa fa-eye"></i> View</a></td>
                        </tr>
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