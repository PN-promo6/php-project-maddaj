<?php
include 'header.php';
?>

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
            <form class="form-signin" method="POST" action="?action=login">
                <h2 class="form-signin-heading">Welcome Back</h2>
                <?php
                if (isset($errorMsg)) {
                    echo "<div class='alert alert-warning' role='alert'>$errorMsg</div>";
                }
                ?>
                <input type="text" class="form-control" name="username" placeholder="Email Address" required="" autofocus="" />
                <input type="password" class="form-control" name="password" placeholder="Password" required="" />
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            </form>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>