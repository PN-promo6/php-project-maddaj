<?php

namespace Controller;

use Entity\User;

class AuthController
{

    public function login()
    {

        global $userRepo;

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
    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        header('Location: ?action=display');
    }

    public function register()
    {
        global $userRepo;
        global $manager;

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
    }
}
