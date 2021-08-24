<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-04-03 20:50:39 --> Severity: Notice --> Undefined property: stdClass::$picture /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/controllers/Welcome.php 47
ERROR - 2021-04-03 21:11:59 --> Severity: Notice --> Undefined property: stdClass::$requrements /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/edit.php 170
ERROR - 2021-04-03 21:11:59 --> Severity: Notice --> Undefined property: stdClass::$sort_order /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/edit.php 179
ERROR - 2021-04-03 21:13:10 --> Severity: Notice --> Undefined property: stdClass::$requrements /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/edit.php 170
ERROR - 2021-04-03 21:13:10 --> Severity: Notice --> Undefined property: stdClass::$sort_order /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/edit.php 179
ERROR - 2021-04-03 21:13:28 --> 404 Page Not Found: Requirements/view
ERROR - 2021-04-03 21:13:39 --> Query error: Unknown column 'createtask_id' in 'where clause' - Invalid query: SELECT `id`, `file_name`
FROM `tm_requirements_attachments`
WHERE md5(createtask_id) = '6f4922f45568161a8cdf4ad2299f6d23'
ORDER BY `id` DESC
 LIMIT 30
ERROR - 2021-04-03 21:34:13 --> Query error: Unknown column 'createtask_id' in 'where clause' - Invalid query: SELECT `id`, `file_name`
FROM `tm_requirements_attachments`
WHERE md5(createtask_id) = '6f4922f45568161a8cdf4ad2299f6d23'
ORDER BY `id` DESC
 LIMIT 30
ERROR - 2021-04-03 21:34:18 --> Severity: Notice --> Undefined property: stdClass::$requrements /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/edit.php 170
ERROR - 2021-04-03 21:34:18 --> Severity: Notice --> Undefined property: stdClass::$sort_order /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/edit.php 179
ERROR - 2021-04-03 21:34:57 --> Query error: Unknown column 'createtask_id' in 'where clause' - Invalid query: SELECT `id`, `file_name`
FROM `tm_requirements_attachments`
WHERE md5(createtask_id) = '6f4922f45568161a8cdf4ad2299f6d23'
ORDER BY `id` DESC
 LIMIT 30
ERROR - 2021-04-03 21:35:21 --> Severity: Notice --> Undefined property: stdClass::$requrements /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/milestones/edit.php 58
ERROR - 2021-04-03 21:35:21 --> Severity: Notice --> Undefined variable: attachments /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/milestones/edit.php 108
ERROR - 2021-04-03 21:35:21 --> Severity: Notice --> Undefined property: stdClass::$assigned_date /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/milestones/edit.php 149
ERROR - 2021-04-03 21:35:21 --> Severity: Notice --> Undefined property: stdClass::$started_on /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/milestones/edit.php 156
ERROR - 2021-04-03 21:35:21 --> Severity: Notice --> Undefined property: stdClass::$estimated_ended_on /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/milestones/edit.php 163
ERROR - 2021-04-03 21:35:29 --> Query error: Unknown column 'ct.complexity' in 'on clause' - Invalid query: SELECT `ct`.*, `c`.`title` as `complexity_title`, `p`.`title` as `priority_title`
FROM `tm_milestones` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity`=`c`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority`=`p`.`id`
WHERE md5(ct.id) = 'd645920e395fedad7bbbed0eca3fe2e0'
ERROR - 2021-04-03 21:36:04 --> Severity: Notice --> Undefined property: stdClass::$requrements /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/milestones/edit.php 58
ERROR - 2021-04-03 21:36:04 --> Severity: Notice --> Undefined variable: attachments /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/milestones/edit.php 108
ERROR - 2021-04-03 21:36:04 --> Severity: Notice --> Undefined property: stdClass::$assigned_date /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/milestones/edit.php 149
ERROR - 2021-04-03 21:36:04 --> Severity: Notice --> Undefined property: stdClass::$started_on /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/milestones/edit.php 156
ERROR - 2021-04-03 21:36:04 --> Severity: Notice --> Undefined property: stdClass::$estimated_ended_on /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/milestones/edit.php 163
ERROR - 2021-04-03 21:36:17 --> Severity: Notice --> Undefined property: stdClass::$requrements /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/projects/edit.php 72
ERROR - 2021-04-03 21:36:26 --> Query error: Unknown column 'ct.complexity' in 'on clause' - Invalid query: SELECT `ct`.*, `c`.`title` as `complexity_title`, `p`.`title` as `priority_title`
FROM `tm_projects` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity`=`c`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority`=`p`.`id`
WHERE md5(ct.id) = '1679091c5a880faf6fb5e6087eb1b2dc'
ERROR - 2021-04-03 21:36:34 --> 404 Page Not Found: Projects/view
ERROR - 2021-04-03 21:36:50 --> Query error: Unknown column 'ct.complexity' in 'on clause' - Invalid query: SELECT `ct`.*, `c`.`title` as `complexity_title`, `p`.`title` as `priority_title`
FROM `tm_projects` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity`=`c`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority`=`p`.`id`
WHERE md5(ct.id) = '1679091c5a880faf6fb5e6087eb1b2dc'
ERROR - 2021-04-03 21:36:58 --> Severity: Notice --> Undefined property: stdClass::$requrements /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/projects/edit.php 72
ERROR - 2021-04-03 21:38:22 --> Severity: Notice --> Undefined property: stdClass::$requrements /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/edit.php 170
ERROR - 2021-04-03 21:38:22 --> Severity: Notice --> Undefined property: stdClass::$sort_order /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/edit.php 179
