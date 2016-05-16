<?php
namespace App\Controllers;

use App\Controller;
use App\Models\News;

class newsController extends Controller
{
    public $news = null;
    public $news_id = null;

    public function __construct($core){
        parent::__construct($core);
        $this->news = new News();
        $this->news_id = (isset($this->core->params['id']) ? $this->core->params['id'] : null);
    }

    public function overview() {
        $data = $this->news->loadAll();
        $this->set('data', $data);
    }

    public function detail() {
        $data = $this->news->loadById($this->news_id);

        if(!isset($data[0]['id'])) {
            $this->core->redirect('/error');
        }
        $this->set('pageTitle', 'EMILVOOO || '.$data[0]['title']);
        $this->set('data', $data);
    }

    public function add() {
        if(!empty($_POST)) {
            $this->news->addNews($_POST['author'], $_POST['title'], $_POST['content']);
            $this->core->redirect('/news/overview');
        }
    }

    public function edit() {
        if(!empty($_POST)) {
            $this->news->editNews($this->news_id, $_POST['author'], $_POST['title'], $_POST['content']);
            $this->core->redirect('/news/overview');
        }
        $data = $this->news->loadById($this->news_id);
        $this->set('data', $data);
    }

    public function delete() {
        if(!empty($_POST)) {
            $this->news->deleteNews($this->news_id);
            $this->core->redirect('/news/overview');
        }
        $data = $this->news->loadById($this->news_id);
        $this->set('data', $data);
    }
}

?>
