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

    <h1>Gaming Forum</h1>

    <table>
        <tr>
            <th>Title</th>
            <th>Time</th>
        </tr>

    <?php
    $id = $_GET['topicId'];
    $postArray = $db->getPostsTable($id);
    var_dump($postArray);

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

        echo '</tr>';
    }
    ?>

    </table>
    </body>
</html>