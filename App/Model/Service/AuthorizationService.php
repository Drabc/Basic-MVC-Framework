<?php

namespace App\Model\Service;

use App\Model\DomainObject\DomainObjectFactory;
use App\Model\DataMapper\DataMapperFactory;
use App\Helper\Config;

class AuthorizationService extends BaseService
{
	public function __construct(DataMapperFactory $data_mapper_factory, DomainObjectFactory $domain_object_factory) 
	{		
		parent::__construct($data_mapper_factory, $domain_object_factory);
	}

	public function isAuthorized()
	{
		//Authorize Service
		// $session = $this->domain_object_factory->get('session');
		// $mapper  = $this->data_mapper_factory->get('session');

		// $mapper->map($session);

		return array_key_exists(Config::get('user_session/name'), $_SESSION);
	}	
}