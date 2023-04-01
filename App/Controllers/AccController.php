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

        return ($client['values'] > 0 ? true : false);
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
}