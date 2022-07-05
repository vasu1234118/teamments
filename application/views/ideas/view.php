<?php $this->load->view('include/header.php'); ?>
<?php $this->load->view('include/left_nav.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>All <?php echo $title; ?></h1>
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
          <!-- <h3 class="box-title"><?php echo $title; ?> Details</h3> -->

          <div class="box-tools pull-right">
            <a href="<?php echo site_url($pagename.'/add_new'); ?>" class="btn btn-danger btn-xs"><i class="fa fa-plus-circle"></i> Add New <?php echo $add_title; ?></a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <table id="referral_table1" class="display responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                        <tr>
                            <th style="width: 1%;">S.no</th>
                            <!-- <th style="width: 21%;">Project Name</th> -->
                            <th style="width: 21%;">Title</th>
                            <th style="width: 21%;">Problem Statement</th>
                            <th style="width: 21%;">Why it is a Problem</th>
                            <th style="width: 21%;">Category</th>
                            <th style="width: 21%;">Status</th>
                            <th style="width: 10%;">Author</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php //print_r($records);?>
                      <?php $index=1; foreach($records as $row){ ?>
                        <tr>
                          <td><?php echo $index; ?></td>
                          <!-- <td><?php echo $row->project_name;  ?></td> -->
                          <td><?php echo $row->name; if($row->flag==2) echo '&nbsp;[ <i class="fa fa-save" style="font-size:20px;color:red"></i> ]'; ?></td>
                          <td><?php echo $row->problem_statement;  ?></td>
                          <td><?php echo $row->why_problem;  ?></td>
                          <td><?php echo $row->category;  ?></td>
                          <td>  <?php if($ADMIN_ID==20){?>
                             <a  onclick="openModal(<?php echo $row->id ?>)" data-toggle="modal" data-target="#myModal"><?php echo $row->status_title;  ?></a>
                          <?php }else{?>
                            <?php echo $row->status_title;  ?>

                          <?php } ?>
                            
                            </td>
                          <td><?php echo $row->display_name.' ('.$row->user_role.') '; ?></td>
                          <td>
                          <a href="<?php echo site_url($pagename.'/show/'.md5($row->id)); ?>"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                          <?php if($ADMIN_ID==$row->created_by||$ADMIN_ID==20){?>
                            <!-- <a href="<?php echo site_url($pagename.'/copy/'.md5($row->id)); ?>" title="Copy" onclick="return confirm('Are you sure you want to copy this Task?');"><i class="fa fa-copy"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp; -->
                            <!-- <a href="<?php echo site_url($pagename.'/show/'.md5($row->id)); ?>"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp; -->
                            <a href="<?php echo site_url($pagename.'/edit/'.md5($row->id)); ?>"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="<?php echo site_url($pagename.'/delete/'.md5($row->id)); ?>" onclick="return confirm('Are you sure you want to delete this Task?');"><i class="fa fa-trash-o"></i></a>
                          <?php }else echo "N/A" ?>
                          </td>
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
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Status</h4>
        </div>
        <div class="modal-body">
          <div></div>
          <!-- <div class="col-md-6"> -->
              <div class="form-group">
                <label>Status<span class="text-danger">*</span></label>
                <select  class="form-control" name="status" id="status">
                  <option value="">Status</option>
                  <?php foreach($status as $row){ ?>
                  <option value="<?php echo $row->id; ?>"><?php echo $row->title; ?></option>
                  <?php } ?>
                </select>
              </div>
            <!-- </div> -->
        </div>
        <div class="modal-footer">
          <!-- Hidden Input Feilds -->
              <input type="hidden" id="idea_id" value='' name='idea_id'>
              <button  onclick="ideaStatusUpdate()" id="submit_button" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  </div>
<?php $this->load->view('include/footer.php'); ?>
<script>
  function openModal(id) {

    document.getElementById('idea_id').value = id;

    ideaStatusSelect(id);
    
    
  }
</script>