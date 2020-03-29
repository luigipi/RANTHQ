<?php 
namespace App\Repositories;
use App\Member;
use App\Http\Resources\MembersResources;
use Illuminate\Support\Facades\Hash;

class MembersRepository {

    protected $member;

    public function __construct(Member $member) {
        $this->member = $member;
    }

    public function index() {
        return MembersResources::collection($this->member->orderBy("first_name", "asc")->paginate(50)); 
    }

    public function new_member($request) {
        $savedata = $this->member->create([
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

        if($savedata) {
            return new MembersResources($savedata);
        }
    }

    public function get_member($member_id) {
        return new MembersResources($this->member->findOrFail($member_id));
    }

    public function update_info($member_id, array $request) {
        $member = $this->member->findOrFail($member_id);
        $upadte = $member->update($request);

        if($upadte) {
            return new MembersResources($member);
        }
    }

    public function delete_member($member_id) {
        $foundMember = $this->member->findOrFail($member_id);
        if($foundMember->delete()) {
            return new MembersResources($foundMember);
        }
    }

    public function photo_upload() {
        //To do
    }
}