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
		public $tasks_users = 'users';
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
	
	
		public function completed()
	{
		$this->data['records'] =$this->task->completed($this->data['ADMIN_ID']);
	//echo "<pre/>";print_r($this->data['records']);die;
		$this->load->view($this->pagename.'/complted',$this->data);
	}

	public function newtask()
	{
		$this->data['records'] =$this->task->newtask($this->data['ADMIN_ID']);
	//echo "<pre/>";print_r($this->data['records']);die;
		$this->load->view($this->pagename.'/newtask',$this->data);
	}
	
		public function incomplete()
	{
		$this->data['records'] =$this->task->incomplete($this->data['ADMIN_ID']);
	//echo "<pre/>";print_r($this->data['records']);die;
		$this->load->view($this->pagename.'/incomplete',$this->data);
	}
		public function awaiting()
	{
		$this->data['records'] =$this->task->awaiting($this->data['ADMIN_ID']);
	//echo "<pre/>";print_r($this->data['records']);die;
		$this->load->view($this->pagename.'/awaiting',$this->data);
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
		
	$this->viewdisplay($record_info_id);
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
				$audit=[];
				$chk_changes=['status','sub_status','task_progress'];
			$audit['createdby']=$this->data['ADMIN_ID'];
				$oldata=$this->db->get_where($this->task_table, array('md5(createtask_id)'=>$edit_id))->row();
				$audit['task_id']=$oldata->createtask_id;
			$audit['status']='1';
			$this->common->updateTable($this->task_table,array('md5(createtask_id)'=>$edit_id,'user_id'=>$this->data['ADMIN_ID']),$record_data);
			
		$z=$this->db->get_where($this->task_table,array('md5(createtask_id)'=>$edit_id,))->row();
			$s=$this->db->get_where($this->table,array('id'=>$z->createtask_id))->row();
			$u=$this->db->get_where($this->tasks_users,array('id'=>$s->created_by))->row();
			
		
		$proadmin_data =$this->session->userdata('proadmin_data');
	
		
		
		
			   	$msg = array(
	         'task_name'=>$s->name,
             'status'=>$record_data['status'],
	          'date'=>date('y-m-d H:i:s'),
		
'task_id'=>$z->createtask_id,
 name=>$this->data['ADMIN_DISPLAY_NAME'],

			
		
        );
        
        $message = $this->load->view('completedemail',$msg,TRUE);
                                    	
                                //$subject.="Task Id";
                                $config = array(  'mailtype'  => 'html', 'charset'   => 'iso-8859-1' );
                                $this->load->library('email'); 
                                $this->email->initialize( $config);
                                $this->email->from('info@dqci.in', $admin);
                                $this->email->to($u->email);
                                $this->email->cc($email_cc);
                               //$this->email->cc('vasu.svrao@gmail.com');
                                //$this->email->subject($subject. taskId($Events));
                               $this->email->subject($subject.":" ."TASK0".$z->createtask_id); 
                                $this->email->message($message);

                       $this->email->send();
                                
        
        
			
		
			
			foreach($chk_changes as $v){
			   if($oldata->$v!=$record_data[$v]) 
			   {
				$audit['type']=$v;
				$audit['old_data']=$oldata->$v;
				$audit['new_data']=$record_data[$v];
				
				$this->db->insert('taskaudit', $audit);
			   }
			}
				
		 
			
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
				$this->getdisplay($this->data['record_info']->id);
			$this->session->set_flashdata('message',"TASK00".$z->createtask_id. " " .$this->add_title.' Updated <strong>Successfully</strong>.');
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
	
$this->data['task_info']->adisplay;
		if($this->data['task_info']->display=='N'){
			// Update N to Y
			$record_data=array('display'=>'Y');
		
			$this->common->updateTable($this->task_table,array('id'=>$this->data['task_info']->id),$record_data);
		
		}
	
		
	

		$this->data['unread_tasks']=$this->task->getUnreadTaskCount($this->data['ADMIN_ID']);
		$this->load->view($this->pagename.'/edit',$this->data);
	}
	function getdisplay($id){
	 /*   $status=array('display'=>'Y','cdisplay'=>'Y','adisplay'=>'Y','indisplay'=>'Y', 'wdisplay'=>'Y');
	    $re=$this->db->get_where($this->task_table, array('createtask_id'=>$id,'user_id'=>$this->data['ADMIN_ID']))->row();
	    if($re->status==5){
	        $status['display']='N';
	    }
	     if($re->status==1){
	        $status['cdisplay']='N';
	    } 
	    if($re->status==4){
	        $status['adisplay']='N';
	    }
	    if($re->status==2){
	        $status['indisplay']='N';
	    }
	     if($re->status==3){
	        $status['wdisplay']='N';
	    }
	    */
	$this->common->updateTable($this->task_table,array('createtask_id'=>$id,'user_id'=>$this->data['ADMIN_ID']),array('display'=>'N'));    
	}
	
		function viewdisplay($id){
	/*    $status=array();
	    $re=$this->db->get_where($this->task_table, array('createtask_id'=>$id,'user_id'=>$this->data['ADMIN_ID']))->row();
	    if($re->status=='5'){
	        $status['display']='Y';
	    }
	     if($re->status=='1'){
	        $status['cdisplay']='Y';
	    } 
	    if($re->status=='4'){
	        $status['adisplay']='Y';
	    }
	    if($re->status=='2'){
	        $status['indisplay']='Y';
	    }
	    if($re->status=='3'){
	        $status['wdisplay']='Y';
	    }
	    */
	$this->common->updateTable($this->task_table,array('createtask_id'=>$id,'user_id'=>$this->data['ADMIN_ID']),array('display'=>'Y'));    
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