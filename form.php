<?php
require_once './models/DB.class.php';

$db = new DB();
?>

<html lang="cs">
<head>
    <title>Gaming Forum</title>
    <meta charset="utf-8">
    <script src="https://kit.fontawesome.com/5cd685aa1f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
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
                if(isset($_GET['form']) && $_GET['form']=="login") {
                    require_once './views/login_card.phtml';
                }
                if(isset($_GET['form']) && $_GET['form']=="register") {
                    require_once './views/register_card.phtml';
                }
                ?>
            </div>
            <footer class="card-footer">
                <p class="card-footer-item">
                        <span>
                            © 2021 Martin Velek
                        </span>
                </p>
            </footer>
        </div>
    </div>
</section>

</body>

</html>
