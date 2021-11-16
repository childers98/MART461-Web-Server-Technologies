CREATE DEFINER=`mart461HCL`@`%` PROCEDURE `spDelete_Paige`(in usersID varchar(45), in firstname varchar(45),
 in lastname varchar(45), in email varchar(45), in  hiddenkey varchar(45))
BEGIN
DELETE FROM paige_users WHERE userID = @userID;
END
