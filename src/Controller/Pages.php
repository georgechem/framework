<?php


namespace App\Controller;

use App\Events\AfterResponse;
use App\Events\BeforeResponse;
use App\Http\JsonResponse;

class Pages implements ControllerInterface
{
    private $response = null;

    private $data = null;

    public function insertData($data = null)
    {
        $this->data = $data;
    }

    public function index():self
    {

        $beforeResponseEvent = new BeforeResponse($this);

        $this->response = new JsonResponse(['Pages'=>'index', 'data' => $this->data]);

        $afterResponseEvent = new AfterResponse($this);

        return $this;

    }

    public function getResponse()
    {
        return $this->response->get();
    }

}
