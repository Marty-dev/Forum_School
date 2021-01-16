<?php

    require_once 'DB.class.php';

    $db = new DB();

?>

<html lang="en">
    <head>
        <title>Gaming Forum</title>
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/5cd685aa1f.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    </head>

    <body>

    <section class="hero is-primary is-fullheight">
        <div class="hero-body>">
            <div class="container">

            <header class="card-header has-background-warning mt-4 p-3">
                <p class="card-header-title">
                    Gaming Forum
                </p>
            </header>

            <table>
                <tr>
                    <th>Title</th>
                    <th>Time</th>
                    <th>Author</th>
                </tr>

            <?php
                $id = $_GET['topicId'];
                $postArray = $db->getPostsTable($id);
                //var_dump($postArray);

                foreach ($postArray as $post) {

                    echo '<tr>';
                        echo '<td>';

                            echo '<a href="article.php?topicId="'.$id.'"?articleId="'.$post->id.'">';

                            echo $post->title;

                            echo '</a>';

                        echo '</td>';

                        echo '<td>';

                            echo $post->timestamp;

                        echo '<td>';

                        echo '<td>';

                            echo $post->firstName;
                            echo $post->lastName;

                        echo '</td>';

                    echo '</tr>';
                }
            ?>

            </table>
            </div>
        </div>
    </section>
    </body>
</html>