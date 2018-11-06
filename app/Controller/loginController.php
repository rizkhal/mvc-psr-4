<?php

namespace App\Controller;

use App\Database\DB;

class loginController extends Controller {

	public function index()
	{
		$data['title'] = 'Halaman login';
		$this->view('templates/header', $data);
		$this->view('auth/logins');
		$this->view('templates/footer');
	}

	public function login()
	{
		$email = request('email');
		$password = request('password');
		$this->model('Auth')->login($email, $password);
	}

}