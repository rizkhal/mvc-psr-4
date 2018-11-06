<?php

namespace App\Route;

class Route {

	public $controller = 'homeController';
	public $method = 'index';
	public $params = [];

	public function __construct()
	{
		$url = $this->parseURL();		
		if(class_exists("App\\Controller\\{$url[0]}")){
			$this->controller = $url[0];
			unset($url[0]);
		} else {
			dd("$url[0] not found");
		}

		$this->controller = "App\\Controller\\".$this->controller;
		$this->controller = new $this->controller;

		if(isset($url[1])) {
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			} else{
				dd("$url[1] not found");	
			}
		}

		if (!empty($url)) {
			$this->params = array_values($url);
		}
	
	}
	
	public function parseURL()
	{
		if(isset($_GET['url'])) {
			$url = explode('/', filter_var(rtrim($_GET['url']), FILTER_SANITIZE_URL));
			$url[0] = $url[0] . 'Controller';
		} else{
			$url[0] = 'homeController';
		}

		return $url;
	}

	public function run()
	{
		return call_user_func_array([$this->controller, $this->method], $this->params);
	}

}