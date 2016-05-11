<?php
namespace App\Controllers;

use App\Controller;

class adminController extends Controller
{
    public function index() {
        $this->set('pageTitle', 'Admin');
    }
}
?>
