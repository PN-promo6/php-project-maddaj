<?php

namespace Controller;

use Entity\Article;

class ContentController
{

    public function create()
    {

        global $articleRepo;
        global $manager;

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
    }
}
