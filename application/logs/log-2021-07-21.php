<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-07-21 17:16:47 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-21 17:29:09 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-21 17:30:21 --> Severity: Warning --> mail(): Failed to connect to mailserver at &quot;localhost&quot; port 25, verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini or use ini_set() D:\xampp\htdocs\project\task\system\libraries\Email.php 1902
ERROR - 2021-07-21 17:32:16 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-21 18:52:50 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ct.assigned_to) AND `tm_ct`.`flag` =0
ORDER BY `id` DESC' at line 7 - Invalid query: SELECT `tm_ct`.*, `t`.`display`, `tm_u`.`display_name`, `s`.`title` as `status_title`, `t`.`createtask_id`
FROM `tm_ct`
JOIN `tm_t` ON `tm_ct`.`id` = `t`.`createtask_id` AND `t`.`user_id`=55
JOIN `tm_s` ON `t`.`status` = `s`.`id`
WHERE `assigned_to` LIKE '%55%' ESCAPE '!'
AND `project_id` = '4'
AND FIND_IN_SET(,ct.assigned_to) AND `tm_ct`.`flag` =0
ORDER BY `id` DESC
ERROR - 2021-07-21 18:54:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ct.assigned_to) AND `tm_ct`.`flag` =0
ORDER BY `id` DESC' at line 7 - Invalid query: SELECT `tm_ct`.*, `t`.`display`, `s`.`title` as `status_title`, `t`.`createtask_id`
FROM `tm_ct`
JOIN `tm_t` ON `tm_ct`.`id` = `t`.`createtask_id` AND `t`.`user_id`=55
JOIN `tm_s` ON `t`.`status` = `s`.`id`
WHERE `assigned_to` LIKE '%55%' ESCAPE '!'
AND `project_id` = '4'
AND FIND_IN_SET(,ct.assigned_to) AND `tm_ct`.`flag` =0
ORDER BY `id` DESC
ERROR - 2021-07-21 18:54:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ct.assigned_to) AND `tm_ct`.`flag` =0
ORDER BY `id` DESC' at line 7 - Invalid query: SELECT `tm_ct`.*, `t`.`display`, `s`.`title` as `status_title`, `t`.`createtask_id`
FROM `tm_ct`
JOIN `tm_t` ON `tm_ct`.`id` = `t`.`createtask_id` AND `t`.`user_id`=55
JOIN `tm_s` ON `t`.`status` = `s`.`id`
WHERE `assigned_to` LIKE '%55%' ESCAPE '!'
AND `project_id` = '4'
AND FIND_IN_SET(,ct.assigned_to) AND `tm_ct`.`flag` =0
ORDER BY `id` DESC
ERROR - 2021-07-21 18:58:38 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ct.assigned_to) AND `ct`.`flag` =0
ORDER BY `id` DESC' at line 7 - Invalid query: SELECT `ct`.*, `t`.`display`, `s`.`title` as `status_title`, `t`.`createtask_id`
FROM `tm_createtasks` `ct`
JOIN `tm_task` `t` ON `ct`.`id` = `t`.`createtask_id` AND `t`.`user_id`=55
JOIN `tm_status` `s` ON `t`.`status` = `s`.`id`
WHERE `assigned_to` LIKE '%55%' ESCAPE '!'
AND `project_id` = '4'
AND FIND_IN_SET(,ct.assigned_to) AND `ct`.`flag` =0
ORDER BY `id` DESC
ERROR - 2021-07-21 18:58:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ct.assigned_to) AND `ct`.`flag` =0
ORDER BY `id` DESC' at line 7 - Invalid query: SELECT `ct`.*, `t`.`display`, `s`.`title` as `status_title`, `t`.`createtask_id`
FROM `tm_createtasks` `ct`
JOIN `tm_task` `t` ON `ct`.`id` = `t`.`createtask_id` AND `t`.`user_id`=55
JOIN `tm_status` `s` ON `t`.`status` = `s`.`id`
WHERE `assigned_to` LIKE '%55%' ESCAPE '!'
AND `project_id` = '4'
AND FIND_IN_SET(,ct.assigned_to) AND `ct`.`flag` =0
ORDER BY `id` DESC
ERROR - 2021-07-21 19:00:25 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '55) AND `ct`.`flag` =0
ORDER BY `id` DESC' at line 7 - Invalid query: SELECT `ct`.*, `t`.`display`, `s`.`title` as `status_title`, `t`.`createtask_id`
FROM `tm_createtasks` `ct`
JOIN `tm_task` `t` ON `ct`.`id` = `t`.`createtask_id` AND `t`.`user_id`=55
JOIN `tm_status` `s` ON `t`.`status` = `s`.`id`
WHERE `assigned_to` LIKE '%55%' ESCAPE '!'
AND `project_id` = '4'
AND FIND_IN_SET(,55) AND `ct`.`flag` =0
ORDER BY `id` DESC
ERROR - 2021-07-21 19:01:46 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '55) AND `ct`.`flag` =0
ORDER BY `id` DESC' at line 7 - Invalid query: SELECT `ct`.*, `t`.`display`, `s`.`title` as `status_title`, `t`.`createtask_id`
FROM `tm_createtasks` `ct`
JOIN `tm_task` `t` ON `ct`.`id` = `t`.`createtask_id` AND `t`.`user_id`=55
JOIN `tm_status` `s` ON `t`.`status` = `s`.`id`
WHERE `assigned_to` LIKE '%55%' ESCAPE '!'
AND `project_id` = '4'
AND FIND_IN_SET(,55) AND `ct`.`flag` =0
ORDER BY `id` DESC
ERROR - 2021-07-21 19:13:54 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\project\task\application\controllers\Taskinbox.php 90
ERROR - 2021-07-21 19:45:03 --> Query error: Table 'db_test_r2.tm_task' doesn't exist - Invalid query: SELECT `ct`.*, `t`.`display`, `tm_s`.`title` as `status_title`, `t`.`createtask_id`
FROM `tm_createtasks` `ct`
JOIN `tm_task` `t` ON `ct`.`id` = 5 AND `t`.`user_id`=55
WHERE `assigned_to` LIKE '%55%' ESCAPE '!'
AND `project_id` = '4'
ORDER BY `id` DESC
ERROR - 2021-07-21 19:46:35 --> Query error: Table 'db_test_r2.tm_task' doesn't exist - Invalid query: SELECT `ct`.*, `t`.`display`, `t`.`createtask_id`
FROM `tm_createtasks` `ct`
JOIN `tm_task` `t` ON `ct`.`id` = 5 AND `t`.`user_id`=55
WHERE `assigned_to` LIKE '%55%' ESCAPE '!'
AND `project_id` = '4'
ORDER BY `id` DESC
ERROR - 2021-07-21 19:47:16 --> Query error: Table 'db_test_r2.tm_task' doesn't exist - Invalid query: SELECT `ct`.*, `t`.`display`, `t`.`createtask_id`
FROM `tm_createtasks` `ct`
JOIN `tm_task` `t` ON `ct`.`id` = 5 AND `t`.`user_id`=55
WHERE `assigned_to` LIKE '%55%' ESCAPE '!'
AND `project_id` = '4'
ORDER BY `id` DESC
ERROR - 2021-07-21 19:47:38 --> Query error: Table 'db_test_r2.tm_task' doesn't exist - Invalid query: SELECT `ct`.*, `t`.`display`, `t`.`createtask_id`
FROM `tm_createtasks` `ct`
JOIN `tm_task` `t` ON `ct`.`id` = 5 AND `t`.`user_id`=55
WHERE `assigned_to` LIKE '%55%' ESCAPE '!'
AND `project_id` = '4'
ORDER BY `id` DESC
ERROR - 2021-07-21 19:56:29 --> Query error: Table 'db_test_r2.tm_task' doesn't exist - Invalid query: SELECT `ct`.*, `tm_t`.`display`, `tm_t`.`createtask_id`
FROM `tm_createtasks` `ct`
JOIN `tm_task` ON `tm_task`.`createtask_id` = `ct`.`id`
WHERE `assigned_to` LIKE '%55%' ESCAPE '!'
AND `project_id` = '4'
ORDER BY `id` DESC
ERROR - 2021-07-21 19:56:51 --> Query error: Unknown column 'tm_t.display' in 'field list' - Invalid query: SELECT `ct`.*, `tm_t`.`display`, `tm_t`.`createtask_id`
FROM `tm_createtasks` `ct`
JOIN `tm_tasks` ON `tm_tasks`.`createtask_id` = `ct`.`id`
WHERE `assigned_to` LIKE '%55%' ESCAPE '!'
AND `project_id` = '4'
ORDER BY `id` DESC
ERROR - 2021-07-21 20:11:39 --> Query error: No tables used - Invalid query: SELECT *
ERROR - 2021-07-21 20:12:48 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'JOIN `tm_tasks` ON `tm_tasks`.`createtask_id` = `tm_createtasks`.`id`
WHERE `...' at line 2 - Invalid query: SELECT `createtasks*`
JOIN `tm_tasks` ON `tm_tasks`.`createtask_id` = `tm_createtasks`.`id`
WHERE `assigned_to` LIKE '%55%' ESCAPE '!'
AND `project_id` = '4'
ERROR - 2021-07-21 20:34:43 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\project\task\application\controllers\Taskinbox.php 90
ERROR - 2021-07-21 20:36:39 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\project\task\application\controllers\Taskinbox.php 90
ERROR - 2021-07-21 20:40:09 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\project\task\application\controllers\Taskinbox.php 90
ERROR - 2021-07-21 20:43:13 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-21 23:04:09 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-21 23:16:10 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
