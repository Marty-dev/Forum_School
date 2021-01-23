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
        if (isset($_SESSION['user'])) {
            return true;
        }

        return false;
    }

    /**
     * @param string $email
     * @param string $password
     *
     * @return bool
     */
    public function login(string $email, string $password): bool
    {
        // functions as if it would be getByID method

        try {
            $query = $this->prepare("SELECT * FROM users U WHERE U.email = :email");

            $query->bindParam(':email', $email);

            $query->execute();

            $user = $query->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "There was an error during reading: " . $e->getMessage();
        }

        if (!empty($user)) {
            throw new Exception("User was not found!", 1);
        }

        if (!password_verify($password, $user->password)) {
            throw new Exception("Wrong password!", 2);
        }

        $_SESSION['user'] = $user;
        $_SESSION['password'] = $password;

        return $this->isLoggedIn();
    }

    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param int $phone
     * @param string $address
     * @param string $password
     * @return bool
     */
    public function register(string $firstName, string $lastName, string $email, int $phone, string $address, string $password)
    {
        $query = $this->prepare("INSERT INTO `users` (`firstName`, `lastName`, `email`, `phone`, `address`, `password`) 
                                                    VALUES (:firstName, :lastName, :email, :phone, :address, :password)");

        $query->bindParam(':firstName', $firstName);
        $query->bindParam(':lastName', $lastName);
        $query->bindParam(':email', $email);
        $query->bindParam(':phone', $phone);
        $query->bindParam(':address', $address);
        $query->bindParam(':password', $password);

        return $query->execute();
    }

    /**
     * @return bool
     */
    public function logout(): bool
    {
        return session_destroy();
    }
}