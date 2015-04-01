<?php

namespace App\Model\Service;

use App\Model\DomainObject\DomainObjectFactory;
use App\Model\DataMapper\DataMapperFactory;

abstract class BaseService
{
	protected $data_mapper_factory;
	protected $domain_object_factory;

	public function __construct(DataMapperFactory $data_mapper_factory, DomainObjectFactory $domain_object_factory)
	{
		$this->data_mapper_factory   = $data_mapper_factory;
		$this->domain_object_factory = $domain_object_factory;
	}	
}