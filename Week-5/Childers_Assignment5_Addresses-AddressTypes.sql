/****** Script for SelectTopNRows command from SSMS  ******/
--did both addresses and addresstypes all in one go

INSERT INTO addresses (zipcode, city) VALUES
('900005','Los Angeles'),
('123467', 'Somewhere Over the Rainbow')

UPDATE addresses SET zipcode = '123455'
WHERE zipcode = '123467'

DELETE FROM addresses
WHERE addressid = 2

--addresstypes inside of everything
INSERT INTO addresstypes (addresstype) VALUES
('Billing'),
('Mailing'),
('Main Office'),
('Other')  --accidentally added this too many times need to delete the repeats

DELETE FROM addresstypes
WHERE addresstypeid < 9

UPDATE addresstypes SET addresstype = 'Headquarters'
WHERE addresstypeid = 11

SELECT addressid, city, zipcode
	FROM [HCL].[dbo].[addresses]

SELECT addresstypeid, addresstype
FROM [HCL].[dbo].[addresstypes]

