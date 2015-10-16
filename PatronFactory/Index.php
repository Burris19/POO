<?php

$session_start;
$_SESSION['user'] = array();
$_SESSION['user']['name'] = 'julian';

require ('User.php');
require ('Coffee.php');

class AuthenticationService {

    private $sessionData;

    public function __construct(array $sessionData = array() )
    {
          $this->sessionData = $sessionData;
    }

    public function user()
    {
          return new User($this->sessionData);
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
        $message = $user->drink($coffee);
        require ('view.php');
    }
}
$auth = new AuthenticationService(['name' => 'Dulio']);


$controller = new Controller($auth);
$controller->action();
