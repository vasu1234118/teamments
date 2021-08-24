<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Taskinbox extends CI_Controller {

	public $pagename='taskinbox';
	public $table='createtasks';
	public $complexity_table='complexity';
	public $priority_table='priority';
	public $status_table='status';
	public $task_table='tasks';
	public $attachments_table='createtasks_attachments';
	public $attachments_my_table='task_attachments';
	public $progress_table='task_progress';
	public $limit=30;
	public $add_title='Task Inbox';
	public $title='My To Do List';

	function __construct(){
		parent::__construct();
		$this->common->session_arts_authentication();
		$proadmin_data =$this->session->userdata('proadmin_data');
		$this->data['ADMIN_ID']=$proadmin_data['TM_ID'];
		$this->data['ADMIN_DISPLAY_NAME']=$proadmin_data['TM_NAME'];
		$this->data['ADMIN_ROLE']=$proadmin_data['TM_ROLE'];
		$this->data['ADMIN_ROLE_ID']=$proadmin_data['TM_ROLE_ID'];
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
		$this->data['records'] =$this->task->allTasks($this->data['ADMIN_ID']);
	//echo "<pre/>";print_r($this->data['records']);die;
		$this->load->view($this->pagename.'/view',$this->data);
	}
	
	public function edit($ctask_md5_id='',$ctask_attach_md5_id=''){
	    
		if($ctask_attach_md5_id){
			// Delete My Tasks
			$mytaskdetails=$this->common->getSelectedRecordDetails('file_name', $this->attachments_my_table, array('md5(id)'=>$ctask_attach_md5_id));
			$unlink_file= $mytaskdetails->file_name;
			$delete=$this->common->deleteTable($this->attachments_my_table,array('md5(id)'=>$ctask_attach_md5_id));
			if($delete){
				unlink('./public/attachments_mytask/'.$unlink_file);
			}
			$this->session->set_flashdata('message','My Attachment Deleted Successfully.');
			redirect(site_url('taskinbox/edit/'.$ctask_md5_id));
		}
		$this->data['record_info'] =$this->task->getTaskDetailsForTaskInbox($ctask_md5_id);
		$record_info_id=$this->data['record_info']->id;

		if($this->input->post()){
			/** Select User created by id for mail */
		



			foreach($_POST as $key => $value){
				$$key=$value;
				if(($key!='update')&&($key!='edit_id'))
					$record_data[$key]=$value;
			}
			$record_data['actual_end_date']=date("Y-m-d",strtotime($record_data['actual_end_date']));
			$record_data['actual_start_date']=date("Y-m-d",strtotime($record_data['actual_start_date']));
			$record_data['remainder_date']=date("Y-m-d",strtotime($record_data['remainder_date']));
			$mytaskdetails =$this->task->getTaskDetailsForTaskInbox($edit_id);
			//dd($mytaskdetails);
			// $createdby_id=$this->common->getSelectedRecordDetails('*', $this->table, array('id'=>$mytaskdetails->createtask_id));
			$this->common->updateTable($this->task_table,array('md5(createtask_id)'=>$edit_id,'user_id'=>$this->data['ADMIN_ID']),$record_data);
			// Attachment Upload
			if(isset($_FILES['attachments'])) {
		        $path='./public/attachments_mytask/';
				$title='';
				$files = $_FILES['attachments'];
				$file_return=$this->task->upload_files($path, $title, $files);
				
				// Insert tm_createtasks_attachments
				foreach($file_return as $fileloop){
					if(isset($fileloop['file_name'])){
					$fname=$fileloop['file_name'];
					$record_data=array('createtask_id'=>$record_info_id,'file_name'=>$fname);
					$this->common->saveTable($this->attachments_my_table, $record_data);
					}
				}
			}
			$this->session->set_flashdata('message',$this->add_title.' Updated <strong>Successfully</strong>.');
			//dd($mytaskdetails->created_by);
		//	$this->notificationmail->sendUpdateMailWithOutEvent($mytaskdetails->created_by,$mytaskdetails->id,$type='to_creator');
			redirect(site_url($this->pagename));
		}

		$this->data['attachments']=$this->common->getAllRecords('id,file_name', $this->attachments_table, array('md5(createtask_id)'=>$ctask_md5_id), array('id','DESC'), array($this->limit,0));

		$this->data['myattachments']=$this->common->getAllRecords('id,file_name', $this->attachments_my_table, array('md5(createtask_id)'=>$ctask_md5_id), array('id','DESC'), array($this->limit,0));

		$this->data['status']=$this->common->getAllRecords('id,title', $this->status_table, '', array('order','ASC'), array($this->limit,0));
		$this->data['progress']=$this->common->getAllRecords('id,progress', $this->progress_table, '', array('sort_order','ASC'), array($this->limit,0));
//	print_R(	$this->data['progress']);die;
	
		$this->data['task_info']=$this->common->getSelectedRecordDetails('*', $this->task_table, array('createtask_id'=>$this->data['record_info']->id,'user_id'=>$this->data['ADMIN_ID']));
		//dd($this->data['task_info']);
		if($this->data['task_info']->display=='N'){
			// Update N to Y
			$record_data=array('display'=>'Y');
			$this->common->updateTable($this->task_table,array('id'=>$this->data['task_info']->id),$record_data);
		}

		$this->data['unread_tasks']=$this->task->getUnreadTaskCount($this->data['ADMIN_ID']);
		$this->load->view($this->pagename.'/edit',$this->data);
	}
	
	function delete(){
		//$this->common->deleteTableRecords($this->table,array('md5(id)',$this->uri->segment(3)));
		$record_data=array('flag'=>1);
		$this->common->updateTable($this->table,array('md5(id)'=>$this->uri->segment(3)),$record_data);
		$this->session->set_flashdata('message',$this->add_title.' Deleted <strong>Successfully</strong>.');
		redirect(site_url($this->pagename));
	}

	public function getrequirement(){
		$id=$this->uri->segment(3);
	$res	=$this->db->get_where('tm_sub_status',  array('status_id'=>$id) );
	
	$re1=$res->result();
	echo $this->db->last_query();

     foreach($re1 as $re2){
      echo "<option value='$re2->id'> $re2->name</option>";
	}
	
}
}