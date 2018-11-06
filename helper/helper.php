<?php

use App\Core\Session\Session;

function dd()
{
	echo '<pre>';
		array_map(function($x) {
			var_dump($x);
		}, func_get_args());
	die;
}

function bcrypt($password)
{
	return password_hash($password, PASSWORD_BCRYPT);
}

function verify($password, $hash)
{
	return password_verify($password, $hash);
}

function redirect($to)
{
	header('Location: ' . BASEURL . $to);
	exit;
}

function request($key)
{
    if(isset($_POST[$key])) {
        return $_POST[$key];
    } else {
        throw new Exception("Error Processing Request", 1);
    }
}

function str_random($length)
{
    $seed = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijqlmnopqrtsuvwxyz0123456789';
    $max = strlen($seed) - 1;

    $string = '';
    for ($i = 0; $i < $length; ++$i)
        $string .= $seed{intval(mt_rand(0.0, $max))};

    return $string;
}