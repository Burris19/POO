<?php
session_start();
$_SESSION['user'] = array();
$_SESSION['user']['name'] = 'Juliancito';

require ('User.php');
require ('Coffee.php');

class Controller {

    public function action()
    {
        $user = new User($_SESSION['user']);
        $coffee = new Coffee();
        $menssage = $user->drink($coffee);

        require ('view.php');
    }


}

$controller = new Controller;

$controller->action();
