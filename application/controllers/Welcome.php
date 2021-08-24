<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->user_table='users';
		$this->role_table='roles';
		$this->limit=30;
		$this->load->library('google');
	}
	
	public function index()
	{
		$this->session->sess_destroy();
		$data['loginURL'] = $this->google->loginURL();
		$this->load->view('welcome',$data);
	}
	
	function check_signin(){
		foreach($_POST as $key => $value){
			$key=$value;
		}
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		//print_r($_POST);
		$this->user_table = 'tm_users';
		$user_array =$this->common->getSelectedRecordDetails('id,email,display_name,password,role', $this->user_table, array('username'=>$username,'status'=>1));
		//print_r($user_array);
		if($user_array){
			$user_tb_pass =$user_array->password;
			if($password==base64_decode($user_tb_pass)){
				// Set role
				$role =$user_array->role;
				$role_array =$this->common->getSelectedRecordDetails('title', $this->role_table, array('id'=>$role));
				$role_name=$role_array->title;

				// Assign session return to dash board
				$atfowa_data = array(
					'TM_ID'  => $user_array->id,
					'TM_ROLE_ID'  => $user_array->role,
					'TM_ROLE'  => $role_name,
					'TM_NAME'  => $user_array->display_name,
					'TM_EMAIL' => $user_array->email,
					'TM_PICTURE' => $user_array->picture
				);
				$this->session->set_userdata('proadmin_data',$atfowa_data);
				if(isset($_GET['Redirect_url'])&&$_GET['Redirect_url']!=''){
					redirect($_GET['Redirect_url']);	
				}
				redirect(site_url('dashboard'));
			}else{
				//password not matched
				$error_msg['h4']='Sign In Password Error';
				$error_msg['message']='Your password not matched. Please try again.';
				$this->data['error']=$error_msg;
				$this->data['loginURL'] = $this->google->loginURL();
				$this->load->view('welcome',$this->data);
			}
		}else{
			// User Name and password not matched
			$error_msg['h4']='Sign In Error';
			$error_msg['message']='Your User Name and Password not matched. Please try again.';
			$this->data['error']=$error_msg;
			$this->data['loginURL'] = $this->google->loginURL();
			$this->load->view('welcome',$this->data);
		}
	}
	
	function logout(){
		$this->session->unset_userdata('proadmin_data');
		$this->session->sess_destroy();
		redirect(site_url('welcome'));
	}
}