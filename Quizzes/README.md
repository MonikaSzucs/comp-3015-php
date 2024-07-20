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


# Quiz 2
1. A web application using sessions has many clients. How does the server know which session data belongs to which client?
> The client provides a session ID when making a request to the server. Typically this data is stored in the browser as the contents of a session cookie.

2. You're tasked with building a registration form which will accept an email and password from the end user.

Keeping in mind that you don't want passwords to show up in the URL, the type of HTTP request that should be used to submit the data to the server is a:
> HTTP POST request

3. An HttpOnly cookie can be accessed using the JavaScript Document.cookie API.
> false

4. When horizontally scaling a web application we don't want to store session data on web servers because:
> If the load balancer takes eg. a round-robin approach to forwarding requests to web servers (request A goes to web app server 1, request B goes to web app server 2, etc.), there's no guarantee that the session data associated with a particular session ID will be found on the web server (the session data for a given user might be on web server 1, but web server 2 is handling the request).

5. The "Set-Cookie" HTTP response header is sent from the server to a client. This HTTP response header is used to ask the browser to store (or delete a cookie).
> true

6. Cookies are stored on the server, within a directory of your choosing.
> false

7. The "Cookie" HTTP request header is sent from a client to the server. It contains cookies that the client (the browser) sends to the server.
> true

8. You're working on a personalization feature for a web application that is set up in the following manner:

The top level domain is example.com (which acts as a sales site), and there are 3 subdomains: product1.example.com, product2.example.com, product3.example.com. The user should be able to select a colour theme which will be stored in a cookie and sent back to the various servers on subsequent requests.

What should the server running example.com send the client so that a cookie can be shared between the top-level domain and all subdomains?

> Set-Cookie: theme=<value>; path=/; domain=.example.com

9. The data encoding type that a <form> will use is controlled by the enctype attribute.

Uploading files to a server requires the which enctype attribute value?
> multipart/form-data

10. A server can request that a browser removes a cookie by sending the HTTP "Delete-Cookie" response header.
> false

11. HTTP GET requests pass data to the server using query parameters in the URL.
For example: http://example.com?id=123&school=bcit
> true

# Quiz 3
1. Proper password management consists of encrypting passwords, using an encryption key stored on the web server. It's important to note that we need to use encryption as it is a reversible process: we should encrypt on registration, and decrypt on login in order to verify the password of a user (we eventually compare the plaintext passwords just as we compare any other strings).
> false

2. Bcrypt is an encryption function which takes a plaintext password and a secret encryption key as parameters. It returns ciphertext (which is the result of an encryption operation).
> false

3. What is the cause of SQL injection vulnerabilities?
> Improper mixing of user input with SQL queries.
> For example, constructing a query in PHP such as "SELECT * FROM users WHERE name = $name", where $name contains input from a user would be vulnerable to a SQL injection attack.

4. When we are thinking about the architecture of a system, for scalability purposes a database should always be hosted on the same physical machine as the web server.
> false

5. Parameterized prepared statements protect against SQL injection attacks by:
> Sending the SQL (code) and variable data for the query in two independent requests from the web server to the database server. This separation of code and data allows the database to properly build the query to be executed, and not mistakenly execute input data from a user as (SQL) code.

6. A hash function maps data of arbitrary size to data of fixed size.

For example:
In the following pseudocode, given a hash function, H, and calling it with two different size string parameters:
let resultOne = H("abc");
let resultTwo = H("abcdefghijklmnopqrstuvwxyz");
The size of the data being held in the resultOne and the resultTwo variables is the same.
> true

7. Horizontal scaling (or "scaling out" as it is sometimes referred to) means adding additional machines to your infrastructure.
> true

8. Using a Bcrypt "cost" parameter of ~30 is generally recommended today. There are minimal negative usability impacts of this "cost" and it makes it extremely time consuming for attackers to crack passwords.
> false

9. Using a salt guarantees that:
> Users with the same plaintext password will have unique hashes generated (assuming different salts were generated for both users). This mitigates rainbow tables (tables of pre-computed digests) that a malicious user could otherwise use save time in password cracking.

