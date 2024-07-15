# Class 9

## What is an API?
How two pieces of software can communicate.
eg. PHP provides two APIs to interact with MySQL (mysqli, PDO):
https://www.php.net/manual/en/mysqlinfo.api.choosing.php

## Part 2: Web APIs
### HTML centric applications
- What if you build this and then you need to support iOS and Android apps?

## Web APIs: Ideas
- Build server side applications that can be used for any clients
○ Not limited to interacting with browsers
- Send response data in a platform independent form (HTML needs a parser in the browser to be interpreted)
○ Basically any client can interpret JSON payloads

## Web Application Programming Interfaces
(APIs)
- any clicnet can make requests to web

- Common to build APIs within a company to have one server side
system support unlimited types of clients (e.g. iOS, Android, web
apps, watch apps, TVs, the next big thing in X years, etc.)

## Part 3: RESTful Web APIs
### How should we structure web APIs?
One main endpoint?
HTTP GET /main

We could pass data in the URL that says what to do on the server
HTTP GET /main?action=getArticle&id=123

This would work. We have started to use HTTP as a transport layer protocol, though. As our applications increase in complexity we begin to build our own protocol on top of HTTP.
We can do better.

## Introducing resources
Idea:
No more /main endpoint. Instead, reference the type of resource (eg. article,
user) you want to interact with:
HTTP GET /users ← get all users
HTTP GET /articles/<id> ← get the article with :id

## Introducting HTTP verbs: GET, POST, PUT, DELETE
Remember that a verb indicates an action! Think of the endpoints on our servers as being actions
that will be carried out.
HTTP GET /articles ← get all articles
HTTP POST /articles ← create a new article
HTTP PUT /articles/<id> ← replace (used to update) the article with <id>
HTTP DELETE /articles/<id> ← delete the article with <id>
● The above should look kind of familiar: we’ve been building applications roughly following
this structure already
● Note that HTTP POST and PUT data is in the body of the HTTP request.
● HTTP DELETE just uses the URL - don’t provide a HTTP request body for DELETE

## RESTful web APIs
REST: Representational State Transfer
● Originally described by Roy Fielding in his 2000 PhD thesis:
https://www.ics.uci.edu/~fielding/pubs/dissertation/software_arch.htm
● REST is a set of architectural design principles for client-server programs
No official standard
Not a protocol
●Academic definitions and applied usage differs
○ We’ll start with the applied usage to get an intuitive feeling for RESTful services

## RESTful endpoints example
HTTP GET /articles ← return all articles
HTTP POST /articles ← save a new article
HTTP PUT /articles/{id} ← update an article (replace an article)
HTTP DELETE /articles/{id} ← delete an article

## HTTP request types
GET ← idempotent, data goes in the URL as query parameters
POST ← data goes in the body of the HTTP message
PUT ← idempotent, data in the HTTP message body
DELETE ← idempotent, requests deletion of a resource
Idempotent: system state does not change by making the same request
multiple times. eg 1. you can’t delete something twice. eg 2. You can’t
update a title to “test” twice. Once it’s updated once a subsequent update
doesn’t do anything.

https://martinfowler.com/articles/richardsonMaturityModel.html

## Part 3.5 API endpoint versioning
### API endpoint versioning
● Sometimes it’s not possible to make backwards compatible API changes.
● Consider a project where you’re refactoring a system to be centered around
companies instead of users. Each company has many users and existing
users can invite more users via email.
● Resources are now owned by “company” records instead of “user” records.
● A production server has the endpoint: /api/subscription/{user_id}

● The production server has the endpoint: /api/subscription/{user_id}
● We need to change it to /api/subscription/{company_id}
● Danger: we can’t simply update our server to accept a company ID instead
of user ID.
○ The existing clients (front end web app, iOS, Android apps) will still
send the user ID and potentially request a subscription update for the
wrong company.

The solution is to version our API endpoints:
● /api/v1/subscription/{user_id} → /api/v2/subscription/{company_id}
● Release process:
○ The server-side update is released first
○ Each client application can selectively update to the
/api/v2/subscription/{company_id}
● If anything goes

## PArt 4: Frameworks
### Server Side Frameworks

Java: Spring, Play
Ruby: Ruby on Rails
Node: Express
PHP: Laravel, Symfony, Laminas
Lots of web frameworks use very similar patterns/ideas. Learning one of them
makes it easy to learn the next one you’re interested in.

# Frameworks Why?
● Lots of web applications do similar things
○ Authentication
○ CRUD
○ Cookie handling
○ Sessions
○ Conditional rendering
○ Caching
○ Middleware
● Frameworks provide a common way of handling these things, and speeds up
how quickly we can deliver high quality software.
● Why reinvent the wheel?

## Client side JS fraemwork
Outside of the scope of this course
React, and a full stack framework on top of React: NextJS
Vue, and a full stack framework on top of Vue: NuxtJS
● BCIT offers:
○ https://www.bcit.ca/courses/react-and-modern-javascript-comp-2913/
○ https://www.bcit.ca/courses/angular-and-vue-js-fundamentals-comp-2909/

## WEb frameworks
Typical Features
● Routing: map a URL to a function e.g. /posts/1 → getPost($id)
● Built-in defences against SQL injection attacks
● Object-Relational Mapper
● Database Migrations
● Middleware e.g. redirectIfAuthenticated
○ Automatically run on every request to your application (depending on
config)
● Application scaffolding: e.g. Laravel can generate an authentication system
(e.g. register, login, logout) with one command

## Laravel Intro
● https://laravel.com/
● Open source software: https://github.com/laravel/laravel
● Tutorials: https://laracasts.com/

## Laravel getting started
```
$ composer create-project laravel/laravel <project name here>
$ cd <project name here>
$ php artisan serve
```

● All applications have an entry point, standard default structure
● The public/index.php script is the entrypoint for Laravel applications
● (PSR-4) Autoloading is configured by default

## Laravel: Application Scaffolding
$ php artisan make:model <model name> -mcr
-m: model
-c: controller
-r: resourceful controller → particular functions signatures generated for
you
or:
$ php artisan make:model <model name> --all

## Database Migrations
Used to keep track of database changes (they’re files that get tracked by Git), rollback changes

public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id()
    })
}

Running migrations: $ php artisan migrate

After running the DB migrations we can get a shell to MySQL and confirm that the tables were created.
show tables;

## REquest-function mapping
`Idea`: request that is made to our server should be handled by a function.
For example:
`HTTP GET /articles` maps to public function `getArticles(Request $request) {...}`
This process is called routing. You can build a router on your own in plain PHP code.
Typical implementations use:
https://www.php.net/manual/en/function.call-user-func.php

History of REST: https://twobithistory.org/2020/06/28/rest.html

## Part 5: CORS

## Web API/UI Server Architecture
Laravel now configures CORS to be set up in a very permissive manner.
This is not the case for all frameworks out there.
See cors.php

## Cross-Origin Resource Sharing
The response was blocked by the browser by the same origin policy.

## Same Origin Policy
● Security measure implemented by browsers
● Imagine without the Same Origin Policy
○ You’re authenticated with your online banking website 🔐
○ You (accidentally) go to a malicious website in another tab
○ The malicious website can do anything you can do on your banking
website (via JavaScript) – reading cookies, making reqs on your behalf,
etc.
● This is the kind of case that the SOP aims to mitigate

## Access-Controle-Allow-Origin response header
If the Access-Control-Allow-Origin response header value does not match the Origin request header, the response will be blocked from being read.

Note that this is the case for “simple requests”. Other requests may trigger a “preflight” CORS request which will occur before sending the actual cross-origin request. This prevents write operations.

