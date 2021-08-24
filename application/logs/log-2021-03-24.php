<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-03-24 09:14:09 --> Severity: Notice --> Undefined property: stdClass::$picture /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/controllers/Welcome.php 47
ERROR - 2021-03-24 09:14:20 --> Query error: Unknown column 'ct.complexity' in 'on clause' - Invalid query: SELECT `ct`.*, `c`.`title` as `complexity_title`, `p`.`title` as `priority_title`
FROM `tm_milestones` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity`=`c`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority`=`p`.`id`
WHERE md5(ct.id) = 'a5771bce93e200c36f7cd9dfd0e5deaa'
ERROR - 2021-03-24 09:15:45 --> Severity: Notice --> Undefined property: stdClass::$picture /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/controllers/Welcome.php 47
ERROR - 2021-03-24 09:16:16 --> Severity: Notice --> Undefined property: stdClass::$requrements /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/milestones/edit.php 58
ERROR - 2021-03-24 09:16:16 --> Severity: Notice --> Undefined variable: attachments /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/milestones/edit.php 108
ERROR - 2021-03-24 09:16:16 --> Severity: Notice --> Undefined property: stdClass::$assigned_date /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/milestones/edit.php 149
ERROR - 2021-03-24 09:16:16 --> Severity: Notice --> Undefined property: stdClass::$started_on /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/milestones/edit.php 156
ERROR - 2021-03-24 09:16:16 --> Severity: Notice --> Undefined property: stdClass::$estimated_ended_on /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/milestones/edit.php 163
ERROR - 2021-03-24 09:17:12 --> Query error: Unknown column 'ct.complexity' in 'on clause' - Invalid query: SELECT `ct`.*, `c`.`title` as `complexity_title`, `p`.`title` as `priority_title`
FROM `tm_milestones` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity`=`c`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority`=`p`.`id`
WHERE md5(ct.id) = 'a5771bce93e200c36f7cd9dfd0e5deaa'
ERROR - 2021-03-24 09:19:13 --> Severity: error --> Exception: Too few arguments to function Requirements::show(), 0 passed in /home/nrh68y2g7970/public_html/addsum.co/codeigniter/system/core/CodeIgniter.php on line 532 and exactly 1 expected /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/controllers/Requirements.php 214
ERROR - 2021-03-24 09:19:25 --> 404 Page Not Found: Requirements/view
ERROR - 2021-03-24 09:19:31 --> Severity: error --> Exception: Too few arguments to function Requirements::show(), 0 passed in /home/nrh68y2g7970/public_html/addsum.co/codeigniter/system/core/CodeIgniter.php on line 532 and exactly 1 expected /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/controllers/Requirements.php 214
ERROR - 2021-03-24 09:19:44 --> 404 Page Not Found: Assignedtasks/view
ERROR - 2021-03-24 09:27:28 --> Severity: Notice --> Undefined property: stdClass::$picture /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/controllers/Welcome.php 47
ERROR - 2021-03-24 09:29:34 --> Severity: Notice --> Undefined property: stdClass::$requrements /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/edit.php 170
ERROR - 2021-03-24 09:29:34 --> Severity: Notice --> Undefined property: stdClass::$sort_order /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/edit.php 179
ERROR - 2021-03-24 09:29:44 --> 404 Page Not Found: Requirements/view
ERROR - 2021-03-24 09:29:54 --> Severity: error --> Exception: Too few arguments to function Requirements::show(), 0 passed in /home/nrh68y2g7970/public_html/addsum.co/codeigniter/system/core/CodeIgniter.php on line 532 and exactly 1 expected /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/controllers/Requirements.php 214
ERROR - 2021-03-24 09:30:46 --> Severity: Notice --> Undefined property: stdClass::$requrements /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/edit.php 170
ERROR - 2021-03-24 09:30:46 --> Severity: Notice --> Undefined property: stdClass::$sort_order /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/edit.php 179
ERROR - 2021-03-24 09:36:06 --> Query error: Unknown column 'createtask_id' in 'where clause' - Invalid query: SELECT `id`, `file_name`
FROM `tm_requirements_attachments`
WHERE md5(createtask_id) = '70efdf2ec9b086079795c442636b55fb'
ORDER BY `id` DESC
 LIMIT 30
