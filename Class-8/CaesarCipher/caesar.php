<?php
// A simple implementation of the Caesar cipher: https://en.wikipedia.org/wiki/Caesar_cipher
// For ASCII values, see: https://www.rapidtables.com/code/text/ascii-table.html

// 
/**
 * @param string $plaintext the message you want to encrypt
 * @param int $key a secret key from 1-26
 * @return string ciphertext
 */
function encrypt(string $plaintext, int $key): string {
    $ciphertext = '';
    $plaintextCharacters = str_split($plaintext);
    foreach ($plaintextCharacters as $character) {
        if (ctype_alpha($character)) {
			$startingCharacterRange = ctype_upper($character) ? 65 : 97;  // 65 => 'A', 97 => 'a' (ASCII values)
			$asciiValue = ord($character) - $startingCharacterRange;
            $ciphertext .= chr((($asciiValue + $key) % 26) + $startingCharacterRange);
        } else {
			$ciphertext .= $character;
        }
    }
    return $ciphertext;
}

/**
 * @param string $ciphertext an encrypted message
 * @param int $key a decryption key
 * @return string plaintext
 */
function decrypt(string $ciphertext, int $key): string {
    $plaintext = '';
    $ciphertextCharacters = str_split($ciphertext);
    foreach ($ciphertextCharacters as $character) {
        if (ctype_alpha($character)) {
			$startingCharacterRange = ctype_upper($character) ? 90 : 122; // 90 => 'Z', 122 => 'z' (ASCII values)
			$asciiValue = ord($character) - $startingCharacterRange;
			$plaintext .= chr((($asciiValue - $key) % 26) + $startingCharacterRange);;
        } else {
			$plaintext .= $character;
        }
    }
    return $plaintext;
}

$ciphertext = encrypt('Hello, COMP 3015! I hope you\'re enjoying this course!', 25);
echo PHP_EOL ."The resulting ciphertext is: $ciphertext" . PHP_EOL . PHP_EOL;

$plaintext = decrypt($ciphertext, 25);
echo "The resulting plaintext is: $plaintext" . PHP_EOL . PHP_EOL;
