<?php

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
