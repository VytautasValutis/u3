<?php
namespace App\Controllers;
use App\App;
use App\DB\Json;
use App\Services\Auth;
use App\Services\Messages;

class ClientsController {

    public function __construct()
    {
        if(!Auth::get()->isAuth()) {
            App::redirect('login');
            die;
        }

    }

    public function list() 
    {
        $clients = (new Json)->showAll();
        return App::view('clients/index',[
            'title' => 'Clients list',
            'clients' => $clients
        ]);

    }

    public function create() {
        return App::view('clients/create',[
            'title' => 'New Client'
        ]);
    }

    public function store() 
    {
        $data = [];
        $data['name'] = $_POST['name'];
        $data['surname'] = $_POST['surname'];
        $data['tt'] = isset($_POST['tt']) ? 1 : 0;
        (new Json)->create($data);
        Messages::msg()->addMessage('New clientis was created','success');
        return App::redirect('clients');
    }

    public function show($id) 
    {
        $client = (new Json)->show($id);

        return App::view('clients/show',[
            'title' => 'Client page',
            'client' => $client
        ]);

    }

    public function edit($id) 
    {
        $client = (new Json)->show($id);

        return App::view('clients/edit',[
            'title' => 'Client edit',
            'client' => $client
        ]);

    }

    public function update($id) 
    {
        $data = [];
        $data['name'] = $_POST['name'];
        $data['surname'] = $_POST['surname'];
        $data['tt'] = isset($_POST['tt']) ? 1 : 0;
        (new Json)->update($id, $data);
        Messages::msg()->addMessage('New clientis was edited','success');
        return App::redirect('clients');
    }

    public function delete($id) 
    {
        (new Json)->delete($id);
        Messages::msg()->addMessage('The client gone','warning');
        return App::redirect('clients');
    }

}