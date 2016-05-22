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

    public function add() {
        if(!empty($_POST)) {
            $target_dir = "../mvc/images/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $this->set('message', 'Sorry, your file was not uploaded');
            } 
            else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $this->set('message', 'The file '.basename( $_FILES["fileToUpload"]["name"]).' has been uploaded.');
                } 
                else {
                    $this->set('message', 'Sorry, there was an error uploading your file.');
                }
            }
        }
    }
}
?>
