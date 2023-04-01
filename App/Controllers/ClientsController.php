<?php
namespace App\Controllers;
use App\App;
use App\DB\Json;
use App\Services\Auth;
use App\Services\Messages;
use App\Services\TestData;
use App\Services\AccNum;
use App\Services\SortCode;
use App\Controllers\AccController;

class ClientsController {

    public function __construct()
    {
        if(!Auth::get()->isAuth()) {
            App::redirect('login');
            die;
        }

    }

    public function list($sortCodeOld, $sortCodeNew) 
    {
        $clients = (new Json)->showAll();
        $sortArr = SortCode::get()->sortA($clients, $sortCodeOld, $sortCodeNew);
        return App::view('clients/index',[
            'title' => 'Clients list',
            'clients' => array_values($sortArr[0]),
            'sortOld' => $sortArr[1][0],
            'a_sort' => $sortArr[1][1],
            'd_sort' => $sortArr[1][2],
            'e_sort' => $sortArr[1][3]
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
        $user = $_SESSION['user'];
        $_SESSION = [];
        $_SESSION['user'] = $user;
        $data = [];
        return App::redirect('sort/d/D');
    }

    public function show($id) 
    {
        $client = (new Json)->show($id);

        return App::view('clients/show',[
            'title' => 'Client page',
            'client' => $client
        ]);

    }

    public function addVal($id) 
    {
        if(isset($_POST['addValue'])) {

            // echo'<pre>';
            // print_r($id);
            // print_r($_POST);
            // die;
    
            $temp = $_POST['addValue'];
            unset($_POST['addValue']);
            if(AccController::addValues($id, $temp)) {
                Messages::msg()->addMessage('Lėšos pridėtos prie sąsk.Nr. ; ' . $_POST['accNum'],'success');
                return App::redirect('sort/d/D');
            } else {
                Messages::msg()->addMessage('Neteisingai nurodytas lėšų kiekis','danger');
            }
        }
        $client = (new Json)->show($id);
        return App::view('clients/addVal',[
            'title' => 'Client edit',
            'client' => $client
        ]);
    }

    public function remVal($id) 
    {
        if(isset($_SESSION['lowAccValue']) && $_SESSION['lowAccValue']) {
            unset($_SESSION['lowAccValue']);
            Messages::msg()->addMessage('Sąskaitoje nepapkanka lėšų','danger');
        } else {
            if(isset($_POST['remValue'])) {
                // echo'<pre>';
                // print_r($id);
                // print_r($_POST);
                // die;
                $temp = $_POST['remValue'];
                unset($_POST['remValue']);
                if(AccController::remValues($id, $temp)) {
                    Messages::msg()->addMessage('Lėšos nurašytos nuo sąsk.Nr. ; ' . $_POST['accNum'],'success');
                    return App::redirect('sort/d/D');
                } else {
                    Messages::msg()->addMessage('Neteisingai nurodytas nurašomų lėšų kiekis','danger');
                }
            }
        }
        $client = (new Json)->show($id);
        return App::view('clients/remVal',[
            'title' => 'Client edit',
            'client' => $client
        ]);
    }

    public function delete($id) 
    {
        if(AccController::isNotZero($id)) {
            Messages::msg()->addMessage('Sąskaitoje ' . $_SESSION['accNum'] . ' yra lėšų. Pašalinti negalima.','danger');
            return App::redirect('sort/d/D');
        }
        (new Json)->delete($id);
        Messages::msg()->addMessage('klientas pašalintas sąsk.nr.' . $_SESSION['accNum'],'success');
        unset($_SESSION['accNum']);
        return App::redirect('sort/d/D');
    }

}