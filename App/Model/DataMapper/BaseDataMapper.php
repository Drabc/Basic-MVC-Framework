<?php

namespace App\Model\DataMapper;

use App\Model\DomainObject\BaseDomainObject;

abstract class BaseDataMapper
{
	protected $pdo = null;

	abstract public function map(BaseDomainObject &$value);
}