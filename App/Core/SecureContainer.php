<?php

namespace App\Core;

use App\Model\Service\AuthorizationService;

class SecureContainer
{
	protected $auth;
	protected $target;

	public function __construct($target, AuthorizationService $auth)
	{
		$this->target = $target;
		$this->auth   = $auth;
	}

	public function __call($method, $args)
	{	
		if(get_class($this->target) != 'App\\Controller\\LoginController' and !$this->auth->isAuthorized())
			header('Location: /MVC/login/');
	 	else {

	 	 	if (method_exists($this->target, $method)) {

	 	 		$this->target->$method($args[0]);
	 	 	}
	 	}
	}
}