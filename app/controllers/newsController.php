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

    public function index()
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
        $empty = $this->valid->isEmpty($_POST, array('author', 'title', 'content', 'price', 'type'));
        $this->set('error', $empty);
        if ($empty === true) {
            $valid = $this->valid->isValid($_POST, array('email' => 'title', 'number' => 'price'));
            $this->set('error', $valid);
            if ($valid === true) {
                $this->news->addData($_POST);
                $this->core->redirect('/news/index');
            }
        }
    }

    public function edit()
    {
        $id = (isset($this->core->params['id']) ? $this->core->params['id'] : null);

        $data = $this->news->loadById($id);
        $object = json_decode(json_encode($data), FALSE);

        $empty = $this->valid->isEmpty($_POST, array('author', 'title', 'content', 'price', 'type'));
        $this->set('error', $empty);
        if ($empty === true) {
            $valid = $this->valid->isValid($_POST, array('email' => 'title', 'number' => 'price'));
            $this->set('error', $valid);
            if ($valid === true) {
                $this->news->editData($id, $_POST);
                $this->core->redirect('/news/index');
            }
        }

        $this->set('data', $object);
    }

    public function delete()
    {
        $id = (isset($this->core->params['id']) ? $this->core->params['id'] : null);
        $this->news->deleteData($id);
        $this->core->redirect('/news/index');
    }
}
?>
