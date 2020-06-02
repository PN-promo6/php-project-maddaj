<!DOCTYPE html>
<html lang="en">

<head>
    <title>Social Network (PHP Course))</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="img/icon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-default fixed-top bg-white">
        <a class="navbar-brand" href="#">🎨</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarSupportedContent">
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
                if (isset($_SESSION['userId'])) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?action=logout" role="button">Logout</a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?action=login" role="button">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?action=register" role="button">Sign Up</a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row">
            <div class="col pt-5">
                <blockquote class="blockquote text-center">
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua.</p>
                    <footer class="blockquote-footer">Maybe someone famous from <cite>Internet</cite></footer>
                </blockquote>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <form class="form-signin" method="POST" action="?action=register">
                    <h2 class="form-signin-heading">Registration</h2>
                    <?php
                    if (isset($errorMsg)) {
                        echo "<div class='alert alert-warning' role='alert'>$errorMsg</div>";
                    }
                    ?>
                    <input type="text" class="form-control" name="username" placeholder="Nickname (4 characters)" required="" autofocus="" />
                    <input type="password" class="form-control" name="password" placeholder="Password (8 characters)" required="" />
                    <label>Retype password:</label>
                    <input type="password" class="form-control" name="passwordRetype" placeholder="Password" required="" />
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>