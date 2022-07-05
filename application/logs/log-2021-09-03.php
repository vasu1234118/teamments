<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-09-03 05:47:38 --> 404 Page Not Found: Faviconico/index
ERROR - 2021-09-03 12:30:17 --> Severity: Warning --> mysqli::query(): (21000/1242): Subquery returns more than 1 row /home/bdi8onyxofri/public_html/system/database/drivers/mysqli/mysqli_driver.php 307
ERROR - 2021-09-03 12:30:17 --> Query error: Subquery returns more than 1 row - Invalid query: SELECT (CONCAT((SELECT u.display_name FROM `tm_leaves` as tml LEFT JOIN tm_users u on u.id=tml.user_id where tml.id=tm_leaves.id), ' - ', tm_leaves.title)) as title, `from_date` as `start`, `to_date` as `end`, (SELECT CONCAT('#', 'dd4b39')) as backgroundColor, (SELECT CONCAT('#', 'dd4b39')) as borderColor
FROM `tm_leaves`
WHERE `flag` = 0
ORDER BY `from_date` ASC
 LIMIT 500
ERROR - 2021-09-03 12:30:17 --> Severity: error --> Exception: Call to a member function result() on bool /home/bdi8onyxofri/public_html/application/models/Common_model.php 263
ERROR - 2021-09-03 19:08:26 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-09-03 19:08:51 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-09-03 19:10:22 --> 404 Page Not Found: Adstxt/index
ERROR - 2021-09-03 19:10:24 --> 404 Page Not Found: Adstxt/index
