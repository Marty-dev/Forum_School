<?php
require_once './models/DB.class.php';
$db = New DB();

require_once './models/Topic.php';
$topic = New Topic();

require_once './models/User.php';
$user = New User();

require_once './models/Post.php';
$post = New Post();

const INPUT_TITLE = 'title';
const INPUT_CONTENT = 'content';
const INPUT_USER = 'user';
const INPUT_TOPIC = 'topic';

$input = [
    INPUT_TITLE         => htmlspecialchars($_POST["title"]),
    INPUT_CONTENT       => htmlspecialchars($_POST["content"]),
    INPUT_USER          => htmlspecialchars($_SESSION['user']->id),
    INPUT_TOPIC         => htmlspecialchars($_POST["topic"]),
];

$formHasErrors = false;

foreach ($input as $inputs => $value) {
    if (empty(trim($value))) {
        $formHasErrors = true;
    }
    else {
        $formHasErrors = false;
    }
}

if($formHasErrors) {
    exit();
}

$topicId = $topic->selectByName($input[INPUT_TOPIC]);
$post->create($input[INPUT_TITLE], $input[INPUT_CONTENT], $input[INPUT_USER], $topicId);

header('Location: index.php');


