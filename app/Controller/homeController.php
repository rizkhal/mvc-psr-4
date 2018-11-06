<?php

namespace App\Controller;

use Dompdf\Dompdf;
use App\Core\Session\Session;

class homeController extends Controller {

	protected $session;

	public function __construct()
	{
		$this->session = new Session;
	}
	
	public function index()
	{
		$data['mahasiswa'] = $this->model('Home')->getAll();
		$data['title'] = "Halaman home";
		$this->view('templates/header', $data);
		$this->view('home/index', $data);
		$this->view('templates/footer');
	}

	public function create()
	{
		$data['title'] = "Create new mahasiswa";
		$this->view('templates/header', $data);
		$this->view('home/create');
		$this->view('templates/footer');
	}

	public function store()
	{
		$name = request('name');
		$email = request('email');

		$this->model('Home')->store($name, $email);
		return redirect('home');
	}

	public function edit($id)
	{
		$data['title'] = "Update data mahasiswa";
		$data['mahasiswa'] = $this->model('Home')->getWhereEmail($id);
		$this->view('templates/header', $data);
		$this->view('home/edit', $data);
		$this->view('templates/footer');
	}

	public function update($id)
	{
		$name = request('name');
		$email = request('email');

		$this->model('Home')->updateWhereId($id, $name, $email);
		return redirect('home');
	}

	public function destroy($id)
	{
		dd($id);
	}

}