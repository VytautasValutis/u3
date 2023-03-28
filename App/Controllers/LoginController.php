<?php
namespace App\Controllers;
use App\App;
use App\Services\Auth;

class LoginController {

    public function show() {
        return App::view('login/index',[
            'title' => 'Login',
            'hideNav' => true
        ]);
    }

    public function login() 
    {
        if(Auth::get()->login($_POST['name'], $_POST['psw'])) {
            return App::redirect('clients');
        }
        return App::redirect('login');
    }

    public function logout() 
    {
        Auth::get()->logout();
        return App::redirect('login');
    }
}