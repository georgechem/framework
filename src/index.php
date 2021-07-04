<?php

$request = json_encode($_REQUEST, true);

//file_put_contents('req.txt', print_r(json_decode($_REQUEST['object'], true),true));

echo json_encode($_REQUEST);
