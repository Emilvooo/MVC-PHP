<?php
include('../app/autoloader.php');

use App\Core;

$site = new Core($_GET);
echo $site->getSite();

echo 'jesper is wamp';
