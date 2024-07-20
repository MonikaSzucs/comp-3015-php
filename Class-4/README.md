# Class 4

## Unix Time
### Unix Epoch Time
The number of seconds since January 1st, 1970, 00:00:00 Coordinated Universal Time (UTC). PHP has time() which returns this value.
echo time();

Moving forwards and backwards can be done by adding and subtracting integers from the Unix timestamp

## Cookies
### HTTP Cookies
- HTTP cookies are used to store state in the browser (client side storage)
-- Once cookies are sent to the client, it’s possible for them to be modified
--- Aside: In some cases, cookie contents will be encrypted and signed (e.g. using AES-GCM) to prevent modification without the server knowing – think authentication related cookies
- In our case, cookies will be sent from the server to the client
-- In PHP we have the setcookie function, which will cause the Set-Cookie
response header to be set
- The browser may choose to store it and send it back to the server on subsequent
requests
-- Users can block cookies. In this case, the browser will not store the cookie

The Cookie and Set-Cookie HTTP headers are described in the HTTP State
Management Mechanism RFC: https://www.rfc-editor.org/rfc/rfc6265
● Learning to read RFCs is a good skill to have
● Lots of instances in building software where something isn’t working
and you’ll need to ensure you’re following the protocol (be it HTTP,
TCP, WebSockets, etc.)

## HTTP Cookies and PHP
`setcookie` will set a “Set-Cookie” HTTP response header.

Call `setcookie` with the same name, and a time in the past in order to ask the browser to remove it.

```
# Set a cookie
setcookie('name', 'value');

# remove cookie
unset($_COOKIE['name']);
setcookie('name', '', time() - 3600);
```


- `Secure`: Only sent to the server using HTTPS (encrypted version of HTTP). Note: on localhost it can still be sent over HTTP.
- `HttpOnly`: Inaccessible to the JavaScript document.cookie API. The cookie will only be sent to the server using the Cookie request header
-- This helps mitigate XSS attacks such as the one we saw last week


Storing state in browsers: small theme example on D2L
CookiesExample.zip
Add a button to clear the cookie!

## HTTP Cookies: Notes on the demo/example
- Try running the demo and inspecting the request and response headers.
- You’ll be able to see (when submitting the form) that the `Cookie` request header is used to send data from the client to the server. The value “theme=dark” is the content of the cookie on in the browser.

- The `Set-Cookie` response header which the server sends the client asks the browser to store a new cookie, or update an existing cookie.

- Study this for quiz/exam purposes.

## Cookies and Subdomains
- A common pattern for web applications is to use subdomains on a per-product/subscription basis.
- For example, a sales site might be at example.com, and various products/services offered at subdomains of the sales site: product1.example.com, product2.example.com, etc.
- Real example: Amazon has amazon.com, aws.amazon.com, alexa.amazon.com, www.amazon.com, etc.

- Some cookies should be shared between the parent domain and all subdomains. For example, any cookie used for authentication or preferences.

- We need to be able to share cookies with the parent domain, and subdomains
- In order to achieve this, we can set the “domain” attribute of the Set-Cookie
response header value to “.example.com”.
-- Note that the leading dot character shouldn’t be needed according to the
HTTP State Management RFC: RFC 6265, it is still often included to ensure
backwards compatibility with any browsers implementing RFC 2109.
-- It’s generally a good idea to include the leading dot - doesn’t hurt to!

## Sessions
- Cookies are used to store data on the client side.
- Sessions are used to store data on the server side.

A server has many clients though, so we need a way to determine what data belongs to which user. Cookies are used for this.

Session data is stored on the server. By default, this is in the temporary files directory of
your OS.
- We can store session data in a number of other places including in Redis, or a database.
- For the purposes of this course we will just use files.
- Find the temp directory where session data is stored:
```php -r 'echo sys_get_temp_dir(), "\n";'```

Session data can be managed by using the $_SESSION array
superglobal
Before using the `$_SESSION` array we need to call `session_start()`

### Sessions: Addressing a common error
Why does this happen? What does it mean?
● PHP scripts generate HTML, but also need to generate and pass the HTTP response
headers to the web server.
● On the first occurrence of output in the file (e.g. echo, print, HTML tags), the headers
(e.g. from calls to functions such as header(), setcookie(...), session_start(), etc.) are
set at this point as they’ve been sent to the webserver.
○ This is why the error message reads “...headers have already been sent”
● At this stage, additional output can be sent, but not additional headers.
- When the PHP process communicates with the web server, the content needs to be after the response headers:

Flash error messages and remember form data using sessions for the lab: lab-3-starter-kit.zip

## Horizontal Scalability and Session Data
- By default session data is stored in files on the web server.
- For scalable systems we can move the storage of session data to another server.
- This approach allows for “horizontal scalability”


## Questions
- What PHP function is used to set a cookie?
In PHP, the function used to set a cookie is setcookie(). Here's how you typically use it

