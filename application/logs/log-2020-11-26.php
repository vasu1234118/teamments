<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-11-26 21:25:27 --> Severity: Notice --> Undefined property: stdClass::$picture /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Welcome.php 47
ERROR - 2020-11-26 21:29:41 --> Severity: Notice --> Array to string conversion /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Assignedtasks.php 260
ERROR - 2020-11-26 21:40:20 --> Severity: Notice --> Array to string conversion /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Assignedtasks.php 260
ERROR - 2020-11-26 21:41:49 --> Severity: Notice --> Undefined property: stdClass::$picture /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Welcome.php 47
ERROR - 2020-11-26 21:42:38 --> Severity: Notice --> Undefined property: Assignedtasks::$email /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Assignedtasks.php 273
ERROR - 2020-11-26 21:42:38 --> Severity: error --> Exception: Call to a member function send() on null /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Assignedtasks.php 273
ERROR - 2020-11-26 21:43:39 --> Severity: Notice --> Undefined property: stdClass::$picture /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Welcome.php 47
ERROR - 2020-11-26 21:43:43 --> Severity: Notice --> Undefined property: Assignedtasks::$email /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Assignedtasks.php 273
ERROR - 2020-11-26 21:43:43 --> Severity: error --> Exception: Call to a member function send() on null /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Assignedtasks.php 273
ERROR - 2020-11-26 21:44:44 --> Severity: Notice --> Array to string conversion /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Assignedtasks.php 260
ERROR - 2020-11-26 21:45:49 --> Severity: Notice --> Undefined property: Assignedtasks::$email /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Assignedtasks.php 273
ERROR - 2020-11-26 21:45:49 --> Severity: error --> Exception: Call to a member function send() on null /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Assignedtasks.php 273
ERROR - 2020-11-26 21:49:22 --> Severity: Notice --> Undefined property: Assignedtasks::$email /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Assignedtasks.php 273
ERROR - 2020-11-26 21:49:22 --> Severity: error --> Exception: Call to a member function send() on null /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Assignedtasks.php 273
ERROR - 2020-11-26 21:52:12 --> Severity: Notice --> Undefined property: Assignedtasks::$email /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Assignedtasks.php 271
ERROR - 2020-11-26 21:52:12 --> Severity: error --> Exception: Call to a member function send() on null /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Assignedtasks.php 271
ERROR - 2020-11-26 21:55:16 --> Severity: Notice --> Undefined property: Assignedtasks::$email /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Assignedtasks.php 273
ERROR - 2020-11-26 21:55:16 --> Severity: error --> Exception: Call to a member function send() on null /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Assignedtasks.php 273
ERROR - 2020-11-26 21:57:30 --> Severity: error --> Exception: Call to a member function send() on null /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/controllers/Assignedtasks.php 274
ERROR - 2020-11-26 22:18:32 --> Severity: Warning --> require_once(/home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/libraries/PHPMailer_lib.php): failed to open stream: No such file or directory /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/libraries/Notificationmail.php 121
ERROR - 2020-11-26 22:18:32 --> Severity: Compile Error --> require_once(): Failed opening required '/home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/libraries/PHPMailer_lib.php' (include_path='.:/opt/alt/php71/usr/share/pear') /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/libraries/Notificationmail.php 121
ERROR - 2020-11-26 22:18:55 --> Query error: Table 'db_test_r.tm_task_attachments' doesn't exist - Invalid query: SELECT `t`.*, `s`.`title` as `status`, `u`.`display_name`, (SELECT GROUP_CONCAT(tm_task_attachments.file_name  SEPARATOR ', ')   FROM `tm_task_attachments`
		WHERE createtask_id= '7') as user_attachments
FROM `tm_tasks` `t`
JOIN `tm_users` `u` ON `t`.`user_id` = `u`.`id`
JOIN `tm_status` `s` ON `t`.`status` = `s`.`id`
WHERE `createtask_id` IN (7)
ORDER BY `t`.`id` DESC
ERROR - 2020-11-26 22:19:19 --> Query error: Table 'db_test_r.tm_task_attachments' doesn't exist - Invalid query: SELECT `t`.*, `s`.`title` as `status`, `u`.`display_name`, (SELECT GROUP_CONCAT(tm_task_attachments.file_name  SEPARATOR ', ')   FROM `tm_task_attachments`
		WHERE createtask_id= '7') as user_attachments
FROM `tm_tasks` `t`
JOIN `tm_users` `u` ON `t`.`user_id` = `u`.`id`
JOIN `tm_status` `s` ON `t`.`status` = `s`.`id`
WHERE `createtask_id` IN (7)
ORDER BY `t`.`id` DESC
ERROR - 2020-11-26 22:31:34 --> Severity: Notice --> Undefined property: stdClass::$project_name /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/views/ideas/view.php 52
ERROR - 2020-11-26 22:31:34 --> Severity: Notice --> Undefined property: stdClass::$project_name /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/views/ideas/view.php 52
ERROR - 2020-11-26 22:31:34 --> Severity: Notice --> Undefined property: stdClass::$project_name /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/views/ideas/view.php 52
ERROR - 2020-11-26 22:31:34 --> Severity: Notice --> Undefined property: stdClass::$project_name /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/views/ideas/view.php 52
ERROR - 2020-11-26 22:31:34 --> Severity: Notice --> Undefined property: stdClass::$project_name /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/views/ideas/view.php 52
ERROR - 2020-11-26 22:31:34 --> Severity: Notice --> Undefined property: stdClass::$project_name /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/views/ideas/view.php 52
ERROR - 2020-11-26 22:31:34 --> Severity: Notice --> Undefined property: stdClass::$project_name /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/views/ideas/view.php 52
ERROR - 2020-11-26 22:31:34 --> Severity: Notice --> Undefined property: stdClass::$project_name /home/xtdamuqx027d/public_html/saigeethaashram.org/my_test/application/views/ideas/view.php 52
