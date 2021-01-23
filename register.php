<?php

require_once './models/DB.class.php';
require_once './models/User.php';

const INPUT_FIRST_NAME = 'firstName';
const INPUT_LAST_NAME = 'lastName';
const INPUT_EMAIL = 'address';
const INPUT_PHONE = 'phone';
const INPUT_ADDRESS = 'email';
const INPUT_PASSWORD = 'password';
const INPUT_CONF_PASSWORD = 'confPassword';

$user = new User();

$inputs = [
    INPUT_FIRST_NAME        => htmlspecialchars($_POST["firstName"]),
    INPUT_LAST_NAME         => htmlspecialchars($_POST["lastName"]),
    INPUT_EMAIL             => htmlspecialchars($_POST["email"]),
    INPUT_PHONE             => htmlspecialchars($_POST["phone"]),
    INPUT_ADDRESS           => htmlspecialchars($_POST["address"]),
    INPUT_PASSWORD          => htmlspecialchars($_POST["password"]),
    INPUT_CONF_PASSWORD     => htmlspecialchars($_POST["confPassword"])
];

$registrationHasErrors = false;

/** Basic empty check */
foreach ($inputs as $input => $value) {
    if (empty(trim($value))) {
        $registrationHasErrors = true;
    }
    else {
        $registrationHasErrors = false;
    }
}

if($registrationHasErrors) {
    exit();
}
/** Check if password is correct */
if($inputs[INPUT_PASSWORD] === $inputs[INPUT_CONF_PASSWORD]) {

    $passString = $inputs[INPUT_PASSWORD];
    $passHash = password_hash($passString, PASSWORD_BCRYPT);

    /** After check, values are written in DB */
    $user->register($inputs[INPUT_FIRST_NAME], $inputs[INPUT_LAST_NAME], $inputs[INPUT_EMAIL], $inputs[INPUT_PHONE], $inputs[INPUT_ADDRESS], $passHash);

    header('Location: form.php?form=login');
}