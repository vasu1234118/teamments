<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-01-04 08:12:36 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-01-04 08:13:39 --> 404 Page Not Found: Adstxt/index
ERROR - 2022-01-04 08:13:39 --> 404 Page Not Found: Robotstxt/index
ERROR - 2022-01-04 08:13:52 --> 404 Page Not Found: Adstxt/index
ERROR - 2022-01-04 08:54:44 --> 404 Page Not Found: Faviconico/index
ERROR - 2022-01-04 08:59:26 --> 404 Page Not Found: Faviconico/index
ERROR - 2022-01-04 08:59:52 --> 404 Page Not Found: Faviconico/index
ERROR - 2022-01-04 12:47:28 --> 404 Page Not Found: Faviconico/index
ERROR - 2022-01-04 18:22:25 --> Severity: Warning --> mysqli::query(): (21000/1242): Subquery returns more than 1 row /home/bdi8onyxofri/public_html/system/database/drivers/mysqli/mysqli_driver.php 307
ERROR - 2022-01-04 18:22:25 --> Query error: Subquery returns more than 1 row - Invalid query: SELECT (CONCAT((SELECT u.display_name FROM `tm_leaves` as tml LEFT JOIN tm_users u on u.id=tml.user_id where tml.id=tm_leaves.id), ' - ', tm_leaves.title)) as title, `from_date` as `start`, `to_date` as `end`, (SELECT CONCAT('#', 'dd4b39')) as backgroundColor, (SELECT CONCAT('#', 'dd4b39')) as borderColor
FROM `tm_leaves`
WHERE `flag` = 0
ORDER BY `from_date` ASC
 LIMIT 500
ERROR - 2022-01-04 18:22:25 --> Severity: error --> Exception: Call to a member function result() on bool /home/bdi8onyxofri/public_html/application/models/Common_model.php 263
ERROR - 2022-01-04 18:38:20 --> Severity: Warning --> Invalid argument supplied for foreach() /home/bdi8onyxofri/public_html/application/views/assignedtasks/newproject.php 212
ERROR - 2022-01-04 13:21:47 --> 404 Page Not Found: Faviconico/index
ERROR - 2022-01-04 13:26:12 --> 404 Page Not Found: Faviconico/index
ERROR - 2022-01-04 13:31:38 --> 404 Page Not Found: Admin/index
