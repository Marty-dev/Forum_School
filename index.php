<?php

    // TODO: Add login / logout

    require_once './models/DB.class.php';

    $db = new DB();
?>

<html lang="cs">
    <head>
        <title>Gaming Forum</title>
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/5cd685aa1f.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    </head>

    <body>

    <section class="hero is-fullheight">
        <div class="hero-body>">
            <div class="container">

                <header class="card-header has-background-warning mt-4 p-3">
                    <p class="card-header-title">
                    Gaming Forum
                    </p>
                </header>

                <div class="tile is-ancestor mt-4">
                    <?php
                        require_once './views/topics_card.phtml';
                        require_once './views/posts_card.phtml';
                    ?>
                </div>
            </div>
        </div>
    </section>

    </body>

</html>
