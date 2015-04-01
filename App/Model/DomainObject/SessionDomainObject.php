<?php

namespace App\Model\DomainObject;

class SessionDomainObject
{
	protected $id;
	protected $expiration;
	procte

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setExpiration($expiration)
	{
		$this->expiration = $expiration;
	}

	public function getExpiration()
	{
		return $this->expiration;
	}

	public function set($name, $value)
	{
		$_SESSION[$name] = $value;
	}

	public function delete($name)
	{
		unset($_SESSION[$name]);
	}
}