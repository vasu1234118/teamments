<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Dashboard extends CI_Controller {

	public $user_table='users';
	public $createtasks='createtasks';
	public $tasks='tasks';
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

		$this->limit=30;
		$this->data['unread_tasks']=$this->task->getUnreadTaskCount($this->data['ADMIN_ID']);
	}
	
	public function index()
	{
		
		
		
		$this->data['super_admin_count']=$this->common->get_table_count($this->user_table,array('role'=>1));
		$this->data['admin_count']=$this->common->get_table_count($this->user_table,array('role'=>2));
		$this->data['superviser_count']=$this->common->get_table_count($this->user_table,array('role'=>3));
		$this->data['employee_count']=$this->common->get_table_count($this->user_table,array('role'=>4));
		$this->data['interance_count']=$this->common->get_table_count($this->user_table,array('role'=>5));
		$this->data['remote_interance_count']=$this->common->get_table_count($this->user_table,array('role'=>6));


		// Assigned Tasks
		$this->data['total_tasks_count']=$this->task->get_assigned_tasks_count($this->data['ADMIN_ID']);
		$this->data['closed_tasks_count']=$this->task->closedTasksCount($this->data['ADMIN_ID']);

		// Task Inbox
		$this->data['newtasks_count']=$this->common->get_table_count($this->tasks,array('user_id'=>$this->data['ADMIN_ID'],'status'=>5));
		$this->data['totaltasks_count']=$this->common->get_table_count($this->tasks,array('user_id'=>$this->data['ADMIN_ID']));
		$this->data['closedtasks_count']=$this->common->get_table_count($this->tasks,array('user_id'=>$this->data['ADMIN_ID'],'status'=>1));

		$this->load->view('dashboard',$this->data);
	}
	function passwordchange(){
		if($this->input->post()){
			$old_pass=$this->input->post('opass');
			$new_pass=$this->input->post('npass');

			$user_count=$this->common->get_table_count($this->user_table,array('id'=>$this->data['ADMIN_ID'],'password'=>base64_encode($old_pass)));
			if($user_count==1){
				$this->common->updateTable($this->user_table,array('id'=>$this->data['ADMIN_ID']),array('password'=>base64_encode($new_pass)));

				$this->session->set_flashdata('message','You new password updated successfully.');
				redirect(site_url('dashboard/passwordchange'));
			}else{
				$this->session->set_flashdata('error','You are entred wrong old password.');
				redirect(site_url('dashboard/passwordchange'));
			}
		}
		$this->load->view('change-password',$this->data);
	}
}