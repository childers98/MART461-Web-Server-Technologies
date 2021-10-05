/****** Script for SelectTopNRows command from SSMS  ******/

INSERT INTO states (statename, stateabbreviation) VALUES ('Alabama', 'AL')
INSERT INTO states (statename, stateabbreviation) VALUES ('Alaska', 'AK') --inserted twice

--fix Alaska being inserted twice
UPDATE states SET statename = 'Arizona', 
stateabbreviation = 'AZ'
WHERE stateid = 3

DELETE FROM states 
WHERE stateid = 1  -- deletes the entirety of row 1

SELECT * FROM states
INNER JOIN addresses ON states.statename = addresses.stateid;  -- join states with the address table

INSERT INTO states (stateabbreviation, statename) VALUES
('AL', 'Alabama'),
('AR', 'Arkansas'),
('CA', 'California'),
('CO', 'Colorado'),
('CT', 'Connecticut'),
('DE', 'Delaware'),
('DC', 'District of Columbia'),
('FL', 'Florida'),
('GA', 'Georgia'),
('HI', 'Hawaii'),
('ID', 'Idaho'),
('IL', 'Illinois'),
('IN', 'Indiana'),
('IA', 'Iowa'),
('KS', 'Kansas'),
('KY', 'Kentucky'),
('LA', 'Louisiana'),
('ME', 'Maine'),
('MD', 'Maryland'),
('MA', 'Massachusetts'),
('MI', 'Michigan'),
('MN', 'Minnesota'),
('MS', 'Mississippi'),
('MO', 'Missouri'),
('MT', 'Montana'),
('NE', 'Nebraska'),
('NV', 'Nevada'),
('NH', 'New Hampshire'),
('NJ', 'New Jersey'),
('NM', 'New Mexico'),
('NY', 'New York'),
('NC', 'North Carolina'),
('ND', 'North Dakota'),
('OH', 'Ohio'),
('OK', 'Oklahoma'),
('OR', 'Oregon'),
('PA', 'Pennsylvania'),
('PR', 'Puerto Rico'),
('RI', 'Rhode Island'),
('SC', 'South Carolina'),
('SD', 'South Dakota'),
('TN', 'Tennessee'),
('TX', 'Texas'),
('UT', 'Utah'),
('VT', 'Vermont'),
('VA', 'Virginia'),
('WA', 'Washington'),
('WV', 'West Virginia'),
('WI', 'Wisconsin'),
('WY', 'Wyoming');


SELECT stateid, statename, stateabbreviation
 FROM [HCL].[dbo].[states]