```
setcookie(name, value, expire, path, domain, secure, httponly);
```

- What HTTP header is used to ask the browser to store a cookie?
The HTTP header used to ask the browser to store a cookie is Set-Cookie.
setcookie('name', 'value');

- How do we ask the browser to remove a cookie?
setcookie("user_id", "", time() - 3600, "/");

- Are HTTP cookies sent back to the server on subsequent requests?
Yes, HTTP cookies are sent back to the server on subsequent requests made by the browser to the same domain and path from which the cookie was originally set. This behavior allows servers to maintain session information, remember user preferences, and personalize the user experience across multiple interactions.

- What is an “HttpOnly” cookie?
An "HttpOnly" cookie is a feature in web browsers that restricts cookies from being accessed through JavaScript. When a cookie is set with the HttpOnly flag, it can only be accessed and modified by the server and is not accessible via client-side scripts such as JavaScript. This helps mitigate certain types of attacks, such as cross-site scripting (XSS), where an attacker might attempt to steal or manipulate cookies using malicious scripts injected into a website.
```
Set-Cookie: cookie_name=cookie_value; HttpOnly
```

- What is a “secure” cookie?
A "secure" cookie is a type of cookie that is transmitted over HTTPS (HTTP Secure) connections only. When a cookie is marked as "secure", the browser ensures that it is only sent to the server when a request is made with the HTTPS protocol. This provides an additional layer of security because HTTPS encrypts the data transmitted between the client (browser) and the server, preventing interception or tampering by attackers.
``` 
Set-Cookie: cookie_name=cookie_value; Secure
```

- What is the difference between cookies and sessions?
Cookies:
Storage Location: Cookies are small pieces of data stored on the client's side (i.e., in the user's browser).

Purpose: Cookies are primarily used for state management, tracking user activity, and storing user preferences across different pages or visits to a website.

Size Limitation: Cookies have size limitations (usually up to 4KB) imposed by browsers.

Expiration: Cookies can have an expiration date/time set. They can either be session cookies (stored temporarily and deleted when the browser is closed) or persistent cookies (stored on the user's device for a specified duration).

Accessibility: Cookies can be accessed and modified by both the client-side (JavaScript) and the server-side (via HTTP headers).

Sessions:
Storage Location: Sessions are stored on the server side.

Purpose: Sessions are used to store temporary data associated with a user's interactions with a web application during a browsing session.

Identification: Sessions are typically identified by a unique session identifier (Session ID), which is usually stored in a cookie on the client side.

Data Storage: Session data can include user authentication tokens, shopping cart contents, and other session-specific information.

Lifetime: Sessions typically expire after a certain period of inactivity or when the user closes the browser.

Key Differences:
Storage: Cookies store information on the client side, while sessions store information on the server side.

Handling: Cookies are handled by the client's browser, whereas sessions are managed by the web server.

Data Size: Cookies have a size limit (up to 4KB), while sessions can store larger amounts of data since they are stored on the server.

Security: Sessions are considered more secure for storing sensitive information because session data is stored on the server and not exposed to the client (except for the session ID stored in a cookie).

Lifetime: Cookies can have a longer lifespan if they are persistent, while sessions typically last only as long as the user is interacting with the application.

-- Think client-server architecture


- How does the server know which session (and associated data) belongs to which client?
The server identifies which session (and associated data) belongs to which client primarily through the use of a session identifier (Session ID). Here's how it typically works:

Session Initialization: When a client (usually a web browser) makes a request to the server for the first time, the server generates a unique Session ID for this client's session. This Session ID is a random string of characters that is unique for each session.

Session ID Storage: The server then sends this Session ID back to the client, typically in the form of a cookie or sometimes as part of the URL (although this is less common due to security considerations).

Subsequent Requests: On subsequent requests from the client, the client's browser automatically includes this Session ID in the request, usually as a cookie named something like session_id.

Server-Side Mapping: When the server receives a request from the client, it looks at the Session ID included in the request. Using this Session ID, the server can retrieve the corresponding session data that it has stored in its memory or database.

Session Data Access: The server can then access and manipulate the session data associated with that Session ID. This data might include user-specific information (like authentication status), shopping cart contents, preferences, etc.

Session Expiration: Sessions typically have an expiration time or are terminated after a period of inactivity. When a session expires (either due to timeout or explicit logout), the associated session data is typically deleted from the server's storage.

Key Points:
Security: It's crucial that the Session ID is generated securely (random and unpredictable) to prevent attackers from guessing or hijacking sessions.

Persistence: If the client's browser supports cookies and the server has set the session cookie to be persistent, the Session ID cookie will persist across browser sessions, ensuring continuity of the session even if the browser is closed and reopened.

State Management: Sessions allow web applications to maintain stateful interactions with clients without relying solely on client-side storage (like cookies), which can be manipulated or tampered with.

-- This is probably one of the most important questions to be able to answer



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


## Command
mysql -u root

show databases;
create database in_class_example_db
