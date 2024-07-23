<?php

function validGrocery(string $item): bool {
    return strlen($item) > 1;
}

function validQuantity(int $quantity): bool {
    return $quantity > 0;

}