<?php
namespace App\Controllers;

use App\Controller;

class contactController extends Controller
{
    public function index() {
        $this->set('data', 'Dit is een contact pagina!');
    }
}
