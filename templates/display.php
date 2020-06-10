{% include 'header.php' %}

<div class="container container-header">
    <div class="row mt-5">
        <div class="col-12 col-md-7 img-header"></div>
        <div class="col-12 col-md-5 text-header">
            <h1>Discover the creations of street art culture</h1>
            <p>Street Art Project is the leading destination for finding and presenting creative work and is home to the world's best street art artists.</p>
            <button type="button" class="btn btn-dark">See all creations</button>
        </div>
    </div>
</div>

<!-- MAIN -->
<div class="main-container">
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