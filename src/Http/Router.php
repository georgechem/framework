<?php


namespace App\Http;


class Router
{
    private $controller = null;

    private $method = null;

    private $data = null;

    public function __construct ($request)
    {

        $this->controller = $request['controller'];

        $this->method = $request['method'];

        $this->data = $request['data'];

    }

}
