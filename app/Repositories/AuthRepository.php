<?php 
namespace App\Repositories;
use App\Member;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\MembersResources;

class AuthRepository {

    protected $member;

    public function __construct(Member $member) {
        $this->member = $member;
    }

    public function login($request) {
        $data = $request->only("email", "password");

        if(auth()->guard("member")->attempt($data)) {
            return new MembersResources(auth()->guard("member")->user());
        }

        return response()->json("Invalid details. Check and try again");
    }

    public function register($request) {
        $newmember = $this->member->create([
            "first_name" => $request->firstname,
            "last_name" => $request->lastname,
            "gender" => $request->gender,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "phone_number" => $request->phonenumber,
            "role" => "member",
            "avatar" => "no-image.jpg",
            "is_active" => 1,
            "status" => "active"
        ]);

        if($newmember) {
            return new MembersResources($newmember);
        }
    }
}