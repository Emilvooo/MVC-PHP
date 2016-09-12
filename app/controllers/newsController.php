<?php
namespace App\Controllers;

use App\Controller;
use App\Models\News;

class newsController extends Controller
{
    public $news = null;

    public function __construct($core)
    {
        parent::__construct($core);
        $this->news = new News();
    }

    public function overview()
    {
        $data = $this->news->loadAll();
        $this->set('data', $data);
    }

    public function detail()
    {
        $id = (isset($this->core->params['id']) ? $this->core->params['id'] : null);
        $data = $this->news->loadById($id);
        if(!isset($data[0]['id']))
        {
            $this->core->redirect('/error');
        }
        $this->set('data', $data);
    }

    public function add()
    {
        $id = (isset($this->core->params['id']) ? $this->core->params['id'] : null);
        if(!empty($_POST))
        {
            if(!isset($id))
            {
                $this->news->addData($_POST);
            }
            else
            {
                $this->news->editData($id, $_POST);
            }
            $this->core->redirect('/news/overview');
        }
        if(isset($id))
        {
            $data = $this->news->loadById($id);
            $this->set('data', $data);
        }
    }

    public function delete()
    {
        $id = (isset($this->core->params['id']) ? $this->core->params['id'] : null);
        if(!empty($_POST))
        {
            $this->news->deleteData($id);
            $this->core->redirect('/news/overview');
        }
        $data = $this->news->loadById($id);
        $this->set('data', $data);
    }
}

?>
