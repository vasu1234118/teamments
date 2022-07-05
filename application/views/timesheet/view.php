<?php $this->load->view('include/header.php'); ?>
<?php $this->load->view('include/left_nav.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <?php if($this->uri->segment(2)=="alltasks" && $this->uri->segment(1)=="assignedtasks" ){ ?>
      <h1>All Tasks</h1>
      <?php }  else if($this->uri->segment(2)=="mysavedtasks" && $this->uri->segment(1)=="assignedtasks" ){ ?>
        <h1>My Saved Tasks</h1>
    <?php } else if($this->uri->segment(1)=="assignedtasks"){ ?>
      <h1>Assigned To Others</h1>
    <?php } ?>
    </section>
<?php $res=$this->session->userdata('proadmin_data'); $user_id= $res['TM_ID']; $r=$this->db->get_where('tm_users', array('id'=>$user_id))->row();  ?>
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
         <!--  <h3 class="box-title"><?php echo $title; ?> </h3> -->

          <div class="box-tools pull-right">
          <?php if(($r->role=='1')||($r->role=='3')){ ?>
            <button  class="btn btn-sucess btn-xs" onclick="accepted();"><i class="fa fa-plus-circle"></i>Accept</button>
          <?php } else { ?>
            <a  class="btn btn-danger btn-xs" data-toggle="modal" data-target=".addexampleModal"><i class="fa fa-plus-circle"></i> Add Daily Work</a> <button  class="btn btn-info btn-xs" onclick="saved();"><i class="fa fa-plus-circle"></i>Save</button>
          <?php } ?>
          </div>
        </div>
        <script type="text/javascript">
          
          function saved(){
          alert('hi');
            var list=[];
            var els = document.getElementsByClassName("vasucheck");
for(var i = 0; i < els.length; i++)
{

  console.dir(els[i]);
  if(els[i].checked)
  list.push(els[i].value);
}
         
          console.log(list);

          var xmlhttp = new XMLHttpRequest();   // new HttpRequest instance 
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4) {
     console.dir(this.responseText);

     location.reload();
    }
  };
xmlhttp.open("POST", "<?php echo base_url() ?>timesheet/vasudraft");

var data = new FormData();
data.append('data',JSON.stringify(list));

xmlhttp.send(data);

          }
        </script>

        <script type="text/javascript">
          
          function accepted(){
          alert('hi');
            var list=[];
            var els = document.getElementsByClassName("acccheck");
for(var i = 0; i < els.length; i++)
{

  console.dir(els[i]);
  if(els[i].checked)
  list.push(els[i].value);
else {
  alert("pls Selected Checkbox");
}
}
         
          console.log(list);

          var xmlhttp = new XMLHttpRequest();   // new HttpRequest instance 
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4) {
     console.dir(this.responseText);

     location.reload();
    }
  };
xmlhttp.open("POST", "<?php echo base_url() ?>timesheet/vasuaccept");

var data = new FormData();
data.append('data',JSON.stringify(list));

