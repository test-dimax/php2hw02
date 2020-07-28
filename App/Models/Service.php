<?php


namespace App\Models;

use App\Model;

class Service implements HasPriceInterface, HasTitleInterface
{

    //статическое св-во
    protected static $table = 'services';
    //константа
//    protected const TABLE = 'services';

    public $title;
    public $price;

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}