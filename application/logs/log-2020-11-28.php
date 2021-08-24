<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-11-28 10:44:52 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'db_test_r1'@'localhost' (using password: YES) C:\xampp1\htdocs\task1\system\database\drivers\mysqli\mysqli_driver.php 203
ERROR - 2020-11-28 10:44:52 --> Unable to connect to the database
ERROR - 2020-11-28 10:49:24 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'db_test_r1'@'localhost' (using password: YES) C:\xampp1\htdocs\task1\system\database\drivers\mysqli\mysqli_driver.php 203
ERROR - 2020-11-28 10:49:24 --> Unable to connect to the database
ERROR - 2020-11-28 10:49:26 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'db_test_r1'@'localhost' (using password: YES) C:\xampp1\htdocs\task1\system\database\drivers\mysqli\mysqli_driver.php 203
ERROR - 2020-11-28 10:49:26 --> Unable to connect to the database
ERROR - 2020-11-28 10:50:24 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'db_test_r1'@'localhost' (using password: YES) C:\xampp1\htdocs\task1\system\database\drivers\mysqli\mysqli_driver.php 203
ERROR - 2020-11-28 10:50:24 --> Unable to connect to the database
ERROR - 2020-11-28 10:50:25 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'db_test_r1'@'localhost' (using password: YES) C:\xampp1\htdocs\task1\system\database\drivers\mysqli\mysqli_driver.php 203
ERROR - 2020-11-28 10:50:25 --> Unable to connect to the database
ERROR - 2020-11-28 10:50:26 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'db_test_r1'@'localhost' (using password: YES) C:\xampp1\htdocs\task1\system\database\drivers\mysqli\mysqli_driver.php 203
ERROR - 2020-11-28 10:50:26 --> Unable to connect to the database
ERROR - 2020-11-28 10:50:26 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'db_test_r1'@'localhost' (using password: YES) C:\xampp1\htdocs\task1\system\database\drivers\mysqli\mysqli_driver.php 203
ERROR - 2020-11-28 10:50:26 --> Unable to connect to the database
ERROR - 2020-11-28 10:50:27 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'db_test_r1'@'localhost' (using password: YES) C:\xampp1\htdocs\task1\system\database\drivers\mysqli\mysqli_driver.php 203
ERROR - 2020-11-28 10:50:27 --> Unable to connect to the database
ERROR - 2020-11-28 10:50:27 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'db_test_r1'@'localhost' (using password: YES) C:\xampp1\htdocs\task1\system\database\drivers\mysqli\mysqli_driver.php 203
ERROR - 2020-11-28 10:50:27 --> Unable to connect to the database
ERROR - 2020-11-28 10:52:36 --> Severity: Notice --> Undefined property: stdClass::$picture C:\xampp1\htdocs\task1\application\controllers\Welcome.php 47
ERROR - 2020-11-28 10:53:16 --> Severity: Warning --> mail(): Failed to connect to mailserver at &quot;localhost&quot; port 25, verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini or use ini_set() C:\xampp1\htdocs\task1\system\libraries\Email.php 1902
ERROR - 2020-11-28 11:16:56 --> Severity: Notice --> Undefined property: stdClass::$picture C:\xampp1\htdocs\task1\application\controllers\Welcome.php 47
ERROR - 2020-11-28 11:17:07 --> Query error: Table 'db_test_r1.tm_task_attachments' doesn't exist - Invalid query: SELECT `t`.*, `s`.`title` as `status`, `u`.`display_name`, (SELECT GROUP_CONCAT(tm_task_attachments.file_name  SEPARATOR ', ')   FROM `tm_task_attachments`
		WHERE createtask_id= '13') as user_attachments
