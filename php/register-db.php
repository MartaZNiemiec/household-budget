<?php
//include "connect-db.php";

class RegisterOrdersToDB //extends DataBase
{
	
	private $database;
	
	public function __construct($databaseConnect)
	{
		$this->database = $databaseConnect;
	}
	public function emailDuplicate($email)
	{
		$isEmailAvailable = false;
		


						
	$stmt = $this->database -> prepare("SELECT * FROM users WHERE email = ?");
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$result = $stmt->get_result();
	$data = $result->fetch_assoc();

		if($result -> num_rows === 0) $isEmailAvailable = true;
		else 
		{
			$isEmailAvailable = false;
		$answer = array("emailAvailable" => $isEmailAvailable);
		
		header("Content-Type: application/json");
		echo json_encode($answer);
		}
		
		return $isEmailAvailable;
	}
	
	
		
	public function insertUser($user, $email, $pass)
	{	
		
		$sqlRegister = "INSERT INTO users (username, email, pass_hash)
						VALUES (?, ?, ?)";
						
		$passHash = password_hash($pass, PASSWORD_DEFAULT);
		
		//$stmt = $this->database;
		
		$stmt = $this->database-> prepare($sqlRegister);
		$stmt -> bind_param('sss', $user, $email, $passHash);
		$stmt -> execute();
	}
}

?>