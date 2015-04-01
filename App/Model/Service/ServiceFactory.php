<?php

namespace App\Model\Service;

use App\Model\DomainObject\DomainObjectFactory;
use App\Model\DataMapper\DataMapperFactory;

class ServiceFactory
{
	protected $data_mapper_factory;
	protected $domain_object_factory;
	private $services_namespace;

	public function __construct(DataMapperFactory $data_mapper_factory, DomainObjectFactory $domain_object_factory)
	{
		$this->data_mapper_factory   = $data_mapper_factory;
		$this->domain_object_factory = $domain_object_factory;
		$this->services_namespace	 = "App\\Model\\Service\\";
	}

	public function get($service_name)
	{
		//normalize service name
		$service_name = $service_name . 'Service';

		//load the class
		include($service_name . '.php');

		//Create class name with namespace
		$full_class_name = $this->services_namespace . $service_name;
		
		if(class_exists($full_class_name)) {
			
			return new $full_class_name($this->data_mapper_factory, $this->domain_object_factory);
		}
		else {

			throw new \Exception("Invalid Service: {$service_name}");
		}
	}
}