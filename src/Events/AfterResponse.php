<?php


namespace App\Events;


use App\Controller\ControllerInterface;

class AfterResponse
{
    public function __construct(ControllerInterface $controller)
    {

    }

}
