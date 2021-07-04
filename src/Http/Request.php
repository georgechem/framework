<?php


namespace App\Http;


use App\Events\AfterRequest;

class Request
{
    private static $router = null;

    public static function create()
    {
        if(isset($_REQUEST['request'])){
            $request = json_decode($_REQUEST['request'], true);
        }else{
            return null;
        }
        $afterRequestEvent = new AfterRequest($request);

        self::$router = new Router($request);



        return self::$router;



    }



}
