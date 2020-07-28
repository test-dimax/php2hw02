<?php

namespace App\View;

class View
{

    protected $data;

    //метод для отображения данных в шаблоне
    public function assign($data) {
        $this->data = $data;
        return $this;
    }

    //метод который загружает шаблон
    public function display($template)
    {
        include $template;
    }
}