<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <?php $proadmin_data =$this->session->userdata('proadmin_data');  $user_id= $proadmin_data['TM_ID']; ?>
    <?php echo $METHOD_NAME; 
    $r=$this->db->get_where('users', array('id'=>$user_id))->row();  echo $etype= $r->etype; ?>
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <ul class="sidebar-menu" data-widget="tree">

    <li class="header">Menu</li>
  <li <?php if(($CLASS_NAME=='dashboard')&&($METHOD_NAME=='index')){ echo 'class="active"'; } ?>>
      <a href="<?php echo site_url('dashboard'); ?>">
        <i class="fa fa-tachometer"></i> <span>Dashboard</span>
      </a>
    </li>
    <?php if($etype!='2') { ?>
    <!-- <li <?php if(($CLASS_NAME=='dashboard')&&($METHOD_NAME=='index')){ echo 'class="active"'; } ?>>
      <a href="<?php echo site_url('dashboard'); ?>">
        <i class="fa fa-tachometer"></i> <span>Dashboard</span>
      </a>
    </li> -->
    
    <li <?php if(($CLASS_NAME=='learnings')){ echo 'class="active"'; } ?>>
      <a href="<?php echo site_url('learnings'); ?>">
        <i class="fa fa-code"></i> <span>Learnings</span>
      </a>
    </li>
   
    <li <?php if(($CLASS_NAME=='ideas')){ echo 'class="active"'; } ?>>
      <a href="<?php echo site_url('ideas'); ?>">
        <i class="fa fa-lightbulb-o"></i> <span>Ideas</span>
      </a>
    </li>
    
    
    <li <?php if(($CLASS_NAME=='leaves')){ echo 'class="active"'; } ?>>
      <a href="<?php echo site_url('leaves'); ?>">
        <i class="fa fa-newspaper-o"></i> <span>My-Leaves</span>
      </a>
    </li>
  
    <!-- <li <?php if(($CLASS_NAME=='calendar')){ echo 'class="active"'; } ?>>
      <a href="<?php echo site_url('calendar'); ?>">
        <i class="fa fa-calendar"></i> <span>Calendar Plan</span>
      </a>
    </li> -->

    <li <?php if(($CLASS_NAME=='holidays')){ echo 'class="active"'; } ?>>
      <a href="<?php echo site_url('holidays'); ?>">
        <i class="fa fa-gift"></i> <span>Holidays</span>
        <span class="pull-right-container">
            <?php $se=$this->db->get_where('tm_holidays')->result(); ?>
          <small class="label pull-right bg-green"><?php if($ADMIN_ROLE_ID==1){ echo count($se);} else { echo count($se); }?></small>
        </span>
      </a>
    </li>
    <?php } ?>
    <li <?php if(($CLASS_NAME=='assignedtasks' && $METHOD_NAME=='mysavedtasks' )){ echo 'class="active"'; } ?>>
      <a href="<?php echo site_url('assignedtasks/mysavedtasks'); ?>">
        <i class="fa fa-save"></i> <span>My Saved Tasks</span>
      </a>
    </li>
  
    <li <?php if(($CLASS_NAME=='taskinbox')&&($METHOD_NAME=='index')){ echo 'class="active"'; } ?>>
      <a href="<?php echo site_url('taskinbox'); ?>">
        <i class="fa fa-envelope-o"></i> <span>My To-Do List</span>
