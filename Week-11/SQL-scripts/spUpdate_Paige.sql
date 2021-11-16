CREATE DEFINER=`mart461HCL`@`%` PROCEDURE `spUpdate_Paige`(in usersID varchar(45), in firstname varchar(45),
 in lastname varchar(45), in email varchar(45), in  hiddenkey varchar(45))
BEGIN
UPDATE paige_users SET firstname = @firstname, lastname = @lastname, email = @email, hiddenkey = @hiddenkey WHERE usersID = @usersID;
END