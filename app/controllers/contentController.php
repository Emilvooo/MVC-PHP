<?php
namespace App\Controllers;

use App\Controller;

class contentController extends Controller
{
    public function index() {
        $this->set('pageTitle', 'Welkom!');
    }

    public function detail() {
        $this->set('time', time());
    }
}
?>
