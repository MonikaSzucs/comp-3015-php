<?php

require_once 'User.php';

class UserRepository
{
    function getUser(string $email): ?User
    {
        $result = mt_rand(0, 1);
        return $result === 1 ? new User($email, '...', 25) : null;
    }
}
