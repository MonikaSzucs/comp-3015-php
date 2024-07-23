<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET')
{
    $amount = $_GET["amount"];
    $account = $_GET["account"];

    echo "$" . $amount . " was sent to " . $account;
}

?>