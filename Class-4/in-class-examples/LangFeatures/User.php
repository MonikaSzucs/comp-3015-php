<?php

class User {

    private int $age;
    private string $email;
    private string $password;

    public function __construct(string $email, string $password, int $age) {
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setAge($age);
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getAge(): int {
        return $this->age;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }

    public function setAge(int $age): void {
        $this->age = $age;
    }

}
