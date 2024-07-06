## Installations

php artisan make:model Article --all

## one you update teh table in migrate folder
- it create the tables
php artisan migrate

## run table
mysql -u root -p

use laravel_lab_six
show tables
describe articles

## to run
php artisan serve

## to see json
http://localhost:8000/api/articles