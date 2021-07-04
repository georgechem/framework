<?php

require __DIR__ .'./../vendor/autoload.php';

use App\Entity\Entity;
use App\Entity\User;

$request = json_encode($_REQUEST, true);

//file_put_contents('req.txt', print_r(json_decode($_REQUEST['object'], true),true));

$user= new User();
$entity = new Entity($user);
$entity->read(1);


echo json_encode($user->getUsername());
