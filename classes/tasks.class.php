<?php
require_once "connect.class.php";

class Tasks {
	public function __construct(){}
	private $id;
	private $date;

	public function getId() {
		return $this->id;
	}
	public function getDate() {
		return $this->date;
	}
	
	public static function getTasksData(){
		$con = Connect::connectToDB();
		$result = mysqli_query($con,"SELECT * FROM `task`");
		$tasks = array();
		while ($row = mysqli_fetch_array($result))  {
			$row_array['id'] 	 = $row["id"];
			$tasks[] = $row_array;
		}
		mysqli_close($con);
		
	}	
	public static function updateTasks($tasks){

}


?>