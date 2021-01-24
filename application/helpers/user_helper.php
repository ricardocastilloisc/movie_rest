<?php


/**
 * Convierte plano a hash
 */

if (!function_exists('hashPassword')) {
	function hashPassword($plainPassword)
	{
		return password_hash($plainPassword, PASSWORD_DEFAULT);
	}
}

/**
 * verifica el a hash
 */

if (!function_exists('verifyHashedPassword')) {
	function verifyHashedPassword($plainPassword, $hashPassword)
	{
		return password_verify($plainPassword, $hashPassword) ?  TRUE :  FALSE;
	}
}
/**
 * verifica si esta autenificado
 */
if (!function_exists('isLoggedIn')) {
	function isLoggedIn()
	{
		$CI = & get_instance();

		$user_id = $CI->session->userdata('user_id');

		if (!isset($user_id)) {
			return false;
		}
		return true;
	}
}

if (!function_exists('verifyAuth')) {
	function verifyAuth()
	{
		if (!isLoggedIn()) {
			redirect('/login');
		}
	}
}
