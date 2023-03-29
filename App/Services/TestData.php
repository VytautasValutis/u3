<?php

namespace App\Services;
use App\Services\PersCode;

class TestData {

    private $num;
    private static $auth;

    public static function get()
    {
        return self::$auth ?? self::$auth = new self;
    }

    public function test() : bool
    {
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['surname'] = $_POST['surname'];
        $_SESSION['persCode'] = $_POST['persCode'];
        $_SESSION['accNum'] = $_POST['accNum'];
        if(strlen($_SESSION['name']) < 3) {
            Messages::msg()->addMessage('Vardas turi būti bent iš 3 raidžių','danger');
            return false;
        }
        if(strlen($_SESSION['surname']) < 3) {
            Messages::msg()->addMessage('Pavardė turi būti bent iš 3 raidžių','danger');
            return false;
        }
        if(!PersCode::get()->testPersCode($_SESSION['persCode'])) {
            Messages::msg()->addMessage('Neteisingas asmens kodas','danger');
            return false;
        }
        return true;
    }
}    
