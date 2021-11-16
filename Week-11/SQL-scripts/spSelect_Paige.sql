CREATE DEFINER=`mart461HCL`@`%` PROCEDURE `spDelete_Paige`(in usersID varchar(45), in firstname varchar(45),
 in lastname varchar(45), in email varchar(45), in  hiddenkey varchar(45))
BEGIN
SELECT * FROM paige_users;
END
