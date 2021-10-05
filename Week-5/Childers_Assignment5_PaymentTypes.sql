/****** Script for SelectTopNRows command from SSMS  ******/
INSERT INTO paymenttypes(paymenttype) VALUES
('Credit Card'),
('Paypal'),
('Square'),
('Check')


UPDATE paymenttypes SET paymenttype = 'Credit/Debit Card'
WHERE paymenttype = 'Credit Card'

DELETE FROM paymenttypes
WHERE paymentid = 3


SELECT [paymentid]
      ,[paymenttype]
  FROM [HCL].[dbo].[paymenttypes]