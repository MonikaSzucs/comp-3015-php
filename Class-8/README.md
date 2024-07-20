
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

# PowerPoint Notes Class 8
## Symmetric Key Cryptography Intro
The same secret key is used for encryption and decryption for symmetric key ciphers. In general, this is the interface for symmetric key cryptography functions:

let ciphertext = encrypt(plaintext, secretKey)
let plaintext = decrypt(ciphertext, secretKey)

Equivalently:
let plaintext = decrypt(encrypt(secretKey, plaintext), secretKey)

## Famous Cipher: The Caesar Cipher
- Named after Julius Caesar who used it to secure communications
- Idea: pick a numeric key such as 3, and use this key to shift plaintext letters to their corresponding ciphertext letters
- Example: plaintext = “ABC”, with a right shift of 3 becomes “DEF”
- Decryption is performed by shifting letters to the left
- “Hello World” of Cryptography

- Caesar Cipher Encryption: Shift right by the key
- Caesar Cipher Decryption: Shift left by the key

## Casesar Cipher 
- Today it offers no practical security
- Easy to break the cipher by examining letter frequencies
-- Every language has some letters used much more than others. You can use this info to find the encryption key (the value letters are shifted by)
- Understanding it is the “Hello World” of cryptography

## AES Example
Advanced Encryption Standard (AES) is the symmetric key cryptography
algorithm that should be used these days.
- Do not write your own algorithms for usage in real systems
-- Use battle-tested industry standard algorithms instead
- We won’t look into the implementation of it since this is not a cryptography
course
- See: AES.zip on D2L

## Asymmetric Key Cryptographic Intro
`Idea:`
- A keypair is generated
- The keypair consists of a public key and a private key
- For ensuring confidentiality of data in transit, a message is encrypted using the public key can only be decrypted using the corresponding private key

## Securing message sin transit with asymetric key crypto
After an initial public key exchange (Bob has received Alice’s public key, Alice has received Bob’s public key):
● Bob writes a message to Alice
● Bob encrypts the message with Alice’s public key
● Bob sends the ciphertext to Alice
● Alice uses her private key to decrypt the ciphertext

## Before we get into TLS
`Authentication`: verify that a user is who they claim to be.
- Example: if you know the username + password to a service, you’re granted access based on the idea that only you should know that combination of data.
`Authorization`: checks to see if a given user is allowed to perform a certain function or access particular data
- Think clearance levels: classified, secret, top secret, etc.

## Transport Layer Security (TLS)
- Cryptographic protocol for secure network communications
- Evolution of Secure Sockets Layer (SSL)
-- TLS version 1 started as a version of SSL
-- You’ll still often see references to SSL, and lots of people use it
interchangeably with TLS (incorrectly)
- Can be used to secure email, VoIP, various other forms of messaging
- We are primarily interested in the role it plays in securing HTTP

## TLS: Goals
See: https://www.rfc-editor.org/rfc/rfc8446#section-1
In short:
- `Authentication`: the server side of the channel is always authenticated.
- `Confidentiality`: data sent over the network after connection establishment is only visible to the communicating endpoints.
- `Integrity`: data sent over the channel cannot be modified by an attacker without detection.

## HTTPS
HTTPS is HTTP with TLS

All headers (e.g. Cookie, Set-Cookie), query parameters, route parameters, the
body of the HTTP message (e.g. HTTP POST data), etc. is encrypted.

The only plaintext data is the hostname. eg. bcit.ca and lower level protocol
information such as the IP addresses, port numbers, etc.
Note: https://blog.cloudflare.com/encrypted-sni

## Problem
What about a man-in-the-middle attack?
Traffic is routed through a malicious individual.

## Key Idea
TLS does NOT exchange public keys like shown in the previous slides due to man-in-the-middle (MITM) attacks.
Solution to the MITM attack: The server sends a client a Digital Certificate which contains a public key.

## Digital Certificate
- Used to prove/verify ownership of a public key
- Sometimes called “public key certificates”
- Data is encrypted with the private key of a Certificate Authority
-- Everyone can decrypt this since everyone has access to the public keys of the CA (the public keys of the root CAs are loaded onto your
computer)

## Getting a Digital Certificate
Note: in order to prove that you own a domain, as part of the verification process a challenge is issued.
For example: create a DNS record with a given value, or serve a
particular HTTP page.
See: https://letsencrypt.org/how-it-works/#domain-validation

## Digital Certificates from root CAs
- These provide the public keys of the CA (Certificate Authority)
- The public keys from the CA allow us to verify any certificate which that CA has signed (encrypted using the corresponding private key)

## Certificate Key Replacement?
- Can a malicious user replace a legitimate key in a certificate with their
own key?
- Why or why not?

## Certificate Key Replacement?
- It’s not possible for a malicious user to simply swap the public key in a digital certificate because it is encrypted using the private key of the CA – remember that the client has the public key, and is therefore able to verify the signature.
- Swapping out one public key with another would cause the signature verification to fail.

## Lets Encrypt
- https://letsencrypt.org/
- Non-profit Certificate Authority (CA)
- Certificates last 90 days, but you can automatically renew them
-- Use cron to schedule renewals
Quick demo on http://c3015.cfenn.com → let’s make it:
https://c3015.cfenn.com
Suggested reading: https://letsencrypt.org/how-it-works/

## Additional resources on this topic
● https://www.digitalocean.com/community/tutorials/how-to-secure-nginx-with-let-s-e
ncrypt-on-ubuntu-22-04
● https://www.cloudflare.com/en-ca/learning/ssl/why-use-tls-1.3/
● In depth look at TLS v1.3: https://blog.cloudflare.com/rfc-8446-aka-tls-1-3

