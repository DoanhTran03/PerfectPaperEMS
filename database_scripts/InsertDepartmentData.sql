INSERT INTO Department VALUES('HQ', 1, 1, STR_TO_DATE('2003-05-13', '%Y-%m-%d'));
INSERT INTO Department VALUES('HR', 2, 6, STR_TO_DATE('2005-06-17', '%Y-%m-%d'));
INSERT INTO Department VALUES('Finance', 3, 4, STR_TO_DATE('2012-08-25', '%Y-%m-%d'));
INSERT INTO Department VALUES('Cust. Serv.', 4, 7, STR_TO_DATE('2021-02-05', '%Y-%m-%d'));
INSERT INTO Department VALUES('Production', 5, 9, STR_TO_DATE('2018-11-22', '%Y-%m-%d'));

INSERT INTO Location VALUES(1, '1675 Barkview Ln. Chatham, ON', 'N8H 5W2');
INSERT INTO Location VALUES(2, '76543 Pleasant Cr. Windsor, ON', 'N2K 7A6');
INSERT INTO Location VALUES(3, '1675 Barkview Ln. Sarnia, ON', 'N7H 9P1');

INSERT INTO Dept_Locations VALUES(1, 1, null, null);
INSERT INTO Dept_Locations VALUES(2, 2, null, null);
INSERT INTO Dept_Locations VALUES(3, 3, null, null);
INSERT INTO Dept_Locations VALUES(2, 4, null, null);
INSERT INTO Dept_Locations VALUES(2, 5, null, null);

UPDATE Employee SET Dept_id = 1 WHERE Id = 1 OR Id = 2 OR Id = 3;
UPDATE Employee SET Dept_id = 2 WHERE Id = 6;
UPDATE Employee SET Dept_id = 3 WHERE Id = 4 OR Id = 5 OR Id = 12;
UPDATE Employee SET Dept_id = 4 WHERE Id = 7 OR Id = 8;
UPDATE Employee SET Dept_id = 5 WHERE Id = 9 OR Id = 10 OR Id = 11 OR Id = 13;