<?php

class User
{
    public function __construct()
    {
        session_start();
    }

    /**
     * @return bool
     */
    public function isLoggedIn(): bool {
        if (isset($_SESSION['user_hash'])) {
            // check hash
            return true;
        }
        return false;
    }

    /**
     * @param string $username
     * @param string $password
     *
     * @return bool
     */
    public function login(string $username, string $password): bool
    {
        // write data to session
        return $this->isLoggedIn();
    }

    /**
     * @return bool
     */
    public function logut(): bool
    {
        return session_destroy();
    }
}