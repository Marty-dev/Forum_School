<?php

class Topic extends DB
{
    /**
     * @param int $sort
     *
     * @return array
     */
    public function getAll($sort = 2)
    {
        try {
            $query = $this->prepare("SELECT `topics`.`id`, `topics`.`name`, COUNT(`posts`.`topicsId`) as `postsCount` FROM `topics` JOIN `posts` ON `topics`.`id` = `posts`.`topicsId` GROUP BY `posts`.`topicsId` ORDER BY :sort ASC");

            $query->bindParam(':sort', $sort);

            $query->execute();

            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "There was an error during reading: " . $e->getMessage();
        }
    }

    public function selectAll () {
        try {
            $query = $this->prepare("SELECT * FROM topics");

            $query->execute();

            return $query->fetchAll(PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            echo "There was an error during reading: " . $e->getMessage();
        }
    }

    public function selectByName ($topic) {
        try {
            $query = $this->prepare("SELECT id FROM topics WHERE 'name' = :topic");

            $query->bindParam(':name', $topic);
            $query->execute();

            return $query->fetch(PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            echo "There was an error during reading: " . $e->getMessage();
        }
    }
}