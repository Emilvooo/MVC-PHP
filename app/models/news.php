<?php
namespace App\Models;

use App\Db;

class News
{
    public function loadAll() {
        $db = db::getInstance();
        $query = $db->query('SELECT * FROM posts LIMIT 25');
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function loadById($id) {
        $db = db::getInstance();
        $query = $db->query('SELECT * FROM posts WHERE id = '.$id);
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function addData($get_data) {
        $db = db::getInstance();
        $result = $db->prepare('INSERT INTO posts (author, title, content) VALUES (:author, :title, :content)');
        $result->execute(array(':author'=>$get_data['author'], ':title'=>$get_data['title'], ':content'=>$get_data['content']));

        return $result;
    }

    public function editData($id, $get_data) {
        $db = db::getInstance();
        $result = $db->prepare('UPDATE posts SET author=:author, title=:title, content=:content WHERE id= '.$id);
        $result->execute(array(':author'=>$get_data['author'], ':title'=>$get_data['title'], ':content'=>$get_data['content']));

        return $result;
    }

    public function deleteData($id) {
        $db = db::getInstance();
        $result = $db->prepare('DELETE FROM posts WHERE id = '.$id);
        $result->execute(array('id' => $id));

        return $result;
    }
}
