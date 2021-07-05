<?php


namespace App\Http;


use App\Events\BeforeController;

class Router
{
    private $controller = null;

    private $method = null;

    public function __construct (Request $request = null)
    {

        if($request !== null){

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
        //$controller = '\App\Controller\\' . $request['controller'];
        if($request->getData() !== null){
            $controller = '\App\Controller\\' . $request->getData()['controller'];
        }else{
            $controller = null;
        }


        if(class_exists($controller)){
            $this->controller = new $controller();
        }else{
            $this->controller = new \App\Controller\Pages();
        }

        $beforeControllerEvent = new BeforeController($this);

        $this->controller->insertRequest($this);

    }

    private function selectMethod($request)
    {
        //$this->method = $request['method'];
        if($request->getData() !== null){
            $this->method = $request->getData()['method'];
        }else{
            $this->method = null;
        }


        if(!method_exists($this->controller,$this->method)){
            $this->method = 'index';
        }

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
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param null $request
     */
    public function setRequest($request): void
    {
        $this->request = $request;
    }

}
