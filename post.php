<?php

require_once './models/DB.class.php';

$db = new DB();

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

<?php
    $topicId = htmlspecialchars($_GET['topicId']);
    $postId = htmlspecialchars($_GET['postId']);
    $post = $post->getByID(intval($postId));

    var_dump($post);
    echo '<br>';
    echo '<br>';

    echo $post->firstName;
    echo '<br>';
    echo $post->lastName;
    echo '<br>';
    echo $post->title;
    echo '<br>';
    echo $post->timestamp;
    echo '<br>';
    echo $post->content;
?>
</body>
</html>
