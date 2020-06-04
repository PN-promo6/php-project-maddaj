<?php
include 'header.php';
?>

<!-- MAIN -->
<div class="main-container">
    <h2 class="d-flex justify-content-center">Nouveautés</h2>
    <?php
    if (isset($_SESSION['user'])) {
        if (isset($errorMsg)) {
            echo "<div class='alert alert-warning' role='alert'>$errorMsg</div>";
        }
    ?>
        <div class="row newMsg">
            <div class="col">
                <form class="input-group" method="POST" action="?action=new">
                    <input type="text" class="form-control" name="text" placeholder="Description" value="<?php echo $_POST['text'] ?? '' ?>" />
                    <input type="url" class="form-control" name="url_image" placeholder="URL image" value="<?php echo $_POST['url_image'] ?? '' ?>" />
                    <select class="form-control" name="category">
                        <option value="nocategory">Please select</option>
                        <option value="Graff">Graff</option>
                        <option value="Sculpture">Sculpture</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    <?php
    }
    ?>
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
                            <a href="?search=@<?php echo $oneArticle->user->nickname ?>" class="card__author" title="author">@<?php echo $oneArticle->user->nickname ?></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<?php
include 'footer.php';
?>