<span class="pull-right-container">
          <?php
          $this->db->where("(status=3 or status=5) and user_id=$user_id and display='N' "); $co=$this->db->get('tm_tasks')->result(); $coall=$this->db->get_where('tm_tasks', array('status'=>'1'))->result(); ?>
          <?php if($ADMIN_ROLE_ID==1){ ?>
          <?php if(count($coall)=='0'){ ?>
          <?php }else { ?>
                    <small class="label pull-right bg-green"><?php echo count($coall) ?></small>
                    <?php } ?>
          <?php } else { ?> 
          <?php if(count($co)=='0'){ ?>
          <?php } else  { ?>
          <small class="label pull-right bg-green"><?php echo count($co) ?> </small>
          <?php } ?>
        </span>
        <?php } ?>
        </a>
    </li>
    
    <li <?php if(($CLASS_NAME=='taskinbox')&&($METHOD_NAME=='completed')){ echo 'class="active"'; } ?>>
      <a href="<?php echo site_url('taskinbox/completed'); ?>">
        <i class="fa fa-pie-chart"></i> <span>Completed</span>
        <span class="pull-right-container">
            <?php $com=$this->db->get_where('tm_tasks', array('user_id'=> $user_id, 'status'=>"1",'display'=>'N' ))->result(); $coallm=$this->db->get_where('tm_tasks', array('status'=>'1'))->result(); ?>
          <?php if($ADMIN_ROLE_ID==1){ ?>
          <?php if(count($coallm)=='0'){ ?>

          <?php }else { ?>
                    <small class="label pull-right bg-green"><?php echo count($coallm) ?></small>
                    <?php } ?>
          <?php } else { ?> 
          <?php if(count($com)=='0'){ ?>
          <?php } else  { ?>
          <small class="label pull-right bg-green"><?php echo count($com) ?> </small>
          <?php } ?>
          <?php } ?>
        </span>
      </a>
    
    
    </li>
    <!--<li <?php if(($CLASS_NAME=='taskinbox')&&($METHOD_NAME=='completed')){ echo 'class="active"'; } ?>>
      <a href="<?php echo site_url('taskinbox/completed'); ?>">
        <i class="fa fa-plus-circle"></i> <span>Add New Taskiii</span>
      </a>
    </li>-->
    
     <li <?php if(($CLASS_NAME=='taskinbox')&&($METHOD_NAME=='incomplete')){ echo 'class="active"'; } ?>>
      <a href="<?php echo site_url('taskinbox/incomplete'); ?>">
        <i class="fa fa-pie-chart"></i> <span>Closed Incompleted</span>
        <span class="pull-right-container">
            <?php $in=$this->db->get_where('tm_tasks', array('user_id'=> $user_id, 'status'=>"2",'display'=>'N' ))->result(); $inall=$this->db->get_where('tm_tasks', array('status'=>'2'))->result(); ?>
           <?php if($ADMIN_ROLE_ID==1){ ?>
          <?php if(count($inall)=='0'){ ?>

          <?php }else { ?>
                    <small class="label pull-right bg-green"><?php echo count($inall) ?></small>
                    <?php } ?>
          <?php } else { ?> 
          <?php if(count($in)=='0'){ ?>
          <?php } else  { ?>
          <small class="label pull-right bg-green"><?php echo count($in) ?></small>
          <?php } ?>
          <?php } ?>
        </span>
      </a>
    </li>
    
    <li <?php if(($CLASS_NAME=='taskinbox')&&($METHOD_NAME=='awaiting')){ echo 'class="active"'; } ?>>
      <a href="<?php echo site_url('taskinbox/awaiting'); ?>">
        <i class="fa fa-pie-chart"></i> <span>Awaiting Response</span>
        <span class="pull-right-container">
            <?php $ao=$this->db->get_where('tm_tasks', array('user_id'=> $user_id, 'status'=>"4",'display'=>'N' ))->result(); $aoall=$this->db->get_where('tm_tasks', array('status'=>'4'))->result(); ?>
           <?php if($ADMIN_ROLE_ID==1){ ?>
          <?php if(count($aoall)=='0'){ ?>

          <?php }else { ?>
                    <small class="label pull-right bg-green"><?php echo count($aoall) ?></small>
                    <?php } ?>
          <?php } else { ?> 
          <?php if(count($ao)=='0'){ ?>
          <?php } else  { ?>
          <small class="label pull-right bg-green"><?php echo count($ao) ?> </small>
          <?php } ?>
          <?php } ?>
        </span>
      </a>
    </li>

    <li <?php if( ($CLASS_NAME=='assignedtasks')&&($METHOD_NAME=='index')){ echo 'class="active"'; } ?>>
      <a href="<?php echo site_url('assignedtasks'); ?>">
        <i class="fa fa-pie-chart"></i> <span>Assigned To Others</span>
        <span class="pull-right-container">
            <?php $as=$this->db->get_where('tm_createtasks', array('created_by'=> $user_id, 'flag!='=>"2 " ))->result(); $asall=$this->db->get_where('tm_createtasks')->result(); ?>
          <small class="label pull-right bg-green"><?php if($ADMIN_ROLE_ID==1){ echo count($asall);} else { echo count($as); }?></small>
        </span>
      </a>
    </li>
   <!--<li <?php if( ($CLASS_NAME=='othertask')&&($METHOD_NAME=='index') ){ echo 'class="active"'; } ?>>-->
   <!--   <a href="<?php echo site_url('othertask'); ?>">-->
   <!--     <i class="fa fa-pie-chart"></i> <span>Assigned To Others</span>-->
   <!--   </a>-->
   <!-- </li>-->

    

   
    <li <?php if( ($CLASS_NAME=='assignedtasks')&&($METHOD_NAME=='add_new') ){ echo 'class="active"'; } ?>>
      <a href="<?php echo site_url('assignedtasks/add_new'); ?>">
        <i class="fa fa-plus-circle"></i> <span>Add New Task</span>
      </a>
    </li>
     <li <?php if( ($CLASS_NAME=='remainder') ){ echo 'class="active"'; } ?>>
      <a href="<?php echo site_url('remainder'); ?>">
        <i class="fa fa-bell-o"></i> <span>Reminder</span>
        <?php $proadmin_data =$this->session->userdata('proadmin_data');  $user_id= $proadmin_data['TM_ID'];  $todaydate = date('Y-m-d'); $rec=$this->db->get_where('tm_tasks', array('remainder_date <='=>$todaydate,'remainder_date !='=>'1970-01-01','user_id'=> $user_id,'status!=' =>'1','remainder_date!=' =>'0000-00-00', ))->result(); 
        
        $recall=$this->db->get_where('tm_tasks', array('remainder_date <='=>$todaydate,'remainder_date !='=>'1970-01-01','status!=' =>'1','remainder_date!=' =>'0000-00-00', ))->result(); 
         ?>
         
         <span class="pull-right-container">
          <small class="label pull-right bg-green"><?php if($ADMIN_ROLE_ID==1){ echo count($recall);} else { echo count($rec); }?></small>
        </span>
        
        </a>
    </li>
     <li <?php if( ($CLASS_NAME=='assignedtasks')&&($METHOD_NAME=='emppro') ){ echo 'class="active"'; } ?>>
      <a href="<?php echo site_url('assignedtasks/emppro'); ?>">
        <i class="fa fa-product-hunt"></i> <span>Employee Report</span>
      </a>
    </li>
    
    <li <?php if( ($CLASS_NAME=='reports')&&($METHOD_NAME=='datewise') ){ echo 'class="active"'; } ?>>
      <a href="<?php echo site_url('reports/datewise'); ?>">
        <i class="fa fa-product-hunt"></i> <span>Date Report</span>
      </a>
    </li>
    <li <?php if(($CLASS_NAME=='dashboard')&&($METHOD_NAME=='passwordchange')){ echo 'class="active"'; } ?>>
      <a href="<?php echo site_url('dashboard/passwordchange'); ?>">
        <i class="fa fa-lock"></i> <span>Change Password</span>
      </a>
    </li>
   <!-- <li >
                    
                        <i class="fa fa-home ">
                        <div class="icon-bg bg-pink"></div>

                    </i>
                    <span class="menu-title">Reports</span><span class="fa arrow"></span>


                        <ul class="nav nav-second-level">



