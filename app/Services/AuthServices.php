<?php 
namespace App\Services;
use App\Repositories\AuthRepository;

class AuthServices {

    protected $authrepo;

    public function __construct(AuthRepository $authrepo) {
        $this->authrepo = $authrepo;
    }

    public function login_member($request) {
        return $this->authrepo->login($request);
    }
    
    public function add_new_member($request) {
        return $this->authrepo->register($request);
    }
}