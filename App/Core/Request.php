<?php

namespace App\Core;

class Request
{
	protected $controller;
	protected $method;
	protected $params;

	public function __construct($uri)
	{
		$uri = explode('/', filter_var(trim($uri, '/'), FILTER_SANITIZE_URL));

		$this->controller = ($c = array_shift($uri)) ? $c : 'Index';
		$this->method 	  = ($m = array_shift($uri)) ? $m : 'Index';
		$this->params  	  = count($uri) ? $uri : array();

		$this->params     = array_merge($this->params, $_POST);
	}

	public function getController()
	{
		return $this->controller;
	}

	public function getMethod()
	{
		return $this->method;
	}

	public function getParams()
	{
		return $this->params;
	}
}