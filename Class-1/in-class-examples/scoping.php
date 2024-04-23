<?php

// php uses function scoping
function scopingExample()
{
    if (true) {
        $age = 29; // not block scoped! function scoped.
    }
    return $age;
}

$result = scopingExample();
print_r($result);
