<?php

namespace App\Controller;

use App\Model\Service\ServiceFactory;

class IndexController extends BaseController
{
	public function __construct(ServiceFactory $service_factory)
	{
		parent::__construct($service_factory);
	}

	public function index()
	{
		require_once('App/View/Templates/index.php');
	}
}