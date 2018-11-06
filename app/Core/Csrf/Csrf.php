<?php

/**
 * CSRF Class for protected csrf attak
 * 
 * @author Rizkhal <lamaaurizkhal@gmail.com>
 * @license MIT License
 * @copyright  2018
 */
namespace App\Core\Csrf;

use App\Core\Session\Session;

class Csrf {

	/**
	 * This key for store the token in the session
	 * @var $tokenKey
	 */
	protected static $tokenKey = 'csrf-token';

	/**
	 * Integer length of the csrf token
	 * @var $tokenLength
	 */
	protected static $tokenLength = 42;

	/**
	 * String csrf token
	 * @var $tokenKey
	 */
	protected static $token = null;

	/**
	 * Gets the current csrf token
	 * @return string
	 */
	public static function token()
	{
		if (static::$token !== null) {
			return static::$token;
		}

		if (!$token = Session::get(static::$token)) {
			$token = str_random(static::$tokenLength);
			Session::set(static::$tokenKey, $token);
		}
		
		static::$token = $token;
		return static::$token;
	}

	/**
	 * Validate csrf token from 'csrf-token' post field
	 * @param  string|null token to check or null default to post
	 * @return bool
	 */
	public static function validate($token = null)
	{
		if ($token === null) {
			$token = request(static::$tokenKey);
		}

		$token = trim(str_replace("\0", '', $token));
		if ($token !== Session::get(static::$tokenKey)) {
			return false;
		}

		return true;
	}

	

}