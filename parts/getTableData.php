<?php
require_once '../classes/tasks.class.php';

$tasks = Tasks::getTasksData();
$generalInfo = Tasks::getGeneralInfo();

$systemData['tasks'] 	   = $tasks;
$systemData['generalInfo'] = $generalInfo;

echo json_encode($systemData);


?>