<?php

namespace Entity;

use Entity\User;
use ludk\Utils\Serializer;

class Article
{
    public int $id;
    public string $url_image;
    public string $category;
    public string $text;
    public string $size;
    public string $main_color;
    public User $user;

    use Serializer;
}
