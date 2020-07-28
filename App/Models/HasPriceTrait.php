<?php

namespace App\Models;

trait HasPriceTrait
{

    public $price;

    public function getPrice(): int
    {
       return $this->price;
    }

}