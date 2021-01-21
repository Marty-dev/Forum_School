<?php

require_once './models/DB.class.php';

$db = new DB();

// TODO: Add login / logout
require_once './models/User.php';

$user = new User();

require_once './models/Post.php';

$post = new Post();

?>

<html lang="en">
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
            <div class="tile is-ancestor">
                <?php
                    require_once './views/navbar_card.phtml';
                ?>
            </div>

            <div class="tile is-ancestor mt-4">
                <?php
                    require_once './views/topics_card.phtml';
                    require_once './views/singlePost_card.phtml';
                ?>
            </div>
        </div>
    </div>
</section>
</body>
</html>
