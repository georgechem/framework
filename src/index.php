<?php

use App\Http\Request;

require __DIR__ .'./../vendor/autoload.php';

$_REQUEST['request'] = '{"controller":"pages","method":"index","data":{"name":"test"}}';

$request = Request::create();

//file_put_contents('req.txt', print_r($request,true));



//echo json_encode($_REQUEST);

