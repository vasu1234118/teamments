<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-03-04 19:27:00 --> Severity: Notice --> Undefined property: stdClass::$picture /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/controllers/Welcome.php 47
ERROR - 2021-03-04 21:02:44 --> Severity: Notice --> Undefined property: stdClass::$picture /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/controllers/Welcome.php 47
ERROR - 2021-03-04 21:14:11 --> Query error: Unknown column 'ct.user_id' in 'where clause' - Invalid query: SELECT `ct`.*, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `u`.`fname` as `assigned_to_fname`, (SELECT   GROUP_CONCAT(b.display_name ORDER BY b.id) DepartmentName FROM    tm_createtasks a INNER JOIN tm_users b ON FIND_IN_SET(b.id, a.assigned_to) > 0 WHERE a.id=ct.id) as assigned_to, `proj`.`name` as `project_name`, `mile`.`name` as `milestone_name`, `proj`.`assigned_to` as `prj`, (SELECT GROUP_CONCAT(concat(tm_users.display_name, ' (', `tm_status`.`title`, ')') SEPARATOR ', ')   FROM `tm_tasks`  
		JOIN tm_users on tm_users.id=tm_tasks.user_id
		JOIN tm_status on tm_status.id=tm_tasks.status
		WHERE createtask_id= ct.id) as users_status, `requ`.`uniq_id` as `requ_id`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
LEFT JOIN `tm_users` `u` ON `ct`.`assigned_to` = `u`.`id`
LEFT JOIN `tm_projects` `proj` ON `ct`.`project_id` = `proj`.`id`
LEFT JOIN `tm_milestones` `mile` ON `ct`.`milestone_id` = `mile`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
LEFT JOIN `tm_requirements` `requ` ON `requ`.`id` = `ct`.`requirement_id`
WHERE '20' = `ct`.`user_id` AND `ct`.`flag` != 2 
GROUP BY `ct`.`id`
ORDER BY `ct`.`id` DESC
ERROR - 2021-03-04 21:17:24 --> Query error: Unknown column 'ct.user_id' in 'where clause' - Invalid query: SELECT `ct`.*, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `u`.`fname` as `assigned_to_fname`, (SELECT   GROUP_CONCAT(b.display_name ORDER BY b.id) DepartmentName FROM    tm_createtasks a INNER JOIN tm_users b ON FIND_IN_SET(b.id, a.assigned_to) > 0 WHERE a.id=ct.id) as assigned_to, `proj`.`name` as `project_name`, `mile`.`name` as `milestone_name`, `proj`.`assigned_to` as `prj`, (SELECT GROUP_CONCAT(concat(tm_users.display_name, ' (', `tm_status`.`title`, ')') SEPARATOR ', ')   FROM `tm_tasks`  
		JOIN tm_users on tm_users.id=tm_tasks.user_id
		JOIN tm_status on tm_status.id=tm_tasks.status
		WHERE createtask_id= ct.id) as users_status, `requ`.`uniq_id` as `requ_id`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
LEFT JOIN `tm_users` `u` ON `ct`.`assigned_to` = `u`.`id`
LEFT JOIN `tm_projects` `proj` ON `ct`.`project_id` = `proj`.`id`
LEFT JOIN `tm_milestones` `mile` ON `ct`.`milestone_id` = `mile`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
LEFT JOIN `tm_requirements` `requ` ON `requ`.`id` = `ct`.`requirement_id`
WHERE '20' = `ct`.`user_id` AND `ct`.`flag` != 2 
GROUP BY `ct`.`id`
ORDER BY `ct`.`id` DESC
ERROR - 2021-03-04 21:21:44 --> Query error: Unknown column 'ct.user_id' in 'where clause' - Invalid query: SELECT `ct`.*, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `u`.`fname` as `assigned_to_fname`, (SELECT   GROUP_CONCAT(b.display_name ORDER BY b.id) DepartmentName FROM    tm_createtasks a INNER JOIN tm_users b ON FIND_IN_SET(b.id, a.assigned_to) > 0 WHERE a.id=ct.id) as assigned_to, `proj`.`name` as `project_name`, `mile`.`name` as `milestone_name`, `proj`.`assigned_to` as `prj`, (SELECT GROUP_CONCAT(concat(tm_users.display_name, ' (', `tm_status`.`title`, ')') SEPARATOR ', ')   FROM `tm_tasks`  
		JOIN tm_users on tm_users.id=tm_tasks.user_id
		JOIN tm_status on tm_status.id=tm_tasks.status
		WHERE createtask_id= ct.id) as users_status, `requ`.`uniq_id` as `requ_id`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
