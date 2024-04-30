<?php

class User implements JsonSerializable
{

    private string $name;

    public function __construct(string $name = 'Default', int $age = 0)
    {
        $this->setName($name);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'name' => $this->getName()
        ];
    }
}
