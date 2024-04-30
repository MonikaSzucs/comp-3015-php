<?php

class Model
{
    // could set these variables to protected
    private string $id;
    private string $createdAt;
    private string $updatedAt;
    // how can I get these private variables?
    // protected means your able to get it with any sub class

    public function __construct(string $id, string $createdAt, string $updatedAt)
    {
        $this->id = $id;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    // this is how you grab a private info when you call it from main
    public function getId() {
        return $this->getId();
    }
}