LEFT JOIN `tm_users` `u` ON `ct`.`assigned_to` = `u`.`id`
LEFT JOIN `tm_projects` `proj` ON `ct`.`project_id` = `proj`.`id`
LEFT JOIN `tm_milestones` `mile` ON `ct`.`milestone_id` = `mile`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
LEFT JOIN `tm_requirements` `requ` ON `requ`.`id` = `ct`.`requirement_id`
WHERE '20' = `ct`.`user_id` AND `ct`.`flag` != 2 
GROUP BY `ct`.`id`
ORDER BY `ct`.`id` DESC
ERROR - 2021-03-04 21:27:49 --> Severity: Notice --> Undefined property: stdClass::$requrements /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/projects/edit.php 72
ERROR - 2021-03-04 21:28:52 --> Severity: Notice --> Undefined property: stdClass::$picture /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/controllers/Welcome.php 47
ERROR - 2021-03-04 21:31:26 --> Severity: Notice --> Undefined property: stdClass::$picture /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/controllers/Welcome.php 47
ERROR - 2021-03-04 21:59:23 --> Query error: Unknown column 'mile.id' in 'on clause' - Invalid query: SELECT `ct`.*, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `u`.`fname` as `assigned_to_fname`, (SELECT   GROUP_CONCAT(b.display_name ORDER BY b.id) DepartmentName FROM    tm_createtasks a INNER JOIN tm_users b ON FIND_IN_SET(b.id, a.assigned_to) > 0 WHERE a.id=ct.id) as assigned_to, `proj`.`name` as `project_name`, `mile`.`name` as `milestone_name`, `cu`.`display_name` as `created_user`, (SELECT GROUP_CONCAT(concat(tm_users.display_name, ' (', `tm_status`.`title`, ')') SEPARATOR ', ')   FROM `tm_tasks`  
		JOIN tm_users on tm_users.id=tm_tasks.user_id
		JOIN tm_status on tm_status.id=tm_tasks.status
		WHERE createtask_id= ct.id) as users_status, `requ`.`uniq_id` as `requ_id`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
LEFT JOIN `tm_users` `u` ON `ct`.`assigned_to` = `u`.`id`
LEFT JOIN `tm_projects` `proj` ON `ct`.`project_id` = `proj`.`id`
LEFT JOIN `tm_milestones` `mile` ON `ct`.`milestone_id` = `mile`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
LEFT JOIN `tm_users` `cu` ON `ct`.`created_by` = `cu`.`id`
LEFT JOIN `tm_requirements` `requ` ON `requ`.`id` = `ct`.`requirement_id`
GROUP BY `ct`.`id`
ORDER BY `id` DESC
ERROR - 2021-03-04 21:59:26 --> Query error: Unknown column 'mile.id' in 'on clause' - Invalid query: SELECT `ct`.*, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `u`.`fname` as `assigned_to_fname`, (SELECT   GROUP_CONCAT(b.display_name ORDER BY b.id) DepartmentName FROM    tm_createtasks a INNER JOIN tm_users b ON FIND_IN_SET(b.id, a.assigned_to) > 0 WHERE a.id=ct.id) as assigned_to, `proj`.`name` as `project_name`, `mile`.`name` as `milestone_name`, `cu`.`display_name` as `created_user`, (SELECT GROUP_CONCAT(concat(tm_users.display_name, ' (', `tm_status`.`title`, ')') SEPARATOR ', ')   FROM `tm_tasks`  
		JOIN tm_users on tm_users.id=tm_tasks.user_id
		JOIN tm_status on tm_status.id=tm_tasks.status
		WHERE createtask_id= ct.id) as users_status, `requ`.`uniq_id` as `requ_id`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
