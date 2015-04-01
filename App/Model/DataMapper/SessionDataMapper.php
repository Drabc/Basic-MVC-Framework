<?php

namespace App\Model\DataMapper;

use App\Model\DomainObject\BaseDomainObject;
use App\Helper\Config;

class SessionDataMapper extends BaseDataMapper
{
	public function map(BaseDomainObject &$user)
	{

	}

	public function store(BaseDomainObject $user)
	{
		$_SESSION[Config::get('user_session/name')] = true;
	}
}