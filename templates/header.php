<!DOCTYPE html>
<html lang="en">

<head>

    <title>Street art project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Giga&display=swap" rel="stylesheet">
    <!-- CSS -->

    <link rel="icon" type="image/png" href="img/icon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <header>

        <nav class="navbar navbar-expand-lg navbar-default fixed-top row">
            <a class="navbar-brand col-2" href="#">🎨</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse col-12 col-md-8" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <?php
                    if (isset($_SESSION['user'])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/new" role="button">Add</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout" role="button">Logout</a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/login" role="button">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register" role="button">Sign Up</a>
                        </li>
                    <?php
                    }
                    ?>

                </ul>
            </div>
            <div class="col-2">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control input-search" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn my-2 my-sm-0 search-btn" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>

        </nav>
    </header>