LEFT JOIN `tm_users` `u` ON `ct`.`assigned_to` = `u`.`id`
LEFT JOIN `tm_projects` `proj` ON `ct`.`project_id` = `proj`.`id`
LEFT JOIN `tm_milestones` `mile` ON `ct`.`milestone_id` = `mile`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
LEFT JOIN `tm_users` `cu` ON `ct`.`created_by` = `cu`.`id`
LEFT JOIN `tm_requirements` `requ` ON `requ`.`id` = `ct`.`requirement_id`
GROUP BY `ct`.`id`
ORDER BY `id` DESC
ERROR - 2021-03-04 21:59:31 --> Query error: Unknown column 'mile.id' in 'on clause' - Invalid query: SELECT `ct`.*, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `u`.`fname` as `assigned_to_fname`, (SELECT   GROUP_CONCAT(b.display_name ORDER BY b.id) DepartmentName FROM    tm_createtasks a INNER JOIN tm_users b ON FIND_IN_SET(b.id, a.assigned_to) > 0 WHERE a.id=ct.id) as assigned_to, `proj`.`name` as `project_name`, `mile`.`name` as `milestone_name`, `proj`.`assigned_to` as `prj`, (SELECT GROUP_CONCAT(concat(tm_users.display_name, ' (', `tm_status`.`title`, ')') SEPARATOR ', ')   FROM `tm_tasks`  
		JOIN tm_users on tm_users.id=tm_tasks.user_id
		JOIN tm_status on tm_status.id=tm_tasks.status
		WHERE createtask_id= ct.id) as users_status, `requ`.`uniq_id` as `requ_id`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
LEFT JOIN `tm_users` `u` ON `ct`.`assigned_to` = `u`.`id`
LEFT JOIN `tm_projects` `proj` ON `ct`.`project_id` = `proj`.`id`
LEFT JOIN `tm_milestones` `mile` ON `ct`.`milestone_id` = `mile`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
LEFT JOIN `tm_requirements` `requ` ON `requ`.`id` = `ct`.`requirement_id`
WHERE '20' = `ct`.`created_by` AND `ct`.`flag` != 2 
GROUP BY `ct`.`id`
ORDER BY `ct`.`id` DESC
ERROR - 2021-03-04 21:59:33 --> Query error: Unknown column 'mile.id' in 'on clause' - Invalid query: SELECT `ct`.*, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `u`.`fname` as `assigned_to_fname`, (SELECT   GROUP_CONCAT(b.display_name ORDER BY b.id) DepartmentName FROM    tm_createtasks a INNER JOIN tm_users b ON FIND_IN_SET(b.id, a.assigned_to) > 0 WHERE a.id=ct.id) as assigned_to, `proj`.`name` as `project_name`, `mile`.`name` as `milestone_name`, `proj`.`assigned_to` as `prj`, (SELECT GROUP_CONCAT(concat(tm_users.display_name, ' (', `tm_status`.`title`, ')') SEPARATOR ', ')   FROM `tm_tasks`  
		JOIN tm_users on tm_users.id=tm_tasks.user_id
		JOIN tm_status on tm_status.id=tm_tasks.status
		WHERE createtask_id= ct.id) as users_status, `requ`.`uniq_id` as `requ_id`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
