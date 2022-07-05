<?php
class Tasks_model extends CI_Model{
	public $createtask_tbl='createtasks';
	public $task_tbl='tasks';
	public $audit_task='audit_tasks';
	public $project_tbl='projects';
	public $milestone_tbl='milestones';
	public $complexity_tbl='complexity';
	public $priority_tbl='priority';
	public $users='tm_users';
	public $status_tbl='status';
	public $roles_tbl='roles';
	public $users_tbl='users';
	public $requirement_tbl='tm_requirements';
	function __construct()
	{
		parent::__construct();
		$this->date=date('Y-m-d H:i:s');
	}

	public function upload_files($path, $fileName, $files)
    {
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => 'doc|pdf|xls|xlsx|jpg|gif|png|jpeg|csv|docx|txt|ppt|pptx|zip',
            'overwrite'     => 1,
            'file_name'		=> $fileName                     
        );

        $this->load->library('upload', $config);

        $uploadData = array();
        foreach ($files['name'] as $key => $image) {
        	$_FILES['images[]']['name']= $files['name'][$key];
            $_FILES['images[]']['type']= $files['type'][$key];
            $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['images[]']['error']= $files['error'][$key];
            $_FILES['images[]']['size']= $files['size'][$key];

            $this->upload->initialize($config);
            if ($this->upload->do_upload('images[]')) {
                $uploadData[]=$this->upload->data();
                /*print_r($uploadData);
                exit();*/
            } else {
                return $this->upload->display_errors();
            }
        }

