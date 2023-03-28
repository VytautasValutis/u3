<?php

namespace App\Services;

class TestData {

    private $num;
    private static $auth;

    public static function get()
    {
        return self::$auth ?? self::$auth = new self;
    }

    public function test() : bool
    {

    }
}    
