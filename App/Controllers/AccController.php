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
}