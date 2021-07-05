<?php


namespace App\Controller;

use App\Entity\Entity;
use App\Entity\User;
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

    public function register():self
    {
        $username = $this->request->getData()['data']['username'];
        $password = $this->request->getData()['data']['password'];

        $afterRequest = $this->request->getAfterRequest();
        $sessionID = $afterRequest->getSessionInstance()->getSessionID();

        $user = new User();
        $user->setUsername($username);
        $user->setPassword($password);
        $user->setSessionID($sessionID);
        $user->setRole(['ROLE_USER']);

        $entity = new Entity($user);
        $entity->create();

        //file_put_contents('req.txt', print_r($sessionID ,true));

        $this->response = new JsonResponse([
            'status' => '200',
            'msg' => 'user registered successfully'
        ]);

        return $this;
    }

    public function getResponse()
    {
        return $this->response->get();
    }

}
