<?php


namespace App\Http;


class JsonResponse
{
    private $data = null;

    public function __construct($data = null)
    {
        $this->data = $data;
    }

    public function get()
    {
        return json_encode($this->data);
    }


}
