<?php

// https://en.wikipedia.org/wiki/Advanced_Encryption_Standard
// https://en.wikipedia.org/wiki/Galois/Counter_Mode
// A great video on 256 bit security: https://www.youtube.com/watch?v=S9JGmA5_unY

$initialPlaintext = '💻 Hello, COMP 3015! 👋';

echo PHP_EOL . "The initial plaintext is: $initialPlaintext" . PHP_EOL . PHP_EOL;

$tag = null;
$algo = 'AES-256-GCM';
$key = random_bytes(32); // 32 bytes * 8 bits/byte = 256 bit key
$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($algo));

$ciphertext = openssl_encrypt($initialPlaintext, $algo, $key, 0, $iv, $tag);
echo "After encryption, the resulting ciphertext is: $ciphertext" . PHP_EOL . PHP_EOL;

// sent message to a client.. maybe a cookie?

// we cannot do this or else we will not be able to decrypt then
// $modifiedCypherText = str_replace('a','b', $ciphertext);

// recevie the cookie and decrypt the contents..
// $plaintext = openssl_decrypt($modifiedCypherText, $algo, $key, 0, $iv, $tag);
$plaintext = openssl_decrypt($ciphertext, $algo, $key, 0, $iv, $tag);
if ($plaintext) {
    echo "After decryption the resulting plaintext is: $plaintext" . PHP_EOL . PHP_EOL;
} else {
    echo 'Decryption failed.' . PHP_EOL;
}

// php index.php