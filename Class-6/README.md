# Class 6

## Storing Passwords
- Use some kind of encryption algorithm?

let passwd = “aUserPasswordHere321!”
let key = “2948404D635166546A576E5A7234753777217A25432A462D4A614E645267556B”
let ciphertext = encrypt(key, passwd) # encryption function such as AES etc.

- Encrypted data can be decrypted if the appropriate key is supplied
- We need to somehow manage securing the secret key, and admin users (e.g. devs with production access) potentially have access to the key
- If an attacker gains access to the system (or there is a rogue admin), the key and all ciphertext passwords are compromised

For these reasons, among others, we should not be encrypting passwords
Note that some systems encrypt on the client (password managers, for example).

Cryptographic hash functions: what you should be using to store passwords.
- Hash function: maps data of arbitrary size to data of fixed size.
- Cryptographic hash function
-- A hash function designed in a manner such that it is infeasible to reverse
engineer the input, given a digest
- The output of a cryptographic hash function is called a “digest” or “hash”

## Selected Cryptographic Hash/Key Derivation Functions
- Bcrypt: https://en.wikipedia.org/wiki/Bcrypt ←We’ll be using this one
- Argon2: https://en.wikipedia.org/wiki/Argon2 ←Key derivation function
- PBKDF2: https://en.wikipedia.org/wiki/PBKDF2 ←Key derivation function
- MD5: https://en.wikipedia.org/wiki/MD5 ←DO NOT USE: collision vulnerabilities
- Lots more. Do your research before choosing one.
Term: cryptographic primitive: low level cryptography algo such as an encryption function or a one way crypto. hash function.

## Hashing passwords: bcript
We can use PHP’s password_hash function in order to compute a Bcrypt digest.
https://www.php.net/manual/en/function.password-hash.php

```
$bcryptPasswordDigest = password_hash($plaintextPassword, PASSWORD_BCRYPT, ['cost' => $bcryptCost]);
```

- Passing in a cost parameter causes Bcrypt to take longer (or shorter) in order to compute.
- Internally there are more iterations performed.
- 04-31 are valid, 10 is the default. Don’t use less than 10 (the default value).
-- Note: cost input is used as 2cost internally to Bcrypt, so an input of 11 takes roughly twice as long to compute as an input of 10.
- As with many topics in security, there is a security-usability trade off.
-- Use a higher cost and take longer to compute?
--- This will cause registration, login and password reset times to increase.
-- Use a lower cost and it’s a little bit easier for an attacker to brute force.

### A Bcrypt digest:
```
General form:
$2<a/b/x/y>$[cost]$[22 character salt][31 character hash]
Specific instance of a Bcrypt digest:
$2y$13$0VJHRpip5rDS3D83oC0yIOOIu6RL4Grk/oLK4naKRtIESOswgFULa
```

The same password with different salts result in different hashes:

## Storing Passwords: Salting
Let H be a hash cryptographic hash function.
H(“plaintextPasswordForCOMP3015Demo”) -> OIu6RL4Grk/oLK4naKRtIESOswgFULa

H(“plaintextPasswordForCOMP3015Demo”) -> OIu6RL4Grk/oLK4naKRtIESOswgFULa
Without a salt, the same password results in the same digest.

With a randomly generated salt:
H(“plaintextPasswordForCOMP3015Demo”, “0VJHRpip5rDS3D83oC0yIO” )
-> BIu6gRL4Grk/oql4qapztIESOzwgcUnv

H(“plaintextPasswordForCOMP3015Demo”, “ZVXhqpop92aZ3Dm4xv1ama”)
-> VoX6RL3qrkmoLK4naKqtIESqswgiaLa
With a (unique) salt, two plaintext passwords result in different digests.
`Intent`:
● Protect against rainbow tables (precomputed tables of digests of passwords)
● The authentication system (or any admin of it) is not able to tell which users have the same password

## Salt and Pepper?
Yes, there are peppers too! An additional hardening technique.
This is a term used to describe an additional input to a
cryptographic hash function that is secret.
We won’t use peppers in this course.

## Verifying passwords: Bcrypt
At this stage, we are not storing plaintext passwords in our database. Great!

When a user wants to login, how do we verify that the plaintext password entered, matches the digest associated with their usernameor email?

PHP provides us with password_verify:
https://www.php.net/manual/en/function.password-verify.php

## PHP-ish-pseudocode for login
```
$email = $_POST['email'];
$attemptedPassword = $_POST['password'];
$user = getUserByEmail($email);
if (password_verify($attemptedPassword, $user->password_digest)) {
    // authenticated
} else {
    // incorrect password
}
```

## Additional info + tips/general rules
- Don’t write your own hash functions or any other cryptographic primitives
-- Anyone can write an encryption algo that they can’t break, or a hash functions
that they can’t find a collision for
-- Use industry standard algorithms that have been rigorously tested and
analyzed
-  All cryptography systems and primitives should be public knowledge
-- Do not rely on “security through obscurity”