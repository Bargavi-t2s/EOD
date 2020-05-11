<?php

include('dbconnection.php');
include('ManageEod.php');
include('ManageEodLogs.php'); 

$ManageEod= new ManageEod();
$ManageEodLogs = new ManageEodLogs();

   if($_POST['ticketnumber'])
   {
    $ticketnumber = $_POST['ticketnumber'];
   }
if($db)
 {
  if($ticketnumber)
  {
  if($i=$ManageEod->getRecordsByTicketnumber($ticketnumber))
 {
 	echo json_encode( array( 
    'prefix'             => ($i['prefix']),
 	  'description'        => ($i['description']),
    'status'             => ($i['status']),
    'estimatedtime'      => ($i['estimated_time']),
    'login_time'         => ($i['login_time']),
    'logout_time'        => ($i['logout_time']),
    'remainingtime'      => ($i['remaining_time']),
    'completepercentage' => ($i['complete_percentage']),
    'mark'               => ($i['mark']),
    'comments'           => ($i['comments']),
    'is_subticket'       => ($i['is_subticket']),
    'main_ticket_no'     => ($i['main_ticket_no']),
    'istesting'          => ($i['is_testing']),
    'iteration_no'       => ($i['iteration_no'])));
 }
 }
else
{
	echo "db is empty";
}
}
else
{
	echo "connection failure";
}
?>