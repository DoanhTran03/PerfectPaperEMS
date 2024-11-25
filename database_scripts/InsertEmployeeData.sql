/* HQ */
INSERT INTO Employee VALUES(1, 'Jane', 'M', 'Leibowitz', '123663544', STR_TO_DATE('1970-04-08', '%Y-%m-%d'), '18887 Normandy St.', 'F', 120000.00, null, 0);
INSERT INTO Employee VALUES(2, 'Veronica', 'A', 'Durocher', '123633294', STR_TO_DATE('1965-12-17', '%Y-%m-%d'), '376 Dupont Ln.', 'F', 11000.00, null, 0);
INSERT INTO Employee VALUES(3, 'Patricia', 'K', 'Mbowe', '673643234', STR_TO_DATE('1989-07-11', '%Y-%m-%d'), '6562 Clark St.', 'F', 97000.00, null, 0);

/* Finance */
INSERT INTO Employee VALUES(4, 'Scott', 'M', 'Durnley', '123627634', STR_TO_DATE('1997-03-01', '%Y-%m-%d'), '2424 Bellevue Rd.', 'M', 92000.00, null, 0);
INSERT INTO Employee VALUES(5, 'Michael', 'T', 'Malloy', '123248234', STR_TO_DATE('1990-07-16', '%Y-%m-%d'), '19875 Canton St.', 'M', 70000.00, null, 0);
INSERT INTO Employee VALUES(12, 'Ava', 'P', 'Johnson', '123247774', STR_TO_DATE('2001-05-07', '%Y-%m-%d'), '19995 Dieppe St.', 'M', 32000.00, null, 0);

/* HR */
INSERT INTO Employee VALUES(6, 'James', 'S', 'Ngo', '123648664', STR_TO_DATE('1980-09-25', '%Y-%m-%d'), '2424 Woods St.', 'M', 65000.00, null, 0);

/* Customer Service */
INSERT INTO Employee VALUES(7, 'Susan', 'J', 'Hernandez', '123908234', STR_TO_DATE('1983-01-11', '%Y-%m-%d'), '1187 Hall Ave.', 'F', 42000.00, null, 0);
INSERT INTO Employee VALUES(8, 'Sean', 'L', 'Krazinski', '178743234', STR_TO_DATE('2000-02-20', '%Y-%m-%d'), '1889 Janice Ln.', 'M', 42000.00, null, 0);

/* Production */
INSERT INTO Employee VALUES(9, 'William', 'B', 'Herbert', '123456789', STR_TO_DATE('1975-06-19', '%Y-%m-%d'), '123 Fairview Ln.', 'M', 50000.00, null, 0);
INSERT INTO Employee VALUES(10, 'Veronica', 'M', 'Leibowitz', '123643234', STR_TO_DATE('1986-02-10', '%Y-%m-%d'), '2424 Woods St.', 'F', 39000.00, null, 0);
INSERT INTO Employee VALUES(11, 'James', 'C', 'Turner', '123645644', STR_TO_DATE('1995-03-05', '%Y-%m-%d'), '2789 Chamberlain Ave.', 'M', 33000.00, null, 0);
INSERT INTO Employee VALUES(13, 'John', 'B', 'Clarke', '123642245', STR_TO_DATE('1999-03-05', '%Y-%m-%d'), '23423 Woodsley Ln.', 'M', 33000.00, null, 0);

/* Supervisor, supervisee */
INSERT INTO Supervisor_Supervisee VALUES(2, 3, null, null);
INSERT INTO Supervisor_Supervisee VALUES(5, 12, null, null);
INSERT INTO Supervisor_Supervisee VALUES(10, 11, null, null);
INSERT INTO Supervisor_Supervisee VALUES(10, 13, null, null);

/* Accounts */
INSERT INTO Account VALUES(1, 1, '$2y$10$DRKCrssxfEb2ATwIaMT4L.1FH3Y5zaS42/YeTDln/VpAKhiprZ2s6', null, null, 1);
INSERT INTO Account VALUES(2, 2, '$2y$10$DRKCrssxfEb2ATwIaMT4L.1FH3Y5zaS42/YeTDln/VpAKhiprZ2s6', null, null, 1);
INSERT INTO Account VALUES(3, 3, 'NOT REAL PASSWORD HASH', null, null, 1);
INSERT INTO Account VALUES(4, 4, 'NOT REAL PASSWORD HASH', null, null, 1);
INSERT INTO Account VALUES(5, 5, 'NOT REAL PASSWORD HASH', null, null, 1);
INSERT INTO Account VALUES(6, 6, 'NOT REAL PASSWORD HASH', null, null, 1);
INSERT INTO Account VALUES(7, 7, 'NOT REAL PASSWORD HASH', null, null, 1);
INSERT INTO Account VALUES(8, 8, 'NOT REAL PASSWORD HASH', null, null, 1);
INSERT INTO Account VALUES(9, 9, 'NOT REAL PASSWORD HASH', null, null, 1);
INSERT INTO Account VALUES(10, 10, 'NOT REAL PASSWORD HASH', null, null, 1);
INSERT INTO Account VALUES(11, 11, 'NOT REAL PASSWORD HASH', null, null, 1);
INSERT INTO Account VALUES(12, 12, 'NOT REAL PASSWORD HASH', null, null, 1);
INSERT INTO Account VALUES(13, 13, 'NOT REAL PASSWORD HASH', null, null, 1);

/* Dependents */
INSERT INTO Dependent VALUES(1, 'Simon', 'M', STR_TO_DATE('2007-04-05', '%Y-%m-%d'));
INSERT INTO Employee_Dependent VALUES(10, 1, 'Child', null);
INSERT INTO Dependent VALUES(2, 'Mark', 'M', STR_TO_DATE('2005-09-25', '%Y-%m-%d'));
INSERT INTO Employee_Dependent VALUES(10, 2, 'Child', null);
INSERT INTO Dependent VALUES(3, 'Emma', 'F', STR_TO_DATE('2007-12-02', '%Y-%m-%d'));
INSERT INTO Employee_Dependent VALUES(10, 3, 'Child', null);
INSERT INTO Dependent VALUES(4, 'Dominic', 'M', STR_TO_DATE('2010-03-09', '%Y-%m-%d'));
INSERT INTO Employee_Dependent VALUES(10, 4, 'Child', null);
INSERT INTO Dependent VALUES(5, 'Sally', 'F', STR_TO_DATE('2011-07-14', '%Y-%m-%d'));
INSERT INTO Employee_Dependent VALUES(9, 5, 'Child', null);
INSERT INTO Dependent VALUES(6, 'Timothy', 'M', STR_TO_DATE('2012-02-01', '%Y-%m-%d'));
INSERT INTO Employee_Dependent VALUES(9, 6, 'Child', null);
INSERT INTO Dependent VALUES(7, 'Claire', 'F', STR_TO_DATE('2015-01-17', '%Y-%m-%d'));
INSERT INTO Employee_Dependent VALUES(6, 7, 'Child', null);
INSERT INTO Dependent VALUES(8, 'Vanessa', 'F', STR_TO_DATE('2013-08-25', '%Y-%m-%d'));
INSERT INTO Employee_Dependent VALUES(6, 8, 'Child', null);
INSERT INTO Dependent VALUES(9, 'Jonathan', 'M', STR_TO_DATE('2009-03-19', '%Y-%m-%d'));
INSERT INTO Employee_Dependent VALUES(1, 9, 'Child', null);
INSERT INTO Dependent VALUES(10, 'Emilio', 'M', STR_TO_DATE('2012-11-03', '%Y-%m-%d'));
INSERT INTO Employee_Dependent VALUES(1, 10, 'Child', null);
INSERT INTO Dependent VALUES(11, 'George', 'M', STR_TO_DATE('2014-01-22', '%Y-%m-%d'));
INSERT INTO Employee_Dependent VALUES(2, 11, 'Child', null);
INSERT INTO Dependent VALUES(12, 'Sam', 'M', STR_TO_DATE('2015-03-26', '%Y-%m-%d'));
INSERT INTO Employee_Dependent VALUES(2, 12, 'Child', null);
INSERT INTO Dependent VALUES(13, 'Catherine', 'F', STR_TO_DATE('2017-08-15', '%Y-%m-%d'));
INSERT INTO Employee_Dependent VALUES(2, 13, 'Child', null);

