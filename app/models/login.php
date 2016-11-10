<?php
namespace App\Models;

use App\Db;

class Login
{
    public function loadUser($username) {
        $db = db::getInstance();
        $query = $db->query('SELECT id, username, password FROM users WHERE username = "'.$username.'"');
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }
}
