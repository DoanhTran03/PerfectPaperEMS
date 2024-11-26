INSERT INTO `Employee` (`Id`, `Fname`, `Minit`, `Lname`, `Ssn`, `Bdate`, `Address`, `Sex`, `Salary`, `Dept_id`, `Is_admin`) VALUES
(1, 'Jane', 'M', 'Leibowitz', '123663544', '1970-04-08', '18887 Normandy St.', 'F', 120000.00, 1, 0),
(2, 'Veronica', 'A', 'Durocher', '123633294', '1965-12-17', '376 Dupont Ln.', 'F', 11000.00, 1, 0),
(3, 'Patricia', 'K', 'Mbowe', '673643234', '1989-07-11', '6562 Clark St.', 'F', 97000.00, 1, 0),
(4, 'Scott', 'M', 'Durnley', '123627634', '1997-03-01', '2424 Bellevue Rd.', 'M', 92000.00, 3, 0),
(5, 'Michael', 'T', 'Malloy', '123248234', '1990-07-16', '19875 Canton St.', 'M', 70000.00, 3, 0),
(6, 'James', 'S', 'Ngo', '123648664', '1980-09-25', '2424 Woods St.', 'M', 65000.00, 2, 0),
(7, 'Susan', 'J', 'Hernandez', '123908234', '1983-01-11', '1187 Hall Ave.', 'F', 42000.00, 4, 0),
(8, 'Sean', 'L', 'Krazinski', '178743234', '2000-02-20', '1889 Janice Ln.', 'M', 42000.00, 4, 0),
(9, 'William', 'B', 'Herbert', '123456789', '1975-06-19', '123 Fairview Ln.', 'M', 50000.00, 5, 0),
(10, 'Veronica', 'M', 'Leibowitz', '123643234', '1986-02-10', '2424 Woods St.', 'F', 39000.00, 5, 0),
(11, 'James', 'C', 'Turner', '123645644', '1995-03-05', '2789 Chamberlain Ave.', 'M', 33000.00, 5, 0),
(12, 'Ava', 'P', 'Johnson', '123247774', '2001-05-07', '19995 Dieppe St.', 'M', 32000.00, 3, 0),
(13, 'John', 'B', 'Clarke', '123642245', '1999-03-05', '23423 Woodsley Ln.', 'M', 33000.00, 5, 0),
(14, 'Tommy', 'M', 'Cruise', '123456789', '2024-03-30', '2589 Josephine', 'M', 56000.00, 4, 1),
(15, 'John', 'D', 'Doe', '123865234', '1990-01-15', '123 Elm Street', 'M', 60000.00, 5, 0);

/* Supervisor, supervisee */
INSERT INTO Supervisor_Supervisee VALUES(2, 3, null, null);
INSERT INTO Supervisor_Supervisee VALUES(5, 12, null, null);
INSERT INTO Supervisor_Supervisee VALUES(10, 11, null, null);
INSERT INTO Supervisor_Supervisee VALUES(10, 13, null, null);

/* Accounts */
INSERT INTO `Account` (`Id`, `Employee_id`, `Pass_hash`, `Last_token`, `Token_expiration`, `Active`) VALUES
(1, 1, 'NOT REAL PASSWORD HASH', NULL, NULL, 1),
(2, 2, 'NOT REAL PASSWORD HASH', NULL, NULL, 1),
(3, 3, 'NOT REAL PASSWORD HASH', NULL, NULL, 1),
(4, 4, 'NOT REAL PASSWORD HASH', NULL, NULL, 1),
(5, 5, 'NOT REAL PASSWORD HASH', NULL, NULL, 1),
(6, 6, 'NOT REAL PASSWORD HASH', NULL, NULL, 1),
(7, 7, 'NOT REAL PASSWORD HASH', NULL, NULL, 1),
(8, 8, 'NOT REAL PASSWORD HASH', NULL, NULL, 1),
(9, 9, 'NOT REAL PASSWORD HASH', NULL, NULL, 1),
(10, 10, 'NOT REAL PASSWORD HASH', NULL, NULL, 1),
(11, 11, 'NOT REAL PASSWORD HASH', NULL, NULL, 1),
(12, 12, 'NOT REAL PASSWORD HASH', NULL, NULL, 1),
(13, 13, 'NOT REAL PASSWORD HASH', NULL, NULL, 1),
(14, 14, '$2y$10$naLuk/Tu6htls6BcwBCRZepj3d93bOgcwScGFx4YSj3yU6vzuhsGS', NULL, NULL, 1),
(15, 15, '$2y$10$VSlmaFGh3pmwRj97kZNcKePqqUCzldiuizZOGI/WF/0XhOloPxCkO', 'f8d8fc08bf7afce3e094244fd18a0209932312f224eef047608bd794c82a49d7', '2024-11-25 20:47:12', 1);

/* Dependents */
INSERT INTO `Employee_Dependent` (`Employee_id`, `Dependent_id`, `Relationship`, `End_date`) VALUES
(1, 9, 'Child', NULL),
(1, 10, 'Child', NULL),
(2, 11, 'Child', NULL),
(2, 12, 'Child', NULL),
(2, 13, 'Child', NULL),
(6, 7, 'Child', NULL),
(6, 8, 'Child', NULL),
(9, 5, 'Child', NULL),
(9, 6, 'Child', NULL),
(10, 1, 'Child', NULL),
(10, 2, 'Child', NULL),
(10, 3, 'Child', NULL),
(10, 4, 'Child', NULL),
(14, 3, 'Uncle', '2006-11-04'),
(14, 5, 'Parent', '2016-11-19'),
(15, 5, 'Neighbor ', '2016-11-07'),
(15, 11, 'Sister', '2024-11-30');

