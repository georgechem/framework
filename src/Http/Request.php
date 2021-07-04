<?php


namespace App\Http;


use App\Events\AfterRequest;

class Request
{
    private static $instance = null;

    private  $request = null;

    private  $router = null;

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

        $this->router = new Router($this->request);

        $afterRequestEvent = new AfterRequest($this);

        return $this->router;
    }



}
