<?php
include('dbconnection.php');
session_start();
$ticketnumber = $description = $status = $estimatedtime = $login_time = $logout_time = $remainingtime = $completepercentage = $comments = $is_subticket = $main_ticket_no = $istesting = $iteration_no = array();

date_default_timezone_set("Asia/Calcutta");
$curent_date_time = date(" Y-m-d H:i:s");
$user_id="Userid";
$user_name="Username";

if ($_POST) {
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
}
 
$length = sizeof($ticketnumber); 

if ($db) {

    $success=0;
    
    for ($i=0; $i < $length ; $i++) { 
    
    $check = "SELECT * from `eodtable` WHERE `ticketnumber`='$ticketnumber[$i]';";

    $result = mysqli_query($db, $check);
    
    $answer = mysqli_fetch_assoc($result);
   
    if($answer)
    {
        
        if (true) {

            $update = "UPDATE `eodtable` SET `user_id` = '$user_id',`user_name` = '$user_name',`description` = '$description[$i]', `status` = '$status[$i]',`estimatedtime` = '$estimatedtime[$i]',`login_time` = '$login_time[$i]', `logout_time` = '$logout_time[$i]', `remainingtime` = '$remainingtime[$i]', `completepercentage` = '$completepercentage[$i]', `comments` = '$comments[$i]', `is_subticket` = '$is_subticket[$i]', `main_ticket_no` = '$main_ticket_no[$i]', `istesting`='$istesting[$i]', `iteration_no` = '$iteration_no[$i]',`updated_time`='$curent_date_time' WHERE `ticketnumber` = '$ticketnumber[$i]';";


        
        if (mysqli_query($db, $update)) 
        {
            $success = 1;

            $storing = "INSERT INTO `eodtable2` (`user_id`,`user_name`,`ticketnumber`,`estimatedtime`, `login_time`,`logout_time`,`remainingtime`,`completepercentage`,`created_date_time`) VALUES ('$user_id','$user_name','$ticketnumber[$i]','$estimatedtime[$i]','$login_time[$i]','$logout_time[$i]','$remainingtime[$i]','$completepercentage[$i]','$curent_date_time')";

        if (mysqli_query($db, $storing)) {
            
            $success =  1;
        } 
            
        } 
        else 
        {
            echo json_encode(array('status' => 'error','message'=> 'Database Insertion failure'));  
      break;
        }

        } 
        
        
    }

    else {

        $store = "INSERT INTO `eodtable` (`user_id`,`user_name`,`ticketnumber`, `description`, `status`, `estimatedtime`, `login_time`,`logout_time`,`remainingtime`,`completepercentage`,`comments`,`is_subticket`,`main_ticket_no`,`istesting`,`iteration_no`,`created_date_time`) VALUES ('$user_id','$user_name','$ticketnumber[$i]','$description[$i]','$status[$i]','$estimatedtime[$i]','$login_time[$i]','$logout_time[$i]','$remainingtime[$i]','$completepercentage[$i]','$comments[$i]','$is_subticket[$i]','$main_ticket_no[$i]','$istesting[$i]','$iteration_no[$i]','$curent_date_time')";

        if (mysqli_query($db, $store)) {
            
            $success =  1;

            $storing = "INSERT INTO `eodtable2` (`user_id`,`user_name`,`ticketnumber`,`estimatedtime`, `login_time`,`logout_time`,`remainingtime`,`completepercentage`,`created_date_time`) VALUES ('$user_id','$user_name','$ticketnumber[$i]','$estimatedtime[$i]','$login_time[$i]','$logout_time[$i]','$remainingtime[$i]','$completepercentage[$i]','$curent_date_time')";

        if (mysqli_query($db, $storing)) {
            
            $success =  1;
        } 

        } 
        else {
            echo json_encode(array(
    'status' => 'error',
    'message'=> 'Database Insertion failure'
         ));
            break;

        }
    }

} 

if($success === 1){
    echo json_encode(array(
    'status' => 'success',
    'message'=> 'You have successfully submitted your end of the day report'
         ));
}

}

else 
{
    echo json_encode(array(
    'status' => 'error',
    'message'=> 'Database connection failure'
));
    
}

?>






