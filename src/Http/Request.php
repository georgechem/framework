<?php


namespace App\Http;


class Request
{
    private static $router = null;

    public static function create()
    {
        $request = json_decode($_REQUEST['request'], true);

        if(self::isTokenPresent()){

            self::$router = new Router($request);

            return self::$router;

        }else{

            return null;
        }

    }

    private static function isTokenPresent():bool
    {
        return true;
    }

}
