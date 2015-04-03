<?php

namespace App\Controller;

use App\Model\Service\ServiceFactory;

class ControllerFactory
{
	public function get($controller_name, ServiceFactory $service_factory)
	{
		$class_name = ucfirst(strtolower($controller_name)) . 'Controller';

		//Class name with namespace
		$full_class_name = __NAMESPACE__ . '\\' . $class_name;

		//Check if class exists and autoload it if it does
		if(class_exists($full_class_name)) {
			
			return new $full_class_name($service_factory);
		}
		else {

			throw new \Exception("Invalid Controller: {$full_class_name}");
		}
	}
}