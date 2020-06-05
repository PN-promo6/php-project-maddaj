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
// $oneItem = $articleRepo->find(1);
// $oneItem->text = "newText";
// $manager->persist($oneItem);

$action = $_GET["action"] ?? "display";
switch ($action) {
    case 'register':
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['passwordRetype'])) {
            $errorMsg = NULL;
            $users = $userRepo->findBy(array("nickname" => $_POST['username']));
            $userMail = $userRepo->findBy(array("email" => $_POST['email']));
            if (count($users) > 0) {
                $errorMsg = "Nickname already used.";
            } else if (count($userMail) > 0) {
                $errorMsg = "Email already used.";
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
                $newUser = new User();
                $newUser->nickname = $_POST['username'];
                $newUser->password = md5($_POST['password']);
                $newUser->website = $_POST['website'];
                $newUser->email = $_POST['email'];
                $manager->persist($newUser);
                $manager->flush();
                $_SESSION['user'] = $newUser;
                header('Location: ?action=display');
            }
        } else {
            include "../templates/RegisterForm.php";
        }
        break;
    case 'logout':
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        header('Location: ?action=display');
        break;
    case 'login':
        if (isset($_POST['username']) && isset($_POST['password'])) { //If the fields are filled in
            $usersWithThisLogin = $userRepo->findBy(array("nickname" => $_POST['username'])); //The User class is searched for the corresponding data
            if (count($usersWithThisLogin) == 1) {
                $firstUserWithThisLogin = $usersWithThisLogin[0];
                if ($firstUserWithThisLogin->password != md5($_POST['password'])) {
                    $errorMsg = "Wrong password.";
                    include "../templates/LoginForm.php";
                } else {
                    $_SESSION['user'] = $usersWithThisLogin[0]; //We put userObject in session
                    header('Location:/?action=display');
                }
            } else {
                $errorMsg = "Nickname doesn't exist.";
                include "../templates/LoginForm.php";
            }
        } else {
            include "../templates/LoginForm.php";
        }
        break;
    case 'new':
        if (isset($_SESSION['user']) && isset($_POST['url_image']) && isset($_POST['category']) && isset($_POST['text'])) {
            $errorMsg = NULL;
            if (empty($_POST['url_image'])) {
                $errorMsg = "URL image is empty";
            } else if ($_POST['category'] == 'nocategory') {
                $errorMsg = "Select category";
            } else if (empty($_POST['text'])) {
                $errorMsg = "Missing description";
            }
            if ($errorMsg) {
                $articles = $articleRepo->findAll();
                include "../templates/addArticle.php";
            } else {
                $newArticle = new Article();
                $newArticle->url_image = $_POST['url_image'];
                $newArticle->category = $_POST['category'];
                $newArticle->text = $_POST['text'];
                $newArticle->user = $_SESSION['user'];
                $manager->persist($newArticle);
                $manager->flush();
                header('Location: ?action=display');
            }
        } else {
            include "../templates/addArticle.php";
        }
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
