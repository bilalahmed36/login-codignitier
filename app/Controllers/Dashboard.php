<?php namespace App\Controllers;

class Dashboard extends BaseController
{
	public function index()
	{
		$data = [];

		// if (!session()->get('isLoggedIn')) {
		// 	redirect()->to('/');
		// }
		return view('dashboard',$data);
	}

	//--------------------------------------------------------------------

}