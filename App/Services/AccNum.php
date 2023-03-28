<?php

namespace App\Services;

class AccNum {

    private $num;
    private static $auth;

    public static function get()
    {
        return self::$auth ?? self::$auth = new self;
    }

    public function __construct() 
    {
        if(!file_exists(__DIR__ . '/../DB/num.json')) {
            $this->num = 1;
            file_put_contents(__DIR__ . '/../DB/num.json', json_encode($this->num));
        }
        $this->num = json_decode(file_get_contents(__DIR__ . '/../DB/num.json'), 1);
    }
    
    public function __destruct() 
    {
        file_put_contents(__DIR__ . '/../DB/data.json', json_encode($this->num));
        unset($this->num);
    }

    public function accNr() : string
    {
        $this->num++;
        $sask_nr = 'LT3306660'.sprintf('%1$011d', $this->num);
        return $sask_nr;
    }

    public function idNr() : int
    {
        $this->num++;
        return $this->nr;
    }

}

