<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class User2Service{

    use ConsumesExternalService;

    public $baseUri;
    public $secret;


    public function __construct(){
        $this -> baseUri = config('services.users2.base_uri');
        $this -> secret = config('services.users2.secret');
    }

    public function obtainUsers2(){
        return $this->performRequest('GET','/users');
    }

    public function createUser2($data){
        return $this->performRequest('POST','users',$data);
    }

    public function obtainsUsers2($userId){
        return $this->performRequest('GET',"/users/{$userId}");
    }

    public function editUser2($data, $userId){
        return $this->performRequest('PUT', "/users/{$userId}", $data);
    }

    public function deleteUser2($userId){
        return $this->performRequest('DELETE', "/users/{$userId}" );
    }
}

