/****** Script for SelectTopNRows command from SSMS  ******/
INSERT usersHCL (firstname, lastname, jobtitle, email) VALUES
('Joe','Doe', 'Assistant', '1234@gmail.com'),
('John', 'Doe', 'CEO', 'johndoes@yahoo.com'),
('Daisy', 'Jones', 'Analyst', 'dj@hotmail.com')


DELETE FROM usersHCL
WHERE firstname = 'Daisy' --deleted entire row? How do I only delete one value? Is that even possible

UPDATE usersHCL SET firstname = 'Jane'
WHERE firstname = 'Joe'

SELECT [userId]
      ,[username]
      ,[pwd]
      ,[firstname]
      ,[lastname]
      ,[organizationname]
      ,[jobtitle]
      ,[paymentdate]
      ,[email]
      ,[paymentreceived]
      ,[paymentid]
  FROM [HCL].[dbo].[usersHCL]