<?php

class RegisterControl //extends RegisterOrdersToDB
{
	private $user;
	private $email;
	private $pass;
	private $registerOrdersToDB;
	
	
	public function __construct($user, $email, $pass, $registerOrdersToDB)
	{
		$this -> user = $user;
		$this -> email = $email;
		$this -> pass = $pass;
		$this -> registerOrdersToDB = $registerOrdersToDB;
	}
	
	private function nameValidation()
	{
		$isNameValidate = false; 
		
		if(!preg_match("/^([A-Z][a-z]+)+$/", $this->user) || strlen($this->user)<3) $isNameValidate = false;
		else $isNameValidate = true;
			
		return $isNameValidate;
	}
	
	private function emailValidation()
	{
		$isEmailValidate = false; 
			
		if(filter_var($this->email, FILTER_VALIDATE_EMAIL)) 
		{
			$isEmailValidate = true;
			//header("Content-Type: application/json");
			//json_encode(["emailValidation" => $isEmailValidate]);
			
			
		}
		
		return $isEmailValidate;
	}
	
	private function passwordValidation()
	{
		$isPassValidate = false;
		
		if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/", $this->pass)) $isPassValidate = false;
		else $isPassValidate = true;
			
		return $isPassValidate;
	}
	
	public function registerUser()
	{
		$isEmailAvailable = $this->registerOrdersToDB -> emailDuplicate($this->email);
	
	
			
		if(!$this->user || !$this->pass ||  !$this->email)
		{
			return false;
		}
		
		if(!$this->nameValidation() || !$this->emailValidation() || !$this->passwordValidation() || !$isEmailAvailable)
		{
			return false;
		}
		
	
		$this->registerOrdersToDB -> insertUser($this->user, $this->email, $this->pass);
		
	}
	
	
}


?>