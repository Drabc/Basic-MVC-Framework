<?php

namespace App\Model\Service;

use App\Model\DomainObject\DomainObjectFactory;
use App\Model\DataMapper\DataMapperFactory; 
use App\Helper\Config;

class AuthenticationService extends BaseService
{
	public function __construct(DataMapperFactory $data_mapper_factory, DomainObjectFactory $domain_object_factory) 
	{		
		parent::__construct($data_mapper_factory, $domain_object_factory);
	}

	public function authenticate($username, $password)
	{
		$user   = $this->domain_object_factory->get('user');
		$mapper = $this->data_mapper_factory->get('user');

		$user->setUsername($username);

		$mapper->map($user);

		if($user->matchPassword($password)) {

			$session_mapper = $this->data_mapper_factory->get('session');
			$session_mapper->store($user);

			return true;
		} else
			return false;
	}
}