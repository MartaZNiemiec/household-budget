<?php

class DataBase
{
	private $database;
	private $host = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "household budget";
	
	public function __construct()
	{
		
	
		try
		{
			$this->database = new mysqli($this->host, $this->username, $this->password, $this->dbname);
			
			if($this->database->connect_errno != 0)
			{
				throw new Throwable(mysqli_connect_errno());
			}
			
			else
			{
				
			}
			
		}
		
		catch(Throwable $e)
		{
			echo "Błąd serwera. Przepraszamy za niedogoności. Spróbuj ponownie za jakiś czas.";
		}
	}
	
	public function connectDB()
	{
		if ($this->database) return $this->database;
	}
	
}
	
	
?>