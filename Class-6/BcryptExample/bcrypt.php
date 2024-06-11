<?php
session_start();// inorder to initialize the 
// session we do need a session start call
// wont need ot include it in all scripts but
// when we handle request from server then we do need to

// This is what happens on registration
$password = 'HelloComp3015@BCIT!';
$hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
echo "The generated bcrypt hash is: $hash" . PHP_EOL;


// This is what happens on login
$loginPassword = 'HelloComp3015@BCIT!';
echo "Checking if \"$loginPassword\" hashes to $hash" . PHP_EOL;
if (password_verify($loginPassword, $hash)) {
    echo "Correct password. You'll be granted entry!" . PHP_EOL;
    $_SESSION['user_id'] = (new User)->id; // or getUserByEmail($email)->id;
    header('Location: dashboard.php');
    exit();
} else {
    echo "Wrong password supplied." . PHP_EOL;
    $_SESSION['login_error'] = 'wrong email or password';
    header('Location: login.php');
}
