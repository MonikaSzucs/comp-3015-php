# Class 1 Powerpoint

## Originally PHP was exclusively a templating language
- Allows for dynamically rendering HTML files on a server, and
then sending that dynamically rendered content back to web
browsers

```
<?php if ($i % 3 === 0 && $i % 5 === 0):?>
    <?php echo "FizzBuzz" ?>
<?php elseif ($i % 3 === 0):?>
    <?php echo "Fizz" ?>
<?php elseif ($i % 5 === 0):?>
    <?php echo "Buzz" ?>
<?php else:?>
    <?php echo $i ?>
<?php endif; ?>
```

## PHP Type System
PHP has gradual, dynamic, weak typing

`Gradual`: some expressions are typed, some are untyped
`Dynamic`: type checking is performed at runtime (while the application is executing)
`Weak`: less strict rules at compile/interpretation time

## — PHP does not have —
`Strong typing`: stricter rules at compile/interpretation time. Variables will not be automatically converted between types. Note: dfns of “strong typing” vary.
`Static`: static analysis of the code is performed at compile time to check type safety

## Type Systems, where PHP fits in
`Static Typing`: types are bound to a variable and checked at compile time (PHP ❌)
`Dynamic Typing`: types are bound to a value (not a variable) and checked at runtime (PHP ✅)
`Strong Typing`: variables will not be automatically converted from one type to another (PHP ❌)
`Weak Typing`: variables will be implicitly converted between types in certain situations (PHP ✅)

## Ports
When a request is made to a server, the operating system needs a way to
determine which running process the data should be sent to.
- Ports identify specific processes and are used in network communication
- Commonly used ports are associated with specific services:
```
80 → HTTP
443 → HTTPS
22 → SSH
```

## Ports
eg #1. When you sign into Spotify, the OS needs to ensure the response goes to your Spotify application, and not Google Chrome
eg #2. When you go to a website you’re making an HTTP request → we need to
hit the web server application running on the server

When running server applications, we specify a port number which the
server listens for connections on.

## How is PHP run?
- Command line script e.g. $ php helloWorld.php
- As a web application, using a server e.g. $ php -S localhost:8000
-- For understanding how running applications using a server works, we will look into client-server architecture.
-- In production environments, and pre-production environments (eg. QA,
staging), server such as Apache or Nginx servers are used.
-- For local development we can just use the built-in PHP server.

## Client-Server Architecture
- see image on page 16 powerpoint

## Intro to PHP: Hello World!
- All PHP scripts begin with <?php
- PHP_EOL is a constant used to get the correct end of line characters based on the OS PHP is running on. “\r\n” on Windows, “\n” on anything else (Linux, MacOS, etc.).

## Data types
```
<?php
$daysPerWeek = 7;           // int
$coffeesConsumed = 99999.5; // float

$firstName = "Christian";   // double quotes
$lastName = 'Fenn';         // single quotes

$employed = true;           // booleans
$images = NULL;             // null, nothing here
$numbers = [1,2,3,4]        // array
?>
```

## Intro to PHP: Loops, Arrays
- see arrays-and-loops.php

## Intro to PHP: Associative Arrays
- see associative-arrays.php

## intro to PHP: functions
- we should always type declare parameters and return types
- int here means taht the function returns and integeter

- see functions.php, scoping.php

## pre, post, increment
$count = 0;
echo $count++ . PHP_EOL
echo ++$count . PHP_EOL
- see pre-post-increment.php

## Optional: filter, map reduce
These are functions that apply a callback function to each element in an array.
https://www.php.net/manual/en/function.array-filter
https://www.php.net/manual/en/function.array-map
https://www.php.net/manual/en/function.array-reduce.php

- see filter-map-reduce.php

## Optional: pass-by-value, pass-by-reference
`Pass-by-value`: a copy of the function argument is created and passed to the function.
- The variable defined outside the function is not changed by modifications to it within the function.
`Pass-by-reference`: the memory address of the variable is passed to the
function.
- The variable defined outside the function is changed by modifications to it within the function.

Visually explained:
https://blog.penjee.com/passing-by-value-vs-by-reference-java-graphical/

By default, PHP passes arguments by value.

When an object is passed to a function, the address of the object is
passed by value (a copy of the address is made, and passed to the
function). This acts like pass-by-reference, so often times you’ll hear
people say that PHP passes objects by reference, even though this
isn’t exactly true.