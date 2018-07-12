<?php
require_once '../classes/tasks.class.php';

if(isset($_REQUEST['actionType'])){
	
	$action = $_REQUEST['actionType'];
	switch ($action) {
		
		case "add":			
			
			$tasks= $_REQUEST['tasks'];			
			$tasks = json_decode($tasks, true);			
			$ret = Tasks::addTasks($tasks);
			echo $ret;			
			break;
			
		case "update":
			$tasks= $_REQUEST['tasks'];
			$tasks = json_decode($tasks, true);
			$ret = Tasks::updateTasks($tasks);
			echo $ret;	
			break;
			
		case "delete":
			$id= $_REQUEST['id'];	
			$ret = Tasks::deleteTask($id);
			echo $ret;
			break;
		default:				
	}
	
}


?>