xmlhttp.send(data);

          }
        </script>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <table id="referral_table1" class=" display responsive   " cellspacing="0" >
                  <thead>
                        <tr>
                            <th style="width: 1%;">S.no</th>
                             <th style="width: 1%;"></th>
                          
                            <th style="width: 10%;">Project Name </th>
                            <th style="width: 8%;">Date </th>

                            <th style="width: 5%;">Day</th>
                            <th style="width: 10%;">Time</th>
                            <th style="width: 20%;">Work</th>
                             <th style="width: 10%;">Name</th>
                             <th style="width: 10%;">Status</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                      <?php $index=1; foreach($records as $row){ ?>
                        <tr>
                          <td><?php echo $index; ?></td>
                           
                          <td><?php if(($r->role=='1')||($r->role=='3')){ if($row->status=='1') { ?> <input type="checkbox" name="checke1[]" value="<?php echo $row->id ?>" class="acccheck"> <?php }} else  if($row->status=='0'){  ?>  <input type="checkbox" name="checke1[]" value="<?php echo $row->id ?>" class="vasucheck"><?php } ?></td>
                          <td><?php echo @$row->project_name;  ?></td>
                          <td><?php echo $row->work_date; ?></td>
                          <td><?php echo $row->day; ?></td>
                          <td><?php echo $row->time; ?></td>
                          <td><?php echo $row->description; ?></td>
                          <td><?php echo $row->display_name ?></td>
                          <td>


                            <?php if($row->status =='0'){ ?><a class="btn btn-danger " style="width:132px;border-radius:15px">Draft</a><?php } else if($row->status =='1') {  ?><a class="btn btn-info" style="width:132px;border-radius:15px">Saved</a><?php } else if($row->status =='2') {  ?><a class="btn btn-warning" style="width:132px;border-radius:15px">Accepted</a> <?php }  ?></td>
                          <td>
                         <!--  <a href="<?php echo site_url($pagename.'/show/'.md5($row->id)); ?>"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp; -->
                          <?php if($ADMIN_ID==$row->created_by||$ADMIN_ID==20){?>
                            <!-- <a href="<?php echo site_url($pagename.'/copy/'.md5($row->id)); ?>" title="Copy" onclick="return confirm('Are you sure you want to copy this Task?');"><i class="fa fa-copy"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp; -->
                            <!-- <a href="<?php echo site_url($pagename.'/show/'.md5($row->id)); ?>"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp; -->
                            <?php if($row->status=='0'){ ?>
                            <a href="<?php echo site_url($pagename.'/edit/'.md5($row->id)); ?>"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="<?php echo site_url($pagename.'/delete/'.md5($row->id)); ?>" onclick="return confirm('Are you sure you want to delete this Task?');"><i class="fa fa-trash-o"></i></a>
                          <?php } }else echo "N/A" ?>
                          </td>
                      </tr>

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

<?php $re=$this->db->get_where('tm_timesheet', array('id'=>$row->id))->row(); ?>

 <input type="text" name="ids" hidden value="<?php echo $re->id ?>">
<div class="row form-group mbn">
    <label for="inputUsername" class="col-md-4 control-label">Status
    <span class='require'>*</span></label>

    <div class="col-md-8 input-icon right">
     <select class="form-control js-example-basic-multiple"  data-placeholder="Select the taks related" name="task_status">
       
   <option value="0" <?php  if($re->status=='0'){ echo "selected='selected'"; }  ?> >Draft</option>

   <option value="1"  <?php if($re->status=='1'){ echo "selected='selected'" ;}  ?> >Save</option>

    </select>
       

    </div>
</div> 



</div>

<div class="row form-group mbn">
    <div class="col-md-4"></div>
    <div class="col-md-8">
        <div class="form-actions pll prl pull-right">
                <button type="submit" class="btn btn-primary" name="taskmerge">Submit</button>
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


<!-- Add Modal -->

<div class="modal fade addexampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">

<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Add New Employees Details</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<div class="modal-body">



  <form  method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
            
<div class="form-body">

<div class="col-md-12">

<div class="row form-group mbn">
    <label for="inputUsername" class="col-md-4 control-label">Project Name
    <span class='require'>*</span></label>

    <div class="col-md-8 input-icon right">

       <select onchange="onProjectChange1(this.value),milestone(this.value), assignproject(this.value) "  class="form-control validate[required]" name="project_id" id="project_id">
                    <option value="">Select Project <?php $res=$this->session->userdata('proadmin_data'); $user_id= $res['TM_ID']; ?></option>
                    <?php  $this->db->from('tm_projects'); $this->db->where("FIND_IN_SET($user_id, assigned_to)");  $pr=$this->db->get()->result(); 
 foreach($pr as $row){ ?>
                    <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                    <?php } ?>
                  </select>

    </div>
</div>


<div class="row form-group mbn">
    <label for="inputUsername" class="col-md-4 control-label">Select Area
    <span class='require'>*</span></label>

    <div class="col-md-8 input-icon right">
    <input type="date"   name="work_date" id="estimated_ended_on" class="form-control validate[required]" value="" id="date_picker" />
    </div>
</div>







  




<div class="row form-group mbn">
    <label for="inputUsername" class="col-md-4 control-label">Descriptions
    <span class='require'>*</span></label>

    <div class="col-md-8 input-icon right">
        <textarea class="form-control" name="description" id="validationTooltip02" required></textarea>

    </div>
</div>               

<script language="javascript">
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#date_picker').attr('min',today);
</script>


</div>

<div class="row form-group mbn">
    <div class="col-md-4"></div>
    <div class="col-md-8">         
            <div class="form-actions pll prl pull-right">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                &nbsp;
           </div>     
    </div>
            </div>
  </div>
        </form>
</div>
</div>
</div>
</div>
<!-- end modal -->



<?php $this->load->view('include/footer.php'); ?>