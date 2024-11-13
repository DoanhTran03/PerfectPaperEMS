/* Projects */
INSERT INTO Project VALUES(1, 'New Line 3', 'Windsor Site', 5, 3500000.00);
INSERT INTO Project VALUES(2, 'Line 1 upgrades', 'Windsor Site', 5, 500000.00);
INSERT INTO Project VALUES(3, 'Inspection prep', 'Windsor Site', 5, 225000.00);
INSERT INTO Project VALUES(4, 'US Compliance', 'Room 108', 1, 1500000.00);
INSERT INTO Project VALUES(5, 'Expand in GB', 'Room 115', 1, 2540000.00);
INSERT INTO Project VALUES(6, 'Migrate to ADP', 'HR Room', 2, 1259000.00);
INSERT INTO Project VALUES(7, 'Year-end prep', 'HR Room', 2, 120000.00);
INSERT INTO Project VALUES(8, 'Upgrades to ERP', 'Room 105', 3, 750000.00);
INSERT INTO Project VALUES(9, 'Audit', 'Room 105', 3, 235000.00);
INSERT INTO Project VALUES(10, 'Foreign Markets', 'Room 235', 4, 1124000.00);
INSERT INTO Project VALUES(11, 'Negotiation', 'Room 234', 4, 4500000.00);

/* Works_On (eno, pno, hours) */
/* Production projects */
INSERT INTO Works_On VALUES(9, 1, 76.3);
INSERT INTO Works_On VALUES(10, 2, 13.2);
INSERT INTO Works_On VALUES(11, 3, 26.8);

/* Admin projects */
INSERT INTO Works_On VALUES(2, 4, 76.1);
INSERT INTO Works_On VALUES(1, 5, 32.3);

/* HR projects */
INSERT INTO Works_On VALUES(6, 6, 46.1);
INSERT INTO Works_On VALUES(6, 7, 57.8);

/* Customer service projects */
INSERT INTO Works_On VALUES(7, 8, 53.2);
INSERT INTO Works_On VALUES(7, 11, 67.4);
INSERT INTO Works_On VALUES(8, 10, 28.3);
INSERT INTO Works_On VALUES(8, 9, 54.1);
