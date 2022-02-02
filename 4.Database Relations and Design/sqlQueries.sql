-- 1 ---------------------
SELECT COUNT(*) AS count
FROM wizzard_deposits


-- 2 ---------------------
SELECT MAX(wd.magic_wand_size) AS longest_magic_wand 
FROM wizzard_deposits AS wd


-- 3 ---------------------
SELECT wd.deposit_group, MAX(wd.magic_wand_size) AS longest_magic_wand 
FROM wizzard_deposits AS wd
GROUP BY wd.deposit_group
ORDER BY longest_magic_wand ASC , wd.deposit_group


-- 4 ---------------------
SELECT wd.deposit_group 
FROM wizzard_deposits AS wd
GROUP BY wd.deposit_group
ORDER BY AVG(wd.magic_wand_size)
LIMIT 1
 
 
-- 5 ---------------------
SELECT wd.deposit_group, SUM(wd.deposit_amount) AS total_sum 
FROM wizzard_deposits AS wd
GROUP BY wd.deposit_group
ORDER BY total_sum


-- 6 ---------------------
SELECT COUNT(category_id)
FROM products
WHERE price > 8 
GROUP BY category_id
HAVING category_id = 2 


-- 7 ---------------------
USE `restaurant`;

SELECT 
	category_id, 
	AVG(price) AS `Average Price`,
	MIN(price) AS `Cheapest Product`,
	MAX(price) AS `Most expensive Profuct`
FROM products 
GROUP BY category_id  


-- 8 ---------------------
USE `soft_uni`;

SELECT 
	e.employee_id, 
	e.job_title, 
	e.address_id, 
	a.address_text
FROM employees AS e
INNER JOIN addresses AS a
ON  e.address_id = a.address_id
ORDER BY e.address_id ASC 
LIMIT 5


-- 9 ---------------------
USE `soft_uni`;

SELECT 
	e.employee_id, 
    e.first_name, 
	e.salary, 
	d.name AS `deparment_name`
FROM employees AS e
INNER JOIN departments AS d
ON e.department_id = d.department_id
WHERE e.salary > 15000
ORDER BY d.department_id DESC 
LIMIT 5

-- 10 ---------------------
USE `soft_uni`;

SELECT 
	e.employee_id, 
	e.first_name 
FROM employees AS e
LEFT JOIN employees_projects AS ep
ON e.employee_id = ep.employee_id
ORDER BY e.employee_id DESC 


-- 11 ---------------------
USE `soft_uni`;

SELECT 
	e.employee_id, 
	e.first_name,
	IF(p.start_date > '1//1/2015',NULL, p.name) AS project_name
FROM employees AS e
	JOIN employees_projects AS ep ON  e.employee_id = ep.employee_id 
	JOIN projects AS p ON ep.employee_id = p.project_id
	WHERE e.employee_id = 24 
ORDER BY p.`name` 

-- 12 ---------------------
USE `soft_uni`;

SELECT 
	e.employee_id, 
    e.first_name,
	e.manager_id,
	em.first_name 
FROM employees AS e
INNER JOIN employees AS em
ON e.manager_id = em.employee_id
WHERE em.employee_id = 3 OR em.employee_id = 7
ORDER BY e.first_name ASC

 
-- 13 ---------------------
USE `soft_uni`;

SELECT 
	e.employee_id, 
    e.first_name,
    p.name
FROM employees AS e
INNER JOIN employees_projects AS ep
ON  e.employee_id = ep.employee_id
INNER JOIN projects AS p
ON ep.employee_id = p.project_id
WHERE e.employee_id = 24 AND p.start_date > '1//1/2015'
ORDER BY p.name  