ERROR - 2021-03-24 09:44:24 --> Severity: Notice --> Undefined property: stdClass::$precautions /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/show.php 66
ERROR - 2021-03-24 09:44:24 --> Severity: Notice --> Undefined property: stdClass::$step_executed /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/show.php 80
ERROR - 2021-03-24 09:44:24 --> Severity: Notice --> Undefined property: stdClass::$started_on /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/show.php 97
ERROR - 2021-03-24 09:44:24 --> Severity: Notice --> Undefined property: stdClass::$estimated_ended_on /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/show.php 100
ERROR - 2021-03-24 09:44:24 --> Severity: Notice --> Undefined property: stdClass::$estimated_time_duration /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/show.php 103
ERROR - 2021-03-24 09:44:24 --> Severity: Notice --> Undefined property: stdClass::$started_on /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/show.php 127
ERROR - 2021-03-24 09:44:24 --> Severity: Notice --> Undefined property: stdClass::$estimated_ended_on /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/show.php 128
ERROR - 2021-03-24 09:44:24 --> Severity: Notice --> Undefined property: stdClass::$estimated_time_duration /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/show.php 129
ERROR - 2021-03-24 09:45:37 --> Severity: Notice --> Undefined property: stdClass::$precautions /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/show.php 66
ERROR - 2021-03-24 09:45:37 --> Severity: Notice --> Undefined property: stdClass::$step_executed /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/show.php 80
ERROR - 2021-03-24 09:45:37 --> Severity: Notice --> Undefined property: stdClass::$started_on /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/show.php 97
ERROR - 2021-03-24 09:45:37 --> Severity: Notice --> Undefined property: stdClass::$estimated_ended_on /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/show.php 100
ERROR - 2021-03-24 09:45:37 --> Severity: Notice --> Undefined property: stdClass::$estimated_time_duration /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/show.php 103
ERROR - 2021-03-24 09:45:37 --> Severity: Notice --> Undefined property: stdClass::$started_on /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/show.php 127
ERROR - 2021-03-24 09:45:37 --> Severity: Notice --> Undefined property: stdClass::$estimated_ended_on /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/show.php 128
ERROR - 2021-03-24 09:45:37 --> Severity: Notice --> Undefined property: stdClass::$estimated_time_duration /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/show.php 129
ERROR - 2021-03-24 09:46:21 --> Severity: Notice --> Undefined property: stdClass::$precautions /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/show.php 66
ERROR - 2021-03-24 09:46:21 --> Severity: Notice --> Undefined property: stdClass::$step_executed /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/show.php 80
ERROR - 2021-03-24 09:46:21 --> Severity: Notice --> Undefined property: stdClass::$started_on /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/show.php 97
ERROR - 2021-03-24 09:46:21 --> Severity: Notice --> Undefined property: stdClass::$estimated_ended_on /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/show.php 100
ERROR - 2021-03-24 09:46:21 --> Severity: Notice --> Undefined property: stdClass::$estimated_time_duration /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/show.php 103
ERROR - 2021-03-24 09:46:21 --> Severity: Notice --> Undefined property: stdClass::$started_on /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/show.php 127
ERROR - 2021-03-24 09:46:21 --> Severity: Notice --> Undefined property: stdClass::$estimated_ended_on /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/show.php 128
ERROR - 2021-03-24 09:46:21 --> Severity: Notice --> Undefined property: stdClass::$estimated_time_duration /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/show.php 129
ERROR - 2021-03-24 09:48:23 --> Severity: Notice --> Undefined property: stdClass::$requrements /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/edit.php 170
ERROR - 2021-03-24 09:48:23 --> Severity: Notice --> Undefined property: stdClass::$sort_order /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/edit.php 179
ERROR - 2021-03-24 09:49:21 --> Severity: Notice --> Undefined property: stdClass::$requrements /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/edit.php 170
ERROR - 2021-03-24 09:49:21 --> Severity: Notice --> Undefined property: stdClass::$sort_order /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/edit.php 179
ERROR - 2021-03-24 09:52:15 --> Query error: Unknown column 'createtask_id' in 'where clause' - Invalid query: SELECT `id`, `file_name`
FROM `tm_requirements_attachments`
WHERE md5(createtask_id) = '6f4922f45568161a8cdf4ad2299f6d23'
ORDER BY `id` DESC
 LIMIT 30
ERROR - 2021-03-24 09:54:54 --> Query error: Unknown column 'createtask_id' in 'where clause' - Invalid query: SELECT `id`, `file_name`
FROM `tm_requirements_attachments`
WHERE md5(createtask_id) = '6f4922f45568161a8cdf4ad2299f6d23'
ORDER BY `id` DESC
 LIMIT 30
ERROR - 2021-03-24 09:56:59 --> Query error: Unknown column 'createtask_id' in 'where clause' - Invalid query: SELECT `id`, `file_name`
FROM `tm_requirements_attachments`
WHERE md5(createtask_id) = '6f4922f45568161a8cdf4ad2299f6d23'
ORDER BY `id` DESC
 LIMIT 30
ERROR - 2021-03-24 09:57:13 --> Query error: Unknown column 'createtask_id' in 'where clause' - Invalid query: SELECT `id`, `file_name`
FROM `tm_requirements_attachments`
WHERE md5(createtask_id) = '70efdf2ec9b086079795c442636b55fb'
ORDER BY `id` DESC
 LIMIT 30
ERROR - 2021-03-24 10:01:13 --> Query error: Unknown column 'createtask_id' in 'where clause' - Invalid query: SELECT `id`, `file_name`
FROM `tm_requirements_attachments`
WHERE md5(createtask_id) = '6f4922f45568161a8cdf4ad2299f6d23'
ORDER BY `id` DESC
 LIMIT 30
ERROR - 2021-03-24 10:03:49 --> Severity: Notice --> Undefined property: stdClass::$requrements /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/edit.php 170
ERROR - 2021-03-24 10:03:49 --> Severity: Notice --> Undefined property: stdClass::$sort_order /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/edit.php 179
