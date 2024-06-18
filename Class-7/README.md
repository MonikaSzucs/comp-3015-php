# Class 7
- PHPUnit
- DotEnv
- semantic versioning

composer init
- package name is a ventor
[cfenn/in-class-example]: 

## Setup
PS C:\Users\mszuc> cd desktop
PS C:\Users\mszuc\desktop> mkdir example


    Directory: C:\Users\mszuc\desktop


Mode                 LastWriteTime         Length Name
----                 -------------         ------ ----
d-----        2024-06-10   6:24 PM                example


PS C:\Users\mszuc\desktop> cd example
PS C:\Users\mszuc\desktop\example> composer init 

                                            
  Welcome to the Composer config generator  
                                            


This command will guide you through creating your composer.json config.

Package name (<vendor>/<name>) [mszuc/example]:
Description []:
Author [Monika Szucs <monika.szucs.work@gmail.com>, n to skip]:
Minimum Stability []:
Package Type (e.g. library, project, metapackage, composer-plugin) []: project
License []: MIT

Define your dependencies.

Would you like to define your dependencies (require) interactively [yes]? no     
Would you like to define your dev dependencies (require-dev) interactively [yes]? no
Add PSR-4 autoload mapping? Maps namespace "Mszuc\Example" to the entered relative path. [src/, n to skip]: 

{
    "name": "mszuc/example",
    "type": "project",
    "license": "MIT",
    "autoload": {
        "psr-4": {
            "Mszuc\\Example\\": "src/"
        }
    },
    "authors": [
        {
            "name": "Monika Szucs",
            "email": "monika.szucs.work@gmail.com"
        }
    ],
    "require": {}
}

Do you confirm generation [yes]?
Generating autoload files
Generated autoload files
PSR-4 autoloading configured. Use "namespace Mszuc\Example;" in src/
Include the Composer autoloader with: require 'vendor/autoload.php';
PS C:\Users\mszuc\desktop\example> 


# third party php code to install

- we are interacting with package repository
php packages are hosted like in [packagist.org](packagist.org)
- search for http client
guzzlehttp/guzzle
- there is a link to their github and it will show you how to use it

in termal install:
composer require guzzlehttp/guzzle
