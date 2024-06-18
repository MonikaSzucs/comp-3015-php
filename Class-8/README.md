
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