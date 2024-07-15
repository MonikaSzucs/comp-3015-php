# Class 5

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



# Class 4 Notes
Databases allow you to save data in a structured format
- Typical DB operations are create, read, update, delete (CRUD)
- Web applications need to be careful when accepting user input and using that input in queries
- We’ll be using a relational database called MySQL

## MySQL Basics: Installing
- Ubuntu (use your default pkg manager on other Linux distros):
-- $ sudo apt update && sudo apt install mysql-server
--- Start and stop using systemctl
- macOS (with homebrew): https://formulae.brew.sh/formula/mysql
-- $ brew install mysql
- Windows:
-- https://dev.mysql.com/downloads/mysql/

## MySQL Basics: Login and Create a Database
On my local machine I don’t have a password configured, so I can
simply run “mysql -uroot” in order to log into MySQL as the root
user. For providing a password you can use the “-p” option.
Creating a database: “create database <new database name>;”

## MySQL Basics: Use and show tables
Once a database is created and you’re logged into the
MySQL shell, you need to instruct MySQL about which
database you’d like to use:
```
use new_co;
```

The show command will tell you what tables exist in the current
database:
```
show tables;
```

## Creating tableas nd running .sql files
```
create database new_co;
use new_co;
create table users (
    id int auto_increment not null primary key,
    password_digest varchar(255),
    email varchar(255) not null,
    name varchar(255) not null
)
```

## Table structure
- `PRI`: primary key. A unique identifier for each record
-- auto_increment in this case. First record will have ID 1, second will have ID 2, nth will have ID n.
- Columns can be nullable (Null set to YES for updated_at) meaning no value
is required
- varchar(n) means a string of maximum length n

## Reading / Selecting Records
- This command selects all fields (*), where the record ID is equal to 1.

```
SELECT * FROM posts WHERE id=1;
```

- Selecting only the fields we need:
- In some instances, a field in a record might contain a lot of data. Excluding it can improve performance. For example, WYSIWYG editor contents being saved with base64 images.

```
SELECT id, title, body FROM posts WHERE id=1;
```

## Inserting Records
Note: NULL is passed in for the ID of the auto incrementing primary key (unique ID for each record)
`LAST_INSERT_ID()` returns the ID of the most recently inserted record on a per-connection basis

```
SELECT LAST_INSERT_ID();
```

## Updating Records
Updates should be made with a WHERE clause that will ensure only the intended record is changed.

Tip: run a SELECT query with the WHERE clause before running the UPDATE query to ensure you’re only going to update what you intend to.

## Deleting Records
DELETE FROM posts WHERE id=5;
SELECT * FROM posts WHERE id=5;

## Foreign Keys
Imagine a system with users and posts
- Post model and User model (classes/objects in our application code)
- posts table and users table
We need to know which users made what posts
- Need a link between the posts table and the users table
- `author_id` on the posts table
references the users table.
- MUL: multiple
-- Multiple occurrences of the same value are allowed
-- For example, your user can create 10 posts, so in the posts table your user ID would have 10 occurrences

```
show create table posts
```

## Additional DB topics to know
These are outside the scope of this course but you should learn them
eventually. Some of these are covered in COMP 4669.
- Indexing
- Joins
- Relationship types
-- Many-to-many, one-to-many, one-to-once, etc.
- Transactions
-- ACID (atomicity, consistency, isolation, durability)

## Database Driven Application Architectures
### Web Architecture with a DB
Good idea to separate the web server from the database for scaling:
`Security`: limit exposure of the DB to the outside world
`Scalability`: by keeping the DB on the same machine as the web server it becomes easier to “horizontally scale” - see next slide.

Horizontal scalability: app server 1, 2, 3 all run the the PHP application you’re writing

## Need to reduce load off the database?
Idea: create a read-only (replica) database and direct read queries away from the main database which now only needs to handle queries modifying data.

Various cloud service providers such as AWS have out-of-the-box support for this. Eg. using AWS RDS
https://aws.amazon.com/rds/features/read-replicas/

## database drivers
### Available PHP database APIs fro MySQL
PHP can connect to a MySQL database using your choice of API:
mysqli or PDO (PDO_MYSQL, in this course)
- https://www.php.net/manual/en/book.mysqli.php
-- MySQL specific
- https://www.php.net/manual/en/book.pdo.php
-- Consistent interface between database types: PostgreSQL,
MySQL, MS SQL Server, SQLite, etc.
--- Additional supported drivers can be found at:
https://www.php.net/manual/en/pdo.drivers.php
- The driver acts as an intermediary between PHP and MySQL

## Checking for and installing DB drivers
- The driver we’re going to use is PDO_MYSQL.
- Depending on how PHP is installed and configured, you might already
have it available on your system.
- Run “php -m” to see the PHP modules that are installed
-- If PDO_MYSQL is installed you should see “pdo_mysql” in the output
- If it’s not installed, open your php.ini file, search for and uncomment
extension=pdo_mysql