LEFT JOIN `tm_users` `u` ON `ct`.`assigned_to` = `u`.`id`
LEFT JOIN `tm_projects` `proj` ON `ct`.`project_id` = `proj`.`id`
LEFT JOIN `tm_milestones` `mile` ON `ct`.`milestone_id` = `mile`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
LEFT JOIN `tm_requirements` `requ` ON `requ`.`id` = `ct`.`requirement_id`
WHERE '20' = `ct`.`created_by` AND `ct`.`flag` != 2 
GROUP BY `ct`.`id`
ORDER BY `ct`.`id` DESC
ERROR - 2021-03-04 21:59:40 --> Query error: Unknown column 'mile.id' in 'on clause' - Invalid query: SELECT `ct`.*, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `u`.`fname` as `assigned_to_fname`, (SELECT   GROUP_CONCAT(b.display_name ORDER BY b.id) DepartmentName FROM    tm_createtasks a INNER JOIN tm_users b ON FIND_IN_SET(b.id, a.assigned_to) > 0 WHERE a.id=ct.id) as assigned_to, `proj`.`name` as `project_name`, `mile`.`name` as `milestone_name`, `proj`.`assigned_to` as `prj`, (SELECT GROUP_CONCAT(concat(tm_users.display_name, ' (', `tm_status`.`title`, ')') SEPARATOR ', ')   FROM `tm_tasks`  
		JOIN tm_users on tm_users.id=tm_tasks.user_id
		JOIN tm_status on tm_status.id=tm_tasks.status
		WHERE createtask_id= ct.id) as users_status, `requ`.`uniq_id` as `requ_id`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
LEFT JOIN `tm_users` `u` ON `ct`.`assigned_to` = `u`.`id`
LEFT JOIN `tm_projects` `proj` ON `ct`.`project_id` = `proj`.`id`
LEFT JOIN `tm_milestones` `mile` ON `ct`.`milestone_id` = `mile`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
LEFT JOIN `tm_requirements` `requ` ON `requ`.`id` = `ct`.`requirement_id`
WHERE '20' = `ct`.`created_by` AND `ct`.`flag` != 2 
GROUP BY `ct`.`id`
ORDER BY `ct`.`id` DESC
ERROR - 2021-03-04 21:59:48 --> Query error: Unknown column 'mile.id' in 'on clause' - Invalid query: SELECT `ct`.*, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `u`.`fname` as `assigned_to_fname`, (SELECT   GROUP_CONCAT(b.display_name ORDER BY b.id) DepartmentName FROM    tm_createtasks a INNER JOIN tm_users b ON FIND_IN_SET(b.id, a.assigned_to) > 0 WHERE a.id=ct.id) as assigned_to, `proj`.`name` as `project_name`, `mile`.`name` as `milestone_name`, `proj`.`assigned_to` as `prj`, (SELECT GROUP_CONCAT(concat(tm_users.display_name, ' (', `tm_status`.`title`, ')') SEPARATOR ', ')   FROM `tm_tasks`  
		JOIN tm_users on tm_users.id=tm_tasks.user_id
		JOIN tm_status on tm_status.id=tm_tasks.status
		WHERE createtask_id= ct.id) as users_status, `requ`.`uniq_id` as `requ_id`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
LEFT JOIN `tm_users` `u` ON `ct`.`assigned_to` = `u`.`id`
LEFT JOIN `tm_projects` `proj` ON `ct`.`project_id` = `proj`.`id`
LEFT JOIN `tm_milestones` `mile` ON `ct`.`milestone_id` = `mile`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
LEFT JOIN `tm_requirements` `requ` ON `requ`.`id` = `ct`.`requirement_id`
WHERE '20' = `ct`.`created_by` AND `ct`.`flag` != 2 
GROUP BY `ct`.`id`
ORDER BY `ct`.`id` DESC
ERROR - 2021-03-04 21:59:54 --> Query error: Unknown column 'mile.id' in 'on clause' - Invalid query: SELECT `ct`.*, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `u`.`fname` as `assigned_to_fname`, (SELECT   GROUP_CONCAT(b.display_name ORDER BY b.id) DepartmentName FROM    tm_createtasks a INNER JOIN tm_users b ON FIND_IN_SET(b.id, a.assigned_to) > 0 WHERE a.id=ct.id) as assigned_to, `proj`.`name` as `project_name`, `mile`.`name` as `milestone_name`, `proj`.`assigned_to` as `prj`, (SELECT GROUP_CONCAT(concat(tm_users.display_name, ' (', `tm_status`.`title`, ')') SEPARATOR ', ')   FROM `tm_tasks`  
		JOIN tm_users on tm_users.id=tm_tasks.user_id
		JOIN tm_status on tm_status.id=tm_tasks.status
		WHERE createtask_id= ct.id) as users_status, `requ`.`uniq_id` as `requ_id`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
