<?php

class Post extends DB
{
    /**
     * @param int $topicId
     *
     * @return array
     */
    public function getAll(int $topicId)
    {
        try {
            $query = $this->prepare("SELECT P.*, U.`firstName`, U.`lastName` FROM users U JOIN posts P ON U.id = P.usersId WHERE P.`topicsId` = :topicId ORDER BY P.`timestamp` DESC");

            $query->bindParam(':topicId', $topicId);

            $query->execute();

            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {

            echo "There was an error during reading: ";

            echo $e->getMessage();
        }
    }

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function getByID(int $id)
    {
        try {
            $query = $this->prepare("SELECT P.title, P.content, P.timestamp, U.firstName, U.lastName FROM users U JOIN posts P ON U.id = P.usersId WHERE P.id = :postId");

            $query->bindParam(':postId', $id);

            $query->execute();

            return $query->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {

            echo "There was an error during reading: " . $e->getMessage();
        }
    }

    public function create(string $title, string $content, int $usersId, int $topicsId)
    {
        try {
            $query = $this->prepare("INSERT INTO `posts` (`title`, `content`, `usersId`, `topicsId`) 
                                                    VALUES (:title, :content, :usersId, :topicsId)");

            $query->bindParam(':title', $title);
            $query->bindParam(':content', $content);
            $query->bindParam(':usersId', $usersId);
            $query->bindParam(':topicsId', $topicsId);

            return  $query->execute();

        } catch (PDOException $e) {
            echo "There was an error during reading: " . $e->getMessage();
        }

    }

    public function edit(int $id)
    {
    }

    public function delete(int $id)
    {
    }
}