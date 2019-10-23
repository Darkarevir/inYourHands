<?php 

	//Limpiar cadenas
	function cleanVar($str){
		$str=trim($str);
		$str= filter_var($str, FILTER_SANITIZE_STRING);
		return $str;
	}
	function encrypPass($pass){
		$pass = hash('sha512', $pass);
		return $pass;		
	}
	//Encriptar pw
	function encrypPassword($passw){
		$passw = password_hash($passw, PASSWORD_DEFAULT);
		return $passw;
	}	
	//
	function generateKey(){
		$keyLength = 25;
		$str = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$randStr= substr(str_shuffle($str), 0, $keyLength);
		return $randStr;
	}
	
	
 ?>