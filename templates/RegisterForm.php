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
            <form class="form-signin" method="POST" action="?action=register">
                <h2 class="form-signin-heading">Registration</h2>
                <?php
                if (isset($errorMsg)) {
                    echo "<div class='alert alert-warning' role='alert'>$errorMsg</div>";
                }
                ?>
                <input type="text" class="form-control" name="username" placeholder="Nickname (4 characters)" required="" autofocus="" />
                <input type="email" class="form-control" name="email" placeholder="Email" />
                <input type="url" class="form-control" name="website" placeholder="Website" />
                <input type="password" class="form-control" name="password" placeholder="Password (8 characters)" required="" />
                <label>Retype password:</label>
                <input type="password" class="form-control" name="passwordRetype" placeholder="Password" required="" />
                <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
            </form>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>