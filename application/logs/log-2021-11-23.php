<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-11-23 00:13:19 --> Severity: Warning --> Invalid argument supplied for foreach() /home/bdi8onyxofri/public_html/application/controllers/Taskinbox.php 109
ERROR - 2021-11-23 04:47:48 --> 404 Page Not Found: Faviconico/index
ERROR - 2021-11-23 05:22:50 --> 404 Page Not Found: Faviconico/index
ERROR - 2021-11-23 10:52:55 --> Query error: Unknown column 't.indisplay' in 'field list' - Invalid query: SELECT `ct`.*, `t`.`display`, `t`.`indisplay`, `t`.`status`, `u`.`display_name`, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `s`.`title` as `status_title`, `t`.`createtask_id`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
JOIN `tm_users` `u` ON `ct`.`created_by` = `u`.`id`
JOIN `tm_tasks` `t` ON `ct`.`id` = `t`.`createtask_id` AND `t`.`user_id`=55
JOIN `tm_status` `s` ON `t`.`status` = `s`.`id`
WHERE FIND_IN_SET(55,ct.assigned_to) AND `ct`.`flag` =0
AND `t`.`status` = 2
ORDER BY `id` DESC
ERROR - 2021-11-23 10:52:55 --> Severity: error --> Exception: Call to a member function result() on bool /home/bdi8onyxofri/public_html/application/models/Tasks_model.php 476
ERROR - 2021-11-23 10:53:43 --> Query error: Unknown column 't.indisplay' in 'field list' - Invalid query: SELECT `ct`.*, `t`.`display`, `t`.`indisplay`, `t`.`status`, `u`.`display_name`, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `s`.`title` as `status_title`, `t`.`createtask_id`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
JOIN `tm_users` `u` ON `ct`.`created_by` = `u`.`id`
JOIN `tm_tasks` `t` ON `ct`.`id` = `t`.`createtask_id` AND `t`.`user_id`=55
JOIN `tm_status` `s` ON `t`.`status` = `s`.`id`
WHERE FIND_IN_SET(55,ct.assigned_to) AND `ct`.`flag` =0
AND `t`.`status` = 2
ORDER BY `id` DESC
ERROR - 2021-11-23 10:53:43 --> Severity: error --> Exception: Call to a member function result() on bool /home/bdi8onyxofri/public_html/application/models/Tasks_model.php 476
ERROR - 2021-11-23 10:53:49 --> Query error: Unknown column 't.cdisplay' in 'field list' - Invalid query: SELECT `ct`.*, `t`.`display`, `t`.`cdisplay`, `t`.`status`, `u`.`display_name`, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `s`.`title` as `status_title`, `t`.`createtask_id`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
JOIN `tm_users` `u` ON `ct`.`created_by` = `u`.`id`
JOIN `tm_tasks` `t` ON `ct`.`id` = `t`.`createtask_id` AND `t`.`user_id`=55
JOIN `tm_status` `s` ON `t`.`status` = `s`.`id`
WHERE FIND_IN_SET(55,ct.assigned_to) AND `ct`.`flag` =0
AND `t`.`status` = 1
ORDER BY `id` DESC
ERROR - 2021-11-23 10:53:49 --> Severity: error --> Exception: Call to a member function result() on bool /home/bdi8onyxofri/public_html/application/models/Tasks_model.php 424
ERROR - 2021-11-23 10:55:21 --> Query error: Unknown column 't.cdisplay' in 'field list' - Invalid query: SELECT `ct`.*, `t`.`display`, `t`.`cdisplay`, `t`.`status`, `u`.`display_name`, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `s`.`title` as `status_title`, `t`.`createtask_id`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
JOIN `tm_users` `u` ON `ct`.`created_by` = `u`.`id`
JOIN `tm_tasks` `t` ON `ct`.`id` = `t`.`createtask_id` AND `t`.`user_id`=55
JOIN `tm_status` `s` ON `t`.`status` = `s`.`id`
WHERE FIND_IN_SET(55,ct.assigned_to) AND `ct`.`flag` =0
AND `t`.`status` = 1
ORDER BY `id` DESC
ERROR - 2021-11-23 10:55:21 --> Severity: error --> Exception: Call to a member function result() on bool /home/bdi8onyxofri/public_html/application/models/Tasks_model.php 424
ERROR - 2021-11-23 10:55:24 --> Query error: Unknown column 't.cdisplay' in 'field list' - Invalid query: SELECT `ct`.*, `t`.`display`, `t`.`cdisplay`, `t`.`status`, `u`.`display_name`, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `s`.`title` as `status_title`, `t`.`createtask_id`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
JOIN `tm_users` `u` ON `ct`.`created_by` = `u`.`id`
JOIN `tm_tasks` `t` ON `ct`.`id` = `t`.`createtask_id` AND `t`.`user_id`=55
JOIN `tm_status` `s` ON `t`.`status` = `s`.`id`
WHERE FIND_IN_SET(55,ct.assigned_to) AND `ct`.`flag` =0
AND `t`.`status` = 1
ORDER BY `id` DESC
ERROR - 2021-11-23 10:55:24 --> Severity: error --> Exception: Call to a member function result() on bool /home/bdi8onyxofri/public_html/application/models/Tasks_model.php 424
ERROR - 2021-11-23 10:56:08 --> Query error: Unknown column 't.cdisplay' in 'field list' - Invalid query: SELECT `ct`.*, `t`.`display`, `t`.`cdisplay`, `t`.`status`, `u`.`display_name`, `c`.`title` as `complexity_name`, `p`.`title` as `priority_name`, `s`.`title` as `status_title`, `t`.`createtask_id`
FROM `tm_createtasks` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity` = `c`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority` = `p`.`id`
JOIN `tm_users` `u` ON `ct`.`created_by` = `u`.`id`
JOIN `tm_tasks` `t` ON `ct`.`id` = `t`.`createtask_id` AND `t`.`user_id`=55
JOIN `tm_status` `s` ON `t`.`status` = `s`.`id`
WHERE FIND_IN_SET(55,ct.assigned_to) AND `ct`.`flag` =0
AND `t`.`status` = 1
ORDER BY `id` DESC
ERROR - 2021-11-23 11:04:07 --> Severity: Warning --> Invalid argument supplied for foreach() /home/bdi8onyxofri/public_html/application/controllers/Taskinbox.php 175
ERROR - 2021-11-23 11:04:45 --> Severity: Notice --> Undefined index:  /home/bdi8onyxofri/public_html/application/views/taskinbox/edit.php 472
ERROR - 2021-11-23 11:04:45 --> Severity: Notice --> Trying to get property 'progress' of non-object /home/bdi8onyxofri/public_html/application/views/taskinbox/edit.php 472
ERROR - 2021-11-23 11:04:45 --> Severity: Notice --> Undefined index:  /home/bdi8onyxofri/public_html/application/views/taskinbox/edit.php 469
ERROR - 2021-11-23 11:04:45 --> Severity: Notice --> Trying to get property 'name' of non-object /home/bdi8onyxofri/public_html/application/views/taskinbox/edit.php 469
ERROR - 2021-11-23 11:04:55 --> Severity: Warning --> Invalid argument supplied for foreach() /home/bdi8onyxofri/public_html/application/controllers/Taskinbox.php 175
ERROR - 2021-11-23 11:31:20 --> Severity: Warning --> Invalid argument supplied for foreach() /home/bdi8onyxofri/public_html/application/controllers/Taskinbox.php 175
ERROR - 2021-11-23 11:34:14 --> Severity: Warning --> Invalid argument supplied for foreach() /home/bdi8onyxofri/public_html/application/views/assignedtasks/newproject.php 212
ERROR - 2021-11-23 11:34:56 --> Severity: Warning --> Invalid argument supplied for foreach() /home/bdi8onyxofri/public_html/application/views/reports/datewise2.php 228
ERROR - 2021-11-23 07:37:26 --> 404 Page Not Found: Faviconico/index
ERROR - 2021-11-23 14:14:03 --> Severity: Warning --> Use of undefined constant name - assumed 'name' (this will throw an Error in a future version of PHP) /home/bdi8onyxofri/public_html/application/controllers/Taskinbox.php 128
ERROR - 2021-11-23 14:14:03 --> Severity: Warning --> Use of undefined constant task_id - assumed 'task_id' (this will throw an Error in a future version of PHP) /home/bdi8onyxofri/public_html/application/views/completedemail.php 33
ERROR - 2021-11-23 14:14:03 --> Severity: Warning --> Use of undefined constant name - assumed 'name' (this will throw an Error in a future version of PHP) /home/bdi8onyxofri/public_html/application/views/completedemail.php 33
ERROR - 2021-11-23 14:14:03 --> Severity: Warning --> Invalid argument supplied for foreach() /home/bdi8onyxofri/public_html/application/views/completedemail.php 116
ERROR - 2021-11-23 14:22:02 --> Severity: Warning --> Use of undefined constant name - assumed 'name' (this will throw an Error in a future version of PHP) /home/bdi8onyxofri/public_html/application/controllers/Taskinbox.php 128
ERROR - 2021-11-23 14:22:02 --> Severity: Warning --> Use of undefined constant task_id - assumed 'task_id' (this will throw an Error in a future version of PHP) /home/bdi8onyxofri/public_html/application/views/completedemail.php 33
ERROR - 2021-11-23 14:22:02 --> Severity: Warning --> Use of undefined constant name - assumed 'name' (this will throw an Error in a future version of PHP) /home/bdi8onyxofri/public_html/application/views/completedemail.php 33
ERROR - 2021-11-23 14:22:02 --> Severity: Warning --> Invalid argument supplied for foreach() /home/bdi8onyxofri/public_html/application/views/completedemail.php 116
ERROR - 2021-11-23 11:40:32 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-11-23 11:40:32 --> 404 Page Not Found: Humanstxt/index
ERROR - 2021-11-23 11:40:33 --> 404 Page Not Found: Adstxt/index
ERROR - 2021-11-23 13:25:19 --> 404 Page Not Found: Faviconico/index
ERROR - 2021-11-23 19:03:38 --> Severity: Warning --> Invalid argument supplied for foreach() /home/bdi8onyxofri/public_html/application/views/assignedtasks/newproject.php 212
ERROR - 2021-11-23 19:10:01 --> Severity: Warning --> Invalid argument supplied for foreach() /home/bdi8onyxofri/public_html/application/views/reports/datewise2.php 228
ERROR - 2021-11-23 19:10:16 --> 404 Page Not Found: Assignedtasks/getusers
ERROR - 2021-11-23 13:41:46 --> 404 Page Not Found: Faviconico/index
ERROR - 2021-11-23 19:14:22 --> Severity: Warning --> Invalid argument supplied for foreach() /home/bdi8onyxofri/public_html/application/views/reports/datewise2.php 228
ERROR - 2021-11-23 19:31:32 --> 404 Page Not Found: Assignedtasks/getusers
ERROR - 2021-11-23 14:02:40 --> 404 Page Not Found: Faviconico/index
ERROR - 2021-11-23 14:03:22 --> 404 Page Not Found: Faviconico/index
ERROR - 2021-11-23 19:51:17 --> Severity: Warning --> Invalid argument supplied for foreach() /home/bdi8onyxofri/public_html/application/views/assignedtasks/newproject.php 212
ERROR - 2021-11-23 14:28:12 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-11-23 14:28:12 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-11-23 14:28:14 --> 404 Page Not Found: Adstxt/index
ERROR - 2021-11-23 14:28:16 --> 404 Page Not Found: Adstxt/index
ERROR - 2021-11-23 22:14:33 --> 404 Page Not Found: Faviconico/index
ERROR - 2021-11-23 22:19:28 --> 404 Page Not Found: Faviconico/index
ERROR - 2021-11-23 23:47:07 --> 404 Page Not Found: Faviconico/index
ERROR - 2021-11-23 23:51:16 --> 404 Page Not Found: Faviconico/index
