<?php
namespace App\Controllers;
use App\DB\Json;

class AccController {

    public function __construct()
    {
        if(!Auth::get()->isAuth()) {
            App::redirect('login');
            die;
        }
    }

    public static function isNotZero($id) : bool
    {
        $client = (new Json)->show($id);
        $_SESSION['accNum'] = $client['accNum'];

        return ($client['value'] > 0 ? true : false);
    }

    public static function addValues($id, $temp) : bool
    {
        if(!is_numeric($temp)) return false;
        $k = intval($temp);
        if($k < 0) return false;
        $updateClient = new Json;
        $data = $updateClient->show($id);
        $data['value'] += $k; 
        $updateClient->update($id, $data);
        return true;
    }

    public static function remValues($id, $temp) : bool
    {
        if(!is_numeric($temp)) return false;
        $k = intval($temp);
        if($k < 0) return false;
        $updateClient = new Json;
        $data = $updateClient->show($id);
        if($k > (int) $data['value']) {
            $_SESSION['lowAccValue'] = true;
            return false;
        }
        $data['value'] -= $k; 
        $updateClient->update($id, $data);
        return true;
  
    }
}