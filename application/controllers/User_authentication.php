<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_authentication extends CI_Controller {
	
    function __construct(){
		parent::__construct();
        $this->user_table='users';
        $this->role_table='roles';
		// Load google oauth library
        $this->load->library('google');
		
		// Load user model
		$this->load->model('user');
    }
    
    public function index(){
		// Redirect to profile page if the user already logged in
		if($this->session->userdata('loggedIn') == true){
			redirect('user_authentication/profile/');
		}
		if(isset($_GET['code'])){
			
			// Authenticate user with google
			if($this->google->getAuthenticate()){
			
				// Get user info from google
                $gpInfo = $this->google->getUserInfo();
                
                
				// Preparing data for database insertion
				$userData['oauth_provider'] = 'google';
				$userData['oauth_uid'] 	= $gpInfo['id'];
				$userData['fname'] 	    = $gpInfo['given_name'];
				$userData['display_name'] 	  = $gpInfo['given_name'];
				$userData['lname'] 		= $gpInfo['family_name'];
				$userData['email'] 		= $gpInfo['email'];
                $userData['username'] 	= $gpInfo['email'];
           
				$userData['gender'] 	= !empty($gpInfo['gender'])?$gpInfo['gender']:'';
				$userData['locale'] 	= !empty($gpInfo['locale'])?$gpInfo['locale']:'';
				$userData['link'] 		= !empty($gpInfo['link'])?$gpInfo['link']:'';
				$userData['picture'] 	= !empty($gpInfo['picture'])?$gpInfo['picture']:'';
				
				// Insert or update user data to the database
                $userID = $this->user->checkUser($userData);
                
                
                $user_array =$this->common->getSelectedRecordDetails('*', $this->user_table, array('id'=> $userID));

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
					if(isset($_GET['state'])){
						redirect($_GET['state']);	
					}
				redirect(site_url('dashboard'));
				
			}
		} 
		
		// Google authentication url
		$data['loginURL'] = $this->google->loginURL();
		
		// Load google login view
		$this->load->view('user_authentication/index',$data);
    }
	
	public function profile(){
		// Redirect to login page if the user not logged in
		if(!$this->session->userdata('loggedIn')){
			redirect('/user_authentication/');
		}
		
		// Get user info from session
		$data['userData'] = $this->session->userdata('userData');
		
		// Load user profile view
		$this->load->view('user_authentication/profile',$data);
	}
	
	public function logout(){
		// Reset OAuth access token
		$this->google->revokeToken();
		
		// Remove token and user data from the session
		$this->session->unset_userdata('loggedIn');
		$this->session->unset_userdata('userData');
		
		// Destroy entire session data
        $this->session->sess_destroy();
		
		// Redirect to login page
		redirect('/user_authentication/');
    }
	
}