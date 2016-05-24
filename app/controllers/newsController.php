<?php
namespace App\Controllers;

use App\Controller;
use App\Models\News;

class newsController extends Controller
{
    public $news = null;

    public function __construct($core){
        parent::__construct($core);
        $this->news = new News();
    }

    public function overview() {
        $data = $this->news->loadAll();
        $this->set('data', $data);
    }

    public function detail() {
        $news_id = (isset($this->core->params['id']) ? $this->core->params['id'] : null);
        $data = $this->news->loadById($news_id);
        if(!isset($data[0]['id'])) {
            $this->core->redirect('/error');
        }
        $this->set('data', $data);
    }

    public function add() {
        $news_id = (isset($this->core->params['id']) ? $this->core->params['id'] : null);
        if(!empty($_POST)) {
            if(!isset($news_id)) {
                $this->news->addNews($_POST['author'], $_POST['title'], $_POST['content']);
            }
            else {
                $this->news->editNews($news_id, $_POST['author'], $_POST['title'], $_POST['content']);
            }
            $this->core->redirect('/news/overview');
        }
        if(isset($news_id)) {
            $data = $this->news->loadById($news_id);
            $this->set('data', $data);
        }
    }

    public function delete() {
        $news_id = (isset($this->core->params['id']) ? $this->core->params['id'] : null);
        if(!empty($_POST)) {
            $this->news->deleteNews($news_id);
            $this->core->redirect('/news/overview');
        }
        $data = $this->news->loadById($news_id);
        $this->set('data', $data);
    }
}

?>
