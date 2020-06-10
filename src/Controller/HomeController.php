<?php

namespace Controller;

use Entity\User;
use Entity\Article;
use ludk\Http\Request;
use ludk\Http\Response;
use ludk\Controller\AbstractController;

class HomeController extends AbstractController
{

    public function display(Request $request): Response
    {
        $articleRepo = $this->getOrm()->getRepository(Article::class);
        $userRepo = $this->getOrm()->getRepository(User::class);
        $articles = array();

        if ($request->query->has('search')) {
            $search =  $request->query->get('search');
            if (strpos($search, '@') === 0) {
                $nickname = substr($search, 1); //remove first caracter (@)
                $users = $userRepo->findBy(array('nickname' => $nickname));
                if (count($users) == 1) { //if we find one user
                    $user = $users[0];
                    $articles = $articleRepo->findBy(array("user" => $user->id));
                }
            } else {
                $articles = $articleRepo->findBy(array("text" => "%$search%"));
            }
        } else {
            $articles = $articleRepo->findAll();
        }
        $data = array(
            "articles" => $articles
        );
        return $this->render('display.php', $data);
    }
}
