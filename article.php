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

<?php
    $topicId = $_GET['topicId'];
    $postId = $_GET['postId'];
    $post = $db->getSinglePost($postId);
    //var_dump($post);

    foreach ($post as $article) {

        echo $article->firstName;
        echo $article->lastName;
        echo $article->title;
        echo $article->timestamp;
        echo $article->content;
    }
?>
</body>
</html>
