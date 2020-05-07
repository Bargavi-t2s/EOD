<?php
include('dbconnection.php');
if($db){
	
if ($_POST) {
    $ticketnumber = ($_POST['ticketnumber']);
}

$check = "SELECT `estimated_time`,`remaining_time`,`complete_percentage` from `manage_eod` WHERE `ticket_number`='$ticketnumber';";

$result = mysqli_query($db, $check);
    
    $answer = mysqli_fetch_assoc($result);
    if($answer)

    {	echo json_encode(array('prev_estimatedtime'=> $answer['estimated_time'],'prev_remainingtime' => $answer['remaining_time'],'prev_completepercentage' => $answer['complete_percentage'] ));  
    }
    else
    {
    	echo json_encode(array('prev_estimatedtime'=>'','prev_remainingtime' =>0,'prev_completepercentage' =>0));
    }
}
else{
	echo "disconnected";
}

?>
