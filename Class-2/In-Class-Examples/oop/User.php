<?php

class User implements JsonSerializable
{
    // access modifiers
    private string $name;
    // private string $age;

    public function __construct(string $name = 'Default', int $age = 0)
    {
        // $this means the current object
        $this->setName($name);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $theName)
    {
        $this->name = $theName;
    }

    // visibility modifer = public for this one
    public function jsonSerialize(): mixed
    {
        // this will write the names in the users.json if you 
        // delete the key value paids in between the {}
        return [
            'name' => $this->getName(),
            //'age' => $this->age()
        ];
    }
}
