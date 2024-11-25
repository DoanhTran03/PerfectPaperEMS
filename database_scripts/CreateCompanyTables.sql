CREATE TABLE Employee (
  Id int PRIMARY KEY NOT NULL,
  Fname varchar(32) NOT NULL,
  Minit char,
  Lname varchar(32) NOT NULL,
  Ssn char(9),
  Bdate date,
  Address varchar(64),
  Sex char,
  Salary decimal(10,2),
  Dept_id int,
  Is_admin BOOLEAN
);

CREATE TABLE Department (
  Name varchar(32) UNIQUE NOT NULL,
  Id int PRIMARY KEY NOT NULL,
  Mgr_id int NOT NULL,
  Mgr_start_date date
);

CREATE TABLE Dept_Locations (
  Location_id int NOT NULL,
  Dept_id int NOT NULL,
  Start_date DATE,
  End_date DATE,
  PRIMARY KEY(Location_id, Dept_id)
);

CREATE TABLE Location (
  Id INT NOT NULL PRIMARY KEY,
  Address VARCHAR(64),
  Zip_code VARCHAR(16)
);

CREATE TABLE Project (
  Id int PRIMARY KEY NOT NULL,
  Name varchar(32) UNIQUE NOT NULL,
  Location varchar(15),
  Dept_id int NOT NULL,
  Budget decimal(10,2)
);

CREATE TABLE Works_On (
  Employee_id int NOT NULL,
  Proj_id int NOT NULL,
  Hours decimal(3,1) NOT NULL,
  PRIMARY KEY (Employee_id, Proj_id)
);

Create TABLE Task (
  Id int NOT NULL,
  Proj_id int NOT NULL,
  Name varchar(64),
  Description varchar(512),
  Start_date date NOT NULL,
  End_date date,
  Status int NOT NULL,
  PRIMARY KEY(Id)
);

Create TABLE Employees_On_Task (
  Employee_id int NOT NULL,
  Task_id int NOT NULL,
  Start_date date NOT NULL,
  End_date date,
  PRIMARY KEY(Employee_id, Task_id)
);

create TABLE Task_Status (
  Id int PRIMARY KEY NOT NULL,
  Name varchar(16) NOT NULL
);

CREATE TABLE Supervisor_Supervisee (
  Supervisor_id int NOT NULL,
  Supervisee_id int NOT NULL,
  Assign_date DATE,
  End_date DATE,
  PRIMARY KEY(Supervisor_id, Supervisee_id)
);

CREATE TABLE Dependent (
  Id int NOT NULL PRIMARY KEY,
  Name varchar(32) NOT NULL,
  Sex char,
  Bdate date
);

CREATE TABLE Employee_Dependent (
  Employee_id int NOT NULL,
  Dependent_id int NOT NULL,
  Relationship VARCHAR(32),
  End_date DATE,
  PRIMARY KEY(Employee_id, Dependent_id)
);

CREATE TABLE Account (
  Id INT NOT NULL,
  Employee_id INT NOT NULL,
  Pass_hash VARCHAR(255) NOT NULL,
  Last_token VARCHAR(255),
  Token_expiration DATETIME,
  Active BOOLEAN,
  PRIMARY KEY(Id, Employee_id)
);

ALTER TABLE Employee_Dependent ADD FOREIGN KEY (Employee_id) REFERENCES Employee (Id) ON DELETE CASCADE;

ALTER TABLE Employee_Dependent ADD FOREIGN KEY (Dependent_id) REFERENCES Dependent (Id) ON DELETE CASCADE;

ALTER TABLE Works_On ADD FOREIGN KEY (Employee_id) REFERENCES Employee (Id) ON DELETE CASCADE;

ALTER TABLE Works_On ADD FOREIGN KEY (Proj_id) REFERENCES Project (Id) ON DELETE CASCADE;

ALTER TABLE Project ADD FOREIGN KEY (Dept_id) REFERENCES Department (Id) ON DELETE CASCADE;

ALTER TABLE Dept_Locations ADD FOREIGN KEY (Dept_id) REFERENCES Department (Id) ON DELETE CASCADE;

ALTER TABLE Department ADD FOREIGN KEY (Mgr_id) REFERENCES Employee (Id) ON DELETE CASCADE;

ALTER TABLE Employee ADD FOREIGN KEY (Dept_id) REFERENCES Department (Id) ON DELETE CASCADE;

ALTER TABLE Task ADD FOREIGN KEY (Status) REFERENCES Task_Status (Id) ON DELETE CASCADE;

ALTER TABLE Task ADD FOREIGN KEY (Proj_id) REFERENCES Project (Id) ON DELETE CASCADE;

ALTER TABLE Employees_On_Task ADD FOREIGN KEY (Employee_id) REFERENCES Employee (Id) ON DELETE CASCADE;

ALTER TABLE Employees_On_Task ADD FOREIGN KEY (Task_id) REFERENCES Task (Id) ON DELETE CASCADE;

ALTER TABLE Dept_Locations ADD FOREIGN KEY(Location_id) REFERENCES Location (Id) ON DELETE CASCADE;

ALTER TABLE Supervisor_Supervisee ADD FOREIGN KEY(Supervisor_id) REFERENCES Employee (Id) ON DELETE CASCADE;

ALTER TABLE Supervisor_Supervisee ADD FOREIGN KEY(Supervisee_id) REFERENCES Employee (Id) ON DELETE CASCADE;

ALTER TABLE Account ADD FOREIGN KEY(Employee_id) REFERENCES Employee (Id) ON DELETE CASCADE;