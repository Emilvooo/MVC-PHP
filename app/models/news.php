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
        $result = $db->prepare('INSERT INTO posts (author, title, content, price, type) VALUES (:author, :title, :content, :price, :type)');
        $result->execute(array(':author'=>htmlentities($get_data['author']), ':title'=>htmlentities($get_data['title']), ':content'=>htmlentities($get_data['content']), ':price'=>htmlentities($get_data['price']), ':type'=>htmlentities($get_data['type'])));

        return $result;
    }

    public function editData($id, $get_data) {
        $db = db::getInstance();
        $result = $db->prepare('UPDATE posts SET author=:author, title=:title, content=:content, price=:price, type=:type WHERE id= '.$id);
        $result->execute(array(':author'=>htmlentities($get_data['author']), ':title'=>htmlentities($get_data['title']), ':content'=>htmlentities($get_data['content']), ':price'=>htmlentities($get_data['price']), ':type'=>htmlentities($get_data['type'])));

        return $result;
    }

    public function deleteData($id) {
        $db = db::getInstance();
        $result = $db->prepare('DELETE FROM posts WHERE id = '.$id);
        $result->execute(array('id' => $id));

        return $result;
    }
}
