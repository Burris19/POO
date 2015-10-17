<?php

class CoffeeMaker implements BeverageMaker {

    public function make() {
      
        return new Coffee();
    }

}
