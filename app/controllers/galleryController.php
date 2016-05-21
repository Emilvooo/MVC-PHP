<?php
namespace App\Controllers;

use App\Controller;

class galleryController extends Controller
{
    public function index() {
        $dir = "../mvc/images/*.jpg";
        $images = glob($dir);
        $images = str_replace('mvc/', '', $images);
        $this->set('images', $images);
    }
}
?>
