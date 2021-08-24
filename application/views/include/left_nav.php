<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">Menu</li>
    <li <?php if(($CLASS_NAME=='dashboard')&&($METHOD_NAME=='index')){ echo 'class="active"'; } ?>>
      <a href="<?php echo site_url('dashboard'); ?>">
        <i class="fa fa-tachometer"></i> <span>Dashboard</span>
      </a>
    </li>
    <li <?php if(($CLASS_NAME=='dashboard')&&($METHOD_NAME=='passwordchange')){ echo 'class="active"'; } ?>>
      <a href="<?php echo site_url('dashboard/passwordchange'); ?>">
        <i class="fa fa-lock"></i> <span>Change Password</span>
      </a>
    </li>
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
      </a>
    </li>
    
    <li <?php if(($CLASS_NAME=='assignedtasks' && $METHOD_NAME=='mysavedtasks' )){ echo 'class="active"'; } ?>>
      <a href="<?php echo site_url('assignedtasks/mysavedtasks'); ?>">
        <i class="fa fa-save"></i> <span>My Saved Tasks</span>
      </a>
    </li>
  
    <li <?php if( ($CLASS_NAME=='taskinbox') ){ echo 'class="active"'; } ?>>
      <a href="<?php echo site_url('taskinbox'); ?>">
        <i class="fa fa-envelope-o"></i> <span>My To-Do List</span>
        <?php if($unread_tasks!=0){ ?><span class="pull-right-container">
          <small class="label pull-right bg-green"><?php echo $unread_tasks; ?></small>
        </span>
        <?php } ?>
        </a>
    </li>
    

    <li <?php if( ($CLASS_NAME=='assignedtasks')&&($METHOD_NAME=='index') ){ echo 'class="active"'; } ?>>
      <a href="<?php echo site_url('assignedtasks'); ?>">
        <i class="fa fa-pie-chart"></i> <span>Assigned To Others</span>
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
    

    <?php if($ADMIN_ROLE_ID==1){ ?>

    <li <?php if( ($CLASS_NAME=='assignedtasks')&&($METHOD_NAME=='alltasks') ){ echo 'class="active"'; } ?>>
      <a href="<?php echo site_url('assignedtasks/alltasks'); ?>">
        <i class="fa fa-pie-chart"></i> <span>All  Tasks</span>
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