LEFT JOIN `tm_users` `u` ON `ct`.`assigned_to` = `u`.`id`
LEFT JOIN `tm_projects` `proj` ON `ct`.`project_id` = `proj`.`id`
LEFT JOIN `tm_milestones` `mile` ON `ct`.`milestone_id` = `mile`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
LEFT JOIN `tm_requirements` `requ` ON `requ`.`id` = `ct`.`requirement_id`
WHERE '41' = `ct`.`created_by` AND `ct`.`flag` != 2 
GROUP BY `ct`.`id`
ORDER BY `ct`.`id` DESC
ERROR - 2021-03-04 21:59:59 --> Query error: Unknown column 'mile.id' in 'on clause' - Invalid query: SELECT `ct`.*, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `u`.`fname` as `assigned_to_fname`, (SELECT   GROUP_CONCAT(b.display_name ORDER BY b.id) DepartmentName FROM    tm_createtasks a INNER JOIN tm_users b ON FIND_IN_SET(b.id, a.assigned_to) > 0 WHERE a.id=ct.id) as assigned_to, `proj`.`name` as `project_name`, `mile`.`name` as `milestone_name`, `proj`.`assigned_to` as `prj`, (SELECT GROUP_CONCAT(concat(tm_users.display_name, ' (', `tm_status`.`title`, ')') SEPARATOR ', ')   FROM `tm_tasks`  
		JOIN tm_users on tm_users.id=tm_tasks.user_id
		JOIN tm_status on tm_status.id=tm_tasks.status
		WHERE createtask_id= ct.id) as users_status, `requ`.`uniq_id` as `requ_id`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
LEFT JOIN `tm_users` `u` ON `ct`.`assigned_to` = `u`.`id`
LEFT JOIN `tm_projects` `proj` ON `ct`.`project_id` = `proj`.`id`
LEFT JOIN `tm_milestones` `mile` ON `ct`.`milestone_id` = `mile`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
LEFT JOIN `tm_requirements` `requ` ON `requ`.`id` = `ct`.`requirement_id`
WHERE '41' = `ct`.`created_by` AND `ct`.`flag` != 2 
GROUP BY `ct`.`id`
ORDER BY `ct`.`id` DESC
ERROR - 2021-03-04 22:00:29 --> Query error: Unknown column 'mile.id' in 'on clause' - Invalid query: SELECT `ct`.*, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `u`.`fname` as `assigned_to_fname`, (SELECT   GROUP_CONCAT(b.display_name ORDER BY b.id) DepartmentName FROM    tm_createtasks a INNER JOIN tm_users b ON FIND_IN_SET(b.id, a.assigned_to) > 0 WHERE a.id=ct.id) as assigned_to, `proj`.`name` as `project_name`, `mile`.`name` as `milestone_name`, `proj`.`assigned_to` as `prj`, (SELECT GROUP_CONCAT(concat(tm_users.display_name, ' (', `tm_status`.`title`, ')') SEPARATOR ', ')   FROM `tm_tasks`  
		JOIN tm_users on tm_users.id=tm_tasks.user_id
		JOIN tm_status on tm_status.id=tm_tasks.status
		WHERE createtask_id= ct.id) as users_status, `requ`.`uniq_id` as `requ_id`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
