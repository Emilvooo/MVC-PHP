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

    public function loadById($news_id) {
        $db = db::getInstance();
        $query = $db->query('SELECT * FROM posts WHERE id = '.$news_id);
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function addNews($author, $title, $content) {
        $db = db::getInstance();
        $result = $db->prepare('INSERT INTO posts (author, title, content) VALUES (:author, :title, :content)');
        $result->execute(array(':author'=>$author, ':title'=>$title, ':content'=>$content));

        return $result;
    }

    public function editNews($news_id, $author, $title, $content) {
        $db = db::getInstance();
        $result = $db->prepare('UPDATE posts SET author=:author, title=:title, content=:content WHERE id= '.$news_id);
        $result->execute(array(':author'=>$author, ':title'=>$title, ':content'=>$content));

        return $result;
    }

    public function deleteNews($news_id) {
        $db = db::getInstance();
        $result = $db->prepare('DELETE FROM posts WHERE id = '.$news_id);
        $result->execute(array('id' => $news_id));

        return $result;
    }
}
