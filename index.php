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

                <table class="table is-narrow is-hoverable mt-4">
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
    </section>

    </body>

</html>
