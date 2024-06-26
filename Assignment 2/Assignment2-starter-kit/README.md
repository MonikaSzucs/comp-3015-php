# Assignment 2 Solution

## User logins
kate@test.com
abcdef*123

## Setup

Ensure you create the database schema with the `database/schema.sql` file. The credentials for the database can be added within the Repository.php file.

## Install dependencies

```
npm i
```

```
composer install
```
// don't need require statements everywhere with this
If you need to re-generate the autoload files, you can run:
```
composer dump-autoload
```

## Running the application

You can run the application using the built-in PHP web server.

For example:

```
php -S localhost:7777 -t public/
```

### Compile and hot-reload CSS assets

```
npx tailwindcss -i views/css/input.css -o ./public/dist/output.css --watch
```

## Command ot run sql commands
mysql -u root

mysql -u root -p

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
