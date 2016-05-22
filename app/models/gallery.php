<?php
namespace App\Models;

use App\Db;

class Gallery
{
    public function loadAll() {
        $db = db::getInstance();
        $query = $db->query('SELECT * FROM gallery LIMIT 25');
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function loadById($image_id) {
        $db = db::getInstance();
        $query = $db->query('SELECT path FROM gallery WHERE id = '.$image_id);
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function addImage($path) {
        $db = db::getInstance();
        $result = $db->prepare('INSERT INTO gallery (path) VALUES (:path)');
        $result->execute(array(':path'=>$path));

        return $result;
    }

    public function deleteImage($image_id) {
        $db = db::getInstance();
        $result = $db->prepare('DELETE FROM gallery WHERE id = '.$image_id);
        $result->execute(array('id' => $image_id));

        return $result;
    }
}
