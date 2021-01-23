<?php

/* TODO:
    1) kontrola POSTu
    2) ověření emailu vůči DB
    2.1) email neexistuje
    3) ověření hesla (porovnání string heslo vůči hashi pomocí funkce password_verify())
    3.1) heslo je špatné
    4) úspěch

    A) úspěch
    1) zápis uživatele do session
    2) redirect na index (změna menu - zmizí login a sign up a přibude logout)

    B) neúspěch
    1) přesměrovat na login_card (email by v poli mohl zůstat)
    2) vypsat error
*/

require_once './models/DB.class.php';
require_once './models/User.php';

if (!empty($_POST['email'] && !empty($_POST['password']))) {
    $user = new User();
    try {
        $user->login($_POST['email'], $_POST['password']);
    } catch (Exception $e) {
        switch ($e->getCode()) {
            case 1:
                // neexistuje
                break;

            case 2:
                // špatné heslo
                break;

            default:
                // nějaká chyba
                break;
        }

        header('Location: index.php');
        // redirect s errorem zpět na login form
    }
}
