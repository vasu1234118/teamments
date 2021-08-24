<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Milestones extends CI_Controller {

	public $pagename='milestones';
	public $table='milestones';
	public $complexity_table='complexity';
	public $priority_table='priority';
	public $project_table='projects';
	public $status_table='status';
	public $tasks_table='tasks';
	public $attachments_table='milestone_attachments';
	public $limit=30;
	public $add_title='Milestones';
	public $title='Milestones';

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
		// var_dump(Events::trigger('test_string', 'notificationmail', 'string'));
		// exit;
		// print_r($this->notificationmail->sendMailWithOutEvent(20));
		// exit;
		$this->data['records'] =$this->milestone->allMilestones();
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
			$record_data['created_at']=date("Y-m-d H:i:s");
			$record_data['created_by']=$this->data['ADMIN_ID'];
			$record_data['end_date']=date("Y-m-d",strtotime($record_data['end_date']));
			$record_data['start_date']=date("Y-m-d",strtotime($record_data['start_date']));
			
			$task_id=$this->common->saveTable($this->table, $record_data);
			if($task_id){
				// Attachment Upload
				if(isset($_FILES['attachments'])) {
			        $path='./public/attachments/';
					$title=date('YmdHis');
					$files = $_FILES['attachments'];
					$file_return=$this->milestone->upload_files($path, $title, $files);

					// Insert tm_createtasks_attachments
					foreach($file_return as $fileloop){
						if(isset($fileloop['file_name'])){
						$fname=$fileloop['file_name'];
						$record_data=array('user_id'=>$this->data['ADMIN_ID'],'milestone_id'=>$task_id,'file_name'=>$fname);
						$this->common->saveTable($this->attachments_table, $record_data);
						}
					}
				}
				
				for($i=0;$i<count($assigned_to);$i++){
				$task_data=array('createtask_id'=>$task_id,'user_id'=>$assigned_to[$i]);
				$this->common->saveTable($this->milestones_table,$task_data);
				
				$this->notificationmail->sendMailWithOutEvent($assigned_to[$i]);
				}
			}
			
			$this->session->set_flashdata('message','New '.$this->add_title.' Added <strong>Successfully</strong>.');
			redirect(site_url($this->pagename));
		}
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
            $record_data['created_at']=date("Y-m-d H:i:s");
			$record_data['created_by']=$this->data['ADMIN_ID'];
			$record_data['end_date']=date("Y-m-d",strtotime($record_data['end_date']));
			$record_data['start_date']=date("Y-m-d",strtotime($record_data['start_date']));
            
			// Attachment Upload
			if($_FILES['attachments']['name'][0]) {
		        $path='./public/attachments/';
				$title=date('YmdHis');
				$files = $_FILES['attachments'];
				$file_return=$this->milestone->upload_files($path, $title, $files);

				// Insert tm_createtasks_attachments
				foreach($file_return as $fileloop){
					if(isset($fileloop['file_name'])){
					$fname=$fileloop['file_name'];
					$record_data1=array('user_id'=>$this->data['ADMIN_ID'],'milestone_id'=>$this->data['record_info']->id,'file_name'=>$fname);
					$this->common->saveTable($this->attachments_table, $record_data1);
					}
				}
			}

			// for($i=0;$i<count($assigned_to);$i++){
			// 	$task_count=$this->common->get_table_count($this->milestones_table,array('user_id'=>$this->data['ADMIN_ID'],'md5(createtask_id)'=>$ctask_md5_id));
			// 	if($task_count==0){
			// 	$task_data=array('createtask_id'=>$this->data['record_info']->id,'user_id'=>$assigned_to[$i]);
			// 	$this->common->saveTable($this->milestones_table,$task_data);
			// 	}
			// }
			
			$this->common->updateTable($this->table,array('md5(id)'=>$edit_id),$record_data);
			$this->session->set_flashdata('message',$this->add_title.' Updated <strong>Successfully</strong>.');
			redirect(site_url($this->pagename));
		}

		// $this->data['attachments']=$this->common->getAllRecords('id,file_name', $this->attachments_table, array('user_id='.$this->data['ADMIN_ID'].' AND md5(milestone_id)='.$ctask_md5_id), array('id','DESC'), array($this->limit,0));
		$this->data['project']=$this->common->getAllRecords('id,name', $this->project_table, '', array('sort_order','DESC'), array($this->limit,0));
		// 	$this->data['complexity']=$this->common->getAllRecords('id,title', $this->complexity_table, '', array('order','ASC'), array($this->limit,0));
		// $this->data['priority']=$this->common->getAllRecords('id,title', $this->priority_table, '', array('order','ASC'), array($this->limit,0));
		// $this->data['assigned_users']=$this->milestone->allAssignedUsers($this->data['ADMIN_ROLE_ID'],$this->data['ADMIN_ID']);
		// $this->data['allTasks'] =$this->milestone->allAssignedTasks($this->data['ADMIN_ID']);
		$this->load->view($this->pagename.'/edit',$this->data);
	}

	function show($ctask_md5_id='',$ctask_attach_md5_id=''){
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
            $record_data['created_at']=date("Y-m-d H:i:s");
			$record_data['created_by']=$this->data['ADMIN_ID'];
			$record_data['end_date']=date("Y-m-d",strtotime($record_data['end_date']));
			$record_data['start_date']=date("Y-m-d",strtotime($record_data['start_date']));
            
			// Attachment Upload
			if($_FILES['attachments']['name'][0]) {
		        $path='./public/attachments/';
				$title=date('YmdHis');
				$files = $_FILES['attachments'];
				$file_return=$this->milestone->upload_files($path, $title, $files);

				// Insert tm_createtasks_attachments
				foreach($file_return as $fileloop){
					if(isset($fileloop['file_name'])){
					$fname=$fileloop['file_name'];
					$record_data1=array('user_id'=>$this->data['ADMIN_ID'],'milestone_id'=>$this->data['record_info']->id,'file_name'=>$fname);
					$this->common->saveTable($this->attachments_table, $record_data1);
					}
				}
			}

			// for($i=0;$i<count($assigned_to);$i++){
			// 	$task_count=$this->common->get_table_count($this->milestones_table,array('user_id'=>$this->data['ADMIN_ID'],'md5(createtask_id)'=>$ctask_md5_id));
			// 	if($task_count==0){
			// 	$task_data=array('createtask_id'=>$this->data['record_info']->id,'user_id'=>$assigned_to[$i]);
			// 	$this->common->saveTable($this->milestones_table,$task_data);
			// 	}
			// }
			
			$this->common->updateTable($this->table,array('md5(id)'=>$edit_id),$record_data);
			$this->session->set_flashdata('message',$this->add_title.' Updated <strong>Successfully</strong>.');
			redirect(site_url($this->pagename));
		}

		// $this->data['attachments']=$this->common->getAllRecords('id,file_name', $this->attachments_table, array('user_id='.$this->data['ADMIN_ID'].' AND md5(milestone_id)='.$ctask_md5_id), array('id','DESC'), array($this->limit,0));
		$this->data['project']=$this->common->getAllRecords('id,name', $this->project_table, '', array('sort_order','DESC'), array($this->limit,0));
		// 	$this->data['complexity']=$this->common->getAllRecords('id,title', $this->complexity_table, '', array('order','ASC'), array($this->limit,0));
		// $this->data['priority']=$this->common->getAllRecords('id,title', $this->priority_table, '', array('order','ASC'), array($this->limit,0));
		// $this->data['assigned_users']=$this->milestone->allAssignedUsers($this->data['ADMIN_ROLE_ID'],$this->data['ADMIN_ID']);
		// $this->data['allTasks'] =$this->milestone->allAssignedTasks($this->data['ADMIN_ID']);
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

	
}