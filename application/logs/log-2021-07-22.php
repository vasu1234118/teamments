<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-07-22 04:32:35 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-22 04:40:46 --> Severity: Warning --> mail(): Failed to connect to mailserver at &quot;localhost&quot; port 25, verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini or use ini_set() D:\xampp\htdocs\project\task\system\libraries\Email.php 1902
ERROR - 2021-07-22 05:31:44 --> Severity: Warning --> mail(): Failed to connect to mailserver at &quot;localhost&quot; port 25, verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini or use ini_set() D:\xampp\htdocs\project\task\system\libraries\Email.php 1902
ERROR - 2021-07-22 07:36:32 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-22 08:33:26 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-22 08:33:44 --> Query error: Not unique table/alias: 'ct' - Invalid query: SELECT `ct`.*, `t`.`display`, `u`.`display_name`, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `s`.`title` as `status_title`, `t`.`createtask_id`
FROM (`tm_createtasks` `ct`, `tm_createtasks` `ct`)
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
JOIN `tm_users` `u` ON `ct`.`created_by` = `$admin`
JOIN `tm_tasks` `t` ON `ct`.`id` = `t`.`createtask_id` AND `t`.`user_id`=55
JOIN `tm_status` `s` ON `t`.`status` = `s`.`id`
WHERE `assigned_to` LIKE '%55%' ESCAPE '!'
AND `project_id` = '4'
AND FIND_IN_SET(,ct.assigned_to) AND `ct`.`flag` =0
ORDER BY `id` DESC
ERROR - 2021-07-22 08:35:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ct.assigned_to) AND `ct`.`flag` =0
ORDER BY `id` DESC' at line 10 - Invalid query: SELECT `ct`.*, `t`.`display`, `u`.`display_name`, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `s`.`title` as `status_title`, `t`.`createtask_id`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
JOIN `tm_users` `u` ON `ct`.`created_by` = `$admin`
JOIN `tm_tasks` `t` ON `ct`.`id` = `t`.`createtask_id` AND `t`.`user_id`=55
JOIN `tm_status` `s` ON `t`.`status` = `s`.`id`
WHERE `assigned_to` LIKE '%55%' ESCAPE '!'
AND `project_id` = '4'
AND FIND_IN_SET(,ct.assigned_to) AND `ct`.`flag` =0
ORDER BY `id` DESC
ERROR - 2021-07-22 08:36:16 --> Query error: Unknown column '$admin' in 'on clause' - Invalid query: SELECT `ct`.*, `t`.`display`, `u`.`display_name`, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `s`.`title` as `status_title`, `t`.`createtask_id`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
JOIN `tm_users` `u` ON `ct`.`created_by` = `$admin`
JOIN `tm_tasks` `t` ON `ct`.`id` = `t`.`createtask_id` AND `t`.`user_id`=55
JOIN `tm_status` `s` ON `t`.`status` = `s`.`id`
WHERE `assigned_to` LIKE '%55%' ESCAPE '!'
AND `project_id` = '4'
AND FIND_IN_SET(55,ct.assigned_to) AND `ct`.`flag` =0
ORDER BY `id` DESC
ERROR - 2021-07-22 08:38:43 --> Query error: Unknown column '$admin' in 'on clause' - Invalid query: SELECT `ct`.*, `t`.`display`, `u`.`display_name`, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `s`.`title` as `status_title`, `t`.`createtask_id`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
JOIN `tm_users` `u` ON `ct`.`created_by` = `$admin`
JOIN `tm_tasks` `t` ON `ct`.`id` = `t`.`createtask_id` AND `t`.`user_id`=55
JOIN `tm_status` `s` ON `t`.`status` = `s`.`id`
WHERE `assigned_to` LIKE '%55%' ESCAPE '!'
AND `project_id` = '4'
AND FIND_IN_SET(55,ct.assigned_to) AND `ct`.`flag` =0
ORDER BY `id` DESC
ERROR - 2021-07-22 08:39:21 --> Query error: Unknown column '$admin' in 'on clause' - Invalid query: SELECT `ct`.*, `t`.`display`, `u`.`display_name`, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `s`.`title` as `status_title`, `t`.`createtask_id`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
JOIN `tm_users` `u` ON `ct`.`created_by` = `$admin`
JOIN `tm_tasks` `t` ON `ct`.`id` = `t`.`createtask_id` AND `t`.`user_id`=55
JOIN `tm_status` `s` ON `t`.`status` = `s`.`id`
WHERE `assigned_to` LIKE '%55%' ESCAPE '!'
AND `project_id` = '4'
ORDER BY `id` DESC
ERROR - 2021-07-22 08:39:46 --> Query error: Unknown column '$admin' in 'on clause' - Invalid query: SELECT `ct`.*, `t`.`display`, `u`.`display_name`, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `s`.`title` as `status_title`, `t`.`createtask_id`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
JOIN `tm_users` `u` ON `ct`.`created_by` = `$admin`
JOIN `tm_tasks` `t` ON `ct`.`id` = `t`.`createtask_id` AND `t`.`user_id`=55
JOIN `tm_status` `s` ON `t`.`status` = `s`.`id`
WHERE `assigned_to` LIKE '%55%' ESCAPE '!'
AND `project_id` = '4'
ORDER BY `id` DESC
ERROR - 2021-07-22 08:41:00 --> Query error: Unknown column 'tm_t.display' in 'field list' - Invalid query: SELECT `ct`.*, `tm_t`.`display`, `u`.`display_name`, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `s`.`title` as `status_title`, `tm_t`.`createtask_id`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
JOIN `tm_users` `u` ON `ct`.`created_by` = `$admin`
JOIN `tm_status` `s` ON `tm_t`.`status` = `s`.`id`
WHERE `assigned_to` LIKE '%55%' ESCAPE '!'
AND `project_id` = '4'
AND FIND_IN_SET(55,ct.assigned_to) AND `ct`.`flag` =0
ORDER BY `id` DESC
ERROR - 2021-07-22 09:00:40 --> Query error: Table 'db_test_r2.tm_groups' doesn't exist - Invalid query: SELECT `ct`.*, `tm_t`.`display`, `tm_t`.`createtask_id`
FROM `tm_createtasks` `ct`
JOIN `tm_groups` ON `tasks``t`
WHERE `assigned_to` LIKE '%55%' ESCAPE '!'
AND `project_id` = '4'
AND `status` = '5'
ORDER BY `id` DESC
ERROR - 2021-07-22 09:09:24 --> Query error: Unknown column 'task' in 'field list' - Invalid query: SELECT `ct`.*, `t`.`display`, `t`.`createtask_id`, `task`, GROUP_CONCAT(createtask_id) AS createtask_id
FROM `tm_createtasks` `ct`
LEFT JOIN `tm_tasks` `t` ON `t`.`createtask_id`=`ct`.`id`
WHERE `assigned_to` LIKE '%55%' ESCAPE '!'
AND `project_id` = '4'
AND `status` = '5'
ORDER BY `id` DESC
ERROR - 2021-07-22 09:09:50 --> Query error: Unknown column 'tasks' in 'field list' - Invalid query: SELECT `ct`.*, `t`.`display`, `t`.`createtask_id`, `tasks`, GROUP_CONCAT(createtask_id) AS createtask_id
FROM `tm_createtasks` `ct`
LEFT JOIN `tm_tasks` `t` ON `t`.`createtask_id`=`ct`.`id`
WHERE `assigned_to` LIKE '%55%' ESCAPE '!'
AND `project_id` = '4'
AND `status` = '5'
ORDER BY `id` DESC
ERROR - 2021-07-22 10:08:52 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-22 10:15:07 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\project\task\application\controllers\Taskinbox.php 90
ERROR - 2021-07-22 10:16:35 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\project\task\application\controllers\Taskinbox.php 90
ERROR - 2021-07-22 10:20:56 --> Severity: error --> Exception: syntax error, unexpected 'ct' (T_STRING), expecting ')' D:\xampp\htdocs\project\task\application\views\assignedtasks\search.php 294
ERROR - 2021-07-22 10:21:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '.*, `tm_``t`.`display`, `tm_``u`.`display_name`, `tm_``c`.`title` as `complex...' at line 1 - Invalid query: SELECT `SELECT` `ct`.*, `tm_``t`.`display`, `tm_``u`.`display_name`, `tm_``c`.`title` as `complexity_name`, `tm_``p`.`title` as `priority_name`, `tm_``s`.`title` as `status_title`, `t`.`createtask_id` FROM `tm_createtasks` `ct` JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id` JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id` JOIN `tm_users` `u` ON `ct`.`created_by` = `u`.`id` JOIN `tm_tasks` `t` ON `ct`.`id` = `t`.`createtask_id` AND `t`.`user_id`=$admin JOIN `tm_status` `s` ON `t`.`status` = `s`.`id` WHERE FIND_IN_SET($admin, ct.assigned_to) AND `ct`.`flag` =0 ORDER BY `id` DESC
WHERE `assigned_to` LIKE '%55%' ESCAPE '!'
AND `project_id` = '4'
ERROR - 2021-07-22 10:23:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '.*, `tm_``t`.`display`, `JOIN ``tm_tasks`` ``t`` ON ``ct`.`id`` = ``t`.`tm_``...' at line 1 - Invalid query: SELECT `SELECT` `ct`.*, `tm_``t`.`display`, `JOIN ``tm_tasks`` ``t`` ON ``ct`.`id`` = ``t`.`tm_``createtask_id`` AND ``t`.`user_id``=$admin ORDER BY ``id` `DESC`
WHERE `assigned_to` LIKE '%55%' ESCAPE '!'
AND `project_id` = '4'
ERROR - 2021-07-22 13:18:29 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\project\task\application\views\assignedtasks\search.php 146
ERROR - 2021-07-22 13:19:16 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\project\task\application\views\assignedtasks\search.php 146
ERROR - 2021-07-22 13:21:39 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\project\task\application\views\assignedtasks\search.php 146
ERROR - 2021-07-22 16:52:20 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-22 17:14:19 --> Severity: error --> Exception: syntax error, unexpected '<' D:\xampp\htdocs\project\task\application\views\assignedtasks\search.php 325
ERROR - 2021-07-22 17:14:55 --> Severity: error --> Exception: syntax error, unexpected end of file D:\xampp\htdocs\project\task\application\views\assignedtasks\search.php 389
ERROR - 2021-07-22 23:42:45 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-22 23:42:45 --> Severity: error --> Exception: syntax error, unexpected 'AND' (T_LOGICAL_AND), expecting ')' D:\xampp\htdocs\project\task\application\views\assignedtasks\search.php 315
ERROR - 2021-07-22 23:52:04 --> Severity: error --> Exception: syntax error, unexpected '}' D:\xampp\htdocs\project\task\application\views\assignedtasks\search.php 280
ERROR - 2021-07-22 23:52:28 --> Query error: Column 'status' in where clause is ambiguous - Invalid query: SELECT `ct`.*, `t`.`display`, `t`.`createtask_id`, `u`.`display_name`, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `s`.`title` as `status_name`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
JOIN `tm_users` `u` ON `ct`.`created_by` = `u`.`id`
JOIN `tm_tasks` `t` ON `t`.`createtask_id`=`ct`.`id`
JOIN `tm_status` `s` ON `t`.`status` = `s`.`id`
WHERE `user_id` = '55'
AND `status` IS NULL
ORDER BY `id` DESC
ERROR - 2021-07-22 23:53:00 --> Query error: Column 'status' in where clause is ambiguous - Invalid query: SELECT `ct`.*, `t`.`display`, `t`.`createtask_id`, `u`.`display_name`, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `s`.`title` as `status_name`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
JOIN `tm_users` `u` ON `ct`.`created_by` = `u`.`id`
JOIN `tm_tasks` `t` ON `t`.`createtask_id`=`ct`.`id`
JOIN `tm_status` `s` ON `t`.`status` = `s`.`id`
WHERE `user_id` = '55'
AND `status` IS NULL
ORDER BY `id` DESC
ERROR - 2021-07-22 23:55:35 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '1)
JOIN `tm_status` `s` ON `t`.`status` = `s`.`id`
WHERE `user_id` = '55'
ORD...' at line 6 - Invalid query: SELECT `ct`.*, `t`.`display`, `t`.`createtask_id`, `u`.`display_name`, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `s`.`title` as `status_name`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
JOIN `tm_users` `u` ON `ct`.`created_by` = `u`.`id`
JOIN `tm_tasks` `t` USING (1)
JOIN `tm_status` `s` ON `t`.`status` = `s`.`id`
WHERE `user_id` = '55'
ORDER BY `id` DESC
