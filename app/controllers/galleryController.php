<?php
namespace App\Controllers;

use App\Controller;
use App\Models\Gallery;

class galleryController extends Controller
{
    public $gallery = null;

    public function __construct($core){
        parent::__construct($core);
        $this->gallery = new Gallery();
    }

    public function index() {
        $data = $this->gallery->loadAll();
        $this->set('data', $data);
    }

    public function add() {
        if(!empty($_POST)) {
            $target_file = basename($_FILES["fileToUpload"]["name"]);
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], '../mvc/images/'.$target_file);
            $this->gallery->addImage($target_file);
            $this->set('message', 'The file '.$target_file.' has been uploaded.');
        }
    }

    public function delete() {
        $image_id = (isset($this->core->params['id']) ? $this->core->params['id'] : null);
        if(!empty($_POST)) {
            $file_path = $this->gallery->loadById($image_id);
            $file = '../mvc/images/'.$file_path[0]['path'];
            if (unlink($file)) {
                $this->gallery->deleteImage($image_id);
                $this->core->redirect('/gallery/index');
            }
        }
        $data = $this->gallery->loadById($image_id);
        $this->set('message', $data);
    }
}
?>
