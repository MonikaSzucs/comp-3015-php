<?php

require_once 'User.php';

class UserRepository
{
    function getUser(string $email, string $password, int $age): ?User //or you can write: User | null
    {
        $result = mt_rand(0, 1);
        return $result === 1 ? new User($email, $password, $age) : null;
    }
}
