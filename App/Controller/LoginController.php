<?php

namespace App\Controller;

use App\Model\Service\ServiceFactory;

class LoginController extends BaseController
{
	public function __construct(ServiceFactory $service_factory)
	{
		parent::__construct($service_factory);
	}

	public function authenticate(array $params)
	{
		if(!array_key_exists('username', $params) and !array_key_exists('password', $params))
			throw new \InvalidArgumentException('username and password must be provided');

		//Get authentication service
		$auth = $this->service_factory->get('authentication');

		//If authenticated show page, else direct to login page
		if ($auth->authenticate($params['username'], $params['password']))
			header('Location: /MVC/');
		else
			header('Location: /MVC/login');
	}

	public function index($params)
	{	
		require_once('App/View/Templates/login.php');
	}
}