<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Assignedtasks extends CI_Controller
{

	public $pagename = 'assignedtasks';
	public $table = 'createtasks';
	public $complexity_table = 'complexity';
	public $priority_table = 'priority';
	public $audit_task = 'audit_tasks';
	public $project_table = 'projects';
	public $status_table = 'status';
	public $tasks_table = 'tasks';
	public $attachments_table = 'createtasks_attachments';
	public $limit = 40;
	public $add_title = 'Task';
	public $title = 'Assigned Tasks';

	function __construct()
	{
		parent::__construct();
		$this->common->session_arts_authentication();
		$proadmin_data = $this->session->userdata('proadmin_data');
		$this->data['ADMIN_ID'] = $proadmin_data['TM_ID'];
		$this->data['ADMIN_DISPLAY_NAME'] = $proadmin_data['TM_NAME'];
		$this->data['ADMIN_ROLE'] = $proadmin_data['TM_ROLE'];
		$this->data['ADMIN_ROLE_ID'] = $proadmin_data['TM_ROLE_ID'];
		/*if(($this->data['ADMIN_ROLE_ID']==5)||($this->data['ADMIN_ROLE_ID']==6)){
			redirect(site_url("welcome/logout"));
		}*/
		$this->data['ADMIN_EMAIL'] = $proadmin_data['TM_EMAIL'];
		$this->data['ADMIN_PICTURE'] = $proadmin_data['TM_PICTURE'];

		$this->data['CLASS_NAME'] = $this->router->fetch_class();
		$this->data['METHOD_NAME'] = $this->router->fetch_method();

		$this->data['title'] = $this->title;
		$this->data['add_title'] = $this->add_title;
		$this->data['pagename'] = $this->pagename;

		$this->data['unread_tasks'] = $this->task->getUnreadTaskCount($this->data['ADMIN_ID']);
		$this->load->library('notificationmail');
		error_reporting(E_ALL & ~E_NOTICE);
	}

	public function index()
	{
	    
		if (isset($_GET['req_id']) && $_GET['req_id'] != '')
			$this->data['records'] = $this->task->allAssignedTasks($this->data['ADMIN_ID'], $_GET['req_id']);
		else
			$this->data['records'] = $this->task->allAssignedTasks($this->data['ADMIN_ID']);
	
		$this->load->view($this->pagename . '/view', $this->data);


	}

	public function mySavedTasks()
	{
	
		$this->data['records'] = $this->task->mySaveTasks($this->data['ADMIN_ID']);
		//dd($this->data['records']);
		// echo "<pre>";
		// print_r ($this->data);
		// echo "</pre>";
		// exit;

		$this->load->view($this->pagename . '/view', $this->data);
	}


	public function allTasks()
	{
		// var_dump(Events::trigger('test_string', 'notificationmail', 'string'));
		// exit;
		// print_r($this->notificationmail->sendMailWithOutEvent(20));
		// exit;
	if (isset($_GET['req_id']) && $_GET['req_id'] != '')
			$this->data['records'] = $this->task->allAssignedTasks($this->data['ADMIN_ID'], $_GET['req_id']);
		else
			$this->data['records'] = $this->task->allAssignedTasks($this->data['ADMIN_ID']);
	
		$this->load->view($this->pagename . '/view', $this->data);
	}

	public function add_new($require_id = '')
	{
	   //$task_related_to = $this->input->post('task_related_to');
        //$Events = Trim(stripslashes(implode(",",$this->input->post('task_related_to'))));
        
       $Events =  implode(', ', (array)$this->input->post('task_related_to'));
        
//print_r($Events);d $this->input->post('save');

		if ($this->input->post()) {
			try {
               
				$record_data = array();
				foreach ($_POST as $key => $value) {
					$$key = $value;
					if ($key == 'password')
						$record_data[$key] = base64_encode($value);
					else if ($key == 'assigned_to')
						$record_data[$key] = implode(',', $value);
					else if ($key == 'task_related_to')
						$record_data[$key] = implode(',', $value);
						
					else if ($key == 'attachments') {
						//$record_data[$key]='';
					} else if ($key == 'save') {
						$record_data['flag'] = 2;
					} else if ($key != 'submit')
						$record_data[$key] = $value;
				}
		
			//print_r($_POST);die;

				$record_data['assigned_date'] = date("Y-m-d", strtotime($record_data['assigned_date']));
				$record_data['estimated_ended_on'] = date("Y-m-d", strtotime($record_data['estimated_ended_on']));
				$record_data['started_on'] = date("Y-m-d", strtotime($record_data['started_on']));
				$record_data['created_by'] = $this->data['ADMIN_ID'];

				$task_id = $this->common->saveTable($this->table, $record_data);
		
				
				if ($task_id) {
					// Attachment Upload
					if (isset($_FILES['attachments'])) {
						$path = './public/attachments/';
						$title = '';
						$files = $_FILES['attachments'];
						$file_return = $this->task->upload_files($path, $title, $files);


						//dd($file_return);

						// exit;
						// Insert tm_createtasks_attachments
						if (is_array($file_return)) {
							foreach ($file_return as $fileloop) {
								if (isset($fileloop['file_name'])) {
									$fname = $fileloop['file_name'];
									$record_data = array('user_id' => $this->data['ADMIN_ID'], 'createtask_id' => $task_id, 'file_name' => $fname);
									$this->common->saveTable($this->attachments_table, $record_data);
								}
							}
						}
					}
					for ($i = 0; $i < count($assigned_to); $i++) {
						
						$task_data = array('createtask_id' => $task_id, 'user_id' => $assigned_to[$i]);
					
						$this->common->saveTable($this->tasks_table, $task_data);
 //	print_r($task_data );die;
// 						exit;
					//	$this->notificationmail->sendMailWithOutEvent($assigned_to[$i], $task_id, $record_data['email_cc']);
					}
				}
                // mail 
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
				/*$em2 = implode(', ', $eml);*/
			//	print_r($toemail);die;
				//  print_r($asg);
				//  exit;
				// for($i=1; $i< count($eml); $i++){
				//     echo 1;
				//     exit;
				// }
				
				$asg1 = $this->input->post('email_cc');
				$rz=explode(',', $asg1);
			
				$c_email = [];
			
			$cceml3 = implode(', ', $c_email);
				
                     if($_FILES['attachments']){
                      $filesCount = count($_FILES['attachments']['name']);
                        for($i = 0; $i < $filesCount; $i++){
                            //echo $_FILES['attachments']['name'][$i].'<br>';
                            $_FILES['attachment']['name'] = $_FILES['attachments']['name'][$i];
                            $_FILES['attachment']['type'] = $_FILES['attachments']['type'][$i];
                            $_FILES['attachment']['tmp_name'] = $_FILES['attachments']['tmp_name'][$i];
                            $_FILES['attachment']['error'] = $_FILES['attachments']['error'][$i];
                            $_FILES['attachment']['size'] = $_FILES['attachments']['size'][$i];
                            $uploadPath = './public/attachments/';
                            $config['upload_path'] = $uploadPath;
                            $config['allowed_types'] = 'gif|jpg|png|txt|docs|doc';
                
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
          
                             $fileData = $this->upload->data();
                           $message = "<html>
                                     <head>
                                     <title>Title of email</title>
                                     
                                     </head>
                                        <style type='text/css'>
                                                                table {
                                                      border: 1px solid black;
                                                      table-layout: fixed;
                                                      
                                                    }
                                                    
                                                    th,
                                                    td {
                                                      border: 1px solid black;
                                                     
                                                      overflow: hidden;
                                                    }
                                                    
                                                            </style>
                                     <body>
                                  
                                    <table width='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#CCCCCC' style= ' border: 1px solid black;
                                                      table-layout: fixed;'  >
                                          
                                              
                                              <tr>
                                                <td width='100%' bgcolor='' style= ' border: 1px solid black;
                                                      table-layout: fixed;'><strong>Name:</strong></td>
                                                <td width='100%' bgcolor='' style= ' border: 1px solid black;
                                                      table-layout: fixed;'>".$this->input->post('name')."</td>
                                              </tr>
                                              <tr>
                                                <td width='100%'  bgcolor='#FFFFDD' style= ' border: 1px solid black;
                                                      table-layout: fixed;'><strong>Complexity:</strong></td>
                                                <td width='100%'  bgcolor='#FFFFDD'style= ' border: 1px solid black;
                                                      table-layout: fixed;'>".$this->input->post('complexity')."</td>
                                              </tr>
                                              <tr>
                                                <td width='100%'  bgcolor='#FFFFEC'style= ' border: 1px solid black;
                                                      table-layout: fixed;'><strong>Priority: </strong></td>
                                                <td width='100%'  bgcolor='#FFFFEC'style= ' border: 1px solid black;
                                                      table-layout: fixed;'>".$this->input->post('priority')."</td>
                                              </tr>
                                              <tr>
                                                <td width='100%'  bgcolor='#FFFFDD'style= ' border: 1px solid black;
                                                      table-layout: fixed;'><strong>Description: </strong></td>
                                                <td width='100%'  bgcolor='#FFFFDD'style= ' border: 1px solid black;
                                                      table-layout: fixed;'>".$this->input->post('description')."</td>
                                              </tr>
                                              <tr>
                                                <td width='100%'  bgcolor='#FFFFEC'style= ' border: 1px solid black;
                                                      table-layout: fixed;'><strong>Precautions: </strong></td>
                                                <td width='100%'  bgcolor='#FFFFEC'style= ' border: 1px solid black;
                                                      table-layout: fixed;'>".$this->input->post('precautions')."</td>
                                              </tr>
                                              <tr>
                                                <td width='100%'  bgcolor='#FFFFDD'style= ' border: 1px solid black;
                                                      table-layout: fixed;'><strong>Step Executed: </strong></td>
                                                <td width='100%'  bgcolor='#FFFFDD'style= ' border: 1px solid black;
                                                      table-layout: fixed;'>".$this->input->post('step_executed')."</td>
                                              </tr>
                                              <tr>
                                                <td width='100%'  bgcolor='#FFFFEC'style= ' border: 1px solid black;
                                                      table-layout: fixed;'><strong>Assigned Date: </strong></td>
                                                <td width='100%'  bgcolor='#FFFFEC'style= ' border: 1px solid black;
                                                      table-layout: fixed;'>".$this->input->post('assigned_date')."</td>
                                              </tr>
                                              <tr>
                                                <td width='100%'  bgcolor='#FFFFDD'style= ' border: 1px solid black;
                                                      table-layout: fixed;'><strong>Started On: </strong></td>
                                                <td width='100%'  bgcolor='#FFFFDD'style= ' border: 1px solid black;
                                                      table-layout: fixed;'>".$this->input->post('started_on')."</td>
                                              </tr>
                                              <tr>
                                                <td width='100%'  bgcolor='#FFFFEC'style= ' border: 1px solid black;
                                                      table-layout: fixed;'><strong>Sstimated Ended On </strong></td>
                                                <td width='100%'  bgcolor='#FFFFEC'style= ' border: 1px solid black;
                                                      table-layout: fixed;'>".$this->input->post('estimated_ended_on')."</td>
                                              </tr>
                                              <tr>
                                                <td width='100%'  bgcolor='#FFFFDD'style= ' border: 1px solid black;
                                                      table-layout: fixed;'><strong>Estimated Time Duration: </strong></td>
                                                <td bgcolor='#FFFFDD'style= ' border: 1px solid black;
                                                      table-layout: fixed;'>".$this->input->post('estimated_time_duration')."</td>
                                              </tr>
                                              <tr>
                                                <td width='100%' bgcolor='#FFFFEC'style= ' border: 1px solid black;
                                                      table-layout: fixed;'><strong>Task Related To: </strong></td>
                                                <td width='100%' bgcolor='#FFFFEC'style= ' border: 1px solid black;
                                                      table-layout: fixed;'>".$Events."</td>
                                              </tr>
                                        </table>
                                    </body>
                                    </html>";
                                    	if(isset($_POST['submit'])){
                                $subject.="Task Id";
                                $config = array(  'mailtype'  => 'html', 'charset'   => 'iso-8859-1' );
                                $this->load->library('email'); 
                                $this->email->initialize( $config);
                                $this->email->from('info@dqci.in', 'admin');
                                $this->email->to($em2);
                                	for ($i = 0; $i < count($rz); $i++) {
					 $this->email->cc($rz[$i]);
				
				}
                               
                            $this->email->cc('navaneethas26@gmail.com');
                                //$this->email->subject($subject. taskId($Events));
                               $this->email->subject($subject.":" ."TASK00".$task_id); 
                                $this->email->message($message);



               
                       $this->email->send();
                                    	}
                      /* echo $this->email->print_debugger();
                       exit();*/
                         //	exit;   
                        }
                
                       //exit;
                    }
                
				// mail
				$this->session->set_flashdata('message', 'New ' . $this->add_title . ' Added <strong>Successfully</strong>.');
				redirect(base_url($this->pagename));
			} catch (Exception $e) {
				print_r($e->getMessage());
				// die;
			
			}
		}

		$this->data['complexity'] = $this->common->getAllRecords('id,title', $this->complexity_table, '', array('order', 'ASC'), array($this->limit, 0));
		$this->data['priority'] = $this->common->getAllRecords('id,title', $this->priority_table, '', array('order', 'ASC'), array($this->limit, 0));
		if ($this->data['ADMIN_ROLE_ID'] == 4) {
			$ADMIN_ROLE_ID = 2;
		} else {
			$ADMIN_ROLE_ID = $this->data['ADMIN_ROLE_ID'];
		}


		if ($require_id != '') {
			$this->data['project'] = $this->common->getAllRecords('id,name', $this->project_table, array('md5(id)' => $require_id), array('sort_order', 'DESC'), array($this->limit, 0));
		} else {
			$this->data['project'] = $this->common->getAllRecords('id,name', $this->project_table, '', array('sort_order', 'DESC'), array($this->limit, 0));
		}

		$this->data['assigned_users'] = $this->task->allAssignedUsers($ADMIN_ROLE_ID, $this->data['ADMIN_ID']);
	//	

		$this->data['users_email'] = $this->task->getUserEmails();
	
	$this->data['allTasks'] = $this->task->allAssignedTasks($this->data['ADMIN_ID']);

		$this->load->view($this->pagename . '/new', $this->data);
	}

	public function edit($ctask_md5_id = '', $ctask_attach_md5_id = '')
	{
		if ($ctask_attach_md5_id) {
			// Delete My Tasks
			$taskdetails = $this->common->getSelectedRecordDetails('file_name', $this->attachments_table, array('md5(id)' => $ctask_attach_md5_id));
			$unlink_file = $taskdetails->file_name;
			$delete = $this->common->deleteTable($this->attachments_table, array('md5(id)' => $ctask_attach_md5_id)); 
			if ($delete) {
				unlink('./public/attachments/' . $unlink_file);
			}
			$this->session->set_flashdata('message', 'Assigned Attachment Deleted Successfully.');
			redirect(site_url('assignedtasks/edit/' . $ctask_md5_id));
		}

		$this->data['record_info'] = $this->common->getSelectedRecordDetails('*', $this->table, array('md5(id)' => $this->uri->segment(3)));



		$record_info_id = $this->data['record_info']->id;

		if ($this->input->post()) {
			foreach ($_POST as $key => $value) {
				$$key = $value;
				if ($key == 'password')
					$record_data[$key] = base64_encode($value);
				else if ($key == 'assigned_to')
					$record_data[$key] = implode(',', $value);
				else if ($key == 'task_related_to')
					$record_data[$key] = implode(',', $value);
				else if ($key == 'update')
					$record_data['flag'] = 0;
				else if (($key != 'save') && ($key != 'edit_id') && ($key != 'createtask_id'))
					$record_data[$key] = $value;
			}
			
			$record_data['assigned_date'] = date("Y-m-d", strtotime($record_data['assigned_date']));
			$record_data['estimated_ended_on'] = date("Y-m-d", strtotime($record_data['estimated_ended_on']));
			$record_data['started_on'] = date("Y-m-d", strtotime($record_data['started_on']));
			// Attachment Upload
			if ($_FILES['attachments']['name'][0]) {
				$path = './public/attachments/';
				$title = date('YmdHis');
				$files = $_FILES['attachments'];
				$file_return = $this->task->upload_files($path, $title, $files);

				// Insert tm_createtasks_attachments
				if ($file_return) {
					foreach ($file_return as $fileloop) {
						if (isset($fileloop['file_name'])) {
							/** Below commented code Original one below one is new and Update *not recommended */
							//$fname=$fileloop['file_name'];
							$fname = $fileloop['raw_name'] . $fileloop['client_name'];
							$fname = $fileloop['file_name'];
							$record_data1 = array('user_id' => $this->data['ADMIN_ID'], 'createtask_id' => $this->data['record_info']->id, 'file_name' => $fname);
							$this->common->saveTable($this->attachments_table, $record_data1);
						}
					}
				}
			}

			for ($i = 0; $i < count($assigned_to); $i++) {
				$task_count = $this->common->get_table_count($this->tasks_table, array('user_id' => $assigned_to[$i], 'md5(createtask_id)' => $ctask_md5_id));
				if ($task_count == 0) {
					$task_data = array('createtask_id' => $this->data['record_info']->id, 'user_id' => $assigned_to[$i]);
					$this->common->saveTable($this->tasks_table, $task_data);
					try {
						//code...
						//$this->notificationmail->sendMailWithOutEvent($assigned_to[$i], $this->data['record_info']->id);
					} catch (\Exception $e) {
						//throw $th;
						echo $e->getMessage();
						die;
					}
				}
			}



			$res = $this->common->updateTable($this->table, array('md5(id)' => $edit_id), $record_data);
			if ($res) {
				for ($i = 0; $i < count($assigned_to); $i++) {
				//	$this->notificationmail->sendUpdateMailWithOutEvent($assigned_to[$i], $this->data['record_info']->id);
				}
			}


			$this->session->set_flashdata('message', $this->add_title . ' Updated <strong>Successfully</strong>.');
			redirect(site_url($this->pagename));
		}

		$this->data['attachments'] = $this->common->getAllRecords('id,file_name', $this->attachments_table, array('user_id' => $this->data['ADMIN_ID'], 'md5(createtask_id)' => $ctask_md5_id), array('id', 'DESC'), array($this->limit, 0));



		$this->data['complexity'] = $this->common->getAllRecords('id,title', $this->complexity_table, '', array('order', 'ASC'), array($this->limit, 0));
		$this->data['priority'] = $this->common->getAllRecords('id,title', $this->priority_table, '', array('order', 'ASC'), array($this->limit, 0));
		$this->data['assigned_users'] = $this->task->allAssignedUsers($this->data['ADMIN_ROLE_ID'], $this->data['ADMIN_ID']);
		$this->data['users_email'] = $this->task->getUserEmails();
		$this->data['project'] = $this->common->getAllRecords('id,name', $this->project_table, '', array('sort_order', 'DESC'), array($this->limit, 0));
		$this->data['allTasks'] = $this->task->allAssignedTasks($this->data['ADMIN_ID']);
		$this->load->view($this->pagename . '/edit', $this->data);
	}

	function show($ctask_md5_id)
	{
		$this->data['record_info'] = $this->task->getTaskDetails($ctask_md5_id);

		$this->data['attachments'] = $this->common->getAllRecords('id,file_name', $this->attachments_table, array('md5(createtask_id)' => $ctask_md5_id), array('id', 'DESC'), array($this->limit, 0));

		$this->data['status'] = $this->common->getAllRecords('id,title', $this->status_table, '', array('order', 'ASC'), array($this->limit, 0));

		$this->data['tasks_info'] = $this->task->getAllAssignedTasks($this->data['record_info']->id);
		$this->data['taskstatus'] = $this->task->getAllAuditedTasks($this->data['record_info']->id);
		//dd($this->data['tasks_info']);
		$this->data['unread_tasks'] = $this->task->getUnreadTaskCount($this->data['ADMIN_ID']);
		// dd($this->data);
		$this->load->view($this->pagename . '/show', $this->data);
	}

	function copy($task_id_md5)
	{
		$taskdetails = (array)$this->common->getSelectedRecordDetails('*', $this->table, array('md5(id)' => $task_id_md5));
		unset($taskdetails['id']);
		unset($taskdetails['assigned_to']);
		$this->session->set_flashdata('message', 'Coped Task Created Successfully');
		$this->common->saveTable($this->table, $taskdetails);
		redirect(site_url('assignedtasks'));
	}

	function delete()
	{
		$this->common->deleteTableRecords($this->table,array('md5(id)',$this->uri->segment(3)));
		$record_data = array('flag' => 1);
		$this->common->updateTable($this->table, array('md5(id)' => $this->uri->segment(3)), $record_data);
		$this->session->set_flashdata('message', $this->add_title . ' Deleted <strong>Successfully</strong>.');
		redirect(site_url($this->pagename));
	}
	
	
	public function sentform()
	{
    	 	 $name1 = 1;
    	 	 $phone1 = 2;
    	 	 $email1 = 3;
    	 	 $loan_type = 4;
    	 	 
    	 	 
    	 	 $to = 'ghoshlaltu216@gmail.com';
    		 $server_email = 'ghoshlaltu216@gmail.com';
    	 	 $email = 'ghoshlaltu216@gmail.com';
    		 $name = 'Zyeca';
    		 $subject = 'Zyeca site Loan Enquery Message';
    		 $msg =  "
                 <html>
                   <head>
                     <title>your title</title>
                   </head>
                   <body>
                     <table style='width:100%'>
                          <tr style='background-color: #eee;'>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Age</th>
                          </tr>
                          <tr  style='background-color: #eee;'>
                            <td>Jill</td>
                            <td>Smith</td>
                            <td>50</td>
                          </tr>
                          <tr  style='background-color: #eee;'>
                            <td>Eve</td>
                            <td>Jackson</td>
                            <td>94</td>
                          </tr>
                        </table>
                   </body>
                 </html>";
    		
    		 $this->load->library('phpmailer_lib');
            
             $mail = $this->phpmailer_lib->load();
    		
    		$mail->Debugoutput = 'html';
    		date_default_timezone_set('Etc/UTC');
    
            $mail->addAttachment('assets/images/face.png'); 
            $mail->addAttachment('assets/images/logo.png'); 
            
    		$mail->setFrom($server_email, $name);
    		$mail->addReplyTo($email, $name);
    		
    		$mail->addAddress($to);
    		$mail->isHTML(true);
    
    		$mail->Subject = $subject;
    		$mail->Body = $msg;
    
    		//send the message, check for errors
    		if (!$mail->send()) {
    		    echo "Mailer Error: " . $mail->ErrorInfo;
    		} else {
    		   	echo 1;
    		}
		 
	    
		
    } 
    public function getrequirement(){
		$id=$this->uri->segment(3);
	$res	=$this->db->get_where('requirements',  array('project_id'=>$id) );
	
	$re1=$res->result();
echo "<option value=''> Select Requirement</option>";
     foreach($re1 as $re2){
      echo "<option value='$re2->id'> $re2->name</option>";
	}
	
}

 public function getmilestone(){
		$id=$this->uri->segment(3);
	$res2	=$this->db->get_where('milestones',  array('project_id'=>$id) );
	
	$re2=$res2->result();
	echo "<option value=''> Select Milestones</option>";
     foreach($re2 as $re3){
      echo "<option value='$re3->id'> $re3->name</option>";
	}
	
}
public function getproject(){
		$id=$this->uri->segment(3);
	$res2	=$this->db->get_where('projects',  array('id'=>$id))->row();
	$res=explode (',', $res2->assigned_to);
print_r($res);

	
	
     foreach($res as $re4)  {  $re5=$this->db->get_where('users', array('id'=>$re4))->row();
      echo "<option value='$re5->id'> $re5->fname</option>";
	}
	
}

public function search()
	{
		$this->data['complexity'] = $this->common->getAllRecords('id,title', $this->complexity_table, '', array('order', 'ASC'), array($this->limit, 0));
		$this->data['priority'] = $this->common->getAllRecords('id,title', $this->priority_table, '', array('order', 'ASC'), array($this->limit, 0));
		$this->data['assigned_users'] = $this->task->allAssignedUsers($this->data['ADMIN_ROLE_ID'], $this->data['ADMIN_ID']);
		$this->data['users_email'] = $this->task->getUserEmails();
		$this->data['project'] = $this->common->getAllRecords('id,name', $this->project_table, '', array('sort_order', 'DESC'), array($this->limit, 0));
		if (isset($_GET['req_id']) && $_GET['req_id'] != '')
			$this->data['records'] = $this->task->allAssignedTasks($this->data['ADMIN_ID'], $_GET['req_id']);
		else
			$this->data['records'] = $this->task->allAssignedTasks($this->data['ADMIN_ID']);
	
		$this->load->view($this->pagename . '/search', $this->data);
	}

		public function mergedelete(){
	$this->db->delete('mergetask', array('md5(id)' =>$this->uri->segment(3,0)));
	
	
		redirect('assignedtasks/show/'.@$this->uri->segment(4));
		}
}
