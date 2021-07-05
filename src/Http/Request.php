<?php


namespace App\Http;


use App\Events\AfterRequest;

class Request
{
    private static $instance = null;

    private  $request = null;

    private  $router = null;

    private $afterRequestEvent = null;

    public static function create()
    {
        if(is_null(self::$instance)){
            self::$instance = new self();

        }

        return self::$instance;

    }

    private function __construct()
    {
        if(isset($_REQUEST['request'])){
            $this->request = json_decode($_REQUEST['request'], true);
        }else{
            return null;
        }
    }

    public function requestToRoute()
    {

        //$this->router = new Router($this->request);
        $this->router = new Router($this);

        $this->afterRequestEvent = new AfterRequest($this);

        return $this->router;

    }

    /**
     * @return mixed|null
     */
    public function getRequest(): mixed
    {
        return $this->request;
    }

    /**
     * @param mixed|null $request
     */
    public function setRequest(mixed $request): void
    {
        $this->request = $request;
    }

    /**
     * @return null
     */
    public function getRouter()
    {
        return $this->router;
    }

    /**
     * @param null $router
     */
    public function setRouter($router): void
    {
        $this->router = $router;
    }


}
