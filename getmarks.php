<?php
include('dbconnection.php');
include('ManageEod.php');
include('ManageEodLogs.php');
$ManageEod= new ManageEod();
$ManageEodLogs = new ManageEodLogs();

// $marks=($_POST['marks']);
$ticketnumber = ($_POST['ticketnumber']);

if($db){
   
    $answer = $ManageEod->getStatusbyTicketnumber($ticketnumber);
    if($answer)

    {	
    	echo json_encode(array('prev_status'=> $answer['status'],'prev_marks'=> $answer['mark']));  
    }
    else
    	echo json_encode(array('prev_status'=> '','prev_marks'=> 100 )); 
}
else{
	echo "disconnected";
}
?>
