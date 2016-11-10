<?php
namespace App\Controllers;

use App\Controller;
use App\Models\Login;

class loginController extends Controller
{
    public $user = null;

    public function __construct($core)
    {
        parent::__construct($core);
        $this->set('pageTitle', 'EMILVOOO || Login');

        $this->user = new Login();

        if (!empty($_POST)) {
            $this->loadUser();
        }
    }

    public function index()
    {
        $this->set('data', 'Auth');
    }

    public function loadUser()
    {
        $username = $_POST['lg_username'];
        $user = $this->user->loadUser($username);

        if (!empty($user)) {
            $this->doLogin($user);
        }
        else {
            $this->set('error', 'Username is incorrect!');
        }
    }

    public function doLogin($user)
    {
        if ($user[0]['password'] === $_POST['lg_password']) {
            $_SESSION['user'] = $user[0]['id'];

            var_dump($_SESSION['user']);
        }
        else {
            $this->set('error', 'Password is incorrect!');
        }
    }
}
