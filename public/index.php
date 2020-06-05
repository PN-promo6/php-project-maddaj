<?php

use Entity\User;
use Entity\Article;
use ludk\Persistence\ORM;
use Controller\AuthController;
use Controller\ContentController;
use Controller\HomeController;

require __DIR__ . '/../vendor/autoload.php';

session_start();

$orm = new ORM(__DIR__ . '/../Resources');
$manager = $orm->getManager();
$articleRepo = $orm->getRepository(Article::class);
$userRepo = $orm->getRepository(User::class);

//Change text for article where id = 1
// $oneItem = $articleRepo->find(1);
// $oneItem->text = "newText";
// $manager->persist($oneItem);

$action = $_GET["action"] ?? "display";
switch ($action) {
    case 'register':
        $controller = new AuthController();
        $controller->register();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;
    case 'new':
        $controller = new ContentController();
        $controller->create();
        break;
    case 'display':
    default:
        $controller = new HomeController();
        $controller->display();
        break;
}