# Quiz 4
1. HTTPS encrypts headers (including cookies), bodies of HTTP messages, query parameters, route parameters, etc. The hostname a request is being made to may be sent in plaintext.
> true

2. Why are digital certificates used in TLS?
> To prevent man-in-the-middle attacks when sending public keys over a public (untrusted) communications channel. At this stage of the TLS protocol, encrypted communications have not been established.

3. What is the defining feature of symmetric key cryptography?
> The same secret key is used to encrypt and decrypt data.

4. What is the defining feature of asymmetric key cryptography?
> A keypair is generated containing a public key and a private key. Any data encrypted with the public key can only be decrypted with the private key (and vice versa).

5. When using HTTPS, cookies and query parameters are sent in plain text from the client to the server. All other data is encrypted in transit.
> false

6. Autoloading is a process where, when the PHP parser encounters a reference to a class which has not been loaded, we can write a function to handle resolving this reference.
> true

7. According to semantic versioning, a package releasing a major (keep in mind: MAJOR.MINOR.PATCH) update is:
> Not backwards compatible with previous releases

8. A program you're working on is detected to have a vulnerable dependency (e.g. after running $ composer audit you notice this). You should:
> Check to see if there is a patch release of this package, which fixes the vulnerability. Assuming there is, update to the new version. If no fix exists, downgrading may be an option.

9. The goal of TLS is to provide a communications channel with the properties of authentication (the server side is always authenticated), confidentiality and integrity.

In terms of the channel providing integrity, this means:
> After TLS connection establishment attackers cannot modify data sent over the channel without the modification being detectable.

10. Hard-coding environment specific data such as hostnames, database credentials, various keys, etc. should not be done as it makes the code difficult to move between environments (eg. going from dev -> QA -> staging -> production), as well as tracks potentially sensitive data in Git (a big security issue!)

The solution to this is:
> Loading environment information into the application using a dependency such as DotEnv. By default the data is loaded from a ".env" file which is not tracked by version control (Git in our case).

# Quiz 5
1. You're tasked with changing a number of API endpoints from using an auto-incrementing integer which can potentially leak system information to clients such as how many organizations your company has registered, to instead using UUIDs in requests (see: https://en.wikipedia.org/wiki/Universally_unique_identifier)

One endpoint that needs to be updated is:

/api/v1/organization/{organization_id}/upload_photo (note that organization_id is the auto-incrementing integer)

Keeping in mind that when code is deployed to a server, clients may already be on the page that has the JavaScript code to make the /api/v1/organization/{organization_id}/upload_photo request (and there's an iOS app that makes requests to the server), how should we safely update the endpoint?
> We should change it in two steps. First, release a v2 API endpoint. Initially this will not be hit in production. Second, release the client side changes (web and mobile) that hit the v2 API endpoint. A client can make requests to either endpoint, so outdated clients will continue to work.

2. A RESTful Web API uses:
> Resources and HTTP verbs. For example, to update a "article" resource, a HTTP PUT request could be made to /api/v1/articles/{id}, and to create a new article, a HTTP POST request could be made to /api/v1/articles

3. In order to set up deployments one technique is to use Git. GitHub supports deploy keys. In order to use GitHub deploy keys we should:
> Generate a keypair (public and private keys) on our server, and upload the public key to GitHub. 

4. In order to associate a domain name with an IPv6 address, we should create a
> DNS AAAA record

5. Making modifications to DNS records causes the changes to take effect around the world immediately.
> false

6. Given a server with 4 CPU cores, running Nginx with a configuration of 4 worker_processes and 512 worker_connections, the system will be able to handle 2048 clients concurrently, with the 4 worker_processes running in parallel across the CPU cores.
> true

7. A typical setup for serving a PHP application is:
Run Nginx (which would usually listen on port 80 for HTTP and 443 for HTTPS).
When an HTTP request hits the server, Nginx will forward the request to PHP-FPM (PHP FastCGI Process Manager) which is responsible for handling the PHP processes.
Once PHP-FPM processes the PHP script, it will send the response back to Nginx.
Nginx receives the response from PHP-FPM and sends the response back to the client.
> true