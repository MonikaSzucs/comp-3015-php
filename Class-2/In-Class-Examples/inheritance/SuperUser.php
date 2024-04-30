<?php

require_once 'User.php';

class SuperUser extends User
{
    public function banUser(User $user)
    {
        echo 'Banned ' . $user->getEmail() . PHP_EOL;
    }

    public function inviteNewUser(string $email)
    {
        echo "Sending invitation email to $email on behalf of $this->email" . PHP_EOL;
    }

}
