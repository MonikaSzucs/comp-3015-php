# Class 10
## Git Workflow
1. Clone an existing repository, or create a new repository
2. Create a new branch: $ git checkout -b <branch name>
3. Make changes to the code
4. Add the changes to the Git “staging area”: $ git add .
5. Commit the changes: $ git commit -m “<descriptive commit message>”
6. Push the branch to the remote repository: $ git push origin <branch name>

## pushing changes to remote repository
Your computer authenticates with GitHub using a username/password, or
preferably, key based authentication:

## How git can help use deploy to a server
● Our server can authenticate with GitHub
● First, run $ git clone <repo info> on the server
● Run $ git pull origin master when we want to deploy to our server (run it from the web app server!)
● Our server will have whatever was on the master branch

## DEployments using Github + deploy keys
Steps:
1. Configure Nginx to pass PHP files to php-fpm
2. Configure the Nginx root directory (where Nginx should
serve files from)
3. Generate a keypair on the application server
4. Upload the public key to GitHub

## Seriving PHP applications
There are three parts we need to understand:
1. What Nginx is
2. What PHP-FPM is
3. How Nginx interacts with PHP-FPM

## Nginx
- The main configuration file Nginx uses is /etc/nginx/nginx.conf
- This configuration file can load additional configuration files (which are typically also in the /etc/nginx directory).

- Nginx has one master process and multiple worker processes
- The master process reads and evaluates config files, and manages the worker child processes
- Worker processes fulfill requests

## How many connections can we handle?
● We can define the number of worker_processes that the master Nginx
process will manage.
○ In general, setting this to the number of available CPU cores your server has is a
good start
● We can define the maximum number of simultaneous connections that a
worker process can have open (to clients that have sent requests, other
servers, etc.)
○ See worker_connections
● The maximum number of clients Nginx can handle concurrently is:
Max concurrent connections = worker_processes * worker_connections

## Concurrency and Parallelism
`Concurrency`:
● Two or more tasks can start and be run in overlapping time periods
○ Think of it as an attribute of a program/system. When the program runs it may or may not be run in parallel
○ Processes are interleaved
`Parallelism`:
● Tasks run at the same time (eg. on a multi-core processor)
○ eg. with two CPU cores:

Two lines for one ATM machine: this is concurrency
Two lines and two ATM machines: this is parallelism

Max connections = worker_processes * worker_connections
“auto” will use the number of
available CPU cores

## Nginx Documentation
● https://nginx.org/en/docs/beginners_guide.html
● https://nginx.org/en/docs/ngx_core_module.html

## PHP-FPM
PHP-FPM: PHP-FastCGI Process Manager

“FPM (FastCGI Process Manager) is a primary PHP FastCGI implementation containing some features (mostly) useful for heavy-loaded sites.”

FastCGI? → Fast Common Gateway Interface
CGI? → Common Gateway Interface


## What is PHP-FPM?
Web servers (e.g. Nginx) are programs, that we pass other programs
to (e.g. our PHP applications), and somehow the web server executes
those programs.

We configure our web servers to pass our applications to a running
PHP-FPM process, and that process takes care of executing our
application.

## passing files to PHP-FPM

Within an Nginx config such as: /etc/nginx/sites-enabled/default
~ is for case-sensitive matching:
https://nginx.org/en/docs/http/ngx_http_core_module.html#location

## configuring root directory, server name
Within an Nginx config such as: /etc/nginx/sites-enabled/default

## Generate a keypair on your *server* using ssh-keygen

## Adding the public key to GitHub
- Add the public key (note the .pub extension) to GitHub:

## Deploying: $ git pull origin master
Note that you’ll need to clone the repository first.
```
$ git clone <repo info>
```

## Alternatives to Nginx / PHP-FPM
FrankenPHP: https://frankenphp.dev/ - this uses an application server called Caddy

## Domain Name System (DNS) Intro
DNS translates domain names to IP addresses.
As a web app developer you need to know about DNS records.

DNS works with different types of records
● “A” record: points to the IPv4 address of a server
● “AAAA” record: points to the IPv6 address of a server
● “CNAME” record: points one domain to another domain
○ Commonly used for adding support for the www “prefix”
● “NS” record: name server record, which contains the authoritative name servers

## DNS INTRO ()
DNS record changes do not occur immediately!
See: https://www.whatsmydns.net/

## Deployment Strategies
### Blue-Green Deployments
Idea:
1. Run application servers behind a load balancer
2. On deployment, replicate the servers
3. Test the newly provisioned servers are in an OK state post-deployment
4. Modify the load balancer to shift traffic to the newly provisioned servers

## Blue-Green Deployments: pre-deployment
100% of traffic hits
the “green” servers

## Blue-Green Deployments: Deplyment initiated
A deployment is initiated and servers are duplicated.
New servers running the updated application are in the blue group.

## Blue-Green Deployments: Success
If all goes well, 100% of the traffic can be shifted over to the servers running the new code!