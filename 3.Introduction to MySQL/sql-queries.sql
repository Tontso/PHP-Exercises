---------1------------------------------------------
USE `php_database`;
CREATE TABLE `minions`(
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`name` VARCHAR(100),
	`age` INT,
	`minionstown_id` INT NOT NULL
);

CREATE TABLE `towns`(
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`name` VARCHAR(200) NOT NULL	
);

---------2------------------------------------------
USE `php_database`;
INSERT INTO `minions` (id, name, age, town_id)
VALUES (1, 'Kevin', 22, 1),
(2, 'Bob', 15, 3),
(3, 'Steward', NULL, 2);

INSERT INTO `towns` (id, name)
VALUES (1, 'Sofia'),
(2, 'Plovdiv'),
(3, 'Varna');

---------3------------------------------------------
TRUNCATE TABLE `minions`;

---------4------------------------------------------
DROP TABLE `minions`, `towns`;


---------8------------------------------------------
USE `soft_uni`;

SELECT * 
FROM `departments`
ORDER BY department_id;

---------9------------------------------------------
USE `soft_uni`;

SELECT name 
FROM `departments`
ORDER BY department_id;

---------10------------------------------------------
USE `soft_uni`;

SELECT first_name, last_name, salary 
FROM employees
ORDER BY employee_id;

---------11------------------------------------------
USE `soft_uni`;

SELECT first_name, middle_name, last_name 
FROM employees
ORDER BY employee_id;

---------12------------------------------------------
USE `soft_uni`;

SELECT CONCAT(first_name, '.', last_name, '@softuni.bg') AS full_name_address
FROM employee

---------13------------------------------------------
USE `soft_uni`;

SELECT  DISTINCT(salary) 
FROM employees 
ORDER BY salary ASC

---------14------------------------------------------
USE `soft_uni`;

SELECT * 
FROM employees
WHERE job_title = 'Sales Representative' 
ORDER BY employee_id ASC

---------15------------------------------------------
USE `soft_uni`;

SELECT first_name, last_name, job_title 
FROM employees
WHERE salary BETWEEN 20000 AND 30000
ORDER BY employee_id ASC


---------16------------------------------------------
USE `soft_uni`;

SELECT CONCAT(first_name, ' ', last_name) 
FROM employees
WHERE salary IN (14000, 25000, 12500, 23600)
ORDER BY employee_id ASC

---------17------------------------------------------
USE `soft_uni`;

SELECT first_name, last_name 
FROM employees
WHERE manager_id IS NULL

---------18------------------------------------------
USE `soft_uni`;

SELECT first_name, last_name, salary 
FROM employees
WHERE salary > 50000
ORDER BY salary DESC

---------19------------------------------------------
USE `soft_uni`;

SELECT first_name, last_name
FROM employees
ORDER BY salary DESC
LIMIT 5 

---------20------------------------------------------
USE `soft_uni`;

SELECT first_name, last_name
FROM employees
WHERE department_id != 4

---------21------------------------------------------
USE `soft_uni`;

SELECT *
FROM employees
ORDER BY salary DESC, first_name ASC, last_name DESC 

---------22------------------------------------------
USE `soft_uni`;

SELECT DISTINCT(job_title)
FROM employees
ORDER BY job_title ASC

---------23------------------------------------------
USE `soft_uni`;

SELECT *
FROM projects
ORDER BY start_date ASC, `name` ASC, project_id ASC
LIMIT 10 

---------24------------------------------------------
USE `soft_uni`;

SELECT first_name, last_name, hire_date
FROM employees
ORDER BY hire_date DESC
LIMIT 7 

---------25------------------------------------------
USE `soft_uni`;

UPDATE employees
SET 
	salary = salary + (salary * 1.12)
WHERE job_title IN(1, 2, 4, 11);

SELECT salary 
FROM employees
WHERE job_title IN(1, 2, 4, 11);

---------26------------------------------------------
USE `geography`;

SELECT peak_name
FROM  peaks
ORDER BY peak_name ASC 

---------27------------------------------------------
USE `geography`;

SELECT country_name, population
FROM  countries
WHERE continent_code = 'EU'
ORDER BY population DESC  

---------28------------------------------------------
USE geography;

SELECT country_name, country_code,
IF(currency_code = 'EUR', 'Euro', 'Not Euro') AS currency
FROM  countries
ORDER BY country_name ASC  
