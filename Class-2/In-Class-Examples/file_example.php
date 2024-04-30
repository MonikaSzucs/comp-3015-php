<?php
    // in client side javascript world you dont have acceess to 
    // clients hard drive - we can write code when we click upload 
    // we can open a file picker but we dont have direct access to hard drive
    // this is written on the server side then
    // php is a server side language
    file_put_contents('test.txt', 'Hello, COMP 3015');
    $fileContents = file_get_contents('test.txt');

    var_dump($fileContents);


    
?>