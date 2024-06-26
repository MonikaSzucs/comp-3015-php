
c3015.cfenn.com

cloud.digitalocean.com
- can log into a server
- just like AWS

## private key thats our private key
ssh root@24.199.80.16 -i ~/.ssh/cfenn.com

public key is on the server

- you will see what kind of server it is then

thop

## you can see what is running
sudo systemctl status nginx

cd /stc/nginx/sites-enabled
- you will see a default file

## open the default file
vi default

## then you will see some code inside
- we can modify this fiel to enable https for us

cd var/www/html/c3015.cfenn.com
ls
sudo certbot renew

sudo certbot --nginx -d c3015.cfenn.com

## if we switch it to something that doesn't exist
sudo certbot --nginx -d c3016.cfenn.com
- it will fail if we dont have that domain


- use the website we have
sudo certbot --nginx -d c3015.cfenn.com

what would you like to do?
- 1 reinstall certificate
- it will successfuly deploy certificate
- it will say you successfully enabled https


## in zsh/curl do:
curl -i http://c3015.cfenn.com
- it will redirect you to https since we made a http request it will automatically redirect

## Review
1. hat is symmetric key cryptography?
- caesar cipher
- encrypt and decrypt functiona dn we use the same secrete key for both

2. what is asymetric key cryptography?
- key pair
- public key(encrypted) and private (decryupt) key

3. What does TLS stand for?
- Transport LAyer Security

4. what is SSL?
- secure socets layer
- 

5. what is HTTP data is encrypted when using HTTPS?
- application layer data - we have stuff liek query paramteres, route parameters, body of http messages, domain name - domain name in application layer is not encrypted
- when we generate a message to be sent

6. What is a digital certificate used for?
- used for provide veritfication of public key
- its improtant because we want to prevent man in the middle attacks
- provides infromation on who is the owner

7. when using TLS what properties does the secure channel provide?
- authentication, confidentiality (both parties know message is being sent and no one elese can see it in the middle) and integrity (messages cannot be modified without it being detected)

## Quiz

1. HTTPS encrypts headers (including cookies), bodies of HTTP messages, query parameters, route parameters, etc. The hostname a request is being made to may be sent in plaintext.

	True

2. Why are digital certificates used in TLS?
To prevent man-in-the-middle attacks when sending public keys over a public (untrusted) communications channel. At this stage of the TLS protocol, encrypted communications have not been established.

3. What is the defining feature of symmetric key cryptography?
The same secret key is used to encrypt and decrypt data.

4. What is the defining feature of asymmetric key cryptography?
A keypair is generated containing a public key and a private key. Any data encrypted with the public key can only be decrypted with the private key (and vice versa).

5. When using HTTPS, cookies and query parameters are sent in plain text from the client to the server. All other data is encrypted in transit.
false

6. Autoloading is a process where, when the PHP parser encounters a reference to a class which has not been loaded, we can write a function to handle resolving this reference.
True

7. According to semantic versioning, a package releasing a major (keep in mind: MAJOR.MINOR.PATCH) update is:
Not backwards compatible with previous releases

8. A program you're working on is detected to have a vulnerable dependency (e.g. after running $ composer audit you notice this). You should:
Check to see if there is a patch release of this package, which fixes the vulnerability. Assuming there is, update to the new version. If no fix exists, downgrading may be an option.

9. The goal of TLS is to provide a communications channel with the properties of authentication (the server side is always authenticated), confidentiality and integrity.

In terms of the channel providing integrity, this means:
After TLS connection establishment attackers cannot modify data sent over the channel without the modification being detectable.

10. Question 10 (1 point) 
Hard-coding environment specific data such as hostnames, database credentials, various keys, etc. should not be done as it makes the code difficult to move between environments (eg. going from dev -> QA -> staging -> production), as well as tracks potentially sensitive data in Git (a big security issue!)

The solution to this is:

Loading environment information into the application using a dependency such as DotEnv. By default the data is loaded from a ".env" file which is not tracked by version control (Git in our case).
