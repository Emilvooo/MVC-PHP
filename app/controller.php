<?php
namespace App;

use App\Core;

class Controller
{
    public $core = null;
    public $variables = array();

    public function __construct(Core $core)
    {
        $this->core = $core;
        $this->set('pageTitle', 'MVC');
    }

    public function set($var, $value)
    {
        $this->variables[$var] = $value;
    }
}
