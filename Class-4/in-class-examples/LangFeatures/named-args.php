<?php
// named arguments!
// PHP 8 feature

function setConnection(bool $useMainDb = true)
{
    echo ($useMainDb
        ? 'Using the main DB connection'
        : 'Using the read replica connection') . PHP_EOL;
}

setConnection(false); // not as readable
setConnection(useMainDb: true); // <- more readable!

