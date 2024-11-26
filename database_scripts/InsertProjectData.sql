/* Projects */
INSERT INTO `Project` (`Id`, `Name`, `Location`, `Dept_id`, `Budget`) VALUES
(1, 'New Line 3', 'Windsor Site', 5, 3500000.00),
(2, 'Line 1 upgrades', 'Windsor Site', 5, 500000.00),
(3, 'Inspection prep', 'Windsor Site', 5, 225000.00),
(4, 'US Compliance', 'Room 108', 1, 1500000.00),
(5, 'Expand in GB', 'Room 115', 1, 2540000.00),
(6, 'Migrate to ADP', 'HR Room', 2, 1259000.00),
(7, 'Year-end prep', 'HR Room', 2, 120000.00),
(8, 'Upgrades to ERP', 'Room 105', 3, 750000.00),
(9, 'Audit', 'Room 105', 3, 235000.00),
(10, 'Website Redesign', 'New York', 3, 150000.00),
(11, 'Negotiation', 'Room 234', 4, 4500000.00);

/* Works_On (eno, pno, hours) */
INSERT INTO `Works_On` (`Employee_id`, `Proj_id`, `Hours`) VALUES
(1, 5, 32.3),
(2, 4, 76.1),
(6, 6, 46.1),
(6, 7, 57.8),
(7, 8, 53.2),
(7, 11, 67.4),
(8, 9, 54.1),
(9, 1, 76.3),
(10, 2, 13.2),
(11, 3, 26.8),
(14, 1, 12.0),
(14, 2, 6.0),
(14, 4, 8.0),
(14, 6, 25.0),
(14, 7, 23.0),
(15, 4, 12.0),
(15, 7, 6.0),
(15, 8, 8.0);

