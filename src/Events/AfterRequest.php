<?php


namespace App\Events;


use App\Helpers\Session;

class AfterRequest
{

    private Session $sessionInstance;

    public function __construct($request)
    {
        $this->sessionInstance = new Session();

        //$request->setRouter(null);
        return $this;

    }

    public function getSessionInstance()
    {
        return $this->sessionInstance;
    }


}
