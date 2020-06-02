<?php

use Entity\User;
use Entity\Article;
use ludk\Persistence\ORM;

require __DIR__ . '/../vendor/autoload.php';

session_start();

$orm = new ORM(__DIR__ . '/../Resources');
$manager = $orm->getManager();
$articleRepo = $orm->getRepository(Article::class);
$userRepo = $orm->getRepository(User::class);

//Change text for article where id = 1
$oneItem = $articleRepo->find(1);
$oneItem->text = "newText";
$manager->persist($oneItem);
$manager->flush();

$action = $_GET["action"] ?? "display";
switch ($action) {
    case 'register':
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['passwordRetype'])) {
            $errorMsg = NULL;
            $users = $userRepo->findBy(array("nickname" => $_POST['username'], "password" => $_POST['password']));
            if ($users($_POST['username'])) {
                $errorMsg = "Nickname already used.";
            } else if ($_POST['password'] != $_POST['passwordRetype']) {
                $errorMsg = "Passwords are not the same.";
            } else if (strlen(trim($_POST['password'])) < 8) {
                $errorMsg = "Your password should have at least 8 characters.";
            } else if (strlen(trim($_POST['username'])) < 4) {
                $errorMsg = "Your nickame should have at least 4 characters.";
            }
            if ($errorMsg) {
                include "../templates/RegisterForm.php";
            } else {
                $userId = new User();
                $newUser->nickname = $_POST['username'];
                $newUser->password = $_POST['password'];
                $manager->persist($newUser);
                $_SESSION['userId'] = $usersId;
                header('Location: ?action=display');
            }
        } else {
            include "../templates/RegisterForm.php";
        }
        break;
    case 'logout':
        if (isset($_SESSION['userId'])) {
            unset($_SESSION['userId']);
        }
        header('Location: ?action=display');
        break;
    case 'login':
        if (isset($_POST['username']) && isset($_POST['password'])) { //If the fields are filled in
            $users = $userRepo->findBy(array("nickname" => $_POST['username'], "password" => $_POST['password'])); //The User class is searched for the corresponding data
            if (count($users) == 1) { //If one User matches with data
                $_SESSION['userId'] = $users[0]->id; //userId of the session corresponds to the position of the user in the table and the userId of the session is retrieved
                header('Location: ?action=display');
            } else {
                $errorMsg = "Wrong login and/or password.";
                include "../templates/LoginForm.php";
            }
        } else {
            include "../templates/LoginForm.php";
        }
        break;
    case 'new':
        break;
    case 'display':
        $articles = array();

        if (isset($_GET['search'])) {
            $search =  $_GET['search'];
            if (strpos($search, '@') === 0) {
                $nickname = substr($search, 1); //remove first caracter (@)
                $users = $userRepo->findBy(array('nickname' => $nickname));
                if (count($users) == 1) { //if we find one user
                    $user = $users[0];
                    $articles = $articleRepo->findBy(array("user" => $user->id));
                }
            } else {
                $articles = $articleRepo->findBy(array("text" => $search));
            }
        } else {
            $articles = $articleRepo->findAll();
        }
    default:
        include '../templates/display.php';
        break;
}
