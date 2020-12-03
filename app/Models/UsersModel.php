<?php 
namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model {
	protected $table = 'users';
	protected $allowedFields = ['firstname','lastname','email','password','updated_at'];
	protected $beforeInsert = ['beforeInsert'];
	protected $beforeUpdate = ['beforeUpdate'];

	public function passwordHash(array $data){
		if (isset($data['data']['password'])) {
			$data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
		}
		return $data;
	}

	public function beforeInsert(array $data){
		$data = $this->passwordHash($data);

		return $data;
	}

	public function beforeUpdate(array $data){
		$data = $this->passwordHash($data);

		return $data;
	}

}
