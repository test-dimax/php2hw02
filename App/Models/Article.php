<?php


namespace App\Models;

use App\Model;

class Article extends Model
{

    //статическое св-во
    protected static $table = 'news';
    //константа
//    protected const TABLE = 'news';

    public $title;
    public $contents;

}