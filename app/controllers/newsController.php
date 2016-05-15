<?php
namespace App\Controllers;

use App\Controller;
use App\Models\News;

class newsController extends Controller
{
    public function __construct() {
        $news_id = $this->core->params['id'];
        $news = new News();
        $data = $news->loadById($news_id);
        $this->set('pageTitle', 'MVC || '.$data[0]['title']);
    }

    public function overview() {
        $news = new News();
        $data = $news->loadAll();

        $this->set('data', $data);
    }

    public function detail() {
        $news_id = $this->core->params['id'];
        $news = new News();
        $data = $news->loadById($news_id);

        if(!isset($data[0]['id'])) {
            $this->core->redirect('/error');
        }

        $this->set('pageTitle', 'MVC || '.$data[0]['title']);
        $this->set('data', $data);
    }

    public function add() {
        if(!empty($_POST)) {
            $news = new News();
            $news->addNews($_POST['author'], $_POST['title'], $_POST['content']);
            $this->core->redirect('/news/overview');
        }
    }

    public function delete() {
        $news = new News();
        $news_id = $this->core->params['id'];

        if(!empty($_POST)) {
            $news->deleteNews($news_id);
            $this->core->redirect('/news/overview');
        }

        $data = $news->loadById($news_id);
        $this->set('data', $data);
    }
}

?>