FROM `tm_tasks` `t`
JOIN `tm_users` `u` ON `t`.`user_id` = `u`.`id`
JOIN `tm_status` `s` ON `t`.`status` = `s`.`id`
WHERE `createtask_id` IN (13)
ORDER BY `t`.`id` DESC
ERROR - 2020-11-28 11:35:41 --> Severity: Notice --> Undefined property: stdClass::$picture C:\xampp1\htdocs\task1\application\controllers\Welcome.php 47
ERROR - 2020-11-28 11:50:17 --> Query error: Duplicate entry '0' for key 'PRIMARY' - Invalid query: INSERT INTO `tm_users` (`username`, `password`, `role`, `status`, `fname`, `lname`, `gender`, `address`, `city`, `state`, `country`, `technology`, `doj`, `dol`, `email`, `alternate_email`, `display_name`, `phone`, `designation`, `created_by`) VALUES ('Navaneetha', 'MTIzNDU=', '4', '1', 'Navaneetha', 'S', 'F', '', '', '', '', '', '', '', 'navneetha@digitowork.com', 'navneetha@digitowork.com', 'Navaneetha', '', '', '20')
ERROR - 2020-11-28 12:11:31 --> Query error: Duplicate entry '0' for key 'PRIMARY' - Invalid query: INSERT INTO `tm_users` (`username`, `password`, `role`, `status`, `fname`, `lname`, `gender`, `address`, `city`, `state`, `country`, `technology`, `doj`, `dol`, `email`, `alternate_email`, `display_name`, `phone`, `designation`, `created_by`) VALUES ('Navaneetha', 'MTIzNDU=', '4', '1', 'Navaneetha', 'S', 'F', '', '', '', '', '', '', '', 'navneetha@digitowork.com', 'navneetha@digitowork.com', 'Navaneetha', '', '', '20')
ERROR - 2020-11-28 12:13:45 --> Query error: Duplicate entry '0' for key 'PRIMARY' - Invalid query: INSERT INTO `tm_users` (`username`, `password`, `role`, `status`, `fname`, `lname`, `gender`, `address`, `city`, `state`, `country`, `technology`, `doj`, `dol`, `email`, `alternate_email`, `display_name`, `phone`, `designation`, `created_by`) VALUES ('Navaneetha', 'MTIzNDU=', '4', '1', 'Navaneetha', 'S', 'F', '', '', '', '', '', '', '', 'navneetha@digitowork.com', 'navneetha@digitowork.com', 'Navaneetha', '', '', '20')
ERROR - 2020-11-28 12:14:56 --> Severity: Notice --> Undefined property: stdClass::$picture C:\xampp1\htdocs\task1\application\controllers\Welcome.php 47
ERROR - 2020-11-28 12:15:11 --> Severity: Notice --> Undefined property: stdClass::$picture C:\xampp1\htdocs\task1\application\controllers\Welcome.php 47
ERROR - 2020-11-28 12:15:14 --> Severity: Notice --> Undefined property: stdClass::$start_date C:\xampp1\htdocs\task1\application\views\projects\view.php 51
ERROR - 2020-11-28 12:15:14 --> Severity: Notice --> Undefined property: stdClass::$end_date C:\xampp1\htdocs\task1\application\views\projects\view.php 52
ERROR - 2020-11-28 12:15:14 --> Severity: Notice --> Undefined property: stdClass::$start_date C:\xampp1\htdocs\task1\application\views\projects\view.php 51
ERROR - 2020-11-28 12:15:14 --> Severity: Notice --> Undefined property: stdClass::$end_date C:\xampp1\htdocs\task1\application\views\projects\view.php 52
ERROR - 2020-11-28 12:15:14 --> Severity: Notice --> Undefined property: stdClass::$start_date C:\xampp1\htdocs\task1\application\views\projects\view.php 51
ERROR - 2020-11-28 12:15:14 --> Severity: Notice --> Undefined property: stdClass::$end_date C:\xampp1\htdocs\task1\application\views\projects\view.php 52
ERROR - 2020-11-28 12:15:14 --> Severity: Notice --> Undefined property: stdClass::$start_date C:\xampp1\htdocs\task1\application\views\projects\view.php 51
ERROR - 2020-11-28 12:15:14 --> Severity: Notice --> Undefined property: stdClass::$end_date C:\xampp1\htdocs\task1\application\views\projects\view.php 52
ERROR - 2020-11-28 12:22:11 --> Severity: Notice --> Undefined property: stdClass::$start_date C:\xampp1\htdocs\task1\application\views\projects\view.php 51
ERROR - 2020-11-28 12:22:11 --> Severity: Notice --> Undefined property: stdClass::$end_date C:\xampp1\htdocs\task1\application\views\projects\view.php 52
ERROR - 2020-11-28 12:22:11 --> Severity: Notice --> Undefined property: stdClass::$start_date C:\xampp1\htdocs\task1\application\views\projects\view.php 51
ERROR - 2020-11-28 12:22:11 --> Severity: Notice --> Undefined property: stdClass::$end_date C:\xampp1\htdocs\task1\application\views\projects\view.php 52
ERROR - 2020-11-28 12:22:11 --> Severity: Notice --> Undefined property: stdClass::$start_date C:\xampp1\htdocs\task1\application\views\projects\view.php 51
ERROR - 2020-11-28 12:22:11 --> Severity: Notice --> Undefined property: stdClass::$end_date C:\xampp1\htdocs\task1\application\views\projects\view.php 52
ERROR - 2020-11-28 12:22:11 --> Severity: Notice --> Undefined property: stdClass::$start_date C:\xampp1\htdocs\task1\application\views\projects\view.php 51
ERROR - 2020-11-28 12:22:11 --> Severity: Notice --> Undefined property: stdClass::$end_date C:\xampp1\htdocs\task1\application\views\projects\view.php 52
ERROR - 2020-11-28 12:23:47 --> Severity: Notice --> Undefined property: stdClass::$start_date C:\xampp1\htdocs\task1\application\views\projects\view.php 51
ERROR - 2020-11-28 12:23:47 --> Severity: Notice --> Undefined property: stdClass::$end_date C:\xampp1\htdocs\task1\application\views\projects\view.php 52
ERROR - 2020-11-28 12:23:47 --> Severity: Notice --> Undefined property: stdClass::$start_date C:\xampp1\htdocs\task1\application\views\projects\view.php 51
ERROR - 2020-11-28 12:23:47 --> Severity: Notice --> Undefined property: stdClass::$end_date C:\xampp1\htdocs\task1\application\views\projects\view.php 52
ERROR - 2020-11-28 12:23:47 --> Severity: Notice --> Undefined property: stdClass::$start_date C:\xampp1\htdocs\task1\application\views\projects\view.php 51
ERROR - 2020-11-28 12:23:47 --> Severity: Notice --> Undefined property: stdClass::$end_date C:\xampp1\htdocs\task1\application\views\projects\view.php 52
ERROR - 2020-11-28 12:23:47 --> Severity: Notice --> Undefined property: stdClass::$start_date C:\xampp1\htdocs\task1\application\views\projects\view.php 51
ERROR - 2020-11-28 12:23:47 --> Severity: Notice --> Undefined property: stdClass::$end_date C:\xampp1\htdocs\task1\application\views\projects\view.php 52
ERROR - 2020-11-28 12:24:23 --> Severity: Parsing Error --> syntax error, unexpected 'else' (T_ELSE) C:\xampp1\htdocs\task1\application\views\projects\view.php 57
ERROR - 2020-11-28 12:24:41 --> Severity: Notice --> Undefined property: stdClass::$start_date C:\xampp1\htdocs\task1\application\views\projects\view.php 51
ERROR - 2020-11-28 12:24:41 --> Severity: Notice --> Undefined property: stdClass::$end_date C:\xampp1\htdocs\task1\application\views\projects\view.php 52
ERROR - 2020-11-28 12:24:41 --> Severity: Notice --> Undefined property: stdClass::$start_date C:\xampp1\htdocs\task1\application\views\projects\view.php 51
ERROR - 2020-11-28 12:24:41 --> Severity: Notice --> Undefined property: stdClass::$end_date C:\xampp1\htdocs\task1\application\views\projects\view.php 52
ERROR - 2020-11-28 12:24:41 --> Severity: Notice --> Undefined property: stdClass::$start_date C:\xampp1\htdocs\task1\application\views\projects\view.php 51
ERROR - 2020-11-28 12:24:41 --> Severity: Notice --> Undefined property: stdClass::$end_date C:\xampp1\htdocs\task1\application\views\projects\view.php 52
ERROR - 2020-11-28 12:24:41 --> Severity: Notice --> Undefined property: stdClass::$start_date C:\xampp1\htdocs\task1\application\views\projects\view.php 51
ERROR - 2020-11-28 12:24:41 --> Severity: Notice --> Undefined property: stdClass::$end_date C:\xampp1\htdocs\task1\application\views\projects\view.php 52
ERROR - 2020-11-28 12:30:14 --> Severity: Notice --> Undefined property: stdClass::$start_date C:\xampp1\htdocs\task1\application\views\projects\view.php 51
ERROR - 2020-11-28 12:30:14 --> Severity: Notice --> Undefined property: stdClass::$end_date C:\xampp1\htdocs\task1\application\views\projects\view.php 52
ERROR - 2020-11-28 12:30:14 --> Severity: Notice --> Undefined property: stdClass::$start_date C:\xampp1\htdocs\task1\application\views\projects\view.php 51
ERROR - 2020-11-28 12:30:14 --> Severity: Notice --> Undefined property: stdClass::$end_date C:\xampp1\htdocs\task1\application\views\projects\view.php 52
ERROR - 2020-11-28 12:30:14 --> Severity: Notice --> Undefined property: stdClass::$start_date C:\xampp1\htdocs\task1\application\views\projects\view.php 51
ERROR - 2020-11-28 12:30:14 --> Severity: Notice --> Undefined property: stdClass::$end_date C:\xampp1\htdocs\task1\application\views\projects\view.php 52
ERROR - 2020-11-28 12:30:14 --> Severity: Notice --> Undefined property: stdClass::$start_date C:\xampp1\htdocs\task1\application\views\projects\view.php 51
ERROR - 2020-11-28 12:30:14 --> Severity: Notice --> Undefined property: stdClass::$end_date C:\xampp1\htdocs\task1\application\views\projects\view.php 52
ERROR - 2020-11-28 12:34:53 --> Severity: Notice --> A non well formed numeric value encountered C:\xampp1\htdocs\task1\application\views\projects\view.php 51
ERROR - 2020-11-28 12:34:54 --> Severity: Notice --> A non well formed numeric value encountered C:\xampp1\htdocs\task1\application\views\projects\view.php 51
ERROR - 2020-11-28 12:34:54 --> Severity: Notice --> A non well formed numeric value encountered C:\xampp1\htdocs\task1\application\views\projects\view.php 51
ERROR - 2020-11-28 12:34:54 --> Severity: Notice --> A non well formed numeric value encountered C:\xampp1\htdocs\task1\application\views\projects\view.php 51
ERROR - 2020-11-28 12:36:55 --> Query error: Unknown column 'start_date' in 'field list' - Invalid query: INSERT INTO `tm_projects` (`name`, `start_date`, `end_date`, `description`, `status`, `assigned_to`, `created_at`, `created_by`) VALUES ('BRS', '2020-11-28', '2020-11-30', '<p>webs5ye</p>\r\n', '1', '36', '2020-11-28 12:36:55', '20')
ERROR - 2020-11-28 12:40:19 --> Severity: Notice --> Undefined index: updated_at C:\xampp1\htdocs\task1\application\controllers\Projects.php 75
ERROR - 2020-11-28 12:40:19 --> Query error: Unknown column 'start_date' in 'field list' - Invalid query: INSERT INTO `tm_projects` (`name`, `start_date`, `end_date`, `description`, `status`, `assigned_to`, `created_at`, `created_by`, `updated_at`) VALUES ('BRS', '28-Nov-2020', '30-Nov-2020', '<p>webs5ye</p>\r\n', '1', '36', '2020-11-28', '20', '1970-01-01')
ERROR - 2020-11-28 12:41:43 --> Query error: Unknown column 'start_date' in 'field list' - Invalid query: INSERT INTO `tm_projects` (`name`, `start_date`, `end_date`, `description`, `status`, `assigned_to`, `created_at`, `created_by`, `updated_at`) VALUES ('BRS', '28-Nov-2020', '30-Nov-2020', '<p>webs5ye</p>\r\n', '1', '36', '2020-11-28', '20', '2020-11-28')
ERROR - 2020-11-28 12:50:03 --> Query error: Unknown column 'start_date' in 'field list' - Invalid query: INSERT INTO `tm_projects` (`name`, `start_date`, `end_date`, `description`, `status`, `assigned_to`, `created_at`, `created_by`, `deleted_at`) VALUES ('BRS', '28-Nov-2020', '30-Nov-2020', '<p>webs5te</p>\r\n', '1', '33', '2020-11-28', '20', '2020-11-30')
ERROR - 2020-11-28 12:52:11 --> Query error: Unknown column 'start_date' in 'field list' - Invalid query: INSERT INTO `tm_projects` (`name`, `start_date`, `end_date`, `description`, `status`, `assigned_to`, `created_at`, `created_by`, `deleted_at`) VALUES ('BRS', '28-Nov-2020', '30-Nov-2020', '<p>webs5te</p>\r\n', '1', '33', '2020-11-28', '20', '2020-11-30')
ERROR - 2020-11-28 12:53:01 --> Query error: Unknown column 'start_date' in 'field list' - Invalid query: INSERT INTO `tm_projects` (`name`, `start_date`, `end_date`, `description`, `status`, `assigned_to`, `created_at`, `created_by`, `deleted_at`) VALUES ('BRS', '28-Nov-2020', '30-Nov-2020', '<p>webs5te</p>\r\n', '1', '33', '2020-11-28', '20', '2020-11-28')
ERROR - 2020-11-28 12:53:32 --> Query error: Unknown column 'start_date' in 'field list' - Invalid query: INSERT INTO `tm_projects` (`name`, `start_date`, `end_date`, `description`, `status`, `assigned_to`, `created_at`, `created_by`, `deleted_at`) VALUES ('BRS', '28-Nov-2020', '30-Nov-2020', '<p>aaaa</p>\r\n', '1', '36', '2020-11-28', '20', '2020-11-28')
ERROR - 2020-11-28 12:55:23 --> Query error: Unknown column 'start_date' in 'field list' - Invalid query: INSERT INTO `tm_projects` (`name`, `start_date`, `end_date`, `description`, `status`, `assigned_to`, `created_at`, `created_by`, `deleted_at`) VALUES ('BRS', '28-Nov-2020', '30-Nov-2020', '<p>aaaa</p>\r\n', '1', '36', '2020-11-28 12:55:23', '20', '2020-11-28')
ERROR - 2020-11-28 12:55:56 --> Query error: Unknown column 'start_date' in 'field list' - Invalid query: INSERT INTO `tm_projects` (`name`, `start_date`, `end_date`, `description`, `status`, `assigned_to`, `created_at`, `created_by`, `deleted_at`) VALUES ('navaneetha', '28-Nov-2020', '30-Nov-2020', '<p>qqq</p>\r\n', '1', '36', '2020-11-28 12:55:56', '20', '2020-11-28')
ERROR - 2020-11-28 12:59:43 --> Query error: Unknown column 'start_date' in 'field list' - Invalid query: INSERT INTO `tm_projects` (`name`, `start_date`, `end_date`, `description`, `status`, `assigned_to`, `created_at`, `created_by`, `deleted_at`) VALUES ('navaneetha', '28-Nov-2020', '30-Nov-2020', '<p>qqq</p>\r\n', '1', '36', '28-Nov-2020', '20', NULL)
ERROR - 2020-11-28 13:00:23 --> Query error: Unknown column 'start_date' in 'field list' - Invalid query: INSERT INTO `tm_projects` (`name`, `start_date`, `end_date`, `description`, `status`, `assigned_to`, `created_at`, `created_by`) VALUES ('navaneetha', '28-Nov-2020', '30-Nov-2020', '<p>qqq</p>\r\n', '1', '36', '2020-11-28 13:00:23', '20')
ERROR - 2020-11-28 13:02:25 --> Query error: Unknown column 'start_date' in 'field list' - Invalid query: INSERT INTO `tm_projects` (`name`, `start_date`, `end_date`, `description`, `status`, `assigned_to`, `created_at`, `created_by`) VALUES ('navaneetha', '28-Nov-2020', '30-Nov-2020', '<p>qqq</p>\r\n', '1', '36', '2020-11-28 13:02:25', '20')
ERROR - 2020-11-28 13:17:53 --> Severity: Notice --> Undefined property: stdClass::$requrements C:\xampp1\htdocs\task1\application\views\projects\edit.php 72
ERROR - 2020-11-28 13:17:53 --> Severity: Notice --> Undefined property: stdClass::$start_date C:\xampp1\htdocs\task1\application\views\projects\edit.php 160
ERROR - 2020-11-28 13:17:53 --> Severity: Notice --> Undefined property: stdClass::$start_date C:\xampp1\htdocs\task1\application\views\projects\edit.php 160
ERROR - 2020-11-28 13:17:53 --> Severity: Notice --> Undefined property: stdClass::$end_date C:\xampp1\htdocs\task1\application\views\projects\edit.php 167
ERROR - 2020-11-28 13:17:53 --> Severity: Notice --> Undefined property: stdClass::$end_date C:\xampp1\htdocs\task1\application\views\projects\edit.php 167
ERROR - 2020-11-28 13:18:07 --> Query error: Unknown column 'start_date' in 'field list' - Invalid query: UPDATE `tm_projects` SET `name` = 'Asset Mgt', `start_date` = '', `end_date` = '', `description` = '<p>Its an asset management project</p>\r\n', `status` = '1', `assigned_to` = '32,33,37', `flag` = 0, `created_at` = '2020-11-28 13:18:07', `created_by` = '20', `deleted_at` = '1970-01-01'
WHERE md5(id) = 'a87ff679a2f3e71d9181a67b7542122c'
ERROR - 2020-11-28 13:18:29 --> Severity: Notice --> Undefined property: stdClass::$requrements C:\xampp1\htdocs\task1\application\views\projects\edit.php 72
ERROR - 2020-11-28 13:18:29 --> Severity: Notice --> Undefined property: stdClass::$start_date C:\xampp1\htdocs\task1\application\views\projects\edit.php 160
ERROR - 2020-11-28 13:18:29 --> Severity: Notice --> Undefined property: stdClass::$start_date C:\xampp1\htdocs\task1\application\views\projects\edit.php 160
ERROR - 2020-11-28 13:18:29 --> Severity: Notice --> Undefined property: stdClass::$end_date C:\xampp1\htdocs\task1\application\views\projects\edit.php 167
ERROR - 2020-11-28 13:18:29 --> Severity: Notice --> Undefined property: stdClass::$end_date C:\xampp1\htdocs\task1\application\views\projects\edit.php 167
ERROR - 2020-11-28 13:21:37 --> Severity: Notice --> Undefined property: stdClass::$picture C:\xampp1\htdocs\task1\application\controllers\Welcome.php 47
ERROR - 2020-11-28 14:27:31 --> Severity: Notice --> Undefined property: stdClass::$project_name C:\xampp1\htdocs\task1\application\views\ideas\view.php 52
ERROR - 2020-11-28 14:27:31 --> Severity: Notice --> Undefined property: stdClass::$project_name C:\xampp1\htdocs\task1\application\views\ideas\view.php 52
ERROR - 2020-11-28 14:27:31 --> Severity: Notice --> Undefined property: stdClass::$project_name C:\xampp1\htdocs\task1\application\views\ideas\view.php 52
ERROR - 2020-11-28 14:27:31 --> Severity: Notice --> Undefined property: stdClass::$project_name C:\xampp1\htdocs\task1\application\views\ideas\view.php 52
ERROR - 2020-11-28 14:27:31 --> Severity: Notice --> Undefined property: stdClass::$project_name C:\xampp1\htdocs\task1\application\views\ideas\view.php 52
ERROR - 2020-11-28 14:27:31 --> Severity: Notice --> Undefined property: stdClass::$project_name C:\xampp1\htdocs\task1\application\views\ideas\view.php 52
ERROR - 2020-11-28 14:27:31 --> Severity: Notice --> Undefined property: stdClass::$project_name C:\xampp1\htdocs\task1\application\views\ideas\view.php 52
ERROR - 2020-11-28 14:27:31 --> Severity: Notice --> Undefined property: stdClass::$project_name C:\xampp1\htdocs\task1\application\views\ideas\view.php 52
ERROR - 2020-11-28 14:27:57 --> Severity: Notice --> Undefined property: stdClass::$project_name C:\xampp1\htdocs\task1\application\views\ideas\view.php 52
ERROR - 2020-11-28 14:27:57 --> Severity: Notice --> Undefined property: stdClass::$project_name C:\xampp1\htdocs\task1\application\views\ideas\view.php 52
ERROR - 2020-11-28 14:27:57 --> Severity: Notice --> Undefined property: stdClass::$project_name C:\xampp1\htdocs\task1\application\views\ideas\view.php 52
ERROR - 2020-11-28 14:27:57 --> Severity: Notice --> Undefined property: stdClass::$project_name C:\xampp1\htdocs\task1\application\views\ideas\view.php 52
ERROR - 2020-11-28 14:27:57 --> Severity: Notice --> Undefined property: stdClass::$project_name C:\xampp1\htdocs\task1\application\views\ideas\view.php 52
ERROR - 2020-11-28 14:27:57 --> Severity: Notice --> Undefined property: stdClass::$project_name C:\xampp1\htdocs\task1\application\views\ideas\view.php 52
ERROR - 2020-11-28 14:27:57 --> Severity: Notice --> Undefined property: stdClass::$project_name C:\xampp1\htdocs\task1\application\views\ideas\view.php 52
ERROR - 2020-11-28 14:27:57 --> Severity: Notice --> Undefined property: stdClass::$project_name C:\xampp1\htdocs\task1\application\views\ideas\view.php 52
ERROR - 2020-11-28 14:28:05 --> Severity: Notice --> Undefined property: stdClass::$requrements C:\xampp1\htdocs\task1\application\views\ideas\show.php 83
ERROR - 2020-11-28 14:28:05 --> Severity: Notice --> Undefined property: stdClass::$assigned_date C:\xampp1\htdocs\task1\application\views\ideas\show.php 181
ERROR - 2020-11-28 14:28:05 --> Severity: Notice --> Undefined property: stdClass::$started_on C:\xampp1\htdocs\task1\application\views\ideas\show.php 188
ERROR - 2020-11-28 14:28:05 --> Severity: Notice --> Undefined property: stdClass::$estimated_ended_on C:\xampp1\htdocs\task1\application\views\ideas\show.php 195
ERROR - 2020-11-28 14:30:30 --> Severity: Notice --> Undefined variable: priority C:\xampp1\htdocs\task1\application\views\milestones\new.php 89
ERROR - 2020-11-28 14:30:30 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp1\htdocs\task1\application\views\milestones\new.php 89
ERROR - 2020-11-28 14:30:55 --> Severity: Notice --> Undefined property: stdClass::$requrements C:\xampp1\htdocs\task1\application\views\milestones\edit.php 58
ERROR - 2020-11-28 14:30:55 --> Severity: Notice --> Undefined variable: attachments C:\xampp1\htdocs\task1\application\views\milestones\edit.php 108
ERROR - 2020-11-28 14:30:55 --> Severity: Notice --> Undefined property: stdClass::$assigned_date C:\xampp1\htdocs\task1\application\views\milestones\edit.php 149
ERROR - 2020-11-28 14:30:55 --> Severity: Notice --> Undefined property: stdClass::$started_on C:\xampp1\htdocs\task1\application\views\milestones\edit.php 156
ERROR - 2020-11-28 14:30:55 --> Severity: Notice --> Undefined property: stdClass::$estimated_ended_on C:\xampp1\htdocs\task1\application\views\milestones\edit.php 163
ERROR - 2020-11-28 14:31:03 --> Severity: Notice --> Undefined index: attachments C:\xampp1\htdocs\task1\application\controllers\Milestones.php 153
