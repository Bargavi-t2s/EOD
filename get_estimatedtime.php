<?php
include('dbconnection.php');
include('ManageEod.php');
include('ManageEodLogs.php');
$ManageEod= new ManageEod();
$ManageEodLogs = new ManageEodLogs();
if($db){
    
if ($_POST) {
    $ticketnumber = ($_POST['ticketnumber']);
}
    
    $answer = $ManageEod->getRecordByTicketnumber($ticketnumber);
    if($answer)

    {   echo json_encode(array('prev_estimatedtime'=> $answer['estimated_time'],'prev_remainingtime' => $answer['remaining_time'],'prev_completepercentage' => $answer['complete_percentage'] ));  
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