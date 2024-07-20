# Quiz 1
1. PHP can create and write to files on a client system.

For example, if you were to develop a PHP application and deploy it to a web server, you would be able to use file_put_contents to write a file to the hard drive of anyone who visits your website.
> false

2. A typical server running PHP code will:
a. Accept requests from clients
b. Find the PHP file to execute
c. Pass the PHP file to the PHP interpreter
d. Return the generated response to the client
> true

3. What is the output from the following PHP program (what does $total hold after the sum function returns)?
--
```
function sum(array $numbers): float {
    $sum = 0;
    foreach ($numbers as $number) {
        $sum += $number;
    }
    return $sum;
}

$numbers = [-2.5, 4.0, 8.0];
$total = sum($numbers);
echo $total;
```
9.5

4. Given the following call stack (function names are bolded):

----
```
isEmpty
validateEmail
saveUserInfo
registerUser
```
----

saveUserInfo was called by validateEmail.
> false

5. Given an associative array in PHP:
```
$drinkInventory = [
    'coffee' => 99,
    'soda' => 83,
    'beer' => 76,
];
What does the following statement print out?

echo 'There are ' . $drinkInventory['coffee'] . ' cups of coffee available.' . PHP_EOL;
```
> "There are 99 cups of coffee available."

6. An object in PHP can be constructed by using the new operator. If there are no required constructor arguments, the parentheses may be omitted. For example: $user = new User;
> True

7. What does the following code output?
```
$userData = "1234|Chris|BCIT|Vancouver";
$userDataParts = explode('|', $userData);
echo $userDataParts[2] . PHP_EOL;
```
> BCIT

8. What does the following code output?
--
```
$drinkInventory = [
    'soda' => 99,
    'coffee' => 72,
    'beer' => 99,
];

foreach ($drinkInventory as $drink => $count) {
    echo "$drink: $count" . PHP_EOL;
    exit(0);
}
```
> soda: 99

9. What is the output from the following statements?
```
$name = 'Jerry Seinfeld';
echo 'Hello, $name\n';
```
> Hello, $name\n

10. PHP code is sent to the browser and interpreted, in a similar way that JavaScript code is sent to the browser and interpreted. This is how we are able to conditionally render HTML elements.
> false 
