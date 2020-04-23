<?php

namespace Entity;

use Entity\User;

class Article
{
    public $id;
    public $url_image;
    public $category;
    public $size;
    public $main_color;
    public User $user;

    public function __construct()
    {
    }
}
