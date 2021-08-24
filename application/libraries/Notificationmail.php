<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');


class Notificationmail
{

	public $pagename = 'assignedtasks';
	public $table = 'createtasks';
	public $complexity_table = 'complexity';
	public $priority_table = 'priority';
	public $status_table = 'status';
	public $tasks_table = 'tasks';
	public $attachments_table = 'createtasks_attachments';
	public $limit = 30;
	public $add_title = 'Task';
	public $title = 'Assigned Tasks';

	function __construct()
	{
		//parent::__construct();

		Events::register('test_string', array($this, 'test'));
		/*if(($this->data['ADMIN_ROLE_ID']==5)||($this->data['ADMIN_ROLE_ID']==6)){
			redirect(site_url("welcome/logout"));
		}*/
	}

	public function index()
	{
		$this->data['records'] = $this->task->allAssignedTasks($this->data['ADMIN_ID']);
		$this->load->view($this->pagename . '/view', $this->data);
	}


	public function sendMail()
	{

		/** Loading a library from  another Library using require */
		require_once APPPATH . 'libraries/PHPMailer_lib.php';


		$mail_obj = new PHPMailer_lib(true);

		$mail = $mail_obj->load();
		// SMTP configuration
		$mail->isSMTP();
		$mail->Host     = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'task@digitohub.com';
		$mail->Password = 'oxyijohhgodeiagq';
		$mail->SMTPSecure = 'TLS';
		$mail->Port     = 587;

		$mail->setFrom('info@digitohub.com', 'DigitoHub');
		$mail->addReplyTo('info@digitohub.com', 'DigitoHub');

		// Add a recipient
		$mail->addAddress('sainath@digitohub.com');

		// Add cc or bcc 
		// $mail->addCC('cc@example.com');
		// $mail->addBCC('bcc@example.com');

		// Email subject
		$mail->Subject = 'New Task Assigned Task';

		// Set email format to HTML
		$mail->isHTML(true);

		// Email body content
		$mailContent = "<h1>New Task Has Been Assigned</h1>
            <p>This is a test email sending using SMTP mail server with PHPMailer.</p>";
		$mail->Body = $mailContent;

		// Send email
		if (!$mail->send()) {

			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo 'Message has been sent';
		}
	}


	public function sendMailWithOutEvent($id, $task_id, $cc = null)
	{

       













		try {

			$CI = &get_instance();
			$CI->load->model('users_model');
			$CI->load->model('tasks_model');
			$fromattedId = 'TASK' . str_pad($task_id, 4, '0', STR_PAD_LEFT);


			$data['user_data'] = $CI->users_model->getUserData($id);
			$data['task_data'] = $CI->tasks_model->getTaskDetailsForMail($task_id);

			// exit;
			$message = $CI->load->view('emails/new-task-mail', $data, true);

			//return $data['user_data'];
			/** Loading a library from  another Library using require */
			require_once APPPATH . 'libraries/PHPMailer_lib.php';


			$mail_obj = new PHPMailer_lib(true);

			$mail = $mail_obj->load();
			// SMTP configuration
			$mail->isSMTP();
			$mail->Host     = 'smtp.gmail.com';
			//$mail->SMTPDebug = 3;
			$mail->SMTPAuth = true;
			$mail->Username = 'task@digitohub.com';
			$mail->Password = 'oxyijohhgodeiagq';
			$mail->SMTPSecure = 'TLS';
			$mail->Port     = 587;
			$mail->SMTPOptions = array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				)
			);
			$mail->setFrom('info@digitohub.com', 'DigitoHub');
			$mail->addReplyTo('info@digitohub.com', 'DigitoHub');

			// Add a recipient
			$mail->addAddress($data['user_data']->email);

			// Add cc or bcc 
// 			if ($cc != null && $cc != '') {
// 				$cc_mem =  explode(',', $cc);
// 				//dd($cc_mem);
// 				if ($cc_mem) {
// 					foreach ($cc_mem as $key) {

// 						$mail->addCC($key);
// 					}
// 				}
// 			}
$mail->addCC('ghoshlaltu216@gmail.com');
$this->email->to('ghoshlaltu216@gmail.com');
			// $mail->addBCC('bcc@example.com');

