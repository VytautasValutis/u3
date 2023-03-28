<?php

namespace App\Services;

class Messages {

    private $setMessages = [], $getMessages = [];
    private static $msg;

    public static function msg()
    {
        return self::$msg ?? self::$msg = new self;
    }

    private function __construct()
    {
        if(isset($_SESSION['msg'])) {
            $this->getMessages = $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    }

    public function __destruct()
    {
        if(!empty($this->setMessages)) {
            $_SESSION['msg'] = $this->setMessages;
        }
    }

    public function hasToShow() : bool
    {
        return !empty($this->getMessages);
    }

    public function addMessage(string $text, string $type) : void
    {
        $this->setMessages[] = ['text' => $text, 'type' => $type];
    }

    public function getMessages() : array
    {
        return $this->getMessages;
    }
}