        return $uploadData;
    }

	function allAssignedTasks($user_id,$req_id=''){
	    $role=1;
	    $se=$this->db->get_where('tm_users', array('id'=>$user_id))->row();
		$this->db->select("ct.*,c.title as complexity_name, p.title as priority_name,u.fname as assigned_to_fname,(SELECT   GROUP_CONCAT(b.display_name ORDER BY b.id) DepartmentName FROM    tm_createtasks a INNER JOIN tm_users b ON FIND_IN_SET(b.id, a.assigned_to) > 0 WHERE a.id=ct.id) as assigned_to1,proj.name as project_name,mile.name as milestone_name,proj.assigned_to as prj, 
		(SELECT GROUP_CONCAT(concat(tm_users.display_name,' (',tm_status.title,')') SEPARATOR ',')   FROM `tm_tasks`  
		JOIN tm_users on tm_users.id=tm_tasks.user_id
		JOIN tm_status on tm_status.id=tm_tasks.status
		WHERE createtask_id= ct.id) as users_status,requ.uniq_id as requ_id");
		$this->db->from($this->createtask_tbl.' ct');
	//$this->db->where(" ct.flag!=2 ");
	if($se->role=='3'){
		//$this->db->where("FIND_IN_SET($user_id, proj.assigned_to)");
	}
	if(!(($se->role=='1')||($se->role=='3'))){

$this->db->where("'$user_id'=ct.created_by AND ct.flag!=2 ");
	}
		if($req_id!='')
			$this->db->where("md5(ct.requirement_id)",$req_id);
			
		$this->db->join($this->complexity_tbl.' c', 'ct.complexity = c.id');
		$this->db->join($this->users.' u', 'ct.assigned_to = u.id','left');
		$this->db->join($this->project_tbl.' proj', 'ct.project_id = proj.id','left');
		$this->db->join($this->milestone_tbl.' mile', 'ct.milestone_id = mile.id','left');
		$this->db->join($this->priority_tbl.' p', 'ct.priority = p.id');
		$this->db->join($this->requirement_tbl.' requ', 'requ.id = ct.requirement_id','left');
		$this->db->group_by("ct.id");
		$this->db->order_by('ct.id','DESC');
		
		$query =$this->db->get();	
		//echo $this->db->last_query();die;
		return $query->result();
	}


function employewise($user_id,$req_id='', $emp_id , $pr_id){
	 
	    $role=1;
	    $se=$this->db->get_where('tm_users', array('id'=>$user_id))->row();
		$this->db->select("ct.*,c.title as complexity_name, p.title as priority_name,u.fname as assigned_to_fname,(SELECT   GROUP_CONCAT(b.display_name ORDER BY b.id) DepartmentName FROM    tm_createtasks a INNER JOIN tm_users b ON FIND_IN_SET(b.id, a.assigned_to) > 0 WHERE a.id=ct.id) as assigned_to1,proj.name as project_name,mile.name as milestone_name,proj.assigned_to as prj, 
		(SELECT GROUP_CONCAT(concat(tm_users.display_name,' (',tm_status.title,')') SEPARATOR ',')   FROM `tm_tasks`  
		JOIN tm_users on tm_users.id=tm_tasks.user_id
		JOIN tm_status on tm_status.id=tm_tasks.status
		WHERE createtask_id= ct.id) as users_status,requ.uniq_id as requ_id");
		$this->db->from($this->createtask_tbl.' ct');
	//$this->db->where(" ct.flag!=2 ");
	
	if($se->role!='1'&& $se->role!='3'){
$this->db->where("'$user_id'=ct.created_by AND ct.flag!=2 ");
	}
	
		$w='';
		foreach($emp_id as $k=>$v){ 
        if($k){
        	$w.=" OR FIND_IN_SET($v, ct.assigned_to)";
		 }else {
		 	$w.=" FIND_IN_SET($v, ct.assigned_to)";
		 }
        }
		$this->db->where($w);
		$this->db->where('ct.project_id', $pr_id);
	
		if($req_id!='')
			$this->db->where("md5(ct.requirement_id)",$req_id);
			
		$this->db->join($this->complexity_tbl.' c', 'ct.complexity = c.id');
		$this->db->join($this->users.' u', 'ct.assigned_to = u.id','left');
		$this->db->join($this->project_tbl.' proj', 'ct.project_id = proj.id','left');
		$this->db->join($this->milestone_tbl.' mile', 'ct.milestone_id = mile.id','left');
		$this->db->join($this->priority_tbl.' p', 'ct.priority = p.id');
		$this->db->join($this->requirement_tbl.' requ', 'requ.id = ct.requirement_id','left');
		$this->db->group_by("ct.id");
		$this->db->order_by('ct.id','DESC');
		
		$query =$this->db->get();	
	
		return $query->result();
	}


	function empproject($user_id,$req_id='', $emp_id, $pr_id){
	echo 
	    $role=1;
	    $se=$this->db->get_where('tm_users', array('id'=>$user_id))->row();
		$this->db->select("ct.*,c.title as complexity_name, p.title as priority_name,u.fname as assigned_to_fname,(SELECT   GROUP_CONCAT(b.display_name ORDER BY b.id) DepartmentName FROM    tm_createtasks a INNER JOIN tm_users b ON FIND_IN_SET(b.id, a.assigned_to) > 0 WHERE a.id=ct.id) as assigned_to1,proj.name as project_name,mile.name as milestone_name,proj.assigned_to as prj, 
		(SELECT GROUP_CONCAT(concat(tm_users.display_name,' (',tm_status.title,')') SEPARATOR ',')   FROM `tm_tasks`  
		JOIN tm_users on tm_users.id=tm_tasks.user_id
		JOIN tm_status on tm_status.id=tm_tasks.status
		WHERE createtask_id= ct.id) as users_status,requ.uniq_id as requ_id");
		$this->db->from($this->createtask_tbl.' ct');
	//$this->db->where(" ct.flag!=2 ");
	
	if($se->role!='1'&& $se->role!='3'){
$this->db->where("'$user_id'=ct.created_by AND ct.flag!=2 ");
	}
	if(($emp_id)&&($pr_id)){		
		$this->db->where("FIND_IN_SET($emp_id, ct.assigned_to)");
		$this->db->where('ct.project_id', $pr_id);
	}
		if($req_id!='')
			$this->db->where("md5(ct.requirement_id)",$req_id);
			
		$this->db->join($this->complexity_tbl.' c', 'ct.complexity = c.id');
		$this->db->join($this->users.' u', 'ct.assigned_to = u.id','left');
		$this->db->join($this->project_tbl.' proj', 'ct.project_id = proj.id','left');
		$this->db->join($this->milestone_tbl.' mile', 'ct.milestone_id = mile.id','left');
		$this->db->join($this->priority_tbl.' p', 'ct.priority = p.id');
		$this->db->join($this->requirement_tbl.' requ', 'requ.id = ct.requirement_id','left');
		$this->db->group_by("ct.id");
		$this->db->order_by('ct.id','DESC');
		
		$query =$this->db->get();	
		echo $this->db->last_query();
		return $query->result();
	}

	function projectwise($user_id,$req_id='', $pr_id){
	echo 
	    $role=1;
	    $se=$this->db->get_where('tm_users', array('id'=>$user_id))->row();
		$this->db->select("ct.*,c.title as complexity_name, p.title as priority_name,u.fname as assigned_to_fname,(SELECT   GROUP_CONCAT(b.display_name ORDER BY b.id) DepartmentName FROM    tm_createtasks a INNER JOIN tm_users b ON FIND_IN_SET(b.id, a.assigned_to) > 0 WHERE a.id=ct.id) as assigned_to1,proj.name as project_name,mile.name as milestone_name,proj.assigned_to as prj, 
		(SELECT GROUP_CONCAT(concat(tm_users.display_name,' (',tm_status.title,')') SEPARATOR ',')   FROM `tm_tasks`  
		JOIN tm_users on tm_users.id=tm_tasks.user_id
		JOIN tm_status on tm_status.id=tm_tasks.status
		WHERE createtask_id= ct.id) as users_status,requ.uniq_id as requ_id");
		$this->db->from($this->createtask_tbl.' ct');
	//$this->db->where(" ct.flag!=2 ");
	
	if(!(($se->role=='1')||($se->role=='3'))){
$this->db->where("'$user_id'=ct.created_by AND ct.flag!=2 ");
	}
	if($pr_id){
		$this->db->where('ct.project_id', $pr_id);
	}
		if($req_id!='')
			$this->db->where("md5(ct.requirement_id)",$req_id);
			
		$this->db->join($this->complexity_tbl.' c', 'ct.complexity = c.id');
		$this->db->join($this->users.' u', 'ct.assigned_to = u.id','left');
		$this->db->join($this->project_tbl.' proj', 'ct.project_id = proj.id','left');
		$this->db->join($this->milestone_tbl.' mile', 'ct.milestone_id = mile.id','left');
		$this->db->join($this->priority_tbl.' p', 'ct.priority = p.id');
		$this->db->join($this->requirement_tbl.' requ', 'requ.id = ct.requirement_id','left');
		$this->db->group_by("ct.id");
		$this->db->order_by('ct.id','DESC');
		
		$query =$this->db->get();	
		//echo $this->db->last_query();
		return $query->result();
	}

function datewise($user_id,$req_id='', $new_date, $last_date,$emp_id , $pr_id){
	echo 
	    $role=1;
	    $se=$this->db->get_where('tm_users', array('id'=>$user_id))->row();
		$this->db->select("ct.*,c.title as complexity_name, p.title as priority_name,u.fname as assigned_to_fname,(SELECT   GROUP_CONCAT(b.display_name ORDER BY b.id) DepartmentName FROM    tm_createtasks a INNER JOIN tm_users b ON FIND_IN_SET(b.id, a.assigned_to) > 0 WHERE a.id=ct.id) as assigned_to1,proj.name as project_name,mile.name as milestone_name,proj.assigned_to as prj, 
		(SELECT GROUP_CONCAT(concat(tm_users.display_name,' (',tm_status.title,')') SEPARATOR ',')   FROM `tm_tasks`  
		JOIN tm_users on tm_users.id=tm_tasks.user_id
		JOIN tm_status on tm_status.id=tm_tasks.status
		WHERE createtask_id= ct.id) as users_status,requ.uniq_id as requ_id");
		$this->db->from($this->createtask_tbl.' ct');
	//$this->db->where(" ct.flag!=2 ");

	if($se->role!='1'&& $se->role!='3'){
		$this->db->where("'$user_id'=ct.created_by AND ct.flag!=2 ");
		}	
		$w='';
		foreach($emp_id as $k=>$v){ 
        if($k){
        	$w.=" OR FIND_IN_SET($v, ct.assigned_to)";
		 }else {
		 	$w.=" FIND_IN_SET($v, ct.assigned_to)";
		 }
        }
		$this->db->where($w);
		$this->db->where('ct.project_id', $pr_id);

$this->db->where('created_on >=', $new_date);
$this->db->where('created_on <=', $last_date);

	
	
		if($req_id!='')
			$this->db->where("md5(ct.requirement_id)",$req_id);
			
		$this->db->join($this->complexity_tbl.' c', 'ct.complexity = c.id');
		$this->db->join($this->users.' u', 'ct.assigned_to = u.id','left');
		$this->db->join($this->project_tbl.' proj', 'ct.project_id = proj.id','left');
		$this->db->join($this->milestone_tbl.' mile', 'ct.milestone_id = mile.id','left');
		$this->db->join($this->priority_tbl.' p', 'ct.priority = p.id');
		$this->db->join($this->requirement_tbl.' requ', 'requ.id = ct.requirement_id','left');
		$this->db->group_by("ct.id");
		$this->db->order_by('ct.id','DESC');
		
		$query =$this->db->get();	
		
		return $query->result();
	}



	function mySaveTasks($user_id,$req_id=''){
	    $se=$this->db->get_where('tm_users', array('id'=>$user_id))->row();
		$this->db->select("ct.*,c.title as complexity_name, p.title as priority_name,u.fname as assigned_to_fname,(SELECT   GROUP_CONCAT(b.display_name ORDER BY b.id) DepartmentName FROM    tm_createtasks a INNER JOIN tm_users b ON FIND_IN_SET(b.id, a.assigned_to) > 0 WHERE a.id=ct.id) as assigned_to,proj.name as project_name,mile.name as milestone_name,proj.assigned_to as prj, 
		(SELECT GROUP_CONCAT(concat(tm_users.display_name,' (',tm_status.title,')') SEPARATOR ',')   FROM `tm_tasks`  
		JOIN tm_users on tm_users.id=tm_tasks.user_id
		JOIN tm_status on tm_status.id=tm_tasks.status
		WHERE createtask_id= ct.id) as users_status,requ.uniq_id as requ_id");
		$this->db->from($this->createtask_tbl.' ct');
		if($se->role!='1'){
		$this->db->where("'$user_id'=ct.created_by AND ct.flag!=1 ");
		}
		if($req_id!='')
			$this->db->where("md5(requ.id)",$req_id);
		$this->db->where("ct.flag",2);
		$this->db->join($this->complexity_tbl.' c', 'ct.complexity = c.id');
		$this->db->join($this->users.' u', 'ct.assigned_to = u.id','left');
		$this->db->join($this->project_tbl.' proj', 'ct.project_id = proj.id','left');
		$this->db->join($this->milestone_tbl.' mile', 'ct.milestone_id = mile.id','left');
		$this->db->join($this->priority_tbl.' p', 'ct.priority = p.id');
		$this->db->join($this->requirement_tbl.' requ', 'requ.id = ct.requirement_id','left');
		$this->db->group_by("ct.id");
		$this->db->order_by('ct.id','DESC');
		
		$query =$this->db->get();		
		return $query->result();
	}


	function allAssignedUsers($level,$uid){
		$this->db->select("u.id,u.display_name,u.etype,r.title as role_name");
		$this->db->from($this->users_tbl.' u');
		if($level>=5)
			$this->db->where('u.id='.$uid);
		else
			$this->db->where('u.role>='.$level);/*.'u.id!='.$uid.' AND  AND u.role!='.$level*/
		$this->db->join($this->roles_tbl.' r', 'u.role = r.id');
		
		/*06-02-20121 rajkumar*/
	//	$this->db->where("u.flag!=1 ");
		$this->db->order_by('u.display_name','DESC');
		$query =$this->db->get();
		//echo $this->db->last_query();die;
		return $query->result();
	}
	
	function getUserEmails(){
		$this->db->select("u.email as tag");
		$this->db->from($this->users_tbl.' u');
		/*.
		if($level>=5)
			$this->db->where('u.id='.$uid);
		else
			$this->db->where('u.role>='.$level);/*.'u.id!='.$uid.' AND  AND u.role!='.$level*/
		$this->db->join($this->roles_tbl.' r', 'u.role = r.id');
		$this->db->order_by('u.display_name','DESC');
		$query =$this->db->get();
		return $query->result();
	}


	/** this is another version of allAssigned User  
	 *  Small Update done to get Project wise assigned users
	 * 	just pass an array of users 
	 */
	
	function allAssignedUsersProjectWise($level,$uid,$project_id){
		
		$this->db->select('*');
		$this->db->from('projects')->where('id',$project_id);
		$query =$this->db->get();		
		
		//echo $this->db->last_query();
		$result = $query->row();

		if($result){

			$this->db->select("u.id,u.display_name,r.title as role_name");		
			$this->db->from($this->users_tbl.' u');
			
			if($level>=5)
				$this->db->where('u.id='.$uid);
			else
				$this->db->where('u.role>='.$level);/*.'u.id!='.$uid.' AND  AND u.role!='.$level*/
			
			$this->db->where_in('u.id',explode(',',$result->assigned_to));
			$this->db->join($this->roles_tbl.' r', 'u.role = r.id');
			$this->db->order_by('u.display_name','DESC');
			
			$query =$this->db->get();
			return $query->result();
		}
	}

	function allTasks($user_id){
	    
	    $se=$this->db->get_where('tm_users', array('id'=>$user_id))->row();
	    if($se->role!='1'){
		$this->db->select('ct.*,t.display,t.status,u.display_name, c.title as complexity_name, p.title as priority_name, s.title as status_title,t.createtask_id');/*,c.title as complexity_name, p.title as priority_name,s.title as status_name*/
		$this->db->from($this->createtask_tbl.' ct');
		$this->db->where("FIND_IN_SET($user_id,ct.assigned_to) AND ct.flag=0");
		$this->db->where('t.status!=1');
		$this->db->where('t.status!=2');
		$this->db->where('t.status!=4');
		$this->db->join($this->complexity_tbl.' c', 'ct.complexity = c.id');
		$this->db->join($this->priority_tbl.' p', 'ct.priority = p.id');
		$this->db->join($this->users_tbl.' u', 'ct.created_by = u.id');
		
		$this->db->join($this->task_tbl.' t', 'ct.id = t.createtask_id AND t.user_id='.$user_id);
	
		   
		    
	
		$this->db->join($this->status_tbl.' s', 't.status = s.id');
		$this->db->order_by('id','DESC');
		
		$query =$this->db->get();
	//echo $this->db->last_query();
		return $query->result();
	    }else {
	        
	       $this->db->select('ct.*,t.display,t.status as status,u.display_name, c.title as complexity_name, p.title as priority_name, s.title as status_title,t.createtask_id');/*,c.title as complexity_name, p.title as priority_name,s.title as status_name*/
		$this->db->from($this->createtask_tbl.' ct');
		$this->db->where('t.status!=1');
		$this->db->where('t.status!=2');
		$this->db->where('t.status!=4');
		//$this->db->where(" ct.flag=0");
		
		$this->db->join($this->complexity_tbl.' c', 'ct.complexity = c.id');
		$this->db->join($this->priority_tbl.' p', 'ct.priority = p.id');
		$this->db->join($this->users_tbl.' u', 'ct.created_by = u.id');
		
		$this->db->join($this->task_tbl.' t', 'ct.id = t.createtask_id');
	
		   
		    
	
		$this->db->join($this->status_tbl.' s', 't.status = s.id');
		$this->db->order_by('id','DESC');
		
		$query =$this->db->get();

		return $query->result(); 
	        
	        
	    }
	}


function completed($user_id){
	    
	    $se=$this->db->get_where('tm_users', array('id'=>$user_id))->row();
	    if($se->role!='1'){
		$this->db->select('ct.*,t.display,t.cdisplay, t.status,u.display_name, c.title as complexity_name, p.title as priority_name, s.title as status_title,t.createtask_id');/*,c.title as complexity_name, p.title as priority_name,s.title as status_name*/
		$this->db->from($this->createtask_tbl.' ct');
		$this->db->where("FIND_IN_SET($user_id,ct.assigned_to) AND ct.flag=0");
		$this->db->where('t.status=1');
		$this->db->join($this->complexity_tbl.' c', 'ct.complexity = c.id');
		$this->db->join($this->priority_tbl.' p', 'ct.priority = p.id');
		$this->db->join($this->users_tbl.' u', 'ct.created_by = u.id');
		
		$this->db->join($this->task_tbl.' t', 'ct.id = t.createtask_id AND t.user_id='.$user_id);
	
		   
		    
	
		$this->db->join($this->status_tbl.' s', 't.status = s.id');
		$this->db->order_by('id','DESC');
		
		$query =$this->db->get();
	//echo $this->db->last_query();
		return $query->result();
	    }else {
	        
	       $this->db->select('ct.*,t.display,t.cdisplay, t.status as status,u.display_name, c.title as complexity_name, p.title as priority_name, s.title as status_title,t.createtask_id');/*,c.title as complexity_name, p.title as priority_name,s.title as status_name*/
		$this->db->from($this->createtask_tbl.' ct');
		$this->db->where('t.status=1');
		//$this->db->where(" ct.flag=0");
		
		$this->db->join($this->complexity_tbl.' c', 'ct.complexity = c.id');
		$this->db->join($this->priority_tbl.' p', 'ct.priority = p.id');
		$this->db->join($this->users_tbl.' u', 'ct.created_by = u.id');
		
		$this->db->join($this->task_tbl.' t', 'ct.id = t.createtask_id');
	
		   
		    
	
		$this->db->join($this->status_tbl.' s', 't.status = s.id');
		$this->db->order_by('id','DESC');
		
		$query =$this->db->get();

		return $query->result(); 
	        
	        
	    }
	}

function newtask($user_id){
	    
	    $se=$this->db->get_where('tm_users', array('id'=>$user_id))->row();
	    if($se->role!='1'){
		$this->db->select('ct.*,t.display,t.cdisplay, t.status,u.display_name, c.title as complexity_name, p.title as priority_name, s.title as status_title,t.createtask_id');/*,c.title as complexity_name, p.title as priority_name,s.title as status_name*/
		$this->db->from($this->createtask_tbl.' ct');
		$this->db->where("FIND_IN_SET($user_id,ct.assigned_to) AND ct.flag=0");
		//$this->db->where('t.status=1');
		$this->db->join($this->complexity_tbl.' c', 'ct.complexity = c.id');
		$this->db->join($this->priority_tbl.' p', 'ct.priority = p.id');
		$this->db->join($this->users_tbl.' u', 'ct.created_by = u.id');
		
		$this->db->join($this->task_tbl.' t', 'ct.id = t.createtask_id AND t.user_id='.$user_id);
	
		   
		    
	
		$this->db->join($this->status_tbl.' s', 't.status = s.id');
		$this->db->order_by('id','DESC');
		
		$query =$this->db->get();
	echo $this->db->last_query();
		return $query->result();
	    }else {
	        
	       $this->db->select('ct.*,t.display,t.cdisplay, t.status as status,u.display_name, c.title as complexity_name, p.title as priority_name, s.title as status_title,t.createtask_id');/*,c.title as complexity_name, p.title as priority_name,s.title as status_name*/
		$this->db->from($this->createtask_tbl.' ct');
		//$this->db->where('t.status=1');
		//$this->db->where(" ct.flag=0");
		
		$this->db->join($this->complexity_tbl.' c', 'ct.complexity = c.id');
		$this->db->join($this->priority_tbl.' p', 'ct.priority = p.id');
		$this->db->join($this->users_tbl.' u', 'ct.created_by = u.id');
		
		$this->db->join($this->task_tbl.' t', 'ct.id = t.createtask_id');
	
		   
		    
	
		$this->db->join($this->status_tbl.' s', 't.status = s.id');
		$this->db->order_by('id','DESC');
		
		$query =$this->db->get();
echo $this->db->last_query();
		return $query->result(); 
	        
	        
	    }
	}

function incomplete($user_id){
	    
	    $se=$this->db->get_where('tm_users', array('id'=>$user_id))->row();
	    if($se->role!='1'){
		$this->db->select('ct.*,t.display,t.indisplay,t.status,u.display_name, c.title as complexity_name, p.title as priority_name, s.title as status_title,t.createtask_id');/*,c.title as complexity_name, p.title as priority_name,s.title as status_name*/
		$this->db->from($this->createtask_tbl.' ct');
		$this->db->where("FIND_IN_SET($user_id,ct.assigned_to) AND ct.flag=0");
		$this->db->where('t.status=2');
		$this->db->join($this->complexity_tbl.' c', 'ct.complexity = c.id');
		$this->db->join($this->priority_tbl.' p', 'ct.priority = p.id');
		$this->db->join($this->users_tbl.' u', 'ct.created_by = u.id');
		
		$this->db->join($this->task_tbl.' t', 'ct.id = t.createtask_id AND t.user_id='.$user_id);
	
		   
		    
	
		$this->db->join($this->status_tbl.' s', 't.status = s.id');
		$this->db->order_by('id','DESC');
		
		$query =$this->db->get();
	//echo $this->db->last_query();
		return $query->result();
	    }else {
	        
	       $this->db->select('ct.*,t.display,t.indisplay,t.status as status,u.display_name, c.title as complexity_name, p.title as priority_name, s.title as status_title,t.createtask_id');/*,c.title as complexity_name, p.title as priority_name,s.title as status_name*/
		$this->db->from($this->createtask_tbl.' ct');
		$this->db->where('t.status=2');
		//$this->db->where(" ct.flag=0");
		
		$this->db->join($this->complexity_tbl.' c', 'ct.complexity = c.id');
		$this->db->join($this->priority_tbl.' p', 'ct.priority = p.id');
		$this->db->join($this->users_tbl.' u', 'ct.created_by = u.id');
		
		$this->db->join($this->task_tbl.' t', 'ct.id = t.createtask_id');
	
		   
		    
	
		$this->db->join($this->status_tbl.' s', 't.status = s.id');
		$this->db->order_by('id','DESC');
		
		$query =$this->db->get();

		return $query->result(); 
	        
	        
	    }
	}

function awaiting($user_id){
	    
	    $se=$this->db->get_where('tm_users', array('id'=>$user_id))->row();
	    if($se->role!='1'){
		$this->db->select('ct.*,t.display,t.status,t.adisplay,u.display_name, c.title as complexity_name, p.title as priority_name, s.title as status_title,t.createtask_id');/*,c.title as complexity_name, p.title as priority_name,s.title as status_name*/
		$this->db->from($this->createtask_tbl.' ct');
		$this->db->where("FIND_IN_SET($user_id,ct.assigned_to) AND ct.flag=0");
		$this->db->where('t.status=4');
		$this->db->join($this->complexity_tbl.' c', 'ct.complexity = c.id');
		$this->db->join($this->priority_tbl.' p', 'ct.priority = p.id');
		$this->db->join($this->users_tbl.' u', 'ct.created_by = u.id');
		
		$this->db->join($this->task_tbl.' t', 'ct.id = t.createtask_id AND t.user_id='.$user_id);
	
		   
		    
	
		$this->db->join($this->status_tbl.' s', 't.status = s.id');
		$this->db->order_by('id','DESC');
		
		$query =$this->db->get();
	//echo $this->db->last_query();
		return $query->result();
	    }else {
	        
	       $this->db->select('ct.*,t.display,t.adisplay,t.status as status,u.display_name, c.title as complexity_name, p.title as priority_name, s.title as status_title,t.createtask_id');/*,c.title as complexity_name, p.title as priority_name,s.title as status_name*/
		$this->db->from($this->createtask_tbl.' ct');
		$this->db->where('t.status=4');
		//$this->db->where(" ct.flag=0");
		
		$this->db->join($this->complexity_tbl.' c', 'ct.complexity = c.id');
		$this->db->join($this->priority_tbl.' p', 'ct.priority = p.id');
		$this->db->join($this->users_tbl.' u', 'ct.created_by = u.id');
		
		$this->db->join($this->task_tbl.' t', 'ct.id = t.createtask_id');
	
		   
		    
	
		$this->db->join($this->status_tbl.' s', 't.status = s.id');
		$this->db->order_by('id','DESC');
		
		$query =$this->db->get();

		return $query->result(); 
	        
	        
	    }
	}
	function totalTasks($user_id,$role,$req_id=''){

		$this->db->select("ct.*,c.title as complexity_name, p.title as priority_name,u.fname as assigned_to_fname,(SELECT   GROUP_CONCAT(b.display_name ORDER BY b.id) DepartmentName FROM    tm_createtasks a INNER JOIN tm_users b ON FIND_IN_SET(b.id, a.assigned_to) > 0 WHERE a.id=ct.id) as assigned_to,proj.name as project_name,mile.name as milestone_name,cu.display_name as created_user,(SELECT GROUP_CONCAT(concat(tm_users.display_name,' (',tm_status.title,')') SEPARATOR ',')   FROM `tm_tasks`  
		JOIN tm_users on tm_users.id=tm_tasks.user_id
		JOIN tm_status on tm_status.id=tm_tasks.status
		WHERE createtask_id= ct.id) as users_status,requ.uniq_id as requ_id");
		$this->db->from($this->createtask_tbl.' ct');
		if($role==1){
			
		}
		else{

			$this->db->where('ct.created_by='.$user_id.' AND ct.flag!=1 AND (ct.assigned_to!='.$user_id." OR ct.flag=2)");

		}
		if($req_id!='')
			$this->db->where("md5(requ.id)",$req_id);
		
		$this->db->join($this->complexity_tbl.' c', 'ct.complexity = c.id');
		$this->db->join($this->users.' u', 'ct.assigned_to = u.id','left');
		$this->db->join($this->project_tbl.' proj', 'ct.project_id = proj.id','left');
		$this->db->join($this->milestone_tbl.' mile', 'ct.milestone_id = mile.id','left');
		$this->db->join($this->priority_tbl.' p', 'ct.priority = p.id');
		$this->db->join($this->users.' cu', 'ct.created_by = cu.id','left');
		$this->db->join($this->requirement_tbl.' requ', 'requ.id = ct.requirement_id','left');
		$this->db->group_by("ct.id");
		$this->db->order_by('id','DESC');
		
		$query =$this->db->get();		
		return $query->result();

	}



	function getUnreadTaskCount($userid){
	     $se=$this->db->get_where('tm_users', array('id'=>$userid))->row();
	    if($se->role!='1'){
		$this->db->select("count(t.id) as tcount");
		$this->db->from($this->task_tbl." t");
		$this->db->join($this->createtask_tbl." ct", "t.createtask_id=ct.id");
		$this->db->where("ct.flag=0 AND t.display='N' AND t.user_id=".$userid);
		$query =$this->db->get();
		$result= $query->row();
		return $result->tcount;
	    }else {
	       $this->db->select("count(t.id) as tcount");
		$this->db->from($this->task_tbl." t");
		$this->db->join($this->createtask_tbl." ct", "t.createtask_id=ct.id");
		$this->db->where("ct.flag=0 AND t.display='N'");
		$query =$this->db->get();
		$result= $query->row();
		return $result->tcount; 
	        
	    }
	}

	function getAllAssignedTasks($task_id){
		$this->db->select("t.*,s.title as status,u.display_name,(SELECT GROUP_CONCAT(tm_task_attachments.file_name  SEPARATOR ',')   FROM `tm_task_attachments`
		WHERE createtask_id= '$task_id') as user_attachments");
		$this->db->from($this->task_tbl.' t');
		$this->db->where("createtask_id IN ($task_id)");
		$this->db->join($this->users_tbl.' u', 't.user_id = u.id');
		$this->db->join($this->status_tbl.' s', 't.status = s.id');
		$this->db->order_by('t.id','DESC');

		$query =$this->db->get();
		
		return $query->result();
	}

	function getAllUserTasks($assigned_to){
		$this->db->select('t.*,s.title as status,u.display_name');
		$this->db->from($this->task_tbl.' t');
		$this->db->where("createtask_id IN ($assigned_to)");
		$this->db->join($this->users_tbl.' u', 't.user_id = u.id');
		$this->db->join($this->status_tbl.' s', 't.status = s.id');
		$this->db->order_by('t.id','DESC');

		$query =$this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	function closedTasksCount($user_id){
		$this->db->select('id,assigned_to');
		$this->db->from($this->createtask_tbl.' ct');
		$this->db->where("ct.created_by=".$user_id);
		$query =$this->db->get();
		$result=$query->result();
		$closed_count=0;
		foreach($result as $row){
			$user_ids=$row->assigned_to;
			if($user_ids){
			$createtask_id=$row->id;
			$this->db->select('count(id) as ctc');
			$this->db->from($this->task_tbl.' t');
			$this->db->where("createtask_id=$createtask_id and user_id IN ($user_ids) and status=1");
			$query1 =$this->db->get();
			//echo $this->db->last_query();
			$result1=$query1->row();
			$closed_count+=$result1->ctc;
			}
		}
	return $closed_count;	
	}

	function get_assigned_tasks_count($user_id){
		$this->db->select('assigned_to');
		$this->db->from($this->createtask_tbl.' ct');
		$this->db->where("ct.created_by=".$user_id);
		$query =$this->db->get();
		$result=$query->result();
		$tak_count=0;
		foreach($result as $row){
			$user_ids=explode(',',$row->assigned_to);
			$tak_count+=count($user_ids);
		}
		return $tak_count;
	}

	function getTaskDetails($task_id_md5){
		

		$this->db->select('ct.*, c.title as complexity_title, p.title as priority_title,requ.uniq_id as requ_id');
		$this->db->from($this->createtask_tbl.' ct');
		$this->db->where("md5(ct.id)='".$task_id_md5."'");
		$this->db->join($this->complexity_tbl.' c', 'ct.complexity=c.id');
		$this->db->join($this->priority_tbl.' p', 'ct.priority=p.id');
		$this->db->join($this->requirement_tbl.' requ', 'requ.id = ct.requirement_id','left');
		$query =$this->db->get();
		return $query->row();
	}


	/** this method is called in NotificationMail.php file in Library for mail notification */
	function getTaskDetailsForMail($task_id){

		$this->db->select('ct.*,u.display_name, c.title as complexity_name,s.title as status_name, p.title as priority_name, u.id as uid');/*,c.title as complexity_name, p.title as priority_name,s.title as status_name*/
		$this->db->from($this->createtask_tbl.' ct');
		$this->db->join($this->complexity_tbl.' c', 'ct.complexity = c.id');
		$this->db->join($this->priority_tbl.' p', 'ct.priority = p.id');
		$this->db->join($this->users_tbl.' u', 'ct.created_by = u.id');
		$this->db->join($this->task_tbl.' task', 'task.createtask_id = ct.id','left');
		$this->db->join($this->status_tbl.' s', 'task.status = s.id','left');
		$this->db->where("ct.id",$task_id);

		$query =$this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}

	function getAllAuditedTasks($task_id){
		$this->db->select('t.*,s.title as status,u.display_name');
		$this->db->from($this->audit_task.' t');
		$this->db->where("t.createtask_id IN ($task_id)");
		$this->db->join($this->status_tbl.' s', 't.status = s.id','left');
		$this->db->join($this->users_tbl.' u', 't.action_performed_by = u.id','left');
		$this->db->join($this->task_tbl.' tk', 't.action_performed_on = tk.id','left');
		$this->db->order_by('t.id','DESC');

		$query =$this->db->get();
		
		return $query->result();
	}


	function getTaskDetailsForTaskInbox($task_id){

		$this->db->select('ct.*,u.display_name, c.title as complexity_title, p.title as priority_title, u.id as uid,requ.uniq_id as requ_id');/*,c.title as complexity_name, p.title as priority_name,s.title as status_name*/
		$this->db->from($this->createtask_tbl.' ct');
		$this->db->join($this->complexity_tbl.' c', 'ct.complexity = c.id','left');
		$this->db->join($this->priority_tbl.' p', 'ct.priority = p.id','left');
		$this->db->join($this->users_tbl.' u', 'ct.created_by = u.id');
		$this->db->join($this->project_tbl.' proj', 'ct.project_id = proj.id','left');
		$this->db->join($this->requirement_tbl.' requ', 'requ.id = ct.requirement_id','left');
		$this->db->where("md5(ct.id)",$task_id);
		
		
		$query =$this->db->get();
		//echo $this->db->last_query();
		return $query->row();
	}
	
} ?>
