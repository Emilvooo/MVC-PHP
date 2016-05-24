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
            $total = count($_FILES['files']['name']);
            for($i=0; $i<$total; $i++) {
                $ext = explode('.', basename($_FILES['files']['name'][$i]));
                $newFilePath = '../mvc/images/'.md5(uniqid()).'.'.$ext[count($ext) - 1];
                if(move_uploaded_file($_FILES['files']['tmp_name'][$i], $newFilePath)) {
                    $this->set('message', 'The images have been uploaded.');
                    $this->gallery->addImage(str_replace('../mvc/images/', '', $newFilePath));
                }
            }
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



