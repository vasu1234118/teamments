<?php $this->load->view('include/header.php'); ?>
<?php $this->load->view('include/left_nav.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Login History</h1>
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
          <?php if($ADMIN_ID==20){?>             
            <a href="<?php echo site_url($pagename.'/add_new'); ?>" class="btn btn-danger btn-xs"><i class="fa fa-plus-circle"></i> Add New <?php echo $add_title; ?></a>
          <?php }?>
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
                            <th style="width: 21%;">Ip Address</th>
                            <th style="width: 21%;">User Name</th>
                         <th style="width: 10%;">Login Time</th>
                            <th style="width: 10%;">Logout Time</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                       $cr=date('Y-m-d'); 
                      $ed= date('Y-m-d', strtotime($cr. ' - 7 days'));
                      ?>
                      <?php $index=1; 
                      /*$this->db->where('crdate BETWEEN "'. date('Y-m-d', strtotime($ed)). '" and "'. date('Y-m-d', strtotime($cr)).'"');*/

                      
                      $records=$this->db->order_by('DESC')->get('tm_users')->result(); echo $this->db->last_query(); die(); foreach($records as $row){ ?>
                        <tr>
                          <td><?php echo $index; ?></td>
                          <td><?php echo $row->ip;  ?></td>
                          <td><?php echo $row->name;  ?></td>
                         <td><?php echo $row->logintime;  ?></td>
                          <td><?php echo $row->logouttime;  ?>
                         
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
  </div>
<?php $this->load->view('include/footer.php'); ?>