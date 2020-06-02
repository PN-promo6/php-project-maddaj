<?php

use Entity\Article;
use ludk\Persistence\ORM;

require __DIR__ . '/../vendor/autoload.php';
session_start();

$orm = new ORM(__DIR__ . '/../Resources');
$articleRepo = $orm->getRepository(Article::class);
$manager = $orm->getManager();

if (isset($_GET['search'])) {
    $articles = $articleRepo->findBy(array("text" => $_GET['search']));
} else {
    $articles = $articleRepo->findAll();
}
//Change text for article where id = 1
$oneItem = $articleRepo->find(1);
$oneItem->text = "newText";
$manager->persist($oneItem);
$manager->flush();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Street art project</title>

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
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarSupportedContent">
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
    <div class="main-container">
        <h2 class="d-flex justify-content-center">Nouveautés</h2>
        <div class="row card-row">

            <?php
            // Take item from a table
            foreach ($articles as $oneArticle) {
            ?>
                <div class="col-12 col-md-4 col-lg-3 justify-content-around my-5 justify-content-around">
                    <div class="dribble-card">
                        <img class="dribble-card-image" src="<?php echo $oneArticle->url_image ?>" alt="">
                        <div class="dribble-hover">
                            <p class="dribble-hover-title"><?php echo $oneArticle->category ?></p>
                            <p class="dribble-hover-title"><?php echo $oneArticle->text ?></p>
                        </div>
                        <div class="dribble-meta">
                            <div class="dribble-author">
                                <img src="https://cdn.dribbble.com/users/63407/avatars/original/avatar.png" alt="author" />
                                <a href="#" class="card__author" title="author"><?php echo $oneArticle->user->nickname ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
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
    <!-- SCRIPT -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

</body>

</html> 