<?php
    // in client side javascript world you dont have acceess to 
    // clients hard drive - we can write code when we click upload 
    // we can open a file picker but we dont have direct access to hard drive
    // this is written on the server side then
    // php is a server side language
    file_put_contents('test.txt', 'coffee|pop|juice|milk');
    $fileContents = file_get_contents('test.txt');

    // this is like a string split in javascript
    $drinks = explode('|', $fileContents);

    foreach ($drinks as $drink) {
        echo $drink . PHP_EOL;
    }

    $commaSepDrinks = implode(',', $drinks);

    file_put_contents('csv_example.csv', $commaSepDrinks);

    var_dump($fileContents);


    
?>