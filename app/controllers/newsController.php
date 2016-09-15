<?php
namespace App\Controllers;

use App\Controller;
use App\Models\News;
use App\Helpers\Valid;

class newsController extends Controller
{
    public $news = null;
    public $valid = null;

    public function __construct($core)
    {
        parent::__construct($core);
        $this->news = new News();
        $this->valid = new Valid();
    }

    public function overview()
    {
        $data = $this->news->loadAll();
        $object = json_decode(json_encode($data), FALSE);
        $this->set('data', $object);
    }

    public function detail()
    {
        $id = (isset($this->core->params['id']) ? $this->core->params['id'] : null);
        $data = $this->news->loadById($id);
        if(!isset($data[0]['id'])) {
            $this->core->redirect('/error');
        }
        $object = json_decode(json_encode($data), FALSE);
        $this->set('data', $object);
    }

    public function add()
    {
        $id = (isset($this->core->params['id']) ? $this->core->params['id'] : null);
        if(!empty($_POST)) {
            if(!isset($id)) {
                $this->news->addData($_POST);
            }
            else {
                $this->news->editData($id, $_POST);
            }
            $this->core->redirect('/news/overview');
        }
        if(isset($id)) {
            $data = $this->news->loadById($id);
            $object = json_decode(json_encode($data), FALSE);
            $this->set('data', $object);
        }
    }

    public function delete()
    {
        $id = (isset($this->core->params['id']) ? $this->core->params['id'] : null);
        if(!empty($_POST)) {
            $this->news->deleteData($id);
            $this->core->redirect('/news/overview');
        }
        $data = $this->news->loadById($id);
        $object = json_decode(json_encode($data), FALSE);
        $this->set('data', $object);
    }
}
?>
