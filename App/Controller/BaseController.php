<?php

namespace App\Controller;

use App\Model\Service\ServiceFactory;

class BaseController
{
	protected $service_factory;

	public function __construct(ServiceFactory $service_factory)
	{
		$this->service_factory = $service_factory;
	}
}