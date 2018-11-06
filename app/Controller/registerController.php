<?php

namespace App\Controller;

class registerController extends Controller {
    
    public function index()
    {
        $data['title'] = 'Register user';
        $this->view('templates/header', $data);
        $this->view('auth/register');
        $this->view('templates/footer');
    }

    public function store()
    {
        $name = request('name');
        $email = request('email');
        $password = request('password');
        $pswd = bcrypt($password);
        $created_at = date("Y-m-d H:i:s");
        $this->model('Auth')->register($name, $email, $pswd, $created_at);
        return redirect('login');
    }

}