<?php

namespace Finances\Model;

class Finances
{
    public $id;
    public $title;
    public $price;
    public $category;
    public $date;

    public function exchangeArray(array $data)
    {
        $this->id        = !empty($data['id']) ? $data['id'] : null;
        $this->title     = !empty($data['title']) ? $data['title'] : null;
        $this->price     = !empty($data['price']) ? $data['price'] : null;
        $this->category  = !empty($data['category']) ? $data['category'] : null;
        $this->date      = !empty($data['date']) ? $data['date'] : null;
    }
}