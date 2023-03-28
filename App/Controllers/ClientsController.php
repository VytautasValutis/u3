<?php
namespace App\Controllers;
use App\App;
use App\DB\Json;
use App\Services\Auth;
use App\Services\Messages;
use App\Services\TestData;
use App\Services\AccNum;

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
        if(!isset($_SESSION['accNum'])) {
            return App::view('clients/create',[
                'title' => 'New Client'
            ]);
        } else {
            return App::view('clients/create',[
                'title' => 'New Client',
                'name' => $_SESSION['name'],
                'surname' => $_SESSION['surname'],
                'persCode' => $_SESSION['persCode'],
                'accNum' => $_SESSION['accNum'],
            ]);
        }
    }

    public function store() 
    {
        if(!TestData::get()->test()) 
        {
            return App::redirect('list/create');
        }
        $data = [];
        $data['name'] = $_SESSION['name'];
        $data['surname'] = $_SESSION['surname'];
        $data['persCode'] = $_SESSION['persCode'];
        $data['accNum'] = $_SESSION['accNum'];
        $data['id'] = AccNum::get()->idnr();
        $data['value'] = 0;
        (new Json)->create($data);
        Messages::msg()->addMessage('Sukurtas naujas klietas: ' . $data['accNum'],'success');
        unset($_SESSION);
        unset($data);
        return App::redirect('list');
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