<?php

class Topic extends DB
{
    /**
     * @param int $sort
     * @return array
     */
    public function getAll($sort = 2) {
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