<?php $this->load->view('include/header.php'); ?>
<?php $this->load->view('include/left_nav.php'); ?>

 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> <?php echo $title; ?></h1>
        </section>
         <section class="content">

      <?php if($this->session->flashdata('message')){ ?>
      <div class="alert alert-success">
        <?php echo $this->session->flashdata('message'); ?>
      </div>
      <?php } ?>

    <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">444<?php //echo $title; ?></h3>

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
                            <th style="width: 9%;">Started On</th>
                            <th style="width: 9%;">End Date</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                      <tbody>
                      <?php //print_r($records); ?>
                      <?php $index=1; foreach($records as $row){ print_r($row);?>
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
                          <td>
                            <a href="<?php echo site_url($pagename.'/copy/'.md5($row->id)); ?>"   title="Copy" onclick="return confirm('Are you sure you want to copy this Task?');"><i class="fa fa-copy"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="<?php echo site_url($pagename.'/show/'.md5($row->id)); ?>"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp;

                            <?php if($row->created_by==$ADMIN_ID||$ADMIN_ID=='20'){?>
                            <a href="<?php echo site_url($pagename.'/edit/'.md5($row->id)); ?>"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="<?php echo site_url($pagename.'/delete/'.md5($row->id)); ?>" onclick="return confirm('Are you sure you want to delete this Task?');"><i class="fa fa-trash-o"></i></a></td>
                            <?php } ?>
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