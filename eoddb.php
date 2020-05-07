<?php
include('dbconnection.php');
session_start();
$prefix = $ticketnumber = $description = $status = $estimatedtime = $login_time = $logout_time = $remainingtime = $completepercentage = $comments = $is_subticket = $main_ticket_no = $istesting = $iteration_no = $mark= array();

date_default_timezone_set("Asia/Calcutta");
$curent_date_time = date(" Y-m-d H:i:s");
$user_id=123456;
$user_name="Username";
$date=date("Y-m-d H:i:s");

if ($_POST) {
    $prefix             = ($_POST['prefix']);
    $ticketnumber       = ($_POST['ticketnumber']);
    $description        = ($_POST['description']);
    $status             = ($_POST['status']);
    $estimatedtime      = ($_POST['estimatedtime']);
    $login_time         = ($_POST['login_time']);
    $logout_time        = ($_POST['logout_time']);
    $remainingtime      = ($_POST['remainingtime']);
    $completepercentage = ($_POST['completepercentage']);
    $comments           = ($_POST['comments']);
    $is_subticket       = ($_POST['is_subticket']);
    $main_ticket_no     = ($_POST['main_ticket_no']);
    $istesting          = ($_POST['istesting']);
    $iteration_no       = ($_POST['iteration_no']);
    $mark               = ($_POST['mark']);
}
 
$length = sizeof($ticketnumber); 

if ($db) {

    $success=0;
    
    for ($i=0; $i < $length ; $i++) { 
    
    $check = "SELECT * from `manage_eod` WHERE `ticket_number`='$ticketnumber[$i]';";

    $result = mysqli_query($db, $check);
    
    $answer = mysqli_fetch_assoc($result);
   
    if($answer)
    {
            $update = "UPDATE `manage_eod` SET `prefix` = '$prefix[$i]',`user_name` = '$user_name', `user_id` = '$user_id',`description` = '$description[$i]', `status` = '$status[$i]',`estimated_time` = '$estimatedtime[$i]',`login_time` = '$login_time[$i]', `logout_time` = '$logout_time[$i]', `remaining_time` = '$remainingtime[$i]', `complete_percentage` = '$completepercentage[$i]', `mark`= '$mark',`comments` = '$comments[$i]', `is_subticket` = '$is_subticket', `main_ticket_no` = '$main_ticket_no[$i]', `is_testing`='$istesting', `iteration_no` = '$iteration_no[$i]',`updated_time`='$curent_date_time',`date` = '$date'WHERE `ticket_number` = '$ticketnumber[$i]';";
        if (mysqli_query($db, $update)) 
        {
            $success = 1;

            $storing = "INSERT INTO `manage_eod_logs` (`eod_id`,`user_name`,`login_time`,`logout_time`,`remaining_time`,`complete_percentage`,`mark`,`created_date_time`,`status`) VALUES ('$user_id','$user_name','$login_time[$i]','$logout_time[$i]','$remainingtime[$i]','$completepercentage[$i]','$mark','$curent_date_time','$status[$i]')";

        if (mysqli_query($db, $storing)) {
            
            $success =  1;
        } 
            
        } 
        else 
        {
            echo json_encode(['code' => 404, 'message'=> 'Database Insertion failure']);  
      break;
        }        
    }

    else {

        $store = "INSERT INTO `manage_eod` (`user_name`,`user_id`,`prefix`,`ticket_number`, `description`, `status`, `estimated_time`, `login_time`,`logout_time`,`remaining_time`,`complete_percentage`,`mark`,`comments`,`is_subticket`,`main_ticket_no`,`is_testing`,`iteration_no`,`created_date_time`, `date`) VALUES ('$user_name','$user_id','$prefix[$i]','$ticketnumber[$i]','$description[$i]','$status[$i]','$estimatedtime[$i]','$login_time[$i]','$logout_time[$i]','$remainingtime[$i]','$completepercentage[$i]','$mark','$comments[$i]','$is_subticket','$main_ticket_no[$i]','$istesting','$iteration_no[$i]','$curent_date_time','$date')";

        if (mysqli_query($db, $store)) {
            
            $success =  1;

            $storing = "INSERT INTO `manage_eod_logs` (`eod_id`,`user_name`, `login_time`,`logout_time`,`remaining_time`,`complete_percentage`,`mark`,`created_date_time`,`status`) VALUES ('$user_id','$user_name','$login_time[$i]','$logout_time[$i]','$remainingtime[$i]','$completepercentage[$i]','$mark','$curent_date_time','$status[$i]')";

        if (mysqli_query($db, $storing)) {
            $success =  1;
        } 

        } 
        else {
            echo json_encode([
    'code' => 404,
    'message'=> 'Database Insertion failure'
         ]);
            break;

        }
    }

} 

if($success === 1){
    echo json_encode([
       'code' => 200,
    'message'=> 'You have successfully submitted your end of the day report'
         ]);
}

}

else 
{
    echo json_encode([
       'code' => 404,
    'message'=> 'Database connection failure'
]);
    
}

?>






