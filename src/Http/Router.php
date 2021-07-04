<?php


namespace App\Http;


class Router
{
    private $controller = null;

    private $method = null;

    private $data = null;


    public function __construct ($request)
    {

        $this->selectController($request);

        $this->selectMethod($request);

        $this->selectData($request);
        //$method = $request['method'];

        return $this;

        //$this->controller->index();
        //print_r($this->controller->$method);

    }
    public function getController()
    {
        return eval('return $this->controller->'.$this->method.'();');

    }

    private function selectController($request)
    {
        $controller = '\App\Controller\\' . $request['controller'];
        $this->controller = new $controller();

    }

    private function selectMethod($request)
    {
        $this->method = $request['method'];

    }

    private function selectData($request)
    {
        $this->data = $request['data'];
    }

}
