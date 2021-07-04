<?php


namespace App\Controller;


use App\Http\JsonResponse;

class Pages
{
    private $response = null;

    private $data = null;

    public function insertData($data = null)
    {
        $this->data = $data;
    }

    public function index()
    {

        $this->response = new JsonResponse(['Pages'=>'index', 'data' => $this->data]);

        return $this;

    }

    public function getResponse()
    {
        return $this->response->get();
    }

}
