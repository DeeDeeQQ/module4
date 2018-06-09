<?php

class Category
{
    const SHOW_BY_DEFAULT = 6;

    public static function getCategoriesList()
    {
        $db = Db::getConnection();
        $categoryList = [];

        $result = $db->query('SELECT id, title from category');

        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['title'] = $row['title'];
            $i++;
        }
        return $categoryList;
    }


    public static function getCategoriesListAdmin()
    {
        $db = Db::getConnection();
        $categoryList = [];

        $result = $db->query('SELECT id, parent_id, title FROM category');

        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['parent_id'] = $row['parent_id'];
            $categoryList[$i]['title'] = $row['title'];
            $i++;
        }

        return $categoryList;
    }

    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Отображается';
                break;
            case '0':
                return 'Скрыта';
                break;
        }
    }

    public static function createCategory($options)
    {

        $db = Db::getConnection();

        $sql = 'INSERT INTO category (title) VALUES (:title)';

        $result = $db->prepare($sql);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);

        if ($result->execute()) {
            Session::setFlash('OK');
            return $db->lastInsertId();
        }
        return 0;
    }

    public static function deleteCategoryById($id)
    {
        $db = Db::getConnection();

        $sql = "DELETE FROM category WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }

    public static function updateCategoryById($id, $options)
    {
        $db  = Db::getConnection();
        $sql = "UPDATE category SET title = :title WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);

        if ($result->execute()) {
            Session::setFlash("OK");
            return $db->lastInsertId();
        }
        Session::setFlashError("Что-то пошло не так");
        return 0;
    }

    public static function getCategoryById($id)
    {
        $id = intval($id);

        if($id) {
            $db = Db::getConnection();

            $result = $db->query("SELECT * FROM category WHERE id=" . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }
        return false;
    }

}