<?php

namespace App\Model\DataMapper;

class DataMapperFactory
{
	protected $data_mappers_namespace;

	public function __construct()
	{
		$this->data_mappers_namespace = "App\\Model\\DataMapper\\";
	}

	public function get($data_mapper_name)
	{
		$class_name = ucfirst(strtolower($data_mapper_name)) . 'DataMapper';

		//Class name with namespace
		$full_class_name = $this->data_mappers_namespace . $class_name;

		//Check if class exists and autoload it if it does
		if(class_exists($full_class_name)) {
			
			return new $full_class_name();
		}
		else {

			throw new \Exception("Invalid Data Mapper: {$data_mapper_name}");
		}
	}
}