LEFT JOIN `tm_users` `u` ON `ct`.`assigned_to` = `u`.`id`
LEFT JOIN `tm_projects` `proj` ON `ct`.`project_id` = `proj`.`id`
LEFT JOIN `tm_milestones` `mile` ON `ct`.`milestone_id` = `mile`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
LEFT JOIN `tm_requirements` `requ` ON `requ`.`id` = `ct`.`requirement_id`
WHERE '20' = `ct`.`created_by` AND `ct`.`flag` != 2 
GROUP BY `ct`.`id`
ORDER BY `ct`.`id` DESC
ERROR - 2021-03-04 22:00:35 --> Query error: Unknown column 'mile.id' in 'on clause' - Invalid query: SELECT `ct`.*, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `u`.`fname` as `assigned_to_fname`, (SELECT   GROUP_CONCAT(b.display_name ORDER BY b.id) DepartmentName FROM    tm_createtasks a INNER JOIN tm_users b ON FIND_IN_SET(b.id, a.assigned_to) > 0 WHERE a.id=ct.id) as assigned_to, `proj`.`name` as `project_name`, `mile`.`name` as `milestone_name`, `proj`.`assigned_to` as `prj`, (SELECT GROUP_CONCAT(concat(tm_users.display_name, ' (', `tm_status`.`title`, ')') SEPARATOR ', ')   FROM `tm_tasks`  
		JOIN tm_users on tm_users.id=tm_tasks.user_id
		JOIN tm_status on tm_status.id=tm_tasks.status
		WHERE createtask_id= ct.id) as users_status, `requ`.`uniq_id` as `requ_id`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
LEFT JOIN `tm_users` `u` ON `ct`.`assigned_to` = `u`.`id`
LEFT JOIN `tm_projects` `proj` ON `ct`.`project_id` = `proj`.`id`
LEFT JOIN `tm_milestones` `mile` ON `ct`.`milestone_id` = `mile`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
LEFT JOIN `tm_requirements` `requ` ON `requ`.`id` = `ct`.`requirement_id`
WHERE '20' = `ct`.`created_by` AND `ct`.`flag` != 2 
GROUP BY `ct`.`id`
ORDER BY `ct`.`id` DESC
ERROR - 2021-03-04 22:00:39 --> Query error: Unknown column 'mile.id' in 'on clause' - Invalid query: SELECT `ct`.*, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `u`.`fname` as `assigned_to_fname`, (SELECT   GROUP_CONCAT(b.display_name ORDER BY b.id) DepartmentName FROM    tm_createtasks a INNER JOIN tm_users b ON FIND_IN_SET(b.id, a.assigned_to) > 0 WHERE a.id=ct.id) as assigned_to, `proj`.`name` as `project_name`, `mile`.`name` as `milestone_name`, `proj`.`assigned_to` as `prj`, (SELECT GROUP_CONCAT(concat(tm_users.display_name, ' (', `tm_status`.`title`, ')') SEPARATOR ', ')   FROM `tm_tasks`  
		JOIN tm_users on tm_users.id=tm_tasks.user_id
		JOIN tm_status on tm_status.id=tm_tasks.status
		WHERE createtask_id= ct.id) as users_status, `requ`.`uniq_id` as `requ_id`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
