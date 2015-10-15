<?php
session_start();
$_SESSION['user'] = array();
$_SESSION['user']['name'] = 'Juliancito';

require ('User.php');
require ('Coffee.php');

class AuthenticationService {

    public function user()
    {
        $user = new User($_SESSION['user']);
    }

}

class Controller {

    private $auth;

    public function __construct(AuthenticationService $auth)
    {
        $this->auth = $auth;
    }

    public function action()
    {
        $user = $this->auth->user();
        $coffee = new Coffee();
        $menssage = $user->drink($coffee);

        require ('view.php');
    }


}
/*

$controller = new Controller(new AuthenticationService $user );
$controller->action();
*/

$user = new AuthenticationService
