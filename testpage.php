<?php
$db_name = "bartestdb"; // database name
$db_user = "bargavi"; // database username
$db_pass = "manickam"; // database password
$db_host = "localhost"; // 
$error   = "";
$db      = "";
session_start();

$ticketnumber = $description = $status = $estimatedtime = $login_time = $logout_time = $remainingtime = $completepercentage = $comments = $is_subticket = $no_ofsubtickets = $subticketno = $istesting = $iteration_no = "";

$db = mysqli_connect("$db_host", "$db_user", "$db_pass", "$db_name");
date_default_timezone_set("Asia/Calcutta");
$curent_date_time = date(" Y-m-d H:i:s");
$user_id="Userid";
$user_name="Username";

if ($_POST) {
    $ticketnumber       = mysqli_real_escape_string($db, $_POST['ticketnumber']);
    $description        = mysqli_real_escape_string($db, $_POST['description']);
    $status             = mysqli_real_escape_string($db, $_POST['status']);
    $estimatedtime      = mysqli_real_escape_string($db, $_POST['estimatedtime']);
    $login_time         = mysqli_real_escape_string($db, $_POST['login_time']);
    $logout_time        = mysqli_real_escape_string($db, $_POST['logout_time']);
    $remainingtime      = mysqli_real_escape_string($db, $_POST['remainingtime']);
    $completepercentage = mysqli_real_escape_string($db, $_POST['completepercentage']);
    $comments           = mysqli_real_escape_string($db, $_POST['comments']);
    $is_subticket       = mysqli_real_escape_string($db, $_POST['is_subticket']);
    $no_ofsubtickets    = mysqli_real_escape_string($db, $_POST['no_ofsubtickets']);
    $subticketno        = mysqli_real_escape_string($db, $_POST['subticketno']);
    $istesting          = mysqli_real_escape_string($db, $_POST['istesting']);
    $iteration_no       = mysqli_real_escape_string($db, $_POST['iteration_no']);


if ($db) {

    $check = "SELECT * from `eodtable` WHERE `ticketnumber`='$ticketnumber';";

    $result = mysqli_query($db, $check);
    
    $answer = mysqli_fetch_assoc($result);
   
    if($answer)
    {
        
        $completepercentage_from_db = $answer['completepercentage'];
        
        if ($completepercentage_from_db + $completepercentage <= 100) {
            
            $completepercentage = $completepercentage_from_db + $completepercentage;

            $update = "UPDATE `eodtable` SET `user_id` = '$user_id',`user_name` = '$user_name',`description` = '$description', `status` = '$status',`estimatedtime` = '$estimatedtime',`login_time` = '$login_time', `logout_time` = '$logout_time', `remainingtime` = '$remainingtime', `completepercentage` = '$completepercentage', `comments` = '$comments', `is_subticket` = '$is_subticket', `no_ofsubtickets` = '$no_ofsubtickets', `subticketno` = '$subticketno', `istesting`='$istesting', `iteration_no` = '$iteration_no',`updated_time`='$curent_date_time' WHERE `ticketnumber` = '$ticketnumber';";
        
        if (mysqli_query($db, $update)) 
        {
            echo json_encode(array(
    'status' => 'success',
    'message'=> 'You have successfully submitted your end of the day report'
         ));
        } 
        else 
        {
      echo json_encode(array(
    'status' => 'error',
    'message'=> 'Database Insertion failure'
         ));  
        }

        } 
        else {
            
            echo json_encode(array(
    'status' => 'error',
    'message'=> 'Invalid work completed value'
         ));
            
        }
        
    }

    else {

        $store = "INSERT INTO `eodtable` (`user_id`,`user_name`,`ticketnumber`, `description`, `status`, `estimatedtime`, `login_time`,`logout_time`,`remainingtime`,`completepercentage`,`comments`,`is_subticket`,`no_ofsubtickets`,`subticketno`,`istesting`,`iteration_no`,`created_date_time`) VALUES ('$user_id','$user_name','$ticketnumber','$description','$status','$estimatedtime','$login_time','$logout_time','$remainingtime','$completepercentage','$comments','$is_subticket','$no_ofsubtickets','$subticketno','$istesting','$iteration_no','$curent_date_time')";

        if (mysqli_query($db, $store)) {
            
            echo json_encode(array(
    'status' => 'success',
    'message'=> 'You have successfully submitted your end of the day report'
         ));

        } 
        else {
            echo json_encode(array(
    'status' => 'error',
    'message'=> 'Database Insertion failure'
         ));

        }
    }

} 
else 
{
    echo json_encode(array(
    'status' => 'error',
    'message'=> 'Database connection failure'
));
    
}
}
?>