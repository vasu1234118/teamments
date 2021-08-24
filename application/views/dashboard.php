<?php $this->load->view('include/header.php'); ?>
<?php $this->load->view('include/left_nav.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="page-header">Dashboard</h1>
    </section>  
    
    <section class="content">

      <div class="row">
        <?php if($ADMIN_ID==1){?>
          <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <!-- /.widget-user-image -->
              <h3 class="tm_margin_0">All Users</h3>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Super Admin <span class="pull-right badge bg-blue"><?php echo $super_admin_count; ?></span></a></li>
                <li><a href="#">Admin <span class="pull-right badge bg-aqua"><?php echo $admin_count; ?></span></a></li>
                <li><a href="#">Superviser <span class="pull-right badge bg-green"><?php echo $superviser_count; ?></span></a></li>
                <li><a href="#">Employee <span class="pull-right badge bg-red"><?php echo $employee_count; ?></span></a></li>
                <li><a href="#">Interance <span class="pull-right badge bg-red"><?php echo $interance_count; ?></span></a></li>
                <li><a href="#">Remote Interance <span class="pull-right badge bg-red"><?php echo $remote_interance_count; ?></span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->



        <!-- /.col -->
        <div class="col-md-8">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"><?php echo $ADMIN_DISPLAY_NAME; ?></h3>
              <h5 class="widget-user-desc"><?php echo $ADMIN_ROLE; ?></h5>
              <h4 class="text-center">Assigned Tasks To Others</h4>
            </div>
            
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $total_tasks_count-$closed_tasks_count; ?></h5>
                    <span class="description-text">Open Tasks</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $closed_tasks_count; ?></h5>
                    <span class="description-text">Completed Tasks</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $total_tasks_count; ?></h5>
                    <span class="description-text">Total Tasks</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->
        <?php }else{?>
          <!-- /.col -->
          <div class="col-md-6">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-aqua-active">
                <!-- <h3 class="widget-user-username"><?php echo $ADMIN_DISPLAY_NAME; ?></h3>
                <h5 class="widget-user-desc"><?php echo $ADMIN_ROLE; ?></h5> -->
                <h4 class="text-center">My To-Do List </h4>
              </div>
              
              <div class="box-footer">
                <div class="row">
                  <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <h5 class="description-header"><?php echo $newtasks_count; ?></h5>
                      <span class="description-text">New Tasks</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <h5 class="description-header"><?php echo $totaltasks_count-($newtasks_count+$closedtasks_count); ?></h5>
                      <span class="description-text">Open Tasks</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <h5 class="description-header"><?php echo $closedtasks_count; ?></h5>
                      <span class="description-text">Completed Tasks</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3">
                    <div class="description-block">
                      <h5 class="description-header"><?php echo $totaltasks_count; ?></h5>
                      <span class="description-text">Total Tasks</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
          <!-- /.col -->

          <?php if(($ADMIN_ID!=6) && ($ADMIN_ID!=7)){?>
          <!-- /.col -->
          <div class="col-md-6">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-aqua-active">
                <!-- <h3 class="widget-user-username"><?php echo $ADMIN_DISPLAY_NAME; ?></h3>
                <h5 class="widget-user-desc"><?php echo $ADMIN_ROLE; ?></h5> -->
                <h4 class="text-center">Assigned Tasks To Others</h4>
              </div>
              
              <div class="box-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header"><?php echo $total_tasks_count-$closed_tasks_count; ?></h5>
                      <span class="description-text">Open Tasks</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header"><?php echo $closed_tasks_count; ?></h5>
                      <span class="description-text">Completed Tasks</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header"><?php echo $total_tasks_count; ?></h5>
                      <span class="description-text">Total Tasks</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
          <!-- /.col -->
        <?php } } ?>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      
    </section>
    <!-- /.content -->
  </div>
<?php $this->load->view('include/footer.php'); ?>