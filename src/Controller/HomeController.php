<?php

namespace Controller;

class HomeController
{

    public function display()
    {
        global $articleRepo;
        global $userRepo;
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
        include '../templates/display.php';
    }
}
