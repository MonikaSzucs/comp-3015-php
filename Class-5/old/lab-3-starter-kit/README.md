# Class 5

## Command ot run sql commands
mysql -u root

mysql -u root -p
password: root

show databases;
create database in_class_example_db
use performance_schema;
show tables;
describe users;
INSERT INTO users (email, password)
INSERT INTO variables_info VALUES ("c@bcit.ca", "password")
SELECT * FROM users;
SELECT email FROM users;
SELECT email, password FROM users;
UPDATE users SET password="updatedPassword" WHERE email="chris@bcit.ca";
SELECT from * FROM users;
SELECT * FROM users WHERE email="email@bcit.ca";
DELETE FROM users WHERE email="email@email.ca"
DELETE FROM users WHERE email="chris@bcit.ca";
create database in_class_example_db;

in_class_example_db;
use in_class_example_db;
create table users (email varchar(255), password varchar(255));
create table users2 (email varchar(255), password varchar(255));
INSERT INTO users (email, password) VALUES ("chris@bcit.ca", "plaintextPassword");
drop database psot_app


use posts
SELECT LAST_INSERT_ID;  // id of the last record inserted
exit

pwd

## commands
brew services start mysql

## If you cannot access the database
mysql -u root -p    

## Other programs
Table plus
- to help view what is in your database

- database system is stored in our file system. Database is the datastructures it uses to store data does it in a efficent manner 

## AMazon RDS
- syncing between primary and read replica database

## PDO
- we are doing to be using PDO
- unified interface
- if you use mysql or postgress code is similar

## Database driver
- we need a intermediary
php -m
- we need pdo_mysql
- if you cannot see it you need to uncomment it in the init filein SQL
- make sure 

to find ini file
php --ini

then type `code` in the front and the path it will open up that php.ini file

## Serving content out of Views directory
php -S localhost:7777 -t src/Views

## Customizing the PATH for MYSQL tool
(Environmental Variables)[https://dev.mysql.com/doc/mysql-windows-excerpt/8.3/en/mysql-installation-windows-path.html]
