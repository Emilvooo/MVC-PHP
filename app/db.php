<?php
namespace App;

class Db {
    private static $instance = NULL;

    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            if ($_SERVER['SERVER_ADDR'] == '141.138.168.1')
            {
                $host = 'localhost';
            }
            else
            {
                $host = '141.138.168.125';
            }
            self::$instance = new \PDO('mysql:host='.$host.';dbname=deb10192_emildb', 'deb10192_emil', 'hoi123');
        }
        return self::$instance;
    }
}
