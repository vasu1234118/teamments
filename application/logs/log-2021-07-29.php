<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-07-29 07:28:38 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-29 11:09:42 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-29 11:10:02 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-29 14:40:49 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-29 14:40:49 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '(SELECT GROUP_CONCAT(concat(tm_users.display_name, ' (', `tm_tasks`.`actual_s...' at line 1 - Invalid query: SELECT `ct`.*, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `u`.`fname` as `assigned_to_fname`, (SELECT   GROUP_CONCAT(b.display_name ORDER BY b.id) DepartmentName FROM    tm_createtasks a INNER JOIN tm_users b ON FIND_IN_SET(b.id, a.assigned_to) > 0 WHERE a.id=ct.id) as assigned_to, `proj`.`name` as `project_name`, `mile`.`name` as `milestone_name`, `proj`.`assigned_to` as `prj`, (SELECT GROUP_CONCAT(concat(tm_users.display_name, ' (', `tm_status`.`title`, ')') SEPARATOR ', ') (SELECT GROUP_CONCAT(concat(tm_users.display_name, ' (', `tm_tasks`.`actual_start_date`, ')') SEPARATOR ', ')   FROM `tm_tasks`  
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
ERROR - 2021-07-29 14:42:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '(SELECT GROUP_CONCAT(concat(tm_users.display_name, ' (', `tm_tasks`.`actual_s...' at line 1 - Invalid query: SELECT `ct`.*, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `u`.`fname` as `assigned_to_fname`, (SELECT   GROUP_CONCAT(b.display_name ORDER BY b.id) DepartmentName FROM    tm_createtasks a INNER JOIN tm_users b ON FIND_IN_SET(b.id, a.assigned_to) > 0 WHERE a.id=ct.id) as assigned_to, `proj`.`name` as `project_name`, `mile`.`name` as `milestone_name`, `proj`.`assigned_to` as `prj`, (SELECT GROUP_CONCAT(concat(tm_users.display_name, ' (', `tm_status`.`title`, ')') SEPARATOR ', ') (SELECT GROUP_CONCAT(concat(tm_users.display_name, ' (', `tm_tasks`.`actual_start_date`, ')') SEPARATOR ', ')   FROM `tm_tasks`  
		JOIN tm_users on tm_users.id=tm_tasks.user_id
		JOIN tm_status on tm_status.id=tm_tasks.status
		WHERE createtask_id= ct.id) as users_status, `as` `dt`, `requ`.`uniq_id` as `requ_id`
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
ERROR - 2021-07-29 20:54:20 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-29 20:58:34 --> Severity: Warning --> Use of undefined constant z - assumed 'z' (this will throw an Error in a future version of PHP) D:\xampp\htdocs\project\task\application\views\assignedtasks\view.php 95
ERROR - 2021-07-29 20:58:34 --> Severity: Warning --> Use of undefined constant z - assumed 'z' (this will throw an Error in a future version of PHP) D:\xampp\htdocs\project\task\application\views\assignedtasks\view.php 95
ERROR - 2021-07-29 20:58:34 --> Severity: Warning --> Use of undefined constant z - assumed 'z' (this will throw an Error in a future version of PHP) D:\xampp\htdocs\project\task\application\views\assignedtasks\view.php 95
ERROR - 2021-07-29 21:11:12 --> Severity: Warning --> mail(): Failed to connect to mailserver at &quot;localhost&quot; port 25, verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini or use ini_set() D:\xampp\htdocs\project\task\system\libraries\Email.php 1902
ERROR - 2021-07-29 21:38:58 --> Query error: Table 'db_test_r2.tm_task' doesn't exist - Invalid query: SELECT *
FROM `tm_task`
WHERE `user_id` IS NULL
ERROR - 2021-07-29 21:39:22 --> Query error: Table 'db_test_r2.tm_task' doesn't exist - Invalid query: SELECT *
FROM `tm_task`
WHERE `user_id` IS NULL
ERROR - 2021-07-29 21:41:23 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\project\task\application\controllers\Taskinbox.php 90
ERROR - 2021-07-29 21:47:35 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\project\task\application\controllers\Taskinbox.php 90
ERROR - 2021-07-29 22:05:49 --> Severity: error --> Exception: syntax error, unexpected '.' D:\xampp\htdocs\project\task\application\views\assignedtasks\view.php 95
ERROR - 2021-07-29 22:23:19 --> Severity: error --> Exception: syntax error, unexpected '}', expecting ';' or ',' D:\xampp\htdocs\project\task\application\views\assignedtasks\view.php 95
ERROR - 2021-07-29 22:23:29 --> Severity: error --> Exception: Object of class stdClass could not be converted to string D:\xampp\htdocs\project\task\application\views\assignedtasks\view.php 95
ERROR - 2021-07-29 22:35:52 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-29 22:36:14 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\project\task\application\controllers\Taskinbox.php 90
ERROR - 2021-07-29 22:36:33 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-29 22:56:54 --> Severity: error --> Exception: syntax error, unexpected 'echo' (T_ECHO) D:\xampp\htdocs\project\task\application\views\assignedtasks\view.php 110
ERROR - 2021-07-29 22:58:49 --> Severity: error --> Exception: syntax error, unexpected '=', expecting ';' or ',' D:\xampp\htdocs\project\task\application\views\assignedtasks\view.php 110
ERROR - 2021-07-29 23:06:56 --> Severity: error --> Exception: syntax error, unexpected '$r' (T_VARIABLE), expecting ')' D:\xampp\htdocs\project\task\application\views\assignedtasks\view.php 110
ERROR - 2021-07-29 23:08:14 --> Severity: Compile Error --> Can't use function return value in write context D:\xampp\htdocs\project\task\application\views\assignedtasks\view.php 110
ERROR - 2021-07-29 23:24:06 --> Severity: error --> Exception: syntax error, unexpected '','' (T_CONSTANT_ENCAPSED_STRING), expecting ')' D:\xampp\htdocs\project\task\application\views\assignedtasks\view.php 110
ERROR - 2021-07-29 23:37:18 --> Severity: error --> Exception: syntax error, unexpected '}', expecting ';' or ',' D:\xampp\htdocs\project\task\application\views\assignedtasks\view.php 110
