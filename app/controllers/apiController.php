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
        $this->news = new News();
        $this->gallery = new Gallery();
        $this->apiHandler($_GET['action']);
    }

    public function index() {
        $this->set('content', 'Welcome!');
    }

    public function apiHandler($model) {
        $objects = array('news', 'gallery');
        if (in_array($model, $objects)) {
            $data = $this->$model->loadAll();
            if (isset($_GET['add'])) {
                if ($_GET['add'] === 'true') {
                    $this->$model->addData($_GET);
                    $this->core->redirect('/api/'.$model);
                }
                else {
                    $this->set('json', json_encode('Error: GET parameter is wrong!'));
                }
            }
            elseif (isset($_GET['edit'])) {
                $data = $this->$model->loadById($_GET['id']);
                if ($_GET['edit'] === 'true') {
                    if(!isset($data[0]['id']))
                    {
                        $this->set('json', json_encode('Error: ID doesnt exist!'));
                    }
                    else {
                        $this->$model->editData($data[0]['id'], $_GET);
                        $this->core->redirect('/api/'.$model);
                    }
                }
                else {
                    $this->set('json', json_encode('Error: GET parameter is wrong!'));
                }
            }
            elseif (isset($_GET['delete'])) {
                $data = $this->$model->loadById($_GET['id']);
                if ($_GET['delete'] === 'true') {
                    if(!isset($data[0]['id']))
                    {
                        $this->set('json', json_encode('Error: ID doesnt exist!'));
                    }
                    else {
                        $this->$model->deleteData($_GET['id']);
                        $this->core->redirect('/api/'.$model);
                    }
                }
                else {
                    $this->set('json', json_encode('Error: GET parameter is wrong!'));
                }
            }
            else {
                $this->set('json', json_encode($data));
            }
        }
        else {
            $this->set('json', json_encode('Error: Page doesnt exist!'));
            $this->core->redirect('/error');
        }
    }
}
?>
