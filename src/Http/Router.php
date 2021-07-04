<?php


namespace App\Http;


use App\Events\BeforeController;

class Router
{
    private $controller = null;

    private $method = null;

    private $data = null;


    public function __construct ($request = null)
    {
        if($request !== null){

            $this->selectData($request);

            $this->selectController($request);

            $this->selectMethod($request);

            return $this;

        }

        return null;

    }
    public function getController()
    {
        $controller = eval('return $this->controller->'.$this->method.'('.');');

        return $controller;

    }

    private function selectController($request)
    {
        $controller = '\App\Controller\\' . $request['controller'];

        if(class_exists($controller)){
            $this->controller = new $controller();
        }else{
            $this->controller = new \App\Controller\Pages();
        }

        $beforeControllerEvent = new BeforeController($this);

        $this->controller->insertData($this->data);

    }

    private function selectMethod($request)
    {
        $this->method = $request['method'];
        if(!method_exists($this->controller,$this->method)){
            $this->method = 'index';
        }

    }

    private function selectData($request)
    {
        $this->data = $request['data'];
    }

    /**
     * @param null $controller
     */
    public function setController($controller): void
    {
        $this->controller = $controller;
    }

    /**
     * @return null
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param null $method
     */
    public function setMethod($method): void
    {
        $this->method = $method;
    }

    /**
     * @return null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param null $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }

}
