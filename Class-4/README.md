

# Quiz 2

## Question 1 (1 point) 
A web application using sessions has many clients. How does the server know which session data belongs to which client?

- The client provides a session ID when making a request to the server. Typically this data is stored in the browser as the contents of a session cookie.

## Question 2 (1 point) 
You're tasked with building a registration form which will accept an email and password from the end user.

Keeping in mind that you don't want passwords to show up in the URL, the type of HTTP request that should be used to submit the data to the server is a:

- HTTP POST request

## Question 3 (1 point) 
An HttpOnly cookie can be accessed using the JavaScript Document.cookie API.
- False

## Question 4 (1 point) 
When horizontally scaling a web application we don't want to store session data on web servers because:

- If the load balancer takes eg. a round-robin approach to forwarding requests to web servers (request A goes to web app server 1, request B goes to web app server 2, etc.), there's no guarantee that the session data associated with a particular session ID will be found on the web server (the session data for a given user might be on web server 1, but web server 2 is handling the request).

## Question 5 (1 point) 
The "Set-Cookie" HTTP response header is sent from the server to a client. This HTTP response header is used to ask the browser to store (or delete a cookie).
- True

## Question 6 (1 point) 
Cookies are stored on the server, within a directory of your choosing.
- False

## Question 7 (1 point) 
The "Cookie" HTTP request header is sent from a client to the server. It contains cookies that the client (the browser) sends to the server.
- True

## Question 8 (1 point) 
You're working on a personalization feature for a web application that is set up in the following manner:

The top level domain is example.com (which acts as a sales site), and there are 3 subdomains: product1.example.com, product2.example.com, product3.example.com. The user should be able to select a colour theme which will be stored in a cookie and sent back to the various servers on subsequent requests.

What should the server running example.com send the client so that a cookie can be shared between the top-level domain and all subdomains?

- It is not possible to share a cookie between multiple subdomains due to the design of HTTP. Instead, we should set one cookie for each subdomain, and one cookie for the top-level domain (TLD):

Set-Cookie: theme=<value>; path=/; domain=example.com

Set-Cookie: theme=<value>; path=/; domain=product1.example.com

Set-Cookie: theme=<value>; path=/; domain=product2.example.com

Set-Cookie: theme=<value>; path=/; domain=product3.example.com

## Question 9 (1 point) 
The data encoding type that a <form> will use is controlled by the enctype attribute.
Uploading files to a server requires the which enctype attribute value?

- multipart/form-data

## Question 10 (1 point) 
A server can request that a browser removes a cookie by sending the HTTP "Delete-Cookie" response header.
- False

## Question 11 (1 point) 
HTTP GET requests pass data to the server using query parameters in the URL.
For example: http://example.com?id=123&school=bcit
- True

