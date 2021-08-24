<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-07-23 00:07:40 --> Query error: Column 'status' in where clause is ambiguous - Invalid query: SELECT `ct`.*, `t`.`display`, `t`.`createtask_id`, `u`.`display_name`, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `s`.`title` as `status_name`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
JOIN `tm_users` `u` ON `ct`.`created_by` = `u`.`id`
JOIN `tm_tasks` `t` ON `t`.`createtask_id`=`ct`.`id`
JOIN `tm_status` `s` ON `t`.`status` = `s`.`id`
WHERE `user_id` = '55'
AND `status` = '3'
ORDER BY `id` DESC
ERROR - 2021-07-23 00:10:31 --> Query error: Column 'status' in where clause is ambiguous - Invalid query: SELECT `ct`.*, `t`.`display`, `t`.`createtask_id`, `u`.`display_name`, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `s`.`title` as `status_name`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
JOIN `tm_users` `u` ON `ct`.`created_by` = `u`.`id`
RIGHT JOIN `tm_tasks` `t` ON `t`.`createtask_id`=`ct`.`id`
JOIN `tm_status` `s` ON `t`.`status` = `s`.`id`
WHERE `user_id` = '55'
AND `status` = '5'
ORDER BY `id` DESC
ERROR - 2021-07-23 00:12:03 --> Query error: Column 'status' in where clause is ambiguous - Invalid query: SELECT `ct`.*, `t`.`display`, `t`.`createtask_id`, `u`.`display_name`, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `s`.`title` as `status_name`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
JOIN `tm_users` `u` ON `ct`.`created_by` = `u`.`id`
JOIN `tm_tasks` `t` ON `t`.`createtask_id`=`ct`.`id`
JOIN `tm_status` `s` ON `t`.`status` = `s`.`id`
WHERE `user_id` = '55'
AND `status` = '5'
ORDER BY `id` DESC
ERROR - 2021-07-23 00:12:11 --> Query error: Column 'status' in where clause is ambiguous - Invalid query: SELECT `ct`.*, `t`.`display`, `t`.`createtask_id`, `u`.`display_name`, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `s`.`title` as `status_name`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
JOIN `tm_users` `u` ON `ct`.`created_by` = `u`.`id`
JOIN `tm_tasks` `t` ON `t`.`createtask_id`=`ct`.`id`
JOIN `tm_status` `s` ON `t`.`status` = `s`.`id`
WHERE `user_id` = '55'
AND `status` = '3'
ORDER BY `id` DESC
ERROR - 2021-07-23 05:03:12 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-23 05:04:29 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-23 05:16:22 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-23 05:18:44 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-23 05:19:47 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-23 05:22:10 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-23 01:55:27 --> Severity: error --> Exception: syntax error, unexpected 'if' (T_IF) D:\xampp\htdocs\project\task\application\controllers\Search.php 62
ERROR - 2021-07-23 05:32:47 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-23 05:34:35 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-23 05:38:12 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-23 05:44:35 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-23 05:46:13 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-23 05:46:53 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-23 05:48:42 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-23 07:32:34 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-23 08:21:59 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\project\task\application\controllers\Taskinbox.php 90
ERROR - 2021-07-23 10:43:19 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-23 11:13:31 --> Severity: Notice --> Undefined property: stdClass::$project_name D:\xampp\htdocs\project\task\application\views\ideas\view.php 52
ERROR - 2021-07-23 11:13:31 --> Severity: Notice --> Undefined property: stdClass::$project_name D:\xampp\htdocs\project\task\application\views\ideas\view.php 52
ERROR - 2021-07-23 11:13:31 --> Severity: Notice --> Undefined property: stdClass::$project_name D:\xampp\htdocs\project\task\application\views\ideas\view.php 52
ERROR - 2021-07-23 11:13:31 --> Severity: Notice --> Undefined property: stdClass::$project_name D:\xampp\htdocs\project\task\application\views\ideas\view.php 52
ERROR - 2021-07-23 11:13:31 --> Severity: Notice --> Undefined property: stdClass::$project_name D:\xampp\htdocs\project\task\application\views\ideas\view.php 52
ERROR - 2021-07-23 11:13:31 --> Severity: Notice --> Undefined property: stdClass::$project_name D:\xampp\htdocs\project\task\application\views\ideas\view.php 52
ERROR - 2021-07-23 11:13:31 --> Severity: Notice --> Undefined property: stdClass::$project_name D:\xampp\htdocs\project\task\application\views\ideas\view.php 52
ERROR - 2021-07-23 11:13:31 --> Severity: Notice --> Undefined property: stdClass::$project_name D:\xampp\htdocs\project\task\application\views\ideas\view.php 52
ERROR - 2021-07-23 11:13:31 --> Severity: Notice --> Undefined property: stdClass::$project_name D:\xampp\htdocs\project\task\application\views\ideas\view.php 52
ERROR - 2021-07-23 11:13:31 --> Severity: Notice --> Undefined property: stdClass::$project_name D:\xampp\htdocs\project\task\application\views\ideas\view.php 52
ERROR - 2021-07-23 11:13:31 --> Severity: Notice --> Undefined property: stdClass::$project_name D:\xampp\htdocs\project\task\application\views\ideas\view.php 52
ERROR - 2021-07-23 11:13:31 --> Severity: Notice --> Undefined property: stdClass::$project_name D:\xampp\htdocs\project\task\application\views\ideas\view.php 52
ERROR - 2021-07-23 11:13:31 --> Severity: Notice --> Undefined property: stdClass::$project_name D:\xampp\htdocs\project\task\application\views\ideas\view.php 52
ERROR - 2021-07-23 11:13:31 --> Severity: Notice --> Undefined property: stdClass::$project_name D:\xampp\htdocs\project\task\application\views\ideas\view.php 52
