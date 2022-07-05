<?php $this->load->view('include/header.php'); ?>
<?php $this->load->view('include/left_nav.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>All <?php echo $title; ?></h1>
    </section>
<script type="text/javascript">

function yesnoCheck() {
    alert('hi');
    if (document.getElementById('active').checked) {
        document.getElementById('test').style.visibility = 'visible';
        document.getElementById('test2').style.visibility = 'hidden';
    } else {
         document.getElementById('test').style.visibility = 'hidden';
        document.getElementById('test2').style.visibility = 'visible';
    }

</script>
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
          <!--<h3 class="box-title"><?php echo $title; ?> Details</h3>-->

          <div class="box-tools pull-right">
            <a href="<?php echo site_url($pagename.'/add_new'); ?>" class="btn btn-danger btn-xs"><i class="fa fa-plus-circle"></i> Add New <?php echo $add_title; ?></a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
             <div class="row">
            
            
            
            <!-- /.col -->
            <div class="col-md-6">  
                <div class="form-group">
                   
               
                       <a href="<?php  base_url() ?>users" class="btn btn-info btn-md" name="submit">Active</a> &nbsp;&nbsp;
                    <a href="<?php  base_url() ?>inactive_users" class="btn btn-danger btn-md" name="submit">Inactive</a>
                    
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12" >
              <table id="referral_table1" class="display responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                        <tr>
                            <th style="width: 1%;">S.no</th>
                            <th style="width: 30%;">First Name</th>
                            <th style="width: 30%;">Last Name</th>
                            <th style="width: 15%;">Display Name</th>
                            <th style="width: 9%;">Role</th>
                            <th style="width: 5%;">Status</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="test">
                      <?php $index=1; foreach($users as $row){ ?>
                        <tr>
                          <td><?php echo $index; ?></td>
                          <td><?php echo $row->fname; ?></td>
                          <td><?php echo $row->lname; ?></td>
                          <td><?php echo $row->display_name; ?></td>
                          <td><?php echo $row->role_name; ?></td>
                          <td><?php if($row->status=='1') echo 'Active'; else echo 'In Active'; ?></td>
                          <td><a href="<?php echo site_url($pagename.'/edit/'.md5($row->id)); ?>"><i class="fa fa-pencil"></i> Edit</a>&nbsp;&nbsp;<?php if($row->id!=$ADMIN_ID){ ?>|&nbsp;&nbsp;<a href="<?php echo site_url($pagename.'/delete/'.md5($row->id)); ?>" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa fa-trash-o"></i> Delete</a><?php } ?></td>
                        </tr>
                        <?php $index++;} ?>
                    </tbody>
                    <tbody id="test2" style="display:none;">
                      <?php $index=1; foreach($users as $row){ ?>
                        <tr>
                          <td>111<?php echo $index; ?></td>
                          <td><?php echo $row->fname; ?></td>
                          <td><?php echo $row->lname; ?></td>
                          <td><?php echo $row->display_name; ?></td>
                          <td><?php echo $row->role_name; ?></td>
                          <td><?php if($row->status=='1') echo 'Active'; else echo 'In Active'; ?></td>
                          <td><a href="<?php echo site_url($pagename.'/edit/'.md5($row->id)); ?>"><i class="fa fa-pencil"></i> Edit</a>&nbsp;&nbsp;<?php if($row->id!=$ADMIN_ID){ ?>|&nbsp;&nbsp;<a href="<?php echo site_url($pagename.'/delete/'.md5($row->id)); ?>" onclick="return confirm('Are you sure you want to delete this record?');"><i class="fa fa-trash-o"></i> Delete</a><?php } ?></td>
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