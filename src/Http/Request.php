<?php


namespace App\Http;


use App\Events\AfterRequest;

class Request
{
    private static $instance = null;

    private  $data = null;

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
    public function getAfterRequest()
    {
        return $this->afterRequestEvent;
    }

    public function requestToRoute()
    {

        $this->afterRequestEvent = new AfterRequest($this);

        return new Router($this);

    }

    public function getData(): mixed
    {
        return $this->data;
    }

    public function setData(mixed $data): void
    {
        $this->data = $data;
    }


}
