<?php
class Timesheet_model extends CI_Model{
	public $learning_tbl='learnings';
	public $task_tbl='tasks';
	public $complexity_tbl='complexity';
	public $priority_tbl='priority';
	public $projects_tbl='projects';
	public $users='tm_users';
	public $status_tbl='status';
	public $roles_tbl='roles';
    public $users_tbl='users';
    public $leaves_tbl='leaves';
    public $timesheet_tbl='timesheet';
	function __construct()
	{
		parent::__construct();
		$this->date=date('Y-m-d H:i:s');
	}

	public function upload_files($path, $fileName, $files)
    {
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => 'doc|pdf|xls|xlsx|jpg|gif|png|jpeg',
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
            } else {
                return false;
            }
        }

        return $uploadData;
    }

	function alltimesheet($user_id){
	    
	     $se=$this->db->get_where('tm_users', array('id'=>$user_id))->row();
		$this->db->select('lt.*,u.display_name as display_name,proj.name as project_name');
		$this->db->from($this->timesheet_tbl.' lt');
		$this->db->join($this->projects_tbl.' proj', 'lt.project_id = proj.id','left');
		$this->db->join($this->users.' u', 'lt.user_id = u.id','left');
      
        if(!(($se->role=='1')||($se->role=='3'))){
            $this->db->where('user_id', $user_id);
        }
         if(($se->role=='1')||($se->role=='3')){
        	$this->db->where("lt.status!= ",'0');
        }
		$this->db->order_by('lt.id','Desc');
	
		$query =$this->db->get();		
		return $query->result();
	}

	function allAssignedUsers($level,$uid){
		$this->db->select("u.id,u.display_name,r.title as role_name");
		$this->db->from($this->users_tbl.' u');
		if($level>=5)
			$this->db->where('u.id='.$uid);
		else
			$this->db->where('u.role>='.$level);/*.'u.id!='.$uid.' AND  AND u.role!='.$level*/
		$this->db->join($this->roles_tbl.' r', 'u.role = r.id');
		$this->db->order_by('u.display_name','DESC');
		$query =$this->db->get();
		return $query->result();
	}

	function allTasks($user_id){
		$this->db->select('ct.*,t.display,u.display_name, c.title as complexity_name, p.title as priority_name, s.title as status_title');/*,c.title as complexity_name, p.title as priority_name,s.title as status_name*/
		$this->db->from($this->learning_tbl.' ct');
		$this->db->where("FIND_IN_SET($user_id,ct.assigned_to) AND ct.flag=0");
		$this->db->join($this->complexity_tbl.' c', 'ct.complexity = c.id');
		$this->db->join($this->priority_tbl.' p', 'ct.priority = p.id');
		$this->db->join($this->users_tbl.' u', 'ct.created_by = u.id');
		$this->db->join($this->task_tbl.' t', 'ct.id = t.createtask_id AND t.user_id='.$user_id);
		$this->db->join($this->status_tbl.' s', 't.status = s.id');
		$this->db->order_by('id','DESC');
		
		$query =$this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	function getUnreadTaskCount($userid){
		$this->db->select("count(t.id) as tcount");
		$this->db->from($this->task_tbl." t");
		$this->db->join($this->learning_tbl." ct", "t.createtask_id=ct.id");
		$this->db->where("ct.flag=0 AND t.display='N' AND t.user_id=".$userid);
		$query =$this->db->get();
		$result= $query->row();
		return $result->tcount;
	}

	function getAllAssignedTasks($task_id){
		$this->db->select('t.*,s.title as status,u.display_name');
		$this->db->from($this->task_tbl.' t');
		$this->db->where("createtask_id IN ($task_id)");
		$this->db->join($this->users_tbl.' u', 't.user_id = u.id');
		$this->db->join($this->status_tbl.' s', 't.status = s.id');
		$this->db->order_by('t.id','DESC');

		$query =$this->db->get();
		//echo $this->db->last_query();
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
		$this->db->from($this->learning_tbl.' ct');
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
		$this->db->from($this->learning_tbl.' ct');
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

	public function avaliableleaves($empid){
	$today=date('y-m-d');
 $jo=$this->db->get_where('tm_users', array('id'=>$empid))->row()->doj;

return (int)abs((strtotime($today) - strtotime($jo))/(60*60*24*30))*1.5;



}

public function leavemange($empid){
	$data=[];
$u=$this->db->get_where('tm_users', array('id'=>$empid))->row();
$jd=date('Y-m-d', strtotime($u->doj));

$cd=date('Y-m-d');

$jy= date('Y', strtotime($jd));
$cy=date('Y', strtotime($cd));

for($i=$jy; $i<=$cy; $i++){
if($i==$jy){
$fd=$jd;
}else{
$fd=date("$i-04-01");	
}

$td=date("$i-03-31");	
	if(strtotime($fd)>strtotime($td)){
$td=date(($i+1)."-03-31");	

}

if($i==$cy){
	$td=$cd;
}	
$al=(int)abs((strtotime($td) - strtotime($fd))/(60*60*24*30))*1.5;
$this->db->select("sum(ldays) as count");
$ul= $this->db->get_where('leaves',array('status'=>'1','created_by'=>$empid,"from_date>='$fd' "=>'',"from_date<='$td' "=>'' ))->row()->count;
$data[]=['year'=>$i,'avaliableleaves'=>$al,'used'=>$ul,'period'=>$fd."--".$td];
}
return $data;

}

	function getTaskDetails($task_id_md5){
		$this->db->select('ct.*, c.title as complexity_title, p.title as priority_title');
		$this->db->from($this->learning_tbl.' ct');
		$this->db->where("md5(ct.id)='".$task_id_md5."'");
		$this->db->join($this->complexity_tbl.' c', 'ct.complexity=c.id');
		$this->db->join($this->priority_tbl.' p', 'ct.priority=p.id');

		$query =$this->db->get();
		return $query->row();
	}
} ?>