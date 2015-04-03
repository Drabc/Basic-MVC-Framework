<?php

namespace App\Model\DomainObject;

class DomainObjectFactory
{
	protected $domain_objects_namespace;

	public function __construct()
	{
		$this->domain_objects_namespace = "App\\Model\\DomainObject\\";
	}

	public function get($domain_object_name)
	{
		$class_name = ucfirst(strtolower($domain_object_name)) . 'DomainObject';

		//Class name with namespace
		$full_class_name = $this->domain_objects_namespace . $class_name;

		//Check if class exists and autoload it if it does
		if(class_exists($full_class_name)) {
			
			return new $full_class_name();
		}
		else {

			throw new \Exception("Invalid Domain Object: {$full_class_name}");
		}
	}
}