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
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="?">Accueil <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Catégories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                        <?php
                        if (isset($_SESSION['user'])) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/?action=logout" role="button">Logout</a>
                            </li>
                        <?php
                        } else {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/?action=login" role="button">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/?action=register" role="button">Sign Up</a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </nav>
            <h1>"La créativité est contagieuse, faites la tourner."</h1>
        </div>
    </header>