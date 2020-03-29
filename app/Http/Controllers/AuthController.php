<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthServices;

class AuthController extends Controller
{
    protected $authservice;

    public function __construct(AuthServices $authservice) {
        $this->authservice = $authservice;
    }

    public function login(Request $request) {
        return $this->authservice->login_member($request);
    }

    public function register(Request $request) {
        return $this->authservice->add_new_member($request);
    }


}
