<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Timesheet extends CI_Controller {

	public $pagename='timesheet';
	public $table='timesheet';
	public $project_table='projects';
	public $complexity_table='complexity';
	public $priority_table='priority';
	public $status_table='status';
	public $tasks_table='tasks';
	public $attachments_table='leave_attachments';
	public $limit=30;
	public $add_title='Timesheet';
	public $title='Timesheet';

	function __construct(){
		parent::__construct();
		$this->common->session_arts_authentication();
		$proadmin_data =$this->session->userdata('proadmin_data');
		$this->data['ADMIN_ID']=$proadmin_data['TM_ID'];
		$this->data['ADMIN_DISPLAY_NAME']=$proadmin_data['TM_NAME'];
		$this->data['ADMIN_ROLE']=$proadmin_data['TM_ROLE'];
		$this->data['ADMIN_ROLE_ID']=$proadmin_data['TM_ROLE_ID'];
		/*if(($this->data['ADMIN_ROLE_ID']==5)||($this->data['ADMIN_ROLE_ID']==6)){
			redirect(site_url("welcome/logout"));
		}*/
		$this->data['ADMIN_EMAIL']=$proadmin_data['TM_EMAIL'];
		$this->data['ADMIN_PICTURE']=$proadmin_data['TM_PICTURE'];
		$this->data['CLASS_NAME']=$this->router->fetch_class();
		$this->data['METHOD_NAME']=$this->router->fetch_method();
		
		$this->data['title']=$this->title;
		$this->data['add_title']=$this->add_title;
		$this->data['pagename']=$this->pagename;

		$this->data['unread_tasks']=$this->task->getUnreadTaskCount($this->data['ADMIN_ID']);
		$this->load->library('notificationmail');
	}
	
	public function index()
	{

		  if(isset($_POST['taskmerge']))
      {
        extract($_POST);

    




   

    $updt=array('status'=>$task_status );

    $res=$this->db->update('timesheet',$updt, array('id'=>$ids));
   
    if($res)
    {
         echo '<script type="text/javascript">alert(" Successfully Update Status ")</script>';
      $this->session->set_flashdata('msg',"Successfully Changed Passwrd");

      //redirect('dashboard');
    }

  else
  {
    $this->session->set_flashdata('error',"New Password And Cofirm Password Should Be Same");
  }
      }
     

if(isset($_POST['submit'])){
if($this->input->post()){
			$record_data=array();
			foreach($_POST as $key => $value){
				$$key=$value;
				if($key=='password')
					$record_data[$key]=base64_encode($value);
				else if($key=='assigned_to')
					$record_data[$key]=implode(',',$value);
				else if($key=='task_related_to')
					$record_data[$key]=implode(',',$value);
				else if($key=='attachments'){
					//$record_data[$key]='';
				}else if($key=='save'){
					$record_data['flag']=2;
				}else if($key!='submit')
					$record_data[$key]=$value;
			}
			
			
			
           $record_data['day']=date('D',strtotime($record_data['work_date']));
			$record_data['created_at']=date("Y-m-d H:i:s");
			$record_data['time']=date("h:i a");
			$record_data['created_by']=$this->data['ADMIN_ID'];
			$record_data['user_id']=$this->data['ADMIN_ID'];

		//	dd($record_data);
			
			$task_id=$this->common->saveTable($this->table, $record_data);
			if($task_id){
				// Attachment Upload
				
			}
			                
			
			$this->session->set_flashdata('message','New '.$this->add_title.' Added <strong>Successfully</strong>.');
			redirect(site_url($this->pagename));
		}
	}
 $this->data['avaliableleaves']= $this->timesheet->alltimesheet($this->data['ADMIN_ID']); 
		// var_dump(Events::trigger('test_string', 'notificationmail', 'string'));
		// exit;
		// print_r($this->notificationmail->sendMailWithOutEvent(20));
		// exit;
		$this->data['records'] =$this->timesheet->alltimesheet($this->data['ADMIN_ID']);
		$this->load->view($this->pagename.'/view',$this->data);
	}
	
	public function add_new(){
		if($this->input->post()){
			$record_data=array();
			foreach($_POST as $key => $value){
				$$key=$value;
				if($key=='password')
					$record_data[$key]=base64_encode($value);
				else if($key=='assigned_to')
					$record_data[$key]=implode(',',$value);
				else if($key=='task_related_to')
					$record_data[$key]=implode(',',$value);
				else if($key=='attachments'){
					//$record_data[$key]='';
				}else if($key=='save'){
					$record_data['flag']=2;
				}else if($key!='submit')
					$record_data[$key]=$value;
			}
			
			
			
           $record_data['day']=date('D',strtotime($record_data['work_date']));
			$record_data['created_at']=date("Y-m-d H:i:s");
			$record_data['time']=date("h:i a");
			$record_data['created_by']=$this->data['ADMIN_ID'];
			$record_data['user_id']=$this->data['ADMIN_ID'];

		//	dd($record_data);
			
			$task_id=$this->common->saveTable($this->table, $record_data);
			if($task_id){
				// Attachment Upload
				if(isset($_FILES['attachments'])) {
			        $path='./public/attachments/';
					$title=date('YmdHis');
					$files = $_FILES['attachments'];
					$file_return=$this->leave->upload_files($path, $title, $files);

					// Insert tm_createtasks_attachments
					foreach($file_return as $fileloop){
						if(isset($fileloop['file_name'])){
						$fname=$fileloop['file_name'];
						$record_data=array('user_id'=>$this->data['ADMIN_ID'],'leave_id'=>$task_id,'file_name'=>$fname);
						$this->common->saveTable($this->attachments_table, $record_data);
						}
					}
				}
				
				 $asg = $this->input->post('assigned_to');
                
               // echo "<pre/>"; print_r($asg);die;
                $eml = [];
                for ($i = 0; $i < count($asg); $i++) {
					$get_email = "SELECT * FROM tm_users WHERE id = '$asg[$i]' ";
					$query = $this->db->query($get_email);
					$res = $query->row();
					 $toemail = $res->email;
					
					array_push($eml, $toemail);
				}
				
				$em2 = implode(', ', $eml);
				
			/*	for($i=0;$i<count($assigned_to);$i++){
				$task_data=array('createtask_id'=>$task_id,'user_id'=>$assigned_to[$i]);
				$this->common->saveTable($this->leaves_table,$task_data);
				
				$this->notificationmail->sendMailWithOutEvent($assigned_to[$i]);
				}*/
			}
			                 if(isset($_POST['submit'])){
                              $msg = array(
	         'title'=>$this->input->post('title'),
             'from_date'=>$record_data['from_date'],
             'to_date'=>$record_data['to_date'],
			'lstime'=> $this->input->post('lstime'),
			'letime'=>$this->input->post('letime'),
			'ldays'=>$this->input->post('ldays'),
			'lreason'=>$this->input->post('lreason'),
             'description'=>$this->input->post('description'),
             'task_id'=>$task_id,


			
		
        );
                   
                    $message = $this->load->view('leaves/leavemail',$msg,TRUE);
                                    	
                                //$subject.="Task Id";
                                $config = array(  'mailtype'  => 'html', 'charset'   => 'iso-8859-1' );
                                $this->load->library('email'); 
                                $this->email->initialize( $config);
                                $this->email->from('info@dqci.in', $admin);
                                $this->email->to($em2);
                               
                               //$this->email->to('srinivasrao@digitowork.com');
                                //$this->email->subject($subject. taskId($Events));
                               $this->email->subject($title); 
                                $this->email->message($message);

                       $this->email->send();
                             }
			
			$this->session->set_flashdata('message','New '.$this->add_title.' Added <strong>Successfully</strong>.');
			redirect(site_url($this->pagename));
		}
		$this->data['complexity']=$this->common->getAllRecords('id,title', $this->complexity_table, '', array('order','ASC'), array($this->limit,0));
		$this->data['priority']=$this->common->getAllRecords('id,title', $this->priority_table, '', array('order','ASC'), array($this->limit,0));
		$this->data['project']=$this->common->getAllRecords('id,name', $this->project_table, '', array('sort_order','DESC'), array($this->limit,0));
		if($this->data['ADMIN_ROLE_ID']==4){
			$ADMIN_ROLE_ID=2;
		}else{
			$ADMIN_ROLE_ID=$this->data['ADMIN_ROLE_ID'];
		}
		
		$this->load->view($this->pagename.'/new',$this->data);
	}
	
	public function edit($ctask_md5_id='',$ctask_attach_md5_id=''){ 
		if($ctask_attach_md5_id){
			// Delete My Tasks
			$taskdetails=$this->common->getSelectedRecordDetails('file_name', $this->attachments_table, array('md5(id)'=>$ctask_attach_md5_id));
			$unlink_file= $taskdetails->file_name;
			$delete=$this->common->deleteTable($this->attachments_table,array('md5(id)'=>$ctask_attach_md5_id));
			if($delete){
				unlink('./public/attachments/'.$unlink_file);
			}
			$this->session->set_flashdata('message','Assigned Attachment Deleted Successfully.');
			redirect(site_url($this->pagename.'/'."edit/".$ctask_md5_id));
		}

		$this->data['record_info'] =$this->common->getSelectedRecordDetails('*', $this->table, array('md5(id)'=>$this->uri->segment(3)));
		$record_info_id=$this->data['record_info']->id;

		if($this->input->post()){
if($this->input->post('cancel')){
	if($this->db->update('tm_leaves', array('status'=>'3'), array('md5(id)'=>$this->uri->segment(3)))){
			$this->session->set_flashdata('message',$this->add_title.' Canceled <strong>Successfully</strong>.');
		}
			redirect(site_url($this->pagename));
}
			else{
			foreach($_POST as $key => $value){
				$$key=$value;
				if($key=='password')
					$record_data[$key]=base64_encode($value);
				else if($key=='assigned_to')
					$record_data[$key]=implode(',',$value);
				else if($key=='task_related_to')
					$record_data[$key]=implode(',',$value);
				else if($key=='update')
					$record_data['flag']=0;
				else if(($key!='save')&&($key!='edit_id')&&($key!='createtask_id'))
					$record_data[$key]=$value;
			}
			$date = explode ("-", $record_data['from_date']); 
			$record_data['from_date'] = date("Y-m-d",strtotime($date[0]));
			$record_data['to_date'] = date("Y-m-d",strtotime($date[1]));
           // $record_data['date']=date("Y-m-d",strtotime($record_data['date']));
			$record_data['created_at']=date("Y-m-d H:i:s");
			$record_data['created_by']=$this->data['ADMIN_ID'];
		//	$record_data['user_id']=$this->data['ADMIN_ID'];

            // Attachment Upload
            if(isset($_FILES['attachments'])) {
                if($_FILES['attachments']['name'][0]) {
                    $path='./public/attachments/';
                    $title=date('YmdHis');
                    $files = $_FILES['attachments'];
                    $file_return=$this->leave->upload_files($path, $title, $files);

                    // Insert tm_createtasks_attachments
                    foreach($file_return as $fileloop){
                        if(isset($fileloop['file_name'])){
                        $fname=$fileloop['file_name'];
                        $record_data1=array('user_id'=>$this->data['ADMIN_ID'],'leave_id'=>$this->data['record_info']->id,'file_name'=>$fname);
                        $this->common->saveTable($this->attachments_table, $record_data1);
                        }
                    }
                }
            }

			// for($i=0;$i<count($assigned_to);$i++){
			// 	$task_count=$this->common->get_table_count($this->leaves_table,array('user_id'=>$this->data['ADMIN_ID'],'md5(createtask_id)'=>$ctask_md5_id));
			// 	if($task_count==0){
			// 	$task_data=array('createtask_id'=>$this->data['record_info']->id,'user_id'=>$assigned_to[$i]);
			// 	$this->common->saveTable($this->leaves_table,$task_data);
			// 	}
			// }
			
			$this->common->updateTable($this->table,array('md5(id)'=>$edit_id),$record_data);
			$this->session->set_flashdata('message',$this->add_title.' Updated <strong>Successfully</strong>.');
			redirect(site_url($this->pagename));
		}
		}

		// $this->data['attachments']=$this->common->getAllRecords('id,file_name', $this->attachments_table, array('user_id'=>$this->data['ADMIN_ID'],'md5(leave_id)'=>$ctask_md5_id), array('id','DESC'), array($this->limit,0));

		$this->data['complexity']=$this->common->getAllRecords('id,title', $this->complexity_table, '', array('order','ASC'), array($this->limit,0));
		$this->data['priority']=$this->common->getAllRecords('id,title', $this->priority_table, '', array('order','ASC'), array($this->limit,0));
		$this->data['assigned_users']=$this->leave->allAssignedUsers($this->data['ADMIN_ROLE_ID'],$this->data['ADMIN_ID']);
		$this->data['project']=$this->common->getAllRecords('id,name', $this->project_table, '', array('sort_order','DESC'), array($this->limit,0));
		// $this->data['allTasks'] =$this->leave->allAssignedTasks($this->data['ADMIN_ID']);
		$this->load->view($this->pagename.'/edit',$this->data);
	}

	function show($ctask_md5_id){

		//$this->data['attachments']=$this->common->getAllRecords('id,file_name', $this->attachments_table, array('user_id='.$this->data['ADMIN_ID'].' AND md5(leave_id)='.$ctask_md5_id), array('id','DESC'), array($this->limit,0));

		// $this->data['complexity']=$this->common->getAllRecords('id,title', $this->complexity_table, '', array('order','ASC'), array($this->limit,0));
		// $this->data['priority']=$this->common->getAllRecords('id,title', $this->priority_table, '', array('order','ASC'), array($this->limit,0));
		// $this->data['assigned_users']=$this->leave->allAssignedUsers($this->data['ADMIN_ROLE_ID'],$this->data['ADMIN_ID']);

		// $this->data['project']=$this->common->getAllRecords('id,name', $this->project_table, '', array('sort_order','DESC'), array($this->limit,0));

		$this->data['record_info'] =$this->common->getSelectedRecordDetails('*', $this->table, array('md5(id)'=>$this->uri->segment(3)));
		$record_info_id=$this->data['record_info']->id;


		// $this->data['allTasks'] =$this->leave->allAssignedTasks($this->data['ADMIN_ID']);
		$this->load->view($this->pagename.'/show',$this->data);
		
	}

	function copy($task_id_md5){
		$taskdetails=(array)$this->common->getSelectedRecordDetails('*', $this->table, array('md5(id)'=>$task_id_md5));
		unset($taskdetails['id']);
		unset($taskdetails['assigned_to']);
		$this->session->set_flashdata('message','Coped Task Created Successfully');
		$this->common->saveTable($this->table, $taskdetails);
		redirect(site_url('assignedtasks'));
	}
	
	function delete(){
		//$this->common->deleteTableRecords($this->table,array('md5(id)',$this->uri->segment(3)));
		$record_data=array('flag'=>1,"deleted_at"=>date("Y-m-d H:i:s"));
		$this->common->updateTable($this->table,array('md5(id)'=>$this->uri->segment(3)),$record_data);
		$this->session->set_flashdata('message',$this->add_title.' Deleted <strong>Successfully</strong>.');
		redirect(site_url($this->pagename));
	}
	public function accept(){
	$re=$this->db->update('tm_leaves', array('status'=>'1'), array('md5(id)'=>$this->uri->segment(3)));
	if($re){

		redirect('leaves');
	}

}
public function reject(){
	$re=$this->db->update('tm_leaves', array('status'=>'2'), array('id'=>$this->uri->segment(3)));
	if($re){

		redirect('leaves');
	}

}

public function mail(){
    $this->load->view('leaves/leavemail');
}

public function avaliableleaves($empid){
	$today=date('y-m-d');
 $jo=$this->db->get_where('tm_users', array('id'=>$empid))->row()->doj;

return (int)abs((strtotime($today) - strtotime($jo))/(60*60*24*30))*1.5;



}

public function vasudraft(){

	$rs=json_decode($_POST['data']);
	foreach($rs as $z){
		$this->db->update('timesheet', array('status'=>'1'), array('id'=>$z));
		echo 1;
	}
}
public function vasuaccept(){
 $rs=json_decode($_POST['data']);
	foreach($rs as $z){
		$this->db->update('timesheet', array('status'=>'2'), array('id'=>$z));
		echo 1;

}	
}
}