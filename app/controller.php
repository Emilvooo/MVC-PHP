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
    }

    public function set($var, $value)
    {
        $this->variables[$var] = $value;
    }
}
