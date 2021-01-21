<?php

require_once './models/DB.class.php';
require_once './models/User.php';

$user = new User();
$user->logout();

header('Location: index.php');