LEFT JOIN `tm_users` `u` ON `ct`.`assigned_to` = `u`.`id`
LEFT JOIN `tm_projects` `proj` ON `ct`.`project_id` = `proj`.`id`
LEFT JOIN `tm_milestones` `mile` ON `ct`.`milestone_id` = `mile`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
LEFT JOIN `tm_requirements` `requ` ON `requ`.`id` = `ct`.`requirement_id`
WHERE '20' = `ct`.`created_by` AND `ct`.`flag` != 2 
GROUP BY `ct`.`id`
ORDER BY `ct`.`id` DESC
ERROR - 2021-03-04 22:00:49 --> Severity: Notice --> Undefined property: stdClass::$picture /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/controllers/Welcome.php 47
ERROR - 2021-03-04 22:00:57 --> Query error: Unknown column 'mile.id' in 'on clause' - Invalid query: SELECT `ct`.*, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `u`.`fname` as `assigned_to_fname`, (SELECT   GROUP_CONCAT(b.display_name ORDER BY b.id) DepartmentName FROM    tm_createtasks a INNER JOIN tm_users b ON FIND_IN_SET(b.id, a.assigned_to) > 0 WHERE a.id=ct.id) as assigned_to, `proj`.`name` as `project_name`, `mile`.`name` as `milestone_name`, `proj`.`assigned_to` as `prj`, (SELECT GROUP_CONCAT(concat(tm_users.display_name, ' (', `tm_status`.`title`, ')') SEPARATOR ', ')   FROM `tm_tasks`  
		JOIN tm_users on tm_users.id=tm_tasks.user_id
		JOIN tm_status on tm_status.id=tm_tasks.status
		WHERE createtask_id= ct.id) as users_status, `requ`.`uniq_id` as `requ_id`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
LEFT JOIN `tm_users` `u` ON `ct`.`assigned_to` = `u`.`id`
LEFT JOIN `tm_projects` `proj` ON `ct`.`project_id` = `proj`.`id`
LEFT JOIN `tm_milestones` `mile` ON `ct`.`milestone_id` = `mile`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
LEFT JOIN `tm_requirements` `requ` ON `requ`.`id` = `ct`.`requirement_id`
WHERE '20' = `ct`.`created_by` AND `ct`.`flag` != 2 
GROUP BY `ct`.`id`
ORDER BY `ct`.`id` DESC
ERROR - 2021-03-04 22:01:37 --> Query error: Unknown column 'mile.id' in 'on clause' - Invalid query: SELECT `ct`.*, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `u`.`fname` as `assigned_to_fname`, (SELECT   GROUP_CONCAT(b.display_name ORDER BY b.id) DepartmentName FROM    tm_createtasks a INNER JOIN tm_users b ON FIND_IN_SET(b.id, a.assigned_to) > 0 WHERE a.id=ct.id) as assigned_to, `proj`.`name` as `project_name`, `mile`.`name` as `milestone_name`, `proj`.`assigned_to` as `prj`, (SELECT GROUP_CONCAT(concat(tm_users.display_name, ' (', `tm_status`.`title`, ')') SEPARATOR ', ')   FROM `tm_tasks`  
		JOIN tm_users on tm_users.id=tm_tasks.user_id
		JOIN tm_status on tm_status.id=tm_tasks.status
		WHERE createtask_id= ct.id) as users_status, `requ`.`uniq_id` as `requ_id`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
LEFT JOIN `tm_users` `u` ON `ct`.`assigned_to` = `u`.`id`
LEFT JOIN `tm_projects` `proj` ON `ct`.`project_id` = `proj`.`id`
LEFT JOIN `tm_milestones` `mile` ON `ct`.`milestone_id` = `mile`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
LEFT JOIN `tm_requirements` `requ` ON `requ`.`id` = `ct`.`requirement_id`
WHERE '20' = `ct`.`created_by` AND `ct`.`flag` != 2 
GROUP BY `ct`.`id`
ORDER BY `ct`.`id` DESC
ERROR - 2021-03-04 22:05:47 --> Severity: Notice --> Undefined property: stdClass::$picture /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/controllers/Welcome.php 47
ERROR - 2021-03-04 22:05:52 --> Query error: Unknown column 'mile.id' in 'on clause' - Invalid query: SELECT `ct`.*, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `u`.`fname` as `assigned_to_fname`, (SELECT   GROUP_CONCAT(b.display_name ORDER BY b.id) DepartmentName FROM    tm_createtasks a INNER JOIN tm_users b ON FIND_IN_SET(b.id, a.assigned_to) > 0 WHERE a.id=ct.id) as assigned_to, `proj`.`name` as `project_name`, `mile`.`name` as `milestone_name`, `proj`.`assigned_to` as `prj`, (SELECT GROUP_CONCAT(concat(tm_users.display_name, ' (', `tm_status`.`title`, ')') SEPARATOR ', ')   FROM `tm_tasks`  
		JOIN tm_users on tm_users.id=tm_tasks.user_id
		JOIN tm_status on tm_status.id=tm_tasks.status
		WHERE createtask_id= ct.id) as users_status, `requ`.`uniq_id` as `requ_id`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
LEFT JOIN `tm_users` `u` ON `ct`.`assigned_to` = `u`.`id`
LEFT JOIN `tm_projects` `proj` ON `ct`.`project_id` = `proj`.`id`
LEFT JOIN `tm_milestones` `mile` ON `ct`.`milestone_id` = `mile`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
LEFT JOIN `tm_requirements` `requ` ON `requ`.`id` = `ct`.`requirement_id`
WHERE '20' = `ct`.`created_by` AND `ct`.`flag` != 2 
GROUP BY `ct`.`id`
ORDER BY `ct`.`id` DESC
ERROR - 2021-03-04 22:05:59 --> Query error: Unknown column 'lt.id' in 'order clause' - Invalid query: SELECT `lt`.*, `u`.`display_name` as `display_name`, `rt`.`title` as `user_role`, `p`.`name` as `project_name`
FROM `tm_milestones` `lt`
LEFT JOIN `tm_users` `u` ON `lt`.`created_by` = `u`.`id`
LEFT JOIN `tm_projects` `p` ON `lt`.`project_id` = `p`.`id`
LEFT JOIN `tm_roles` `rt` ON `rt`.`id` = `u`.`role`
WHERE `lt`.`flag` NOT IN(1)
ORDER BY `lt`.`id` DESC
ERROR - 2021-03-04 22:09:58 --> Severity: Notice --> Undefined variable: priority /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/milestones/new.php 89
ERROR - 2021-03-04 22:09:58 --> Severity: Warning --> Invalid argument supplied for foreach() /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/milestones/new.php 89
ERROR - 2021-03-04 22:10:36 --> Severity: Notice --> Undefined variable: assigned_to /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/controllers/Milestones.php 96
ERROR - 2021-03-04 22:10:36 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/controllers/Milestones.php 96
ERROR - 2021-03-04 23:42:50 --> Severity: Notice --> Undefined property: stdClass::$picture /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/controllers/Welcome.php 47
ERROR - 2021-03-04 23:42:59 --> Severity: Notice --> Undefined property: stdClass::$requrements /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/projects/edit.php 72
ERROR - 2021-03-04 23:45:05 --> Severity: Notice --> Undefined property: stdClass::$requrements /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/projects/edit.php 72
ERROR - 2021-03-04 23:46:00 --> Severity: Notice --> Undefined property: stdClass::$picture /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/controllers/Welcome.php 47
ERROR - 2021-03-04 23:47:30 --> Severity: Notice --> Undefined property: stdClass::$picture /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/controllers/Welcome.php 47
ERROR - 2021-03-04 23:52:05 --> Severity: Notice --> Undefined property: stdClass::$picture /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/controllers/Welcome.php 47
ERROR - 2021-03-04 23:58:08 --> Severity: Warning --> Invalid argument supplied for foreach() /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/controllers/Taskinbox.php 88
ERROR - 2021-03-04 23:58:27 --> Severity: Notice --> Undefined property: stdClass::$picture /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/controllers/Welcome.php 47
ERROR - 2021-03-04 23:59:05 --> Severity: Notice --> Undefined property: stdClass::$picture /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/controllers/Welcome.php 47
ERROR - 2021-03-04 23:59:42 --> Severity: Warning --> Invalid argument supplied for foreach() /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/controllers/Taskinbox.php 88
