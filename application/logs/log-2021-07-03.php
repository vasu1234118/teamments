<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-07-03 04:24:49 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-03 04:25:16 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\project\task\application\controllers\Taskinbox.php 89
ERROR - 2021-07-03 04:25:50 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-03 04:26:33 --> Severity: Warning --> mail(): Failed to connect to mailserver at &quot;localhost&quot; port 25, verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini or use ini_set() D:\xampp\htdocs\project\task\system\libraries\Email.php 1902
ERROR - 2021-07-03 04:26:54 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-03 04:27:16 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\project\task\application\controllers\Taskinbox.php 89
ERROR - 2021-07-03 08:32:24 --> Severity: Notice --> Undefined property: stdClass::$picture D:\xampp\htdocs\project\task\application\controllers\Welcome.php 47
ERROR - 2021-07-03 08:35:50 --> Severity: Warning --> mysqli::query(): (21000/1242): Subquery returns more than 1 row D:\xampp\htdocs\project\task\system\database\drivers\mysqli\mysqli_driver.php 307
ERROR - 2021-07-03 08:35:50 --> Query error: Subquery returns more than 1 row - Invalid query: SELECT (CONCAT((SELECT u.display_name FROM `tm_leaves` as tml LEFT JOIN tm_users u on u.id=tml.user_id where tml.id=tm_leaves.id), ' - ', tm_leaves.title)) as title, `from_date` as `start`, `to_date` as `end`, (SELECT CONCAT('#', 'dd4b39')) as backgroundColor, (SELECT CONCAT('#', 'dd4b39')) as borderColor
FROM `tm_leaves`
WHERE `flag` = 0
ORDER BY `from_date` ASC
 LIMIT 500
