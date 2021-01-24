<?php

if(!function_exists('hashPassword'))
{
	function hashPassword($plainPassword){
		return password_hash($plainPassword, PASSWORD_DEFAULT);
	}
}
