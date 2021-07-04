<?php


namespace App\Controller;


use App\Http\JsonResponse;

class Pages
{
    private $response = null;

    public function index()
    {

        $this->response = new JsonResponse(['Pages'=>'index']);

        return $this;

    }

    public function getResponse()
    {
        return $this->response->get();
    }

}
