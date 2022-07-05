<!DOCTYPE html>
<html>
<head>
	<title>Email</title>
	<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}
</style>
</head>
<body>

<link href='https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap' rel='stylesheet'>
	<div style='width: 500px; margin:0 auto; border:1px solid #002752; border-radius: 5px;'>
		
		<div style='height: 70px; text-align: center; border-bottom:1px solid #002752;'>
			<img src='<?php echo site_url('public/img/logo.png'); ?>' height='70px' />
		</div>

		<div style='padding: 50px 30px; text-align: center; font-family:Poppins; font-size: 14px;'>
			<h1 style='color:#002752; font-size: 25px; '>Task Management <?php echo $task_name; ?> (<?php  echo "TASK0".$task_id ?>)</h1> 
		<!--	<p>Task  <?php echo task_id ?> status has been changed <?php echo $status ?> by the user <?php echo name ?> on date and time..</p>-->
		<!--	<p>Task ID <?php echo "TASK0".$task_id ?> status has been changed from <b>Closed Completed to</b> <?php echo $name ?> by the user  on date and time.
</p>-->
<p>Task ID: <?php  echo "TASK0".$task_id ?> status has been changed to <?php if($status=='1'){ ?><b>Closed Complete</b><?php } else  if($status=='2'){ ?><b>Closed Incomplete</b><?php } else  if($status=='3'){ ?><b>Work In Progress</b><?php } else if($status=='4'){ ?><b>Awaiting Response</b><?php } else if($status=='5'){ ?><b>Not Yet Started</b><?php } ?>  by the user <?php echo $name ?>  on <?php echo $date ?>.</p>
<!--<table id="customers">
    <tr>
        <td>Task ID</td>
          <td>:</td>
        <td>TASK0<?php echo $task_id ?></td>
    </tr>
    <?php $to=$this->db->get_where('tm_createtasks', array('id'=>$task_id))->row();  ?>
    <tr>
        <td>Task Name</td>
          <td>:</td>
        <td><?php echo $task_name ?></td>
    </tr>
     <tr>
        <td>Complexity</td>
         <td>:</td>
        <td><?php $re=$this->db->get_where('tm_complexity', array('id'=>$complexity))->row(); echo $re->title ?></td>
    </tr>
    <tr>
        <td>Priority</td>
        <td>:</td>
        <td><b><?php $pr=$this->db->get_where('tm_priority', array('id'=>$priority))->row(); echo $pr->title ?><b></td>
    </tr>
     <tr>
        <td>Task Goal</td>
        <td>:</td>
        <td><b><?php echo $precautions ?><b></td>
    </tr>
      <tr>
        <td>Task Description</td>
        <td>:</td>
        <td><b><?php echo $description ?><b></td>
    </tr>
   
    
    
    <tr>
        <td>Task Step To be Executed</td>
        <td>:</td>
        <td><b><?php echo $step_executed ?><b></td>
    </tr>
    <tr>
        <td>Assigned Date</td>
        <td>:</td>
        <td><b><?php echo $assigned_date ?><b></td>
    </tr>
    <tr>
        <td>Start Date</td>
        <td>:</td>
        <td><b><?php echo $started_on ?><b></td>
    </tr>
    
     <tr>
        <td>Planned End Date</td>
        <td>:</td>
        <td><b><?php echo $estimated_ended_on ?><b></td>
    </tr>
     <tr>
        <td>Estimated Time Duration</td>
        <td>:</td>
        <td><b><?php echo $estimated_time_duration ?><b></td>
    </tr>
    <tr>
        <td>Task Related To</td>
        <td>:</td>
        <?php  if($events){ ?>
        <td><b><?php  $p = explode(" ", $events); foreach($p as $ev){ $sk.= 'Task0'.$ev.'' ;  } echo trim($sk,',');  ?><b></td>
        <?php } else { ?>
        <td><b>No Task<b></td>
        <?php } ?>
    </tr>
    
    <tr>
        <td>Assigned By</td>
        <td>:</td>
        <td><b><?php $z=$this->db->get_where('tm_users', array('id'=>$to->created_by))->row(); echo @$z->fname.$z->lname; ?><b></td>
    </tr>
    <tr>
        
        <td>Assigned To</td>
        <td>:</td>
        <td><b> <?php foreach($asgto as $sg) {$g=$this->db->get_where('tm_users', array('id'=>$sg))->row(); $kf.=$g->fname.$g->lname.',';}  echo trim($kf,',') ?><b></td>
    </tr>
    
    
  
   
</table>
          <p><a style='padding: 6px 15px; background: #002752; border-radius: 2px; color: #fff; text-decoration: none;' href='<?php echo base_url() ?>assignedtasks/show/<?php echo md5($task_id) ?>'>Click Here For Task Details</a></p>

			<p><a style='padding: 6px 15px; background: #002752; border-radius: 2px; color: #fff; text-decoration: none;' href='<?php echo base_url() ?>'>Home</a></p>-->
		</div>

		<div style='padding: 8px 15px; background: #002752; text-align: center;'>
			<p style='font-family:Poppins; font-size: 13px; color: #fff;'>Copyright &copy; 2020 Digitowork. All Rights Reserved</p>
		</div>



	</div>
</body>
</html>