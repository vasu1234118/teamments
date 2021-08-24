<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Ajaxcontroller extends CI_Controller {
   
	public $user_table='users';
	public $createtasks='createtasks';
	public $tasks='tasks';
	function __construct(){
        parent::__construct();
		$this->user_table='users';
		$this->role_table='roles';
		$this->ideas_table='ideas';
		$this->status_table='status';
		$this->limit=30;
		$proadmin_data =$this->session->userdata('proadmin_data');
		$this->data['ADMIN_ID']=$proadmin_data['TM_ID'];
		$this->data['ADMIN_DISPLAY_NAME']=$proadmin_data['TM_NAME'];
		$this->data['ADMIN_ROLE']=$proadmin_data['TM_ROLE'];
		$this->data['ADMIN_ROLE_ID']=$proadmin_data['TM_ROLE_ID'];
		/*if(($this->data['ADMIN_ROLE_ID']==5)||($this->data['ADMIN_ROLE_ID']==6)){
			redirect(site_url("welcome/logout"));
		}*/
		$this->data['ADMIN_EMAIL']=$proadmin_data['TM_EMAIL'];
		
		$this->data['CLASS_NAME']=$this->router->fetch_class();
		$this->data['METHOD_NAME']=$this->router->fetch_method();
		
	

	}
	
	
	function getProjectWiseMileStones(){
        // print_r($this->input->post());
        // exit;
		if($this->input->post()){
			$project_id=$this->input->post('project_id');
            $milestones=$this->common->getMileStones($project_id);
            
			if($milestones){
                
                echo json_encode(['status'=>1,"message"=>"Date Feched Successfully","data"=>$milestones]);
				
			}else{
				
                echo json_encode(['status'=>1,"message"=>"No Milestones Found!","data"=>'']);
			}
		}
		
	}
	
	
	function getProjectWiseRequirements(){
        // print_r($this->input->post());
        // exit;
		if($this->input->post()){
			$project_id=$this->input->post('project_id');
            $requirements=$this->common->getRequirements($project_id);
            
			if($requirements){
                
                echo json_encode(['status'=>1,"message"=>"Date Feched Successfully","data"=>$requirements]);
				
			}else{
				
                echo json_encode(['status'=>1,"message"=>"No Requirements Found!","data"=>'']);
			}
		}
		
	}


	function getProjectWiseUsers(){
        // print_r($this->input->post());
        // exit;
		if($this->input->post()){
			$project_id=$this->input->post('project_id');
			
			if($this->data['ADMIN_ROLE_ID']==4){
				$ADMIN_ROLE_ID=2;
			}else{
				$ADMIN_ROLE_ID=$this->data['ADMIN_ROLE_ID'];
			}

			$assignedUsers=$this->task->allAssignedUsersProjectWise($ADMIN_ROLE_ID,$this->data['ADMIN_ID'],$project_id);
			
			
			// echo "<pre>";
			// print_r ($assignedUsers);
			// echo "</pre>";
			
            
			if($assignedUsers){
                
                echo json_encode(['status'=>1,"message"=>"Date Feched Successfully","data"=>$assignedUsers]);
				
			}else{
				
                echo json_encode(['status'=>1,"message"=>"No assignedUsers Found!","data"=>'']);
			}
		}
		
	}


	public function updateIdeaStatus()
	{
		if($this->input->post()){

			$status=$this->input->post('status');
			$id = $this->input->post('id');
			
			if($this->data['ADMIN_ROLE_ID']==4){
				$ADMIN_ROLE_ID=2;
			}else{
				$ADMIN_ROLE_ID=$this->data['ADMIN_ROLE_ID'];
			}

			$res=$this->common->updateTable($this->ideas_table,array("id"=>$id),array('status'=>$status));
			
			
			// echo "<pre>";
			// print_r ($assignedUsers);
			// echo "</pre>";
			
            
			if($res){
                
                echo json_encode(['status'=>1,"message"=>"Date Feched Successfully","data"=>1]);
				
			}else{
				
                echo json_encode(['status'=>1,"message"=>"No assignedUsers Found!","data"=>$status]);
			}
		}
	}

	public function getIdeaStatus()
	{
		$id = $this->input->post('id');
		$res['idea'] = $this->common->getSelectedRecordDetails('*', $this->ideas_table, array('(id)'=>$id));
		$res['status_data']=$this->common->getAllRecords('id,title', $this->status_table, array('category_id'=>2), array('order','ASC'), array($this->limit,0));
		if($res['idea']){
                
			echo json_encode(['status'=>1,"message"=>"Date Feched Successfully","data"=>$res]);
			
		}else{
			
			echo json_encode(['status'=>1,"message"=>"No assignedUsers Found!","data"=>$res]);
		}
	}


	public function searchfilter(){
/*@$type=$_POST['data']['type'];*/
$project_id=$_POST['data']['project_id'];
$requirement_id=$_POST['data']['requirement_id'];
$milestone_id=$_POST['data']['milestone_id'];
$complexity=$_POST['data']['complexity'];
$priority=$_POST['data']['priority'];
/*$boards=$_POST['data']['boards'];*/
//$facilities=$_POST['data']['facilities'];
//$boards=$_POST['data']['boards'];

/*$country=$_POST['data']['country'];
$state=$_POST['data']['state'];*/
//echo $country;
/*if($schooltype){
$typeschool=explode(',', $schooltype);
//$board=explode(',', $boards);
//$facilitie=explode(',', $facilities);
//print_r($typeschool);
//print_r($facilitie);

	//echo $typeschool;
$this->db->where_in('ve_eductiontype',$typeschool);

}*/

/*if($boards){
$boards=explode(',', $boards);
//$board=explode(',', $boards);
//$facilitie=explode(',', $facilities);
//print_r($typeschool);
//print_r($facilitie);

	//echo $typeschool;
$this->db->where_in('boards_name',$boards);

}*/

/*if($type){
	//echo "tpeschool";
$this->db->where('organization_name',$type);

}*/
$admin= $this->data['ADMIN_ID'];
if($admin){
	//echo "tpeschool";
$this->db->where_in('assigned_to',$admin);

}
if($project_id){
	//echo "tpeschool";
$this->db->where('project_id',$project_id);

}
if($requirement_id){
	//echo "tpeschool";
$this->db->where('requirement_id',$project_id);

}
if($milestone_id){
	//echo "tpeschool";
$this->db->where('milestone_id',$project_id);

}
if($complexity){
	//echo "tpeschool";
$this->db->where('complexity',$project_id);

}
if($priority){
	//echo "tpeschool";
$this->db->where('priority',$project_id);

}

/*if($state){
	//echo "tpeschool";
$this->db->where('ve_state',$state);

}*/




$res=$this->db->get('createtasks')->result();
//echo $this->db->last_query();

//exit();
if($res){ 

	//print_r($rz);

?>
<div class="box box-default">
        <div class="box-header with-border">
         <!--  <h3 class="box-title"><?php echo $title; ?> </h3> -->

          <div class="box-tools pull-right">
            <a href="<?php echo site_url($pagename.'/add_new'); ?>" class="btn btn-danger btn-xs"><i class="fa fa-plus-circle"></i> Add New Task ?></a>
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
                            <th style="width: 9%;">To Start Date</th>
                            <th style="width: 9%;">Expected End Date</th>
                             <th style="width: 9%;">Actual Start Date</th>
                              <th style="width: 9%;">Actual End Date</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php print_r($res);?>
                      <?php $index=1; foreach($res as $row){ ?>
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
                          <td><?php echo date('d-m-Y',strtotime($row->actual_start_date)); ?></td>
                          <td><?php echo date('d-m-Y',strtotime($row->actual_end_date)); ?></td>
                          <td>
                            <a href="<?php echo site_url($pagename.'/copy/'.md5($row->id)); ?>"   title="Copy" onclick="return confirm('Are you sure you want to copy this Task?');"><i class="fa fa-copy"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="<?php echo site_url($pagename.'/show/'.md5($row->id)); ?>"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp;

                            <?php if($row->created_by==$ADMIN_ID||$ADMIN_ID=='20'){?>
                            <a href="<?php echo site_url($pagename.'/edit/'.md5($row->id)); ?>"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="<?php echo site_url($pagename.'/delete/'.md5($row->id)); ?>" onclick="return confirm('Are you sure you want to delete this Task?');"><i class="fa fa-trash-o"></i></a>
                             <a data-toggle="modal" data-target=".a<?php echo $row->id; ?>exampleModal"  href="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fa-plus-circle font-size-18"></i></a>

   

                          </td>
                            <?php } ?>
                        </tr>
                                                  <!-- Edit Modal -->

<div class="modal fade a<?php echo $row->id; ?>exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<script type="text/javascript">
                  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
                </script>
<div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel"> Project Task Merge;</h4>
                        </div>
<div class="modal-body">



  <form  method="post" enctype="multipart/form-data" class="needs-validation" action="<?php echo base_url(); ?>employee/index/<?php echo $row->id; ?>" novalidate>
         

<div class="form-body pal">

<?php $re=$this->db->get_where('tm_createtasks', array('id'=>$row->id))->row(); ?>


<div class="row form-group mbn">
    <label for="inputUsername" class="col-md-4 control-label">Task List
    <span class='require'>*</span></label>
<?php $ca= $this->db->get_where('tm_createtasks', array('project_id'=>$re->project_id))->result();  ?>
    <div class="col-md-8 input-icon right">
     <select class="form-control js-example-basic-multiple" multiple="multiple" data-placeholder="Select the taks related" name="task_related_to[]">
        <?php  foreach ($ca as $ks) { ?>
   <option value="<?php echo $ks->id ?>"  ><?php echo taskId($ks->id); ?></option>
   <?php  } ?>
    </select>
       
   
    </div>
</div> 






 




 

              








</div>

<div class="row form-group mbn">
    <div class="col-md-4"></div>
    <div class="col-md-8">
        <div class="form-actions pll prl pull-right">
                <button type="submit" class="btn btn-primary" name="update">Update</button>
                &nbsp;
          </div>
          </div>      
            </div>

        </form>
 
</div>
</div>
</div>
<script src='<?php echo site_url("public/bower_components/select2/dist/js/select2.full.min.js"); ?>'></script>
</div>
  <!-- Edit Modal -->
                        <?php $index++;} ?>
                    </tbody>
                </table>
                
            </div>
          </div>
        </div>
     </div>
<?php
	


}

else{
	echo "no data found";
}
}

}