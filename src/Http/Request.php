<?php


namespace App\Http;


use App\Events\AfterRequest;

class Request
{
    private static $request = null;

    private static $router = null;

    public static function create()
    {
        if(isset($_REQUEST['request'])){
            self::$request = json_decode($_REQUEST['request'], true);
        }else{
            return null;
        }

        self::$router = new Router(self::$request);

        $afterRequestEvent = new AfterRequest(self::$request);

        return self::$router;

    }



}
