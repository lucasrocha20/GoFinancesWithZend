<?php

namespace Finances\Model;

class Finances
{
    public $id;
    public $title;
    public $type;
    public $price;
    public $category;
    public $date;

    public function exchangeArray(array $data)
    {
        $this->id        = !empty($data['id']) ? $data['id'] : null;
        $this->title     = !empty($data['title']) ? $data['title'] : null;
        $this->type      = !empty($data['type']) ? $data['type'] : null;
        $this->price     = !empty($data['price']) ? $data['price'] : null;
        $this->category  = !empty($data['category']) ? $data['category'] : null;
        $this->date      = !empty($data['date']) ? $data['date'] : null;
    }
}