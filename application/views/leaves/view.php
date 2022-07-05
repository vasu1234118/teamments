<?php $this->load->view('include/header.php'); ?>
<?php $this->load->view('include/left_nav.php'); ?>
<style type="text/css">
.h-100 { height: 100%!important; }
.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem;
}
.card-footer:last-child {
    border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px);
}
.bg-primary {
    background-color: #007bff!important;
}
.bg-warning {
    background-color: #ffc107!important;
}
.bg-success {
    background-color: #28a745!important;
}
.bg-danger {
    background-color: #dc3545!important;
}
.bg-coral{
  background-color: coral !important;
}
.bg-pay{
  background-color:#008000 !important;
}

.bg-newlead{
  background-color:#ff8000 !important;
}
.bg-crlead{
  background-color:#80ff00 !important;
}
.h4, h4 {
    font-size: 2rem;
}
.mr-5, .mx-5 {
    margin-right: 3rem!important;
}
.card-body-icon {
    position: absolute;
    z-index: 0;
    top: 10px;
    right: 10px;
    font-size: 32px;
    font-size: 2rem;
    opacity: .3;
}
.card-footer {
    padding: .75rem 1.25rem;
    background-color: rgba(0,0,0,.03);
    border-top: 1px solid rgba(0,0,0,.125);
}
.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: .25rem;
}
.card .fa-fw {
    font-size: 2em;
}
.text-muted a{
   color:#eff2f7!important;
   font-size:15px;
}
h4 a{
   color:#eff2f7!important;
   font-size:20px;
}
</style>
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
   <?php $proadmin_data = $this->session->userdata('proadmin_data');
   $admin_id = $proadmin_data['TM_ID']; $user=$this->db->get_where('users', array('id'=>$admin_id))->row();   ?>
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
            <?php 	if(!(($user->role=='1')||($user->role=='3'))){ ?>
        <div class="col-md-12">
            
          <div class="row">

<div class="col-md-4">
<div class="card mini-stats-wid bg-success">
<div class="card-body">
<div class="media">
<div class="media-body">
    
    <p class="text-muted font-weight-medium"><a href="">Total Leaves</a></p>
    <h4 class="mb-0"><a href=""> <?php echo $avaliableleaves; ?></a></h4>
</div>

<div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
    <span class="avatar-title rounded-circle bg-primary">
        <i class="bx bx-walk

 font-size-24"></i>
    </span>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="card mini-stats-wid bg-newlead">
<div class="card-body">
<div class="media">
<div class="media-body">
    
        
   
    <p class="text-muted font-weight-medium"><a href="">Used Leaves</a></p>
    <h4 class="mb-0"><a href=""><?php $this->db->select_sum('ldays');  $leads= $this->db->get_where('leaves',array('status'=>'1','created_by'=>$user->id,'flag'=>'0'))->row();  echo $leads->ldays; ?></a></h4>
</div>

<div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
    <span class="avatar-title rounded-circle bg-primary">
        <i class="mdi mdi-content-save-alert

 font-size-24"></i>
    </span>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="card mini-stats-wid bg-crlead">
<div class="card-body">
<div class="media">
<div class="media-body">
    
        
   
    <p class="text-muted font-weight-medium"><a href="">Remaining Leaves</a></p>
    <h4 class="mb-0"><a href=""><?php $z=$avaliableleaves-$leads->ldays;  
echo $z;  ?></a></h4>
</div>

<div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
    <span class="avatar-title rounded-circle bg-primary">
        <i class="mdi mdi-location-enter

 font-size-24"></i>
    </span>
</div>
</div>
</div>
</div>
</div>
</div>
        </div>
        <br/><br/><br/> <br/><br/><br/><br/>
        <?php } ?>
        

          <div class="row">
            <div class="col-md-12">
              
              <table id="referral_table1" class="display responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                        <tr>
                            <th style="width: 1%;">S.no</th>
  
                            <th style="width: 21%;">Title</th>
                            <th style="width: 21%;">From </th>
                            <th style="width: 21%;">To </th>

                            <th style="width: 10%;">Author</th>
                             <th style="width: 10%;">Status</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     
                      <?php $index=1; foreach($records as $row){ ?>
                        <tr>
                          <td><?php echo $index; ?></td>
                          <td><?php echo $row->title;  ?></td>
                          <td><?php echo $row->from_date; ?></td>
                          <td><?php echo $row->to_date; ?></td>
                          <td><?php echo $row->display_name.' ('.$row->user_role.') '; ?></td>
                          <td><?php if($row->status =='0'){ ?><a class="btn btn-danger" style="width:132px;border-radius:15px">Pending</a><?php } else if($row->status =='1') {  ?><a class="btn btn-info" style="width:132px;border-radius:15px">Accepted</a><?php } else if($row->status =='2') {  ?><a class="btn btn-warning" style="width:132px;border-radius:15px">Rejected</a> <?php } else if($row->status =='3') {  ?><a class="btn btn-warning" style="width:132px;border-radius:15px">Canceled</a> <?php } ?></td>
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

     <section class="content">

      <?php if($this->session->flashdata('message')){ ?>
      <div class="alert alert-success">
        <?php echo $this->session->flashdata('message'); ?>
      </div>
      <?php } ?>
   <?php $proadmin_data = $this->session->userdata('proadmin_data');
   $admin_id = $proadmin_data['TM_ID']; $user=$this->db->get_where('users', array('id'=>$admin_id))->row(); echo $user->role  ?>
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
       
        <!-- /.box-header -->
       

          <div class="row">
            <div class="col-md-12">

              <table class="table">
              <tr>
                <th>Period</th>

                <th>total</th>
                <th>available leaves</th>

                <th>carry forword from last year</th>
                <th>used leaves</th>

                <th>remaining/carry forword to next year</th>
              </tr>

          <?php // $this->load->model('Leave_model'); 
                    $res= $this->leave->leavemange($admin_id); 
                    $cl=0;
                    foreach ($res as $lj) { 
                      $al=$lj['avaliableleaves'];
                      $ul=$lj['used'];
                      $tl=$cl+$al;
                      $rl=$tl-$ul;
                       ?>
                      <tr>
                        <td><?php echo $lj['period']; ?>
                        </td>
                          <td><?php echo $tl; ?>
                        </td>
                          <td><?php echo $al; ?>
                        </td> <td><?php echo $cl ?>
                        </td>
                          <td><?php echo $ul; ?>
                        </td>

                          <td><?php echo $rl; ?>
                        </td>
                      </tr>
                    
                   <?php $cl=$rl; }

              ?>
           </table>
            </div>
          </div>
        </div>
     </div>
    </section>
  </div>
<?php $this->load->view('include/footer.php'); ?>