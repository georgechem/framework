<?php


namespace App\Http;


class Request
{
    private static $router = null;

    public static function create()
    {
        $request = json_decode($_REQUEST['request'], true);

        self::$router = new Router($request);

        return self::$router;

    }

}
