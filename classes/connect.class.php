<?php

class Connect {
	
	public static function connectToDB() {
		$con = mysqli_connect('localhost','root','');
		if (!$con)  die('Could not connect: ');	
		$success = mysqli_select_db($con,'tasks_db');
		 mysqli_query($con,'SET NAMES utf8;');
		if (!$success) die('Could not select DB:');
		return $con;
	}
	
}

