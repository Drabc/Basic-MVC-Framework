<?php

namespace App\Model\DataMapper;

use App\Model\DataMapper\BaseDataMapper;
use App\Model\DomainObject\BaseDomainObject;

class UserDataMapper extends BaseDataMapper
{
	public function map(BaseDomainObject &$user)
	{
		//Fetch user data (this should be a database call, but for now we just create an array)
		$user_info  = array('first_name' => 'Alex', 'last_name' => 'Bernabel', 'password' => 'e3d6a58df269bd888fb177828ee301f04c6cff85a40390e2429aa957d0ac4208', 'salt' => 'qwer', 'email' => 'test@gmail.com', 'role' => 'user');

		//Map data
		$user->setFirstName($user_info['first_name']);
		$user->setFirstName($user_info['last_name']);
		$user->setPassword($user_info['password']);
		$user->setSalt($user_info['salt']);
		$user->setEmail($user_info['email']);
		$user->setRole($user_info['role']);
	}
}