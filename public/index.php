<?php

require("../vendor/autoload.php");

use Entity\Article;
use Entity\User;

$usr1 = new User();
$usr1->id = 1;
$usr1->nickname = "Username";
$usr1->password = "eeeee";
$usr1->email = "toto@gmail.com";
$usr1->website = "http://www.toto.com";

$art1 = new Article();
$art1->id = 1;
$art1->text = "lorem ipsum";
$art1->main_color = "#cccccc";
$art1->size = "50x60";
$art1->url_image = "https://images.pexels.com/photos/2236960/pexels-photo-2236960.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260";
$art1->category = "graff";
$art1->user = $usr1;

$articles = array($art1, $art1, $art1, $art1, $art1, $art1, $art1, $art1, $art1);

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
                <article class="col-md-3 card card--1 px-0">
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