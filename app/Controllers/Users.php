<?php namespace App\Controllers;

use App\Models\UsersModel;

class Users extends BaseController
{
	public function index()
	{
		$data = [];

		if ($this->request->getMethod() == 'post') {
			// Lets do our validation here

			$rules = [
				'email' => 'required|valid_email',
				'password' => 'required|min_length[3]|max_length[255]|validateUser[email,password]',

			];

			$errors = [
				'password' => [
					'validateUser' => 'Email and Password don\'t match '
				]
			];
			if (!$this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
			}
			else{
				// Store the user in our database

				$usersModel = new UsersModel();

				$user = $usersModel->where('email',$this->request->getVar('email'))->first();

				$this->setUserSession($user);

				return redirect()->to('dashboard');

			}
		}
		echo view('login',$data);
	}

	private function setUserSession($user){
		$data = [
			'id' => $user['id'],
			'firstname' => $user['firstname'],
			'lastname' => $user['lastname'],
			'email' => $user['email'],
			'isLoggedIn' => true
		];

		session()->set($data);
		return true;
	}

	public function register()
	{
		$data = [];

		if ($this->request->getMethod() == 'post') {
			// Lets do our validation here

			$rules = [
				'firstname' => 'required|min_length[3]|max_length[20]',
				'lastname' => 'required|min_length[3]|max_length[20]',
				'email' => 'required|valid_email|is_unique[users.email]',
				'password' => 'required|min_length[3]|max_length[255]',
				'password_confirm' => 'matches[password]',

			];
			if (!$this->validate($rules)) {
				$data['validation'] = $this->validator;
			}
			else{
				// Store the user in our database

				$usersModel = new UsersModel();
				$newData = [
					'firstname' => $this->request->getVar('firstname'),
					'lastname' => $this->request->getVar('lastname'),
					'email' => $this->request->getVar('email'),
					'password' => $this->request->getVar('password'),
				];

				$usersModel->save($newData);
				$session = session();
				$session->setFlashdata('success','Successful Registered');
				return redirect()->to('/');

			}
		}
		echo view('register',$data);
	}

	public function profile()
	{
		$data = [];

		if (!session()->get('isLoggedIn')) {
			redirect()->to('/');
		}
		
		$usersModel = new UsersModel();

		if ($this->request->getMethod() == 'post') {
			// Lets do our validation here

			$rules = [
				'firstname' => 'required|min_length[3]|max_length[20]',
				'lastname' => 'required|min_length[3]|max_length[20]'
			];

			if ($this->request->getPost('password') != '') {
				$rules['password'] = 'required|min_length[3]|max_length[255]';
				$rules['password_confirm'] = 'matches[password]';
			}

			if (!$this->validate($rules)) {
				$data['validation'] = $this->validator;
			}
			else{
				// Store the user in our database

				$usersModel = new UsersModel();
				$newData = [
					'id' => session()->get('id'),
					'firstname' => $this->request->getPost('firstname'),
					'lastname' => $this->request->getPost('lastname')
				];

				if ($this->request->getPost('password') != '') {
					$newData['password'] = $this->request->getPost('password');
				}
				

				$usersModel->save($newData);
				$session = session();
				$session->setFlashdata('success','Successful Updated');
				return redirect()->to('/profile');

			}

		}

		$data['user'] = $usersModel->where('id',session()->get('id'))->first();
		echo view('profile',$data);
	}

	public function logout(){
		session()->destroy();
		return redirect()->to('/');

	}

	//--------------------------------------------------------------------

}
