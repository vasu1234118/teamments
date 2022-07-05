<?php
class Users_model extends CI_Model{
	public $users_tbl='users';
	public $primaryKey='id';
	public $roles_tbl='roles';
	function __construct()
	{
		parent::__construct();
		$this->date=date('Y-m-d H:i:s');
	}

	function allUsers(){
		$this->db->select('u.*,r.title as role_name');
		$this->db->from($this->users_tbl.' u');
		$this->db->join($this->roles_tbl.' r', 'u.role = r.id and u.flag!=1');
		$this->db->order_by('id','DESC');
			$this->db->where('status','1');
		$query =$this->db->get();	
	//	echo $this->db->last_Query();die;
		return $query->result();
	}
	
	function allinactive(){
		$this->db->select('u.*,r.title as role_name');
		$this->db->from($this->users_tbl.' u');
		$this->db->join($this->roles_tbl.' r', 'u.role = r.id and u.flag!=1');
		$this->db->order_by('id','DESC');
			$this->db->where('status','0');
		$query =$this->db->get();	
	//	echo $this->db->last_Query();die;
		return $query->result();
	}
	
	
	function getUserData($id){
		$this->db->select('*');
		$this->db->from('tm_users');
		$this->db->where('id',$id);
		
		$query =$this->db->get();		
		return $query->row();
	}

	function getAllRoles($level){
		$this->db->select('r.id,r.title');
		$this->db->from($this->roles_tbl.' r');
		$this->db->where('r.level>'.$level);

		$query =$this->db->get();		
		return $query->result();
	}

	public function checkUser($data = array()){
        $this->db->select($this->primaryKey);
        $this->db->from($this->users_tbl);
        
        $con = array(
            'oauth_provider' => $data['oauth_provider'],
            'oauth_uid' => $data['oauth_uid']
        );
        $this->db->where($con);
        
        $query = $this->db->get();
        
        $check = $query->num_rows();
        
        if($check > 0){
            // Get prev user data
            $result = $query->row_array();
            
            // Update user data
            $data['updated_at'] = date("Y-m-d H:i:s");
            $update = $this->db->update($this->users_tbl, $data, array('id'=>$result['id']));
            
            // user id
            $userID = $result['id'];
        }else{
			// Insert user data

			// **** Employee Role will be by defalut change it respective Role Later!! ***/
			$data['role'] = 4;
            $data['created_at'] = date("Y-m-d H:i:s");
            $data['updated_at'] = date("Y-m-d H:i:s");
            $insert = $this->db->insert($this->users_tbl,$data);
            
            // user id
            $userID = $this->db->insert_id();
        }
        
        // Return user id
        return $userID?$userID:false;
	}
	
} ?>