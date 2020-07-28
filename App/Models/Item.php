<?php


namespace App\Models;

use App\Model;

class Item implements HasTitleInterface, HasPriceInterface
{
    use HasPriceTrait;

    //статическое св-во
    protected static $table = 'items';
    //константа
//    protected const TABLE = 'items';

    public $title;

    public function getTitle(): string
    {
        return $this->title;
    }
}