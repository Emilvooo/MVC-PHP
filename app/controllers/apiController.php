<?php
namespace App\Controllers;

use App\Controller;
use App\Models\News as News;
use App\Models\Gallery as Gallery;

class apiController extends Controller
{
    public $news = null;
    public $gallery = null;

    public function __construct($core)
    {
        parent::__construct($core);
        $this->startModels();
    }

    public function startModels()
    {
        if ($_GET['action'] == 'news') {
            $this->news = new News();
        }
        elseif ($_GET['action'] == 'gallery') {
            $this->gallery = new Gallery();
        }
        else {
            $this->core->redirect('/error');
        }
        $this->apiHandler($_GET['action']);
    }

    public function apiHandler($model)
    {
        $data = $this->$model->loadAll();
        if (isset($_GET['add'])) {
            if ($_GET['add'] === 'true') {
                $this->$model->addData($_GET);
                $this->core->redirect('/api/'.$model);
            }
            else {
                $this->set('json', json_encode(array('message' => 'Error: GET parameter is wrong!')));
            }
        }
        elseif (isset($_GET['edit'])) {
            $data = $this->$model->loadById($_GET['id']);
            $object = json_decode(json_encode($data), FALSE);
            if ($_GET['edit'] === 'true') {
                if(!isset($object[0]->id))
                {
                    $this->set('json', json_encode(array('message' => 'Error: ID doesnt exist!')));
                }
                else {
                    $this->$model->editData($object[0]->id, $_GET);
                    $this->core->redirect('/api/'.$model);
                }
            }
            else {
                $this->set('json', json_encode(array('message' => 'Error: GET parameter is wrong!')));
            }
        }
        elseif (isset($_GET['delete'])) {
            $data = $this->$model->loadById($_GET['id']);
            $object = json_decode(json_encode($data), FALSE);
            if ($_GET['delete'] === 'true') {
                if(!isset($object[0]->id))
                {
                    $this->set('json', json_encode(array('message' => 'Error: ID doesnt exist!')));
                }
                else {
                    $this->$model->deleteData($_GET['id']);
                    $this->core->redirect('/api/'.$model);
                }
            }
            else {
                $this->set('json', json_encode(array('message' => 'Error: GET parameter is wrong!')));
            }
        }
        else {
            $this->set('json', json_encode(array('message' => 'Success', 'list' => $data)));
        }
    }
}
?>
