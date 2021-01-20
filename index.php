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

    <section class="hero is-fullheight">
        <div class="hero-body>">
            <div class="container">

                <header class="card-header has-background-warning mt-4 p-3">
                    <p class="card-header-title">
                    Gaming Forum
                    </p>
                </header>

                <div class="tile is-ancestor mt-4">
                    <div class="tile is-3 is-vertical is-parent">
                        <div class="tile is-child box">

                            <table class="table is-fullwidth is-hoverable">
                                <thead class="has-text-centered">
                                    <tr>
                                        <th class="is-info">Topic</th>
                                        <th class="is-info">Posts</th>
                                    </tr>
                                </thead>

                            <?php
                                $topicArray = $db->getTopicTable();

                                foreach ($topicArray as $topics) {
                                    echo '<tbody>';
                                        echo '<tr class="">';

                                            echo '<td>';

                                                echo '<a href="posts.php?topicId='.$topics->id.'">'.$topics->name.'</a>';

                                            echo '</td>';

                                            echo '<td class="has-text-centered">';

                                                echo $topics->postsCount;

                                            echo '</td>';

                                        echo '</tr>';
                                    echo '</tbody>';
        }
                            ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </body>

</html>
