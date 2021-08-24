<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-03-29 12:12:05 --> Severity: Notice --> Undefined property: stdClass::$picture /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/controllers/Welcome.php 47
ERROR - 2021-03-29 12:16:34 --> Query error: Unknown column 'createtask_id' in 'where clause' - Invalid query: SELECT `id`, `file_name`
FROM `tm_requirements_attachments`
WHERE md5(createtask_id) = '6f4922f45568161a8cdf4ad2299f6d23'
ORDER BY `id` DESC
 LIMIT 30
ERROR - 2021-03-29 12:17:09 --> Severity: Notice --> Undefined property: stdClass::$requrements /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/edit.php 170
ERROR - 2021-03-29 12:17:09 --> Severity: Notice --> Undefined property: stdClass::$sort_order /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/views/requirements/edit.php 179
ERROR - 2021-03-29 12:17:15 --> Query error: Unknown column 'ct.complexity' in 'on clause' - Invalid query: SELECT `ct`.*, `c`.`title` as `complexity_title`, `p`.`title` as `priority_title`
FROM `tm_milestones` `ct`
JOIN `tm_complexity` `c` ON `ct`.`complexity`=`c`.`id`
JOIN `tm_priority` `p` ON `ct`.`priority`=`p`.`id`
WHERE md5(ct.id) = 'a5771bce93e200c36f7cd9dfd0e5deaa'
ERROR - 2021-03-29 13:03:37 --> Severity: Notice --> Undefined property: stdClass::$picture /home/nrh68y2g7970/public_html/addsum.co/codeigniter/application/controllers/Welcome.php 47
