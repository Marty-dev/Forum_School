<?php

class User extends DB
{
    public function __construct()
    {
        session_start();

        parent::__construct();
    }

    /**
     * @return bool
     */
    public function isLoggedIn(): bool
    {
        if (isset($_SESSION['user_hash'])) {
            // check hash
            return true;
        }

        return false;
    }

    /**
     * @param string $username
     * @param string $password MD5 hash
     *
     * @return bool
     */
    public function login(string $username, string $password): bool
    {
        // functions as if it would be getByID method

        try {
            $query = $this->prepare("SELECT * FROM users U WHERE U.username = :username AND U.password = :password");

            $query->bindParam(':username', $username);
            $query->bindParam(':password', $password);

            $query->execute();

            $user = $query->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "There was an error during reading: " . $e->getMessage();
        }

        if (!empty($user)) {
            // write data to session
        }

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