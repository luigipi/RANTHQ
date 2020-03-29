<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MembersServices;

class MembersController extends Controller
{
    protected $memberservice;

    public function __construct(MembersServices $memberservice) {
        $this->memberservice = $memberservice;
    }

    public function index() {
        return $this->memberservice->members();
    }

    public function newMember(Request $request) {
        return $this->memberservice->create($request);
    }

    public function findMember($member_id) {
        return $this->memberservice->find_member($member_id);
    }

    public function update($member_id, Request $request) {
        return $this->memberservice->update($member_id, $request);
    }

    public function delete($member_id) {
        return $this->memberservice->delete($member_id);
    }
}
