{% include 'header.php' %}

<div class="all">
    <?php
    if ($request->getSession()->has('user')) {
        if (isset($errorMsg)) {
            echo "<div class='alert alert-warning' role='alert'>$errorMsg</div>";
        }
    ?>
        <div class="container-add">
            <form id="contact" method="POST" action="/new">
                <h3>Add my work</h3>
                <fieldset>
                    <input type="text" class="form-control" name="text" placeholder="Description" value="<?php echo $_POST['text'] ?? '' ?>" />
                </fieldset>
                <fieldset>
                    <input type="url" class="form-control" name="url_image" placeholder="URL image" value="<?php echo $_POST['url_image'] ?? '' ?>" /> </fieldset>
                <fieldset>
                    <select class="form-control" name="category">
                        <option value="nocategory">Select category</option>
                        <option value="Graff">Graff</option>
                        <option value="Sculpture">Sculpture</option>
                    </select>
                </fieldset>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    <?php
    }
    ?>
</div>
{% include 'footer.php' %}