{% include 'header.php' %}

<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 wrap">
            <h1>Street Art Project</h1>
        </div>
        <div class="col-12 col-md-6">
            <p>MOTHER FUCKER</p>
            <button type="button" class="btn btn-dark">Voir toutes les oeuvres</button>
        </div>
    </div>
</div>
<!-- <div class="img-header">
    <h1>Street Art Project</h1>
</div> -->

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

{% include 'footer.php' %}