<?php

namespace App\Helper;

class Config
{
	private static $config = array(
									'user_session' => array(
														'name' => 'USID'
													  )
							);

	public static function get($string)
	{
		$value  = null;
		$config = self::$config;
		
		$string = trim($string, "/");

		$keys   = explode("/", $string);
		
		if(is_array($keys)) {

			foreach($keys as $key) {

				if (is_array($config) and array_key_exists($key, $config)) {

					$config = $config[$key];
				} else {

					$config = null;
					break;
				}
			}

			$value = $config;
		}
		
		return $value;
	}
}