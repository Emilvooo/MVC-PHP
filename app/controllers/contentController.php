<?php
namespace App\Controllers;

use App\Controller;

class contentController extends Controller
{
    public function index() {
        $this->set('pageTitle', 'Welkom!');
        $this->set('content', '<h5>Welkom!</h5>');
    }

    public function detail() {
        $this->set('time', time());
    }
}
?>
