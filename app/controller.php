<?php
namespace App;

class Controller
{
    public $core = null;
    public $variables = array();

    public function __construct(Core $core)
    {
        $this->core = $core;
        $this->set('pageTitle', 'EMILVOOO || '.ucfirst(isset($this->core->params['controller']) ? $this->core->params['controller'] : 'Home'));
        $this->set('panelTitle', '<h4 class="panel-title-heading">'.ucfirst(isset($this->core->params['controller']) ? $this->core->params['controller'] : 'Home').'</h4>');
    }

    public function set($var, $value)
    {
        $this->variables[$var] = $value;
    }
}
