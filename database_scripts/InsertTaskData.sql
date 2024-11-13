/* Task statuses */
INSERT INTO Task_Status VALUES(1, 'In Progress');
INSERT INTO Task_Status VALUES(2, 'On Hold');
INSERT INTO Task_Status VALUES(3, 'Failed');
INSERT INTO Task_Status VALUES(4, 'Completed');

/* Tasks */
INSERT INTO Task VALUES(1, 1, 'Install robotics package', '', STR_TO_DATE('2024-07-11', '%Y-%m-%d'), null, 1);
INSERT INTO Task VALUES(2, 2, 'Replace broken thermal sensor', '', STR_TO_DATE('2024-09-18', '%Y-%m-%d'), null, 1);
INSERT INTO Task VALUES(3, 3, 'Improve ESD safety practices', '', STR_TO_DATE('2024-07-23', '%Y-%m-%d'), STR_TO_DATE('2024-09-05', '%Y-%m-%d'), 4);
INSERT INTO Task VALUES(4, 4, 'Meet with federal regulators', '', STR_TO_DATE('2024-11-13', '%Y-%m-%d'), STR_TO_DATE('2024-11-15', '%Y-%m-%d'), 2);
INSERT INTO Task VALUES(5, 5, 'Obtain proper GB permits', '', STR_TO_DATE('2023-12-21', '%Y-%m-%d'), null, 2);
INSERT INTO Task VALUES(6, 6, 'Contact ADP Support to address migration issues', '', STR_TO_DATE('2024-02-17', '%Y-%m-%d'), STR_TO_DATE('2024-03-17', '%Y-%m-%d'), 3);
INSERT INTO Task VALUES(7, 7, 'Complete tax forms for all employees', '', STR_TO_DATE('2024-02-17', '%Y-%m-%d'), STR_TO_DATE('2024-02-17', '%Y-%m-%d'), 2);
INSERT INTO Task VALUES(8, 8, 'Add more verbose financial logging', '', STR_TO_DATE('2024-05-11', '%Y-%m-%d'), null, 1);
INSERT INTO Task VALUES(9, 9, 'Organize financial shared drive', '', STR_TO_DATE('2024-08-19', '%Y-%m-%d'), null, 1);
INSERT INTO Task VALUES(10, 10, 'Visit to China', '', STR_TO_DATE('2024-03-24', '%Y-%m-%d'), null, 4);
INSERT INTO Task VALUES(11, 11, 'Quality issue for partner', '', STR_TO_DATE('2024-01-31', '%Y-%m-%d'), null, 1);

/* Employees working on tasks (eno, tno, start, end) */
INSERT INTO Employees_On_Task VALUES(9, 1, STR_TO_DATE('2024-08-31', '%Y-%m-%d'), null);
INSERT INTO Employees_On_Task VALUES(10, 2, STR_TO_DATE('2024-09-18', '%Y-%m-%d'), null);
INSERT INTO Employees_On_Task VALUES(11, 3, STR_TO_DATE('2024-02-21', '%Y-%m-%d'), null);
INSERT INTO Employees_On_Task VALUES(1, 4, STR_TO_DATE('2024-03-25', '%Y-%m-%d'), null);
INSERT INTO Employees_On_Task VALUES(2, 5, STR_TO_DATE('2024-06-22', '%Y-%m-%d'), null);
INSERT INTO Employees_On_Task VALUES(6, 6, STR_TO_DATE('2024-07-30', '%Y-%m-%d'), null);
INSERT INTO Employees_On_Task VALUES(6, 7, STR_TO_DATE('2024-01-29', '%Y-%m-%d'), null);
INSERT INTO Employees_On_Task VALUES(7, 8, STR_TO_DATE('2024-06-30', '%Y-%m-%d'), null);
INSERT INTO Employees_On_Task VALUES(8, 9, STR_TO_DATE('2024-03-24', '%Y-%m-%d'), null);
INSERT INTO Employees_On_Task VALUES(8, 10, STR_TO_DATE('2024-04-27', '%Y-%m-%d'), null);
INSERT INTO Employees_On_Task VALUES(7, 11, STR_TO_DATE('2024-07-02', '%Y-%m-%d'), null);