## SQL Injection ATtacks and Parameterized Prepared STatements
```
$name = $_POST[‘name’];
$sql = “SELECT * FROM users WHERE name = ‘” . $name . “‘”;
With an expected “happy path” input, the resulting SQL query would look like:
$name = ‘Chris’;
Resulting in:
$sql = “SELECT * FROM users WHERE name = ‘Chris’”;
An unexpected input (from the developer perspective) may be:
$name = “‘ OR 1=1;--”;
Resulting in:
$sql = “SELECT * FROM users WHERE name = ‘‘ OR 1=1;--”;
What happens?
```

A common web service vulnerability caused by mixing user input with database queries.
“SQL Injection is best prevented through the use of parameterized queries.”
src: OWASP,
https://cheatsheetseries.owasp.org/cheatsheets/Query_Parameterization_Cheat_Sheet.html

## Selected PDO Functions
`exec` - execute a SQL statement, return the number of rows affected
`prepare` - prepare a SQL statement for execution, return a PDOStatement
`execute` - execute a prepared statement against the DB
`fetch` - fetch the next row from a result set
`fetchAll` - fetch all rows from the result set
PDO options info: https://www.php.net/manual/en/pdo.setattribute.php
(these constants are used in our Repository class)

## Parameterized Prepare statements
- In order to have queries executed in a secure manner, databases must be able to distinguish between (SQL) code and data.
- Using parameterized prepared statements the web server will send the SQL query, and data for that query in two separate requests.

## How parameterized parpared statements work
The prepare statement request contains the SQL query code. eg.
INSERT INTO posts (created_at, updated_at, body, title) VALUES (?, NULL, ?, ?);
The execute statement request contains the data for the query. eg.
"2024-05-25 20:23:09",
"Test Post Body",
"Test Post Title"

Without protocol documentation how could we check what messages MySQL sends?

Tools such as Wireshark allow you to analyze messages sent over a network. Since the source and destination IP addresses are the same in this case, checking the source and destination port for each message you’ll be able to see which software initiated the request (MySQL is 3306 by default). See mysql-prepared-statement-execution.pcapng

## Changing out Repository from JSON file -> database
- Change the function bodies of getArticleById, updateArticleById,
deleteArticleById, etc.
- The interface to your Repository class (function signatures) should
not need to change

# Review
- What is a primary key?
A primary key in PHP MySQL is a unique identifier for each record in a table, ensuring each row is distinct and can be accessed efficiently. It uniquely identifies records and prevents duplicate entries.

- What is a foreign key?
In PHP, a foreign key is a reference to a primary key or a unique key in another table within a MySQL database. It establishes a relationship between tables, ensuring data integrity by enforcing referential constraints between related tables.

- What does CRUD stand for?
CREATE, READ, UPDATE, DELETE

- What is SQL injection caused by?
SQL injection is caused by malicious input from users that is not properly sanitized or validated in PHP code. Attackers exploit vulnerabilities by injecting SQL commands through input fields, enabling them to manipulate databases, steal data, or execute unauthorized actions on the server.

- How does using parameterized prepared statements ensure the database can differentiate between code and data?
Using parameterized prepared statements in PHP ensures that the database can differentiate between code and data by separating SQL code from user input. Here's how it works:

1. SQL Code Separation: Parameterized queries allow developers to define SQL statements with placeholders (? in MySQLi or named parameters in PDO) instead of embedding user input directly into the SQL query string.

2. Binding Parameters: User input values are then bound to these placeholders. This binding process ensures that the database treats the input strictly as data, not as executable SQL code.

3. Preparation and Execution: The SQL query, with placeholders and bound parameters, is prepared and sent to the database separately from the actual parameter values. This preparation step informs the database about the structure of the query without specific data.

4. Query Execution: When the prepared statement is executed, the database combines the SQL structure with the bound parameter values. Importantly, the database knows that these values are data and should not be interpreted as executable SQL code.

5. Security: This approach prevents SQL injection attacks because even if malicious input is provided, it will be treated as data rather than executable SQL commands. The database executes the query safely without risking unintended SQL code execution.

- Why might we want to have our DB on a separate server?
Having your database on a separate server from your PHP application provides several advantages:

`Performance`: Dedicated database servers can be optimized for handling intensive database operations, improving overall application performance.

`Scalability`: It allows independent scaling of database resources as your application grows, ensuring consistent performance under increasing loads.

`Security`: Separation enhances data security by isolating sensitive information and applying specialized security measures to the database server.

`Fault Isolation: `Issues or failures on one server (PHP or database) do not affect the other, improving reliability and minimizing downtime.

`Resource Allocation`: Dedicated servers allow efficient allocation of resources (CPU, memory, storage) tailored to database needs, optimizing performance and cost-effectiveness.

`Geographical Distribution`: It facilitates replication and distribution of data across multiple locations for disaster recovery and global accessibility.
