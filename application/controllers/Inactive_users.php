<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Inactive_users extends CI_Controller {

	public $pagename='inactive_users';
	public $table='users';
	public $role_table='roles';
	public $limit=30;
	public $add_title='User';
	public $title='Users';

	function __construct(){
		parent::__construct();
		$this->common->session_arts_authentication();
		$proadmin_data =$this->session->userdata('proadmin_data');
		$this->data['ADMIN_ID']=$proadmin_data['TM_ID'];
		$this->data['ADMIN_DISPLAY_NAME']=$proadmin_data['TM_NAME'];
		$this->data['ADMIN_ROLE']=$proadmin_data['TM_ROLE'];
		$this->data['ADMIN_ROLE_ID']=$proadmin_data['TM_ROLE_ID'];
		if($this->data['ADMIN_ROLE_ID']!=1){
			redirect(site_url('welcome/logout'));
		}
		$this->data['ADMIN_EMAIL']=$proadmin_data['TM_EMAIL'];
		$this->data['ADMIN_PICTURE']=$proadmin_data['TM_PICTURE'];
		$this->data['CLASS_NAME']=$this->router->fetch_class();
		$this->data['METHOD_NAME']=$this->router->fetch_method();
		
		$this->data['title']=$this->title;
		$this->data['add_title']=$this->add_title;
		$this->data['pagename']=$this->pagename;
		$this->data['unread_tasks']=$this->task->getUnreadTaskCount($this->data['ADMIN_ID']);
	}
	
	public function index()
	{
		$this->data['users'] =$this->user->allinactive();
		$this->load->view($this->pagename.'/view',$this->data);
	}
	
	public function add_new(){
		if($this->input->post()){
			$record_data=array();
			foreach($_POST as $key => $value){
				$$key=$value;
				if($key=='password')
					$record_data[$key]=base64_encode($value);
				else if($key!='submit')
					$record_data[$key]=$value;
			}
			$record_data['created_by']=$this->data['ADMIN_ID'];
			$this->common->saveTable($this->table, $record_data);
			$this->session->set_flashdata('message','New '.$this->add_title.' Added <strong>Successfully</strong>.');
			redirect(site_url($this->pagename));
		}
		$this->data['roles']=$this->common->getAllRecords('id,title', $this->role_table, '', array('level','ASC'), array($this->limit,0));
		$this->load->view($this->pagename.'/new',$this->data);
	}
	
	public function edit(){
		if($this->input->post()){
			foreach($_POST as $key => $value){
				$$key=$value;
				if($key=='password')
					$record_data[$key]=base64_encode($value);
				else if(($key!='update')&&($key!='edit_id'))
					$record_data[$key]=$value;
			}
			
			$this->common->updateTable($this->table,array('md5(id)'=>$edit_id),$record_data);
			$this->session->set_flashdata('message',$this->add_title.' Updated <strong>Successfully</strong>.');
			redirect(site_url($this->pagename));
		}

		$this->data['record_info'] =$this->common->getSelectedRecordDetails('*', $this->table, array('md5(id)'=>$this->uri->segment(3)));
		$this->data['roles']=$this->common->getAllRecords('id,title', $this->role_table, '', array('level','ASC'), array($this->limit,0));
		$this->load->view($this->pagename.'/edit',$this->data);
	}
	
	function delete(){
		//$this->common->deleteTableRecords($this->table,array('md5(id)',$this->uri->segment(3)));
		$record_data=array('flag'=>1);
		$this->common->updateTable($this->table,array('md5(id)'=>$this->uri->segment(3)),$record_data);
		$this->session->set_flashdata('message',$this->add_title.' Deleted <strong>Successfully</strong>.');
		redirect(site_url($this->pagename));
	}
}