<?php
	function getDatabaseConnection(): PDO{
		$host = 'localhost';
		$dbname = 'finelia';
		$port = 3308;
		$user = 'root';
		$pwd = 'root';
		$driver = 'mysql';
		
		return new PDO("$driver:host=$host;dbname=$dbname;charset=utf8;port=$port", $user, $pwd);
	}
	