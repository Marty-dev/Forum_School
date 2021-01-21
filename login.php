<?php

/* TODO:
    1) kontrola POSTu
    2) generování hashe z hesla
    3) ověření vůči DB
    4.1) email neexistuje
    4.2) heslo je špatné
    4.3) úspěch

    A) úspěch
    1) zápis uživatele do session
    2) redirect na index (změna menu - zmizí login a sign up a přibude logout)

    B) neúspěch
    1) přesměrovat na login_card (email by v poli mohl zůstat)
    2) vypsat error
*/