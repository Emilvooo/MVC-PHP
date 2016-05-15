<?php
namespace App\Controllers;

use App\Controller;

class errorController extends Controller
{
    public function __construct(){
        $this->set('pageTitle', 'MVC || Error');
    }

    public function index() {
        $this->set('content', 'Deze pagina bestaat niet.');
    }
}

?>
