<?php


namespace App\Helpers;


class Session
{
    private array $config = [];

    /**
     * 0 - disabled
     * 1 - none
     * 2 - active
     */
    private int $sessionStatus;
    private string|false $sessionID;

    public function __construct()
    {
        $this->config = require __DIR__ . './../../config/session.php';
        $this->sessionHandler();
    }

    private function sessionHandler()
    {
        $this->sessionStatus = session_status();
        if($this->sessionStatus === 1){
            session_start($this->config);

        }
        $this->sessionID = session_id();
        print_r($this->sessionID);
    }

}
