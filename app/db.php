<?php
namespace App;

class Db {
    private static $instance = NULL;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new \PDO('mysql:host=localhost;dbname=deb10192_emildb', 'deb10192_emil', 'hoi123');
        }
        return self::$instance;
    }

}
