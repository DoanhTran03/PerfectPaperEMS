-- @@InsertEmployeeData.sql
-- @@InsertDepartmentData.sql
-- @@InsertProjectData.sql
-- @@InsertTaskData.sql

/* Add departments to employees */
UPDATE Employee SET Dept_id = 1 WHERE Id = 1 OR Id = 2 OR Id = 3;
UPDATE Employee SET Dept_id = 2 WHERE Id = 6;
UPDATE Employee SET Dept_id = 3 WHERE Id = 4 OR Id = 5 OR Id = 12;
UPDATE Employee SET Dept_id = 4 WHERE Id = 7 OR Id = 8;
UPDATE Employee SET Dept_id = 5 WHERE Id = 9 OR Id = 10 OR Id = 11 OR Id = 13;