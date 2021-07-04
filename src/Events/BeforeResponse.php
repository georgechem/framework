<?php


namespace App\Events;


use App\Controller\ControllerInterface;

class BeforeResponse
{
    public function __construct(ControllerInterface $controller)
    {

    }
}
