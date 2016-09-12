<?php
namespace App;

class Db {
    private static $instance = NULL;

    public static function getInstance()
    {
        $database = parse_ini_file("../mvc/config.ini");
        if (!isset(self::$instance))
        {
            if ($_SERVER['SERVER_ADDR'] == '141.138.168.125')
            {
                $host = 'localhost';
            }
            else
            {
                $host = '141.138.168.125';
            }
            self::$instance = new \PDO('mysql:host='.$host.';dbname='.$database['database_name'].'', $database['username'], $database['password']);
        }
        return self::$instance;
    }
}
