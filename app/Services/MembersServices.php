<?php 
namespace App\Services;

use App\Repositories\MembersRepository;

class MembersServices {
    protected $memberrepo;

    public function __construct(MembersRepository $memberrepo) {
        $this->memberrepo = $memberrepo;
    }

    public function create($request) {
        return $this->memberrepo->new_member($request);
    }

    public function members() {
        return $this->memberrepo->index();
    }

    public function find_member($member_id) {
        return $this->memberrepo->get_member($member_id);
    }

    public function update($member_id, $request) {
        return $this->memberrepo->update_info($member_id, $request->all());
    }

    public function delete($member_id) {
        return $this->memberrepo->delete_member($member_id);
    }
}