<?php
include('dbconnection.php');
include('ManageEod.php');
include('ManageEodLogs.php');
$ManageEod= new ManageEod();
$ManageEodLogs = new ManageEodLogs();
//$data = $ManageEod -> getALLRecords();


session_start();
$ticketnumber = $description = $status = $estimatedtime = $login_time = $logout_time = $remainingtime = $completepercentage = $comments = $is_subticket = $main_ticket_no = $istesting = $iteration_no = $mark= array();

date_default_timezone_set("Asia/Calcutta");
$curent_date_time = date(" Y-m-d H:i:s");
$user_id=1174;
$user_name="Username";
$date=date("Y-m-d H:i:s");

if ($_POST) {
    $prefix = ($_POST['prefix']);
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
   
    if($eod_id = $ManageEod->getEodIdByTicketnumber($ticketnumber[$i]))
    {       

        $form_fields= array('user_id' => $user_id,
                            'user_name' => $user_name,
                            'prefix' => $prefix[$i],
                            'description' => $description[$i],
                            'status' => $status[$i],
                            'estimated_time' => $estimatedtime[$i],
                            'login_time' => $login_time[$i],
                            'logout_time' => $logout_time[$i],
                            'remaining_time' => $remainingtime[$i],
                            'complete_percentage' => $completepercentage[$i],
                            'mark' => $mark,
                            'comments' => $comments[$i],
                            'is_subticket' => $is_subticket,
                            'main_ticket_no' => $main_ticket_no[$i],
                            'is_testing' => $istesting,
                            'iteration_no' => $iteration_no[$i],
                            'updated_time' => $curent_date_time,
                            'date' => $date);

                if($ManageEod->update($form_fields,$ticketnumber[$i]))
                    { 
                  
                        $success = 1;
                        $form_fields_2= array('eod_id' => $eod_id,
                            'user_name' => $user_name,
                            'status' => $status[$i],
                            'login_time' => $login_time[$i],
                            'logout_time' => $logout_time[$i],
                            'remaining_time' => $remainingtime[$i],
                            'complete_percentage' => $completepercentage[$i],
                            'created_at' => $date);
                            if($ManageEodLogs->insert($form_fields_2))
                            {
                                $success = 1;
                            }
                            else
                            {
                                echo json_encode(['code' => 404, 'message'=> 'Database Insertion failure']);  
                                break;
                            }
                  
                    }
                    else
                    {
                        echo json_encode(['code' => 404, 'message'=> 'Database Insertion failure']);  
                                break;
                    }
            }

            else
            {
                $form_fields= array('user_id' => $user_id,
                            'user_name' => $user_name,
                            'ticket_number' => $ticketnumber[$i],
                            'prefix' => $prefix[$i],
                            'description' => $description[$i],
                            'status' => $status[$i],
                            'estimated_time' => $estimatedtime[$i],
                            'login_time' => $login_time[$i],
                            'logout_time' => $logout_time[$i],
                            'remaining_time' => $remainingtime[$i],
                            'complete_percentage' => $completepercentage[$i],
                            'mark' => $mark,
                            'comments' => $comments[$i],
                            'is_subticket' => $is_subticket,
                            'main_ticket_no' => $main_ticket_no[$i],
                            'is_testing' => $istesting,
                            'iteration_no' => $iteration_no[$i],
                            'created_date_time' => $curent_date_time,
                            'date' => $date);
                //print_r($form_fields);
                if($ManageEod->insert($form_fields))
                {
                    $success = 1;
                    $eod_id = $ManageEod->getEodIdByTicketnumber($ticketnumber[$i]);
                    $form_fields_2= array('eod_id' => $eod_id,
                            'user_name' => $user_name,
                            'status' => $status[$i],
                            'login_time' => $login_time[$i],
                            'logout_time' => $logout_time[$i],
                            'remaining_time' => $remainingtime[$i],
                            'complete_percentage' => $completepercentage[$i],
                            'created_at' => $date);
                            if($ManageEodLogs->insert($form_fields_2))
                            {
                                $success = 1;
                            }
                            else
                            {
                                echo json_encode(['code' => 404, 'message'=> 'Database Insertion failure']);  
                                break;
                            }
                }
                else
                {
                    echo json_encode(['code' => 404, 'message'=> 'Database Insertion failure']);  
                                break;
                }
            }
        }
    }


if($success === 1){
    echo json_encode([
       'code' => 200,
    'message'=> 'You have successfully submitted your end of the day report'
         ]);
}
else 
{
    echo json_encode([
       'code' => 404,
    'message'=> 'Database connection failure'
]);
    
}


?>






