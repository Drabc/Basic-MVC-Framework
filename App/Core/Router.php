<?php

namespace App\Core;

use App\Model\Service\ServiceFactory;
use App\Model\DataMapper\DataMapperFactory;
use App\Model\DomainObject\DomainObjectFactory;

class Router
{
	protected $controller_factory;

	public function __construct($controller_factory)
	{
		$this->controller_factory = $controller_factory;
	}

	public function route(Request $request)
	{
		$service_factory = new ServiceFactory(new DataMapperFactory, new DomainObjectFactory);

		$controller 	 = $this->controller_factory->get($request->getController(), $service_factory);

		$controller    	 = new SecureContainer($controller, $service_factory->get('authorization'));

		$method  		 = $request->getMethod();
			
		$controller->$method($request->getParams());
	}
}