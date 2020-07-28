<?php


namespace App;


class Config
{

    public $data = [];
    private static $_config = null;

    protected function __construct()
    {
        $this->data = include __DIR__ . '/../config.php';
    }

    //singleton
    public static function getConfig()
    {
        if (is_null(self::$_config))
        {
            self::$_config = new self();
        }
        return self::$_config;

        return self::$_config;
    }

}