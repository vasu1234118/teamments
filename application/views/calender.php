<?php $this->load->view('include/header.php'); ?>
<?php $this->load->view('include/left_nav.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="page-header">Calender</h1>
    </section>  
    
    <section class="content">

      <div class="row">
        
          <!-- /.col -->
         

        <div class="col-md-12">
            <!-- Widget: user widget style 1 -->
            <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Draggable Events</h4>
            </div>
            <div class="box-body">
              <!-- the events -->
              <div >
                <div class="external-event bg-yellow">Holidays</div>
                <div class="external-event bg-red">Employee Leave</div>
                <!-- <div class="external-event bg-green">Lunch</div> -->
                <!-- <div class="external-event bg-aqua">Do homework</div>
                <div class="external-event bg-light-blue">Work on UI design</div> -->
                <div class="checkbox">
                  <label for="drop-remove">
                    <input type="checkbox" id="drop-remove">
                    remove after drop
                  </label>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
         
        </div>
            <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
            <!-- /.widget-user -->
          </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      
    </section>
    <!-- /.content -->
  </div>
<?php $this->load->view('include/footer.php'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
   // your code here
  calCalender(`<?php echo json_encode(array_merge($holidays, $leaves),true) ?>`);


}, false);

</script>