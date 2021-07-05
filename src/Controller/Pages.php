<?php


namespace App\Controller;

use App\Events\AfterResponse;
use App\Events\BeforeResponse;
use App\Http\JsonResponse;

class Pages implements ControllerInterface
{
    private $response = null;

    private $request = null;

    public function insertRequest($request = null)
    {
        $this->request = $request;
    }

    public function index():self
    {
        //print_r($this->request);

        $beforeResponseEvent = new BeforeResponse($this);

        $this->response = new JsonResponse(['key'=>'value']);

        $afterResponseEvent = new AfterResponse($this);

        return $this;

    }

    public function login():self
    {
        //file_put_contents('req.txt', print_r($this->request ,true));

        $this->response = new JsonResponse(['login'=>'credentials']);

        return $this;
    }

    public function getResponse()
    {
        return $this->response->get();
    }

}
