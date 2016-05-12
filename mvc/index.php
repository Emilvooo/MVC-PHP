<?php
include('../app/autoloader.php');

use App\Core;

$site = new Core($_GET);
if ($_SERVER['SERVER_ADDR'] != '141.138.168.125') {
    echo '<center><h3>LOCALHOST</h3></center>';
}
echo $site->getSite();