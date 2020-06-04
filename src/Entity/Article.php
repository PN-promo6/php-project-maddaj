<?php

namespace Entity;

use Entity\User;
use ludk\Utils\Serializer;

class Article
{
    public $id;
    public $url_image;
    public $category;
    public $text;
    public User $user;

    use Serializer;
}
