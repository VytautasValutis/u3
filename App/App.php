<?php

namespace App;
use App\Controllers\HomeController;
use App\Controllers\ClientsController;
use App\Controllers\LoginController;

class App {
    
    public static function process() {

        session_start();
        $url = explode('/',$_SERVER['REQUEST_URI']);
        array_shift($url);

        return self::router($url);
    }

    private static function router(array $url) 
    {
        $method = $_SERVER['REQUEST_METHOD'];
        
        if($method == 'GET' && count($url) == 1 && $url[0] === '') {
            return (new HomeController)->home();
        } 

        if($method == 'POST' && count($url) == 1 && $url[0] === 'logout') {
            return (new LoginController)->logout();
        } 

        if($method == 'GET' && count($url) == 1 && $url[0] === 'login') {
            return (new LoginController)->show();
        } 

        if($method == 'POST' && count($url) == 1 && $url[0] === 'login') {
            return (new LoginController)->login();
        } 

        if($method == 'GET' && count($url) == 3 && $url[0] === 'sort') {
            return (new ClientsController)->list($url[1],$url[2]);
        } 

        if($method == 'GET' && count($url) == 2 && $url[0] === 'list' && $url[1] === 'create') {
            return (new ClientsController)->create();
        } 

        if($method == 'POST' && count($url) == 2 && $url[0] === 'list' && $url[1] === 'create') {
            return (new ClientsController)->store();
        } 

        if($method == 'POST' && count($url) == 3 && $url[0] === 'list' && $url[1] === 'addVal') {
            return (new ClientsController)->addVal($url[2]);
        } 

        if($method == 'POST' && count($url) == 3 && $url[0] === 'list' && $url[1] === 'remVal') {
            return (new ClientsController)->remVal($url[2]);
        } 

        if($method == 'POST' && count($url) == 3 && $url[0] === 'list' && $url[1] === 'delete') {
            return (new ClientsController)->delete($url[2]);
        } 

        else {
    
            return '404 PAGE NOT FOUND';
        }
    }

    public static function view($tmp, $data = [])
    {
        // if($tmp == 'clients/index') {
        //     echo'<pre>';
        //     print_r($data);
        //     die;
        // }

       extract($data);
       $path = __DIR__ . '/../views/';
       ob_start();
       require $path . 'top.php';
       require $path . $tmp . '.php';
       require $path . 'bottom.php';
       $html = ob_get_contents();
       ob_clean();
       return $html;
    }

    public static function redirect($url) 
    {
        header('Location:' . URL . $url);
        return '';
    }


}