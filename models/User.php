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
     * @param string $email
     * @param string $password MD5 hash
     *
     * @return bool
     */
    public function loginUser(string $email, string $password): bool
    {
        // functions as if it would be getByID method

        try {
            $query = $this->prepare("SELECT * FROM users U WHERE U.email = :email AND U.password = :password");

            $query->bindParam(':username', $email);
            $query->bindParam(':password', $password);

            $query->execute();

            $email = $query->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "There was an error during reading: " . $e->getMessage();
        }

        if (!empty($email)) {
            // write data to session
        }

        return $this->isLoggedIn();
    }

    public function registerUser($firstName, $lastName, $email, $phone, $address, $password)
    {
        $query = $this->prepare("INSERT INTO `users` (`firstName`, `lastName`, `email`, `phone`, `address`, `password`) 
                                                    VALUES (:firstName, :lastName, :email, :phone, :address, :password)");

        $query->bindParam(':firstName', $firstName);
        $query->bindParam(':lastName', $lastName);
        $query->bindParam(':email', $email);
        $query->bindParam(':phone', $phone);
        $query->bindParam(':address', $address);
        $query->bindParam(':password', $password);

        $query->execute();


    }

    /**
     * @return bool
     */
    public function logout(): bool
    {
        return session_destroy();
    }
}