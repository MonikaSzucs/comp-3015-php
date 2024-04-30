<?php

class Model
{
    private string $id;
    private string $created_at;
    private string $updated_at;

    public function __construct(string $id, string $created_at, string $updated_at)
    {
        $this->id = $id;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
}
