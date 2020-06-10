<?php

namespace Controller;

use Entity\Article;
use ludk\Http\Request;
use ludk\Http\Response;
use ludk\Controller\AbstractController;

class ContentController extends AbstractController
{

    public function create(Request $request): Response
    {

        $articleRepo = $this->getOrm()->getRepository(Article::class);
        $manager = $this->getOrm()->getManager();

        if ($request->getSession()->has('user') && $request->request->has('url_image') && $request->request->has('category') && $request->request->has('text')) {
            $errorMsg = NULL;
            if (empty($request->request->get('url_image'))) {
                $errorMsg = "URL image is empty";
            } else if ($request->request->get('category') == 'nocategory') {
                $errorMsg = "Select category";
            } else if (empty($request->request->get('text'))) {
                $errorMsg = "Missing description";
            }
            if ($errorMsg) {
                $articles = $articleRepo->findAll();
                $data = array(
                    'articles' => $articles,
                    'errorMsg' => $errorMsg
                );
                return $this->render('addArticle.php', $data);
            } else {
                $newArticle = new Article();
                $newArticle->url_image = $request->request->get('url_image');
                $newArticle->category = $request->request->get('category');
                $newArticle->text = $request->request->get('text');
                $newArticle->user = $request->getSession()->get('user');
                $manager->persist($newArticle);
                $manager->flush();
                return $this->redirectToRoute('display');
            }
        } else {
            return $this->render('addArticle.php');
        }
    }
}
