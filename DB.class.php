<?php


class DB extends PDO {
    private const HOST = "localhost";
    private const DATABASE = "velekma";
    private const PORT = 3306;
    private const USER = "root";
    private const PASSWORD = "";

    public function __construct() {
        $dsn = "mysql:host=" . self::HOST . ";dbname=" . self::DATABASE . ";port=" . self::PORT . ";";

        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        parent::__construct($dsn, self::USER, self::PASSWORD, $options);
    }

    /**
     * @param $topicId
     * @return array
     */
    public function getPostsTable($topicId)
    {
        try {
            $query = $this->prepare("SELECT P.*, U.`firstName`, U.`lastName` FROM users U JOIN posts P ON U.id = P.usersId WHERE P.`topicsId` = :topicId ORDER BY P.`timestamp` DESC");

            $query->bindParam(':topicId', $topicId);

            $query->execute();

            return $query->fetchAll(PDO::FETCH_OBJ);

            /*$query = $this->prepare("SELECT `posts`.*, `users`.`firstName`, `users`.`lastName` FROM `users` JOIN `users` ON `posts`.`usersId` = `users`.`id` WHERE `posts`.`topicsId` = :topicId AND `posts`.`id` IS NULL ORDER BY `posts`.`timestamp` DESC");
            $query->bindParam(':topicId', $topicId, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);*/
        }

        catch (PDOException $e) {

            echo "There was an error during reading: ";

            echo $e->getMessage();
        }
    }

    /**
     * @param int $sort
     * @return array
     */
    public function getTopicTable ($sort = 2) {
        try {
            $query = $this->prepare("SELECT `topics`.`id`, `topics`.`name`, COUNT(`posts`.`topicsId`) as `postsCount` FROM `topics` JOIN `posts` ON `topics`.`id` = `posts`.`topicsId` GROUP BY `posts`.`topicsId` ORDER BY :sort ASC");

            $query->bindParam(':sort', $sort);

            $query->execute();

            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        catch (PDOException $e) {

            echo "There was an error during reading: ";

            echo $e->getMessage();
        }
    }
}