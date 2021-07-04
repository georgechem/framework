<?php

use App\Http\Request;

require __DIR__ .'./../vendor/autoload.php';

/**
 * Request Object used to test through PHP directly without JavaScript
 */
$_REQUEST['request'] = '{"controller":"pages","method":"index","data":{"name":"test"}}';

$request = Request::create();

$router = $request->requestToRoute();


if($request !== null){
    $controller = $router->getController();

    $response = $controller->getResponse();
}else {
    $response = json_encode([
        'status' => 'failed',
        'code' => '500',
        'msg'=>'ERROR'
    ]);
}


echo $response;