			// Email subject
			$mail->Subject = 'New Task Assigned of TASK-ID:' . $fromattedId;


			// Set email format to HTML
			$mail->isHTML(true);

			// Email body content
			// $mailContent = "<h1>New Task Has Been Assigned</h1>
			//     <p>A New Task as Been Assigned Please Check </p>";
			$mailContent = $message;
			$mail->Body = $mailContent;

			// Send email
			if (!$mail->send()) {

				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
				//return false;
			} else {
				return true;
			}
		} catch (Exception $e) {
			throw new Exception($e);
		}
	}


	public function sendUpdateMailWithOutEvent($id, $task_id, $type = 'user', $cc = null)
	{
		try {

			$CI = &get_instance();
			$CI->load->model('users_model');
			$CI->load->model('tasks_model');

			$data['user_data'] = $CI->users_model->getUserData($id);
			$data['task_data'] = $CI->tasks_model->getTaskDetailsForMail($task_id);
			$data['user_type'] = $type;

			// exit;
			$message = $CI->load->view('emails/update-task-email', $data, true);

			//return $data['user_data'];
			/** Loading a library from  another Library using require */
			require_once APPPATH . 'libraries/PHPMailer_lib.php';


			$mail_obj = new PHPMailer_lib(true);

			$mail = $mail_obj->load();
			// SMTP configuration
			$mail->isSMTP();
			$mail->Host     = 'smtp.gmail.com';
			//$mail->SMTPDebug = 3;
			$mail->SMTPAuth = true;
			$mail->Username = 'task@digitohub.com';
			$mail->Password = 'oxyijohhgodeiagq';
			$mail->SMTPSecure = 'TLS';
			$mail->Port     = 587;
			$mail->SMTPOptions = array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				)
			);
			$mail->setFrom('info@digitohub.com', 'DigitoHub');
			$mail->addReplyTo('info@digitohub.com', 'DigitoHub');

			// Add a recipient
			$mail->addAddress($data['user_data']->email);

			// Add cc or bcc 
			if ($cc != null && $cc != '')
				$mail->addCC($cc);
			// $mail->addBCC('bcc@example.com');

			// Email subject
			$fromattedId = 'TASK' . str_pad($task_id, 4, '0', STR_PAD_LEFT);

			$mail->Subject = 'A Update in your Task-ID' . $fromattedId;

			// Set email format to HTML
			$mail->isHTML(true);

			// Email body content
			// $mailContent = "<h1>New Task Has Been Assigned</h1>
			//     <p>A New Task as Been Assigned Please Check </p>";
			$mailContent = $message;
			$mail->Body = $mailContent;

			// Send email
			if (!$mail->send()) {

				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
				//return false;
			} else {
				return true;
			}
		} catch (Exception $e) {
			throw new Exception($e);
		}
	}

	public function test()
	{

		return;
	}


	// public function add_new(){
	// 	if($this->input->post()){
	// 		$record_data=array();
	// 		foreach($_POST as $key => $value){
	// 			$$key=$value;
	// 			if($key=='password')
	// 				$record_data[$key]=base64_encode($value);
	// 			else if($key=='assigned_to')
	// 				$record_data[$key]=implode(',',$value);
	// 			else if($key=='attachments'){
	// 				//$record_data[$key]='';
	// 			}else if($key=='save'){
	// 				$record_data['flag']=2;
	// 			}else if($key!='submit')
	// 				$record_data[$key]=$value;
	// 		}
	// 		$record_data['assigned_date']=date("Y-m-d",strtotime($record_data['assigned_date']));
	// 		$record_data['estimated_ended_on']=date("Y-m-d",strtotime($record_data['estimated_ended_on']));
	// 		$record_data['started_on']=date("Y-m-d",strtotime($record_data['started_on']));
	// 		$record_data['created_by']=$this->data['ADMIN_ID'];

	// 		$task_id=$this->common->saveTable($this->table, $record_data);
	// 		if($task_id){
	// 			// Attachment Upload
	// 			if(isset($_FILES['attachments'])) {
	// 		        $path='./public/attachments/';
	// 				$title=date('YmdHis');
	// 				$files = $_FILES['attachments'];
	// 				$file_return=$this->task->upload_files($path, $title, $files);

	// 				// Insert tm_createtasks_attachments
	// 				foreach($file_return as $fileloop){
	// 					if(isset($fileloop['file_name'])){
	// 					$fname=$fileloop['file_name'];
	// 					$record_data=array('user_id'=>$this->data['ADMIN_ID'],'createtask_id'=>$task_id,'file_name'=>$fname);
	// 					$this->common->saveTable($this->attachments_table, $record_data);
	// 					}
	// 				}
	// 			}

	// 			for($i=0;$i<count($assigned_to);$i++){
	// 			$task_data=array('createtask_id'=>$task_id,'user_id'=>$assigned_to[$i]);
	// 			$this->common->saveTable($this->tasks_table,$task_data);
	// 			}
	// 		}
	// 		$this->session->set_flashdata('message','New '.$this->add_title.' Added <strong>Successfully</strong>.');
	// 		redirect(site_url($this->pagename));
	// 	}
	// 	$this->data['complexity']=$this->common->getAllRecords('id,title', $this->complexity_table, '', array('order','ASC'), array($this->limit,0));
	// 	$this->data['priority']=$this->common->getAllRecords('id,title', $this->priority_table, '', array('order','ASC'), array($this->limit,0));
	// 	if($this->data['ADMIN_ROLE_ID']==4){
	// 		$ADMIN_ROLE_ID=2;
	// 	}else{
	// 		$ADMIN_ROLE_ID=$this->data['ADMIN_ROLE_ID'];
	// 	}
	// 	$this->data['assigned_users']=$this->task->allAssignedUsers($ADMIN_ROLE_ID,$this->data['ADMIN_ID']);
	// 	$this->load->view($this->pagename.'/new',$this->data);
	// }

	// public function edit($ctask_md5_id='',$ctask_attach_md5_id=''){
	// 	if($ctask_attach_md5_id){
	// 		// Delete My Tasks
	// 		$taskdetails=$this->common->getSelectedRecordDetails('file_name', $this->attachments_table, array('md5(id)'=>$ctask_attach_md5_id));
	// 		$unlink_file= $taskdetails->file_name;
	// 		$delete=$this->common->deleteTable($this->attachments_table,array('md5(id)'=>$ctask_attach_md5_id));
	// 		if($delete){
	// 			unlink('./public/attachments/'.$unlink_file);
	// 		}
	// 		$this->session->set_flashdata('message','Assigned Attachment Deleted Successfully.');
	// 		redirect(site_url('assignedtasks/edit/'.$ctask_md5_id));
	// 	}

	// 	$this->data['record_info'] =$this->common->getSelectedRecordDetails('*', $this->table, array('md5(id)'=>$this->uri->segment(3)));
	// 	$record_info_id=$this->data['record_info']->id;

	// 	if($this->input->post()){
	// 		foreach($_POST as $key => $value){
	// 			$$key=$value;
	// 			if($key=='password')
	// 				$record_data[$key]=base64_encode($value);
	// 			else if($key=='assigned_to')
	// 				$record_data[$key]=implode(',',$value);
	// 			else if($key=='update')
	// 				$record_data['flag']=0;
	// 			else if(($key!='save')&&($key!='edit_id')&&($key!='createtask_id'))
	// 				$record_data[$key]=$value;
	// 		}

	// 		// Attachment Upload
	// 		if($_FILES['attachments']['name'][0]) {
	// 	        $path='./public/attachments/';
	// 			$title=date('YmdHis');
	// 			$files = $_FILES['attachments'];
	// 			$file_return=$this->task->upload_files($path, $title, $files);

	// 			// Insert tm_createtasks_attachments
	// 			foreach($file_return as $fileloop){
	// 				if(isset($fileloop['file_name'])){
	// 				$fname=$fileloop['file_name'];
	// 				$record_data1=array('user_id'=>$this->data['ADMIN_ID'],'createtask_id'=>$this->data['record_info']->id,'file_name'=>$fname);
	// 				$this->common->saveTable($this->attachments_table, $record_data1);
	// 				}
	// 			}
	// 		}

	// 		for($i=0;$i<count($assigned_to);$i++){
	// 			$task_count=$this->common->get_table_count($this->tasks_table,array('user_id'=>$this->data['ADMIN_ID'],'md5(createtask_id)'=>$ctask_md5_id));
	// 			if($task_count==0){
	// 			$task_data=array('createtask_id'=>$this->data['record_info']->id,'user_id'=>$assigned_to[$i]);
	// 			$this->common->saveTable($this->tasks_table,$task_data);
	// 			}
	// 		}

	// 		$this->common->updateTable($this->table,array('md5(id)'=>$edit_id),$record_data);
	// 		$this->session->set_flashdata('message',$this->add_title.' Updated <strong>Successfully</strong>.');
	// 		redirect(site_url($this->pagename));
	// 	}

	// 	$this->data['attachments']=$this->common->getAllRecords('id,file_name', $this->attachments_table, array('user_id='.$this->data['ADMIN_ID'].' AND md5(createtask_id)='.$ctask_md5_id), array('id','DESC'), array($this->limit,0));

	// 	$this->data['complexity']=$this->common->getAllRecords('id,title', $this->complexity_table, '', array('order','ASC'), array($this->limit,0));
	// 	$this->data['priority']=$this->common->getAllRecords('id,title', $this->priority_table, '', array('order','ASC'), array($this->limit,0));
	// 	$this->data['assigned_users']=$this->task->allAssignedUsers($this->data['ADMIN_ROLE_ID'],$this->data['ADMIN_ID']);
	// 	$this->load->view($this->pagename.'/edit',$this->data);
	// }

	// function show($ctask_md5_id){
	// 	$this->data['record_info'] =$this->task->getTaskDetails($ctask_md5_id);

	// 	$this->data['attachments']=$this->common->getAllRecords('id,file_name', $this->attachments_table, array('md5(createtask_id)'=>$ctask_md5_id), array('id','DESC'), array($this->limit,0));

	// 	$this->data['status']=$this->common->getAllRecords('id,title', $this->status_table, '', array('order','ASC'), array($this->limit,0));

	// 	$this->data['tasks_info']=$this->task->getAllAssignedTasks($this->data['record_info']->id);
	// 	//print_r($this->data['tasks_info']);
	// 	$this->data['unread_tasks']=$this->task->getUnreadTaskCount($this->data['ADMIN_ID']);
	// 	$this->load->view($this->pagename.'/show',$this->data);
	// }

	// function copy($task_id_md5){
	// 	$taskdetails=(array)$this->common->getSelectedRecordDetails('*', $this->table, array('md5(id)'=>$task_id_md5));
	// 	unset($taskdetails['id']);
	// 	unset($taskdetails['assigned_to']);
	// 	$this->session->set_flashdata('message','Coped Task Created Successfully');
	// 	$this->common->saveTable($this->table, $taskdetails);
	// 	redirect(site_url('assignedtasks'));
	// }

	// function delete(){
	// 	//$this->common->deleteTableRecords($this->table,array('md5(id)',$this->uri->segment(3)));
	// 	$record_data=array('flag'=>1);
	// 	$this->common->updateTable($this->table,array('md5(id)'=>$this->uri->segment(3)),$record_data);
	// 	$this->session->set_flashdata('message',$this->add_title.' Deleted <strong>Successfully</strong>.');
	// 	redirect(site_url($this->pagename));
	// }
}
