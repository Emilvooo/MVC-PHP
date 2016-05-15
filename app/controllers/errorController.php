<?php
namespace App\Controllers;

use App\Controller;

class errorController extends Controller
{
    public function __construct($core){
        parent::__construct($core);
        $this->set('pageTitle', 'EMILVOOO || Error');
    }

    public function index() {
        $this->set('content', 'Deze pagina bestaat niet.');
    }
}

?>
