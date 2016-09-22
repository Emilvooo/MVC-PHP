<?php
namespace App\Controllers;

use App\Controller;

class homeController extends Controller
{
    public function index() {
        $this->set('data', 'Welcome!');
    }
}
?>
