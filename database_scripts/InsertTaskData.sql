/* Task statuses */
INSERT INTO Task_Status VALUES(1, 'In Progress');
INSERT INTO Task_Status VALUES(2, 'On Hold');
INSERT INTO Task_Status VALUES(3, 'Failed');
INSERT INTO Task_Status VALUES(4, 'Completed');

/* Tasks */
INSERT INTO `Task` (`Id`, `Proj_id`, `Name`, `Description`, `Start_date`, `End_date`, `Status`) VALUES
(1, 1, 'Install robotics package', 'Implement backend API endpoints to support new mobile application features and functionality.', '2024-07-11', '2030-11-07', 1),
(2, 2, 'Replace broken thermal sensor', '', '2024-09-18', '2032-11-04', 1),
(4, 4, 'Meet with federal regulators', '', '2024-11-13', '2024-11-15', 2),
(5, 5, 'Obtain proper GB permits', 'Conduct thorough testing of database queries to ensure data integrity and performance optimization.', '2023-12-21', '2042-11-07', 2),
(6, 6, 'Contact ADP Support to address migration issues', 'Develop and document user guidelines for the newly launched content management system.', '2024-02-17', '2024-03-17', 3),
(7, 7, 'Complete tax forms for all employees', 'Design the website\'s homepage layout, focusing on user experience and responsive design elements.', '2024-02-17', '2024-02-17', 2),
(8, 8, 'Add more verbose financial logging', '', '2024-05-11', '2029-11-08', 1),
(9, 9, 'Organize financial shared drive', '', '2024-08-19', '2025-11-20', 1),
(11, 11, 'Quality issue for partner', '', '2024-01-31', '2034-11-01', 1);

/* Employees working on tasks (eno, tno, start, end) */
INSERT INTO `Employees_On_Task` (`Employee_id`, `Task_id`, `Start_date`, `End_date`) VALUES
(1, 4, '2024-03-25', NULL),
(2, 5, '2024-06-22', NULL),
(6, 6, '2024-07-30', NULL),
(6, 7, '2024-01-29', NULL),
(7, 8, '2024-06-30', NULL),
(7, 11, '2024-07-02', NULL),
(8, 9, '2024-03-24', NULL),
(9, 1, '2024-08-31', NULL),
(10, 2, '2024-09-18', NULL),
(14, 1, '2024-11-22', '2020-11-04'),
(14, 5, '2024-11-08', '2017-11-03'),
(14, 6, '2016-11-18', '2027-11-22'),
(14, 7, '2024-11-08', '2025-11-19'),
(15, 6, '2014-11-24', '2024-11-13'),
(15, 8, '2024-11-14', '2029-11-10');

