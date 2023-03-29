<?php

namespace App\DB;
use App\Services\AccNum;

use Ramsey\Uuid\Uuid;

class Json implements DataBase {

    private $data;

    public function __construct() 
    {
        if(!file_exists(__DIR__ . '/accounts.json')) {
            file_put_contents(__DIR__ . '/accounts.json', json_encode([]));
        }
        $this->data = json_decode(file_get_contents(__DIR__ . '/accounts.json'), 1);
    }
    
    public function __destruct() 
    {
        file_put_contents(__DIR__ . '/accounts.json', json_encode($this->data));
    }


    function create(array $clientData) : void
    {
        $this->data[] = $clientData;
    }

    function update(int $clientId, array $clientData) : void
    {
        $clientData['id'] = $clientId;
        $this->data = array_map(fn($d) => $d['id'] == $clientId ? $clientData : $d, $this->data);
    }

    function delete(int $clientId) : void
    {
        $this->data = array_filter($this->data, fn($d) => $d['id'] != $clientId);
        $this->data = array_values($this->data);
    }

    function show(int $clientId) : array
    {
        $c = array_filter($this->data, fn($d) => $d['id'] == $clientId);
        return array_shift($c);
    }
    
    function showAll() : array
    {
        return $this->data;
    }
}




