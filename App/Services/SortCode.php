<?php

class SortAcc()
{
    private static $auth;

    public static function get()
    {
        return self::$auth ?? self::$auth = new self;
    }

    public function sortA($arr, $code)
    {
        
    }
}