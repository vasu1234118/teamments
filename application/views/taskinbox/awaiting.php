<?php $this->load->view('include/header.php'); ?>
<?php $this->load->view('include/left_nav.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Awaiting Task List</h1><div class="box-tools pull-right" style="margin-top:-26px">
            <a href="<?php echo base_url(); ?>taskinbox" class="btn btn-danger btn-xs"><i class="fa fa-plus-circle"></i>My To-Do List</a>
    </section>
<style>
    .color1{
        background-color:#fff !important;
    }
     .color2{
        background-color:green !important;
    }
    .color3{
        background-color:#f39c12 !important;
    }
    .color4{
        background-color:#fff !important;
        
    }
    .color5{
        background-color:#dd4b39 !important;
    }
</style>
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
        <style>
            .atwaiting{
                background-color:green;
            }
        </style>
        <!-- /.box-header -->
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
                            <th style="width: 8%;">Status</th>
                            <th style="width: 9%;">Started On</th>
                            <th style="width: 9%;">End Date</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                      <?php //print_r($records);exit; ?>
                      <?php $index=1; foreach($records as $row){ ?>
                        <tr class="color<?php echo $row->status;?> <?php if($row->display=='N'){ echo 'at_bold'; } else if($row->status=='3'){ echo 'atwaiting'; } ?> ">
                          <td><?php echo $index; ?></td>
                          <td><?php echo taskId($row->createtask_id); ?></td>
                          <td><?php echo $row->name; ?></td>
                          <td><?php echo $row->display_name; ?></td>
                          <td><?php echo $row->priority_name; ?></td>
                          <td><?php echo $row->complexity_name; ?></td>
                          <td><?php if($row->status =='5'){ ?><a class="btn btn-danger" style="width:132px;border-radius:15px"><?php  echo $row->status_title; ?></a><?php } else if(($row->status =='4')||($row->status =='3')) {  ?><a class="btn btn-warning" style="width:132px; border-radius:15px"><?php  echo $row->status_title; ?></a><?php } else if(($row->status =='2')||($row->status =='1')) {  ?><a class="btn btn-success" style="width:132px; border-radius:15px;"><?php  echo $row->status_title; ?></a> <?php } ?></td>
                          <td><?php echo date('d-m-Y',strtotime($row->started_on)); ?></td>
                          <td><?php echo date('d-m-Y',strtotime($row->estimated_ended_on)); ?></td>
                          <td><a href="<?php echo site_url($pagename.'/edit/'.md5($row->id)); ?>"><i class="fa fa-eye"></i> View</a></td>
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