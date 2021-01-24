<?php

if(!function_exists('hashPassword'))
{
	function hashPassword($plainPassword){
		return password_hash($plainPassword, PASSWORD_DEFAULT);
	}
}
if(!function_exists('verifyHashedPassword'))
{
	function verifyHashedPassword($plainPassword, $hashPassword){
		return password_verify($plainPassword,$hashPassword) ?  TRUE :  FALSE;
	}
}
