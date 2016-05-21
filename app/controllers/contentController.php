<?php
namespace App\Controllers;

use App\Controller;

class contentController extends Controller
{
    public function index() {
        $this->set('content', 'Welcome!');
    }
}
?>