# Review
- What is symmetric key cryptography?
The same secret key is used for encryption and decryption for symmetric key ciphers
Advanced Encryption Standard (AES) is the symmetric key cryptography
algorithm that should be used these days.

- What is asymmetric key cryptography?
● A keypair is generated
● The keypair consists of a public key and a private key
● For ensuring confidentiality of data in transit, a message is encrypted using
the public key can only be decrypted using the corresponding private key

● What does TLS stand for?
TLS stands for Transport Layer Security. It is a cryptographic protocol designed to provide secure communication over a computer network, typically between a client (such as a web browser) and a server (such as a website). TLS ensures privacy and data integrity for the transmission of sensitive information, such as login credentials, payment details, and other personal information.

● What is SSL?
SSL stands for Secure Sockets Layer. It was the predecessor to Transport Layer Security (TLS), and both terms are often used interchangeably today, though TLS has superseded SSL in terms of security and implementation.

● What HTTP data is encrypted when using HTTPS?

When using HTTPS (HTTP Secure), which is based on either SSL (Secure Sockets Layer) or TLS (Transport Layer Security), the following HTTP data is encrypted to ensure confidentiality and security:

Request and Response Headers:

Request Headers: Headers such as Host, User-Agent, Referer, Cookie, etc., which are sent by the client (e.g., web browser) to the server.
Response Headers: Headers such as Server, Content-Type, Set-Cookie, etc., which are sent by the server to the client in response to the request.
Request and Response Body:

Request Body: Data sent by the client to the server in methods like POST, PUT, or PATCH. This includes form data, JSON payloads, file uploads, etc.
Response Body: Data sent by the server back to the client in response to the request. This includes HTML content, JSON responses, file downloads, etc.
URL Paths and Query Parameters:

The path and query parameters of the URL (e.g., https://example.com/path/to/resource?param1=value1&param2=value2) are encrypted. This ensures that the entire URL is protected from eavesdropping.
Cookies:

Cookies sent between the client and server are encrypted. This includes both the cookies set by the server (Set-Cookie header) and those sent back to the server with subsequent requests (Cookie header).
Any Other HTTP Data:

Any other data transmitted over the HTTP connection, including headers, bodies, and parameters, is encrypted to prevent interception and tampering.

● What is a digital certificate used for?

In PHP and more broadly in web applications, digital certificates serve several crucial purposes related to security and authentication. Here are the primary uses of digital certificates:

Authentication: Digital certificates are used to authenticate the identity of entities (such as websites or servers) on the internet. They provide a means for clients (such as web browsers) to verify that they are communicating with the intended and legitimate server. This helps prevent man-in-the-middle attacks where an attacker could intercept and manipulate communication between the client and server.

Encryption: Digital certificates are used to establish secure encrypted connections over the internet. They enable the use of protocols like HTTPS (HTTP Secure), which encrypts data exchanged between a client and server to ensure confidentiality. Encryption prevents eavesdropping and ensures that sensitive information (such as login credentials, payment details, and personal data) remains private during transmission.

Integrity: Digital certificates include digital signatures that ensure data integrity. By signing data with a private key associated with the certificate, servers can prove that the data has not been altered or tampered with since it was signed. Clients can verify the integrity of received data by using the public key contained in the certificate to verify the digital signature.

Trust: Digital certificates are issued by trusted Certificate Authorities (CAs). These CAs are responsible for verifying the identity of the certificate holder before issuing a certificate. Web browsers and other clients trust certificates issued by well-known CAs that are included in their trusted root certificate stores. This trust relationship ensures that clients can rely on the authenticity and security of the websites they visit.

● When using TLS, what properties does the secure channel provide?

When using TLS (Transport Layer Security), the secure channel it provides ensures several important properties that are essential for secure communication over the internet:

Encryption: TLS encrypts the data exchanged between the client and server, ensuring confidentiality. This means that if intercepted by an unauthorized party, the encrypted data cannot be read without the decryption key.

Authentication: TLS provides mechanisms for both server and, optionally, client authentication:

Server Authentication: The server presents its digital certificate to prove its identity to the client. The client verifies the authenticity of the certificate using a chain of trust leading back to a trusted Certificate Authority (CA).
Client Authentication (optional): In some cases, TLS can also authenticate the client to the server using client certificates. This ensures that the server knows the client's identity as well.
Integrity: TLS ensures that the data transmitted between the client and server is not altered or tampered with during transmission. This is achieved through the use of Message Authentication Codes (MACs) and cryptographic hash functions.

Forward Secrecy: TLS supports forward secrecy, which means that even if an attacker were to obtain the server's private key in the future, they would not be able to decrypt past communications. This is achieved through the use of ephemeral key exchange mechanisms like Diffie-Hellman (DH) or Elliptic Curve Diffie-Hellman (ECDH).

Negotiated Cipher Suites: TLS allows the client and server to negotiate and agree upon a cipher suite to use for encryption and authentication during the TLS handshake. The chosen cipher suite dictates the encryption algorithm, key exchange method, and other cryptographic parameters used for secure communication.

Secure Handshake: TLS includes a handshake protocol that securely establishes the parameters of the encrypted session before any application data is transmitted. This involves negotiating the encryption algorithms, exchanging cryptographic keys, and verifying the authenticity of the parties involved.

Session Resumption: TLS supports session resumption mechanisms to speed up subsequent connections between the same client and server. This allows the parties to reuse previously established session parameters, reducing the overhead of performing a full TLS handshake.