<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-11-23 11:30:31 --> Severity: Notice --> Undefined property: stdClass::$picture /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Welcome.php 47
ERROR - 2020-11-23 11:31:06 --> Severity: Notice --> Array to string conversion /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Assignedtasks.php 260
ERROR - 2020-11-23 11:35:32 --> Severity: Notice --> Undefined property: stdClass::$picture /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Welcome.php 47
ERROR - 2020-11-23 11:36:41 --> Severity: Notice --> Undefined property: Assignedtasks::$email /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Assignedtasks.php 273
ERROR - 2020-11-23 11:36:41 --> Severity: error --> Exception: Call to a member function send() on null /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Assignedtasks.php 273
ERROR - 2020-11-23 11:37:57 --> Severity: Notice --> Undefined property: Assignedtasks::$email /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Assignedtasks.php 273
ERROR - 2020-11-23 11:37:57 --> Severity: error --> Exception: Call to a member function send() on null /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Assignedtasks.php 273
ERROR - 2020-11-23 11:38:56 --> Severity: Notice --> Undefined property: stdClass::$picture /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Welcome.php 47
ERROR - 2020-11-23 11:39:07 --> Severity: Notice --> Undefined property: Assignedtasks::$email /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Assignedtasks.php 273
ERROR - 2020-11-23 11:39:07 --> Severity: error --> Exception: Call to a member function send() on null /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Assignedtasks.php 273
ERROR - 2020-11-23 11:42:09 --> Severity: Notice --> Undefined property: stdClass::$picture /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Welcome.php 47
ERROR - 2020-11-23 11:45:22 --> Severity: Notice --> Undefined property: stdClass::$picture /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Welcome.php 47
ERROR - 2020-11-23 11:46:05 --> Query error: Duplicate entry '0' for key 'PRIMARY' - Invalid query: INSERT INTO `tm_users` (`username`, `password`, `role`, `status`, `fname`, `lname`, `gender`, `address`, `city`, `state`, `country`, `technology`, `doj`, `dol`, `email`, `alternate_email`, `display_name`, `phone`, `designation`, `created_by`) VALUES ('Navaneetha', 'MTIzNDU2', '4', '1', 'Navaneetha', 'S', 'F', '', '', '', '', '', '', '', 'navneetha@digitowork.com', 'navneetha@digitowork.com', 'Navaneetha', '', '', '20')
ERROR - 2020-11-23 14:10:10 --> Severity: Notice --> Undefined property: stdClass::$picture /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Welcome.php 47
ERROR - 2020-11-23 14:12:14 --> Query error: Duplicate entry '0' for key 'PRIMARY' - Invalid query: INSERT INTO `tm_users` (`username`, `password`, `role`, `status`, `fname`, `lname`, `gender`, `address`, `city`, `state`, `country`, `technology`, `doj`, `dol`, `email`, `alternate_email`, `display_name`, `phone`, `designation`, `created_by`) VALUES ('twinkle', 'MTIzNA==', '4', '1', 'dine', 'kumar', 'M', '', '', '', '', '', '', '', 'dinesh@digitowork.com', 'dinmehn@yahoo.com', 'dinesh', '', '', '20')
ERROR - 2020-11-23 14:12:35 --> Query error: Duplicate entry '0' for key 'PRIMARY' - Invalid query: INSERT INTO `tm_users` (`username`, `password`, `role`, `status`, `fname`, `lname`, `gender`, `address`, `city`, `state`, `country`, `technology`, `doj`, `dol`, `email`, `alternate_email`, `display_name`, `phone`, `designation`, `created_by`) VALUES ('twinkle', 'MTIzNA==', '4', '1', 'dine', 'kumar', 'M', '', '', '', '', '', '', '', 'dinesh@digitowork.com', 'dinmehn@yahoo.com', 'dinesh', '', '', '20')
ERROR - 2020-11-23 14:13:01 --> Query error: Duplicate entry '0' for key 'PRIMARY' - Invalid query: INSERT INTO `tm_users` (`username`, `password`, `role`, `status`, `fname`, `lname`, `gender`, `address`, `city`, `state`, `country`, `technology`, `doj`, `dol`, `email`, `alternate_email`, `display_name`, `phone`, `designation`, `created_by`) VALUES ('twinkle@digitowork.com', 'MTIzNA==', '4', '1', 'dine', 'kumar', 'M', '', '', '', '', '', '', '', 'dinesh@digitowork.com', 'dinmehn@yahoo.com', 'dinesh', '', '', '20')
ERROR - 2020-11-23 14:14:39 --> Severity: Notice --> Undefined property: stdClass::$picture /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Welcome.php 47
ERROR - 2020-11-23 14:15:13 --> Query error: Table 'db_test_r.tm_task_attachments' doesn't exist - Invalid query: SELECT `t`.*, `s`.`title` as `status`, `u`.`display_name`, (SELECT GROUP_CONCAT(tm_task_attachments.file_name  SEPARATOR ', ')   FROM `tm_task_attachments`
		WHERE createtask_id= '228') as user_attachments
FROM `tm_tasks` `t`
JOIN `tm_users` `u` ON `t`.`user_id` = `u`.`id`
JOIN `tm_status` `s` ON `t`.`status` = `s`.`id`
WHERE `createtask_id` IN (228)
ORDER BY `t`.`id` DESC
ERROR - 2020-11-23 14:15:33 --> Query error: Table 'db_test_r.tm_task_attachments' doesn't exist - Invalid query: SELECT `t`.*, `s`.`title` as `status`, `u`.`display_name`, (SELECT GROUP_CONCAT(tm_task_attachments.file_name  SEPARATOR ', ')   FROM `tm_task_attachments`
		WHERE createtask_id= '228') as user_attachments
FROM `tm_tasks` `t`
JOIN `tm_users` `u` ON `t`.`user_id` = `u`.`id`
JOIN `tm_status` `s` ON `t`.`status` = `s`.`id`
WHERE `createtask_id` IN (228)
ORDER BY `t`.`id` DESC
ERROR - 2020-11-23 14:21:28 --> Severity: Notice --> Undefined property: Assignedtasks::$email /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Assignedtasks.php 273
ERROR - 2020-11-23 14:21:28 --> Severity: error --> Exception: Call to a member function send() on null /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Assignedtasks.php 273
