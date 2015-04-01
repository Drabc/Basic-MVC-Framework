<?php

namespace App\Model\DomainObject;

use App\Model\DomainObject\BaseDomainObject;

class UserDomainObject extends BaseDomainObject
{
	protected $username;
	protected $first_name;
	protected $last_name;
	protected $password;
	protected $salt;
	protected $email;
	protected $role;

	public function setUserName($username)
	{
		$this->username = $username;
	}

	public function getUserName()
	{
		return $this->username;
	}

	public function setFirstName($first_name)
	{
		$this->first_name = $first_name;
	}

	public function getFirstName()
	{
		return $this->first_name;
	}

	public function setLastName($last_name)
	{
		$this->last_name = $last_name;
	}

	public function getLastName()
	{
		return $this->last_name;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setSalt($salt)
	{
		$this->salt = $salt;
	}

	public function getSalt()
	{
		return $this->salt;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setRole($role)
	{
		$this->role = $role;
	}

	public function getRole()
	{
		$this->role;
	}

	public function matchPassword($password)
	{
		//Check if the object has been mapped
		if (!$this->password or !$this->salt)
			throw new \UnexpectedValueException("User Domain Objects needs a password and a salt. Check The mapper");

		//Compared hashed paswwords
		return (hash_hmac("sha256", $password, $this->salt) === $this->password);
	}
}