DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `createEmailList`(
    INOUT emailList varchar(4000)
)
BEGIN
    DECLARE finished INTEGER DEFAULT 0;
    DECLARE emailAddress varchar(100) DEFAULT "";
 
    -- declare cursor for employee email
    DEClARE curEmail 
        CURSOR FOR 
            SELECT email FROM tm_users;
 
    -- declare NOT FOUND handler
    DECLARE CONTINUE HANDLER 
        FOR NOT FOUND SET finished = 1;
 
    OPEN curEmail;
 
    getEmail: LOOP
        FETCH curEmail INTO emailAddress;
        IF finished = 1 THEN 
            LEAVE getEmail;
        END IF;
        -- build email list
        SET emailList = CONCAT(emailAddress,";",emailList);
    END LOOP getEmail;
    CLOSE curEmail;
 
END$$
DELIMITER ;


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_assigned_users`(IN `in_project_id` INT, OUT `au` VARCHAR(255), OUT `user_id` JSON, OUT `resolved` INT, OUT `disputed` INT)
BEGIN
        -- Getting the Project Assigned Users 
        SELECT
            assigned_to INTO au
        FROM
            tm_projects
        WHERE
            id = in_project_id;
            
            
         -- gett the all users in 
         SELECT 
            id into user_id 
         FROM
            tm_users 
         WHERE
             id IN (au);
         
 
       
 
END$$
DELIMITER ;



DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_order_by_cust`(OUT proj INT)
BEGIN
        -- shipped
        SELECT
            count(*) INTO proj
        FROM
            tm_projects
        WHERE
            tm_projects.id=17;

END$$
DELIMITER ;