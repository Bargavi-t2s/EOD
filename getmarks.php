<?php
include('dbconnection.php');

// $marks=($_POST['marks']);
$ticketnumber = ($_POST['ticketnumber']);

if($db){
$check = "SELECT `status`, `mark` from `manage_eod` WHERE `ticket_number`='$ticketnumber';";

$result = mysqli_query($db, $check);
    
    $answer = mysqli_fetch_assoc($result);
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
