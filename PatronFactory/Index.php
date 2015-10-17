<?php

require ('User.php');
require ('Coffee.php');
require ('AuthenticationService.php');
require ('CoffeeMaker.php');
require ('BarTender.php');

interface BeverageMaker {

    public function make();

}


class Controller {

    private $auth;
    private $coffe;

    public function __construct(AuthenticationService $auth)
    {
          $this->auth = $auth;
    }

    public function action(BeverageMaker $beverageMaker)
    {
        $user = $this->auth->user();

        $beverage = $beverageMaker->make();

        $message = $user->drink($beverage);

        require ('view.php');
    }
}
$auth = new AuthenticationService(['name' => 'Dulio']);
$controller = new Controller($auth);
$controller->action(new BarTender);
