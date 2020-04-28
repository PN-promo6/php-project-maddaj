<?php

require("../vendor/autoload.php");

use Entity\Article;
use ludk\Persistence\ORM;

require __DIR__ . '/../vendor/autoload.php';
$orm = new ORM(__DIR__ . '/../Resources');
$articleRepo = $orm->getRepository(Article::class);

if (isset($_GET['search'])) {
    $articles = $articleRepo->findBy(array("text" => $_GET['search']));
} else {
    $articles = $articleRepo->findAll();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Street art project</title>

    <!-- SCRIPT -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
    <script src="js/script.js"></script>
    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Giga&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css?toto=<?php echo time() ?>">

</head>

<body>
    <header>

        <div class="fullpage duotone">
            <nav class="navbar navbar-expand-lg navbar-default fixed-top">
                <a class="navbar-brand" href="#">🎨</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Catégories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
            <h1>"La créativité est contagieuse, faites la tourner."</h1>
        </div>
    </header>
    <!-- MAIN -->
    <div class="container main-container">
        <h2 class="d-flex justify-content-center">Nouveautés</h2>
        <div class="row justify-content-around card-row">
            <?php
            $i = 0;
            // Take item from a table
            foreach ($articles as $oneArticle) {
                if ($i % 3 == 0 && $i > 0) {
                    echo '</div><div class="row justify-content-around card-row">';
                }
            ?>
                <article class="col-12 col-md-3 card card--1 px-0">
                    <img class="card__img" src="<?php echo $oneArticle->url_image ?>" alt="">
                    <a href="#" class="card_link">
                        <img class="card__img--hover" src="<?php echo $oneArticle->url_image ?>" alt="">
                    </a>
                    <div class="card__info">
                        <span class="card__category"><?php echo $oneArticle->category ?></span>
                        <h3 class="card__title"><?php echo $oneArticle->text ?></h3>
                        <span class="card__by">by <a href="#" class="card__author" title="author"><?php echo $oneArticle->user->nickname ?></a></span>
                    </div>
                </article>
            <?php
                $i++;
            }
            ?>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">

                </div>

            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

</body>

</html> 