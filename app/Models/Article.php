<?php

namespace app\Models;


class Article extends Model
{

    public function all()
    {
        $query = " SELECT * FROM `articles` ORDER BY created_at DESC; ";
        $result = $this->query($query)->fetchAll();
        $this->closeConnection();
        return $result;
    }

    public function find($id)
    {
        $query = "SELECT * FROM `articles` WHERE id = ? ";
        $result = $this->query($query, [$id])->fetch();
        $this->closeConnection();
        return $result;
    }

    public function insert($values)
    {
        $query = "INSERT INTO `articles` ( `title`, `text`, `image`, created_at) VALUES ( ?, ?, ?, now() );";
        $this->execute($query, array_values($values));
        $this->closeConnection();
    }


    public function delete($id)
    {
        $query = "DELETE FROM `articles` WHERE `id` = ? ;";
        $this->execute($query, [$id]);
        $this->closeConnection();
    }
}
