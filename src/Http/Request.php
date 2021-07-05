<?php


namespace App\Http;


use App\Events\AfterRequest;

class Request
{
    private static $instance = null;

    private  $data = null;

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
            $this->data = json_decode($_REQUEST['request'], true);
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

    /**
     * @return mixed|null
     */
    public function getData(): mixed
    {
        return $this->data;
    }

    /**
     * @param mixed|null $data
     */
    public function setData(mixed $data): void
    {
        $this->data = $data;
    }


}
