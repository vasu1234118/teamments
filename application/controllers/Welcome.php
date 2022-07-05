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
					'TM_PICTURE' => $user_array->picture,
					'verified'=>false
				);
				$this->session->set_userdata('proadmin_data',$atfowa_data);
					$date=date('y-m-d h:i:s');
			$ip=$_SERVER['REMOTE_ADDR'];
				$log=array('user_id'=>$user_array->id, 'name'=>$user_array->display_name, 'logintime'=>date('y-m-d H:i:s'), 'ip'=>$ip, 'session_id'=>$this->session->session_id );
				$this->db->insert('tm_logs', $log);
				if(isset($_GET['Redirect_url'])&&$_GET['Redirect_url']!=''){
					redirect($_GET['Redirect_url']);	
				}
				$otp=rand(100000,999999);
			
				$s=array('otp'=>$otp, 'user_id'=>$user_array->id, 'type'=>'login','crdate'=>$date, 'ip'=>$ip );
				$this->db->insert('tm_otp', $s);
				 $msg = array(
	         'otp'=>$otp,
            'name'  => $user_array->display_name,
            'email'  => $user_array->email


			
		
        );
                           $message = $this->load->view('otpemail',$msg,TRUE);
                                    	
                               
                                $config = array(  'mailtype'  => 'html', 'charset'   => 'iso-8859-1' );
                                $this->load->library('email'); 
                                $this->email->initialize( $config);
                                $this->email->from('info@dqci.in', $admin);
                                $this->email->to($user_array->email);
                                //$this->email->cc($email_cc);
                               //$this->email->cc('vasu.svrao@gmail.com');
                                //$this->email->subject($subject. taskId($Events));
                               $this->email->subject("OTP "); 
                                $this->email->message($message);
                               $this->email->send();
                               redirect(site_url('welcome/otp'));
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
			$error_msg['message']='invalid credentials. Please try again.';
			$this->data['error']=$error_msg;
			$this->data['loginURL'] = $this->google->loginURL();
			$this->load->view('welcome',$this->data);
		}
	}
	
	function logout(){
	    $logs=array('status'=>'1', 'logouttime'=>date('y-m-d H:i:s'));
	    $this->db->update('tm_logs', $logs, array('session_id'=>$this->session->session_id));
		$this->session->unset_userdata('proadmin_data');
		$this->session->sess_destroy();
		redirect(site_url('welcome'));
	}
	function otp(){
	    $sd=$this->session->userdata('proadmin_data');
	    $id=$sd['TM_ID'];
	    if(isset($_POST['submit'])){
	        extract($_POST);
	        $op=$this->db->get_where('tm_otp', array('otp'=>$otp, 'user_id'=>$id,'status'=>'0'))->row();
	        
	        if($op){
	            $this->db->update('tm_otp', array('status'=>'1'), array('id'=>$op->id));
	        $sd['verified']  =true;  
	    $this->session->set_userdata('proadmin_data',$sd);
	    redirect(site_url('dashboard'));
	    
	        }
	        else {
	            
	            	$error_msg['h4']='OTP  Error';
				$error_msg['message']='invalid OTP .';
				$this->data['error']=$error_msg;
					
	        }
	        
	    }
	    
		$this->load->view('otp', $this->data);
	}
		function forgotpassword(){
		    if(isset($_POST['submit'])){
	        extract($_POST);
	        $res=$this->db->get_where('tm_users', array('email' => 
			$_POST['email']))->row();
		if($res){
			$msg = array(
	         'id'=>$res->id,
            'name'  => $res->display_name,
           


			
		
        );
                           $message = $this->load->view('forgotpasswordemail',$msg,TRUE);
                                    	
                               
                                $config = array(  'mailtype'  => 'html', 'charset'   => 'iso-8859-1' );
                                $this->load->library('email'); 
                                $this->email->initialize( $config);
                                $this->email->from('info@dqci.in', $admin);
                                $this->email->to($_POST['email']);
                                //$this->email->cc($email_cc);
                               //$this->email->cc('vasu.svrao@gmail.com');
                                //$this->email->subject($subject. taskId($Events));
                               $this->email->subject("forgot Password "); 
                                $this->email->message($message);
                               $this->email->send();
                               $error_msg['h4']='Forgot Password';
				$error_msg['message']='Password reset link sent to your email .';
				$this->data['error']=$error_msg;
                               
		}
		else {
		    	$error_msg['h4']='No account found';
				$error_msg['message']='There’s no Task Management Account with the info that you provided. .';
				$this->data['error']=$error_msg;
		    
		}
		    }
		$this->load->view('forgotpassword', $this->data);
	}
	public function resetpassword(){
	     if(isset($_POST['submit'])){
	        extract($_POST);
	        $this->db->get_where('tm_users',array('md5(id)'=>$this->uri->segment(3)))->row();
	         echo $this->db->last_query();
	        if($newpassword==$conpassword){
	            $updt=array('password'=>base64_encode($newpassword));
	            $res=$this->db->update('tm_users',$updt,array('md5(id)'=>$this->uri->segment(3)));
	            if($res==true){
	                redirect(site_url('welcome'));
	            echo $this->db->last_query();
	            	$error_msg['h4']='Change Password';
				$error_msg['message']='Successfully changed password.';
			}	$this->data['error']=$error_msg;
	            
	        }
	        else {
	            
	            $error_msg['h4']='Change Password';
				$error_msg['message']='Plese check confirm password.';
				$this->data['error']=$error_msg;
	            
	        }
	     }
	  $this->load->view('resetpassword', $this->data);  
	}
	public function testsession(){
	    $session = $this->db->get( 'tm_ci_sessions' );
    $dataall = $session->result();
//echo $this->db->last_query();

    // Loop through each of our items to parse it out
    foreach( $dataall as $data ) {
        
        
    // Turn our data into an array so we can parse through it
    $data_arr = explode( '|', $data->data );
    echo "<pre>";
  //  echo $data->data;
    $test = unserialize($data_arr[2]);
print_r($test);
//    print_r($data_arr);
    echo "</pre>";
    }
	    
	}
}