<?php

use App\Http\Request;

require __DIR__ .'./../vendor/autoload.php';

/**
 * Request Object used to test through PHP directly without JavaScript
 */
//$_REQUEST['request'] = '{"controller":"pages","method":"index","data":{"name":"test"}}';

$request = Request::create();

$controller = $request->getController();

$response = $controller->getResponse();

//file_put_contents('req.txt', print_r($request,true));


echo $response;