<li><a href="<?php echo base_url();?>assignedtasks/emppro"><i class="fa fa-product-hunt"><div class="icon-bg bg-pink"></div></i>
        <span class="menu-title">Employeewise</span></a>
    </li>

     
                    <li><a href="<?php echo base_url();?>reports/datewise"><i class="fa fa-product-hunt">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Date Wise</span></a>
                    </li>
     
                        </ul>
</li>-->

    <?php if($ADMIN_ROLE_ID==1){ ?>

    <li <?php if( ($CLASS_NAME=='assignedtasks')&&($METHOD_NAME=='alltasks') ){ echo 'class="active"'; } ?>>
      <a href="<?php echo site_url('assignedtasks/alltasks'); ?>">
        <i class="fa fa-pie-chart"></i> <span>All  Tasks</span>
        <span class="pull-right-container">
          <small class="label pull-right bg-green"><?php if($ADMIN_ROLE_ID==1){ echo count($asall);} else { echo count(c); }?></small>
        </span>
      </a>
    </li>

    <li <?php if( ($CLASS_NAME=='users') ){ echo 'class="active"'; } ?>>
      <a href="<?php echo site_url('users'); ?>">
        <i class="fa fa-users"></i> <span>Users</span>
      </a>
    </li>
    <li <?php if( ($CLASS_NAME=='projects') ){ echo 'class="active"'; } ?>>
      <a href="<?php echo site_url('projects'); ?>">
      <i class="fa fa-object-ungroup"></i> <span>Projects</span>
      </a>
    </li>
    <li <?php if( ($CLASS_NAME=='requirements') ){ echo 'class="active"'; } ?>>
      <a href="<?php echo site_url('requirements'); ?>">
      <i class="fa fa-clipboard"></i> <span>Requirements</span>
      </a>
    </li>
    <li <?php if( ($CLASS_NAME=='milestones') ){ echo 'class="active"'; } ?>>
      <a href="<?php echo site_url('milestones'); ?>">
      <i class="fa fa-tasks"></i> <span>Milestones</span>
      </a>
    </li>
  <?php } ?>
  </ul>
</section>
<!-- /.sidebar -->
</aside>