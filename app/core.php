<?php
namespace App;

class Core
{
    private $controller = null;
    private $action = null;
    public $params = array();
    private $content = null;

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function getSite()
    {
        $this->startController();
        return $this->content;
    }

    private function startController()
    {
        $controller = isset($this->params['controller']) ? $this->params['controller'] : 'content';
        $action = isset($this->params['action']) ? $this->params['action'] : 'index';
        $controller_path = '../app/controllers/'.$controller.'Controller.php';

        // Bestaat de controller file?
        if (file_exists($controller_path)) {
            include_once($controller_path);
            $controller_name = 'app\\controllers\\'.$controller.'Controller';

            // Is de controller ingeladen?
            if (class_exists($controller_name)) {
                $this->controller = new $controller_name($this);
                $this->action = $action;

                // Bestaat de action?
                if (method_exists($this->controller, $this->action)) {
                    // Action aanroepen.
                    $this->controller->$action();

                    // Juiste view + layout inladen.
                    $this->content = $this->startView();
                    return;
                }
                // Fix voor API
                else {
                    $this->content = $this->startView(true);
                    return;
                }
            }
        }
        $this->redirect('/error');
    }

    private function startView($api = false)
    {
        // Controller variables beschikbaar maken in de view en de layout.
        extract($this->controller->variables);

        // View inladen
        ob_start();
        $controller_name = str_replace('Controller', '', get_class($this->controller));
        $parts = explode('\\', $controller_name);
        $controller_name = end($parts);
        include('../app/views/'.$controller_name.'/'.$this->action.'.ctp');
        $this->content = ob_get_clean();

        // // Layout inladen
        if($api == false) {
            ob_start();
            include('../app/layouts/default/layout.ctp');
            $site = ob_get_clean();

            // Layout + view returnen.
            return $site;
        }
        else {
            // Content returnen voor API
            return $this->content;
        }
    }

    public function redirect($uri)
    {
        die(header('Location: '.$uri));
    }
}
