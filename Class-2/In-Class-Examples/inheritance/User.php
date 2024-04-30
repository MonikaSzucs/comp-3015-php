<?php

require_once 'Model.php';

class User extends Model
{
    protected string $email;
    protected string $password;

    public function __construct(string $id, string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
        parent::__construct($id, '...', '...');
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    // ... other getters and setters
}
