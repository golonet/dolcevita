<?php
require_once "connect.class.php";

class Tasks {
	public function __construct(){}
	private $id;
	private $date;	private $info;	private $status;

	public function getId() {
		return $this->id;
	}
	public function getDate() {
		return $this->date;
	}	public function getInfo() {		return $this->info;	}	public function getStatus() {		return $this->status;	}	
	
	public static function getTasksData(){
		$con = Connect::connectToDB();
		$result = mysqli_query($con,"SELECT * FROM `task`");
		$tasks = array();		date_default_timezone_set('Asia/Jerusalem');		
		while ($row = mysqli_fetch_array($result))  {
			$row_array['id'] 	 = $row["id"];					$originalDate = $row["date"];			$time = strtotime($originalDate);			$row_array['date']= date("d-m-Y H:i:s", $time);									$row_array['info']   = $row["info"];			$row_array['status'] = $row["status"];			
			$tasks[] = $row_array;
		}
		mysqli_close($con);		if($tasks){			return  $tasks;		}else{			return false;		}
		
	}			public static function addTasks($tasks){				$con = Connect::connectToDB();		date_default_timezone_set('Asia/Jerusalem');				foreach ($tasks as $task){						$taskName = $task["name"];			$taskDate = $task["date"];			$time = strtotime($taskDate);			$taskDate = date("Y-m-d H:i:s", time());											mysqli_query($con,"INSERT INTO `task`(`date`, `info`, `status`) 			    				          VALUES ('$taskDate','$taskName','Open')");				}				mysqli_close($con);				return 1;	}				
	public static function updateTasks($tasks){				$con = Connect::connectToDB();		date_default_timezone_set('Asia/Jerusalem');				foreach ($tasks as $task){						$taskId     = $task["id"];			$taskName   = $task["name"];			$taskDate   = $task["date"];			$taskStatus = $task["status"];			$time = strtotime($taskDate);			$taskDate = date("Y-m-d H:i:s", $time);									mysqli_query($con,"UPDATE `task` SET `date`='$taskDate',`info`='$taskName',`status`='$taskStatus' WHERE `id`=$taskId");					}				mysqli_close($con);				return 1;	}				public static function deleteTask($id){				$con = Connect::connectToDB();				$ret = mysqli_query($con,"DELETE FROM `task` WHERE `id`=$id");					mysqli_close($con);					return 1;	}					public static function getGeneralInfo(){				$con = Connect::connectToDB();				$result= mysqli_query($con,"SELECT COUNT(*) as comleted FROM `task` WHERE `status`='Complete'");		$row = mysqli_fetch_array($result);		$completedTasks = $row["comleted"];				$result= mysqli_query($con,"SELECT COUNT(*) as open FROM `task` WHERE `status`='Open'");		$row = mysqli_fetch_array($result);		$openTasks = $row["open"];						$general_info["completedTasks"] = $completedTasks;		$general_info["openTasks"] 	    = $openTasks;		$general_info["allTasks"] 	    = (int)$openTasks + (int)$completedTasks;				mysqli_close($con);				return $general_info;	}	

}


?>