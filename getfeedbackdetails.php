<?php
include('dbconnection.php');
include('managefeedback.php');

$ManageFeedback= new ManageFeedback()

session_start();

$prefix       = ($_POST['prefix']);
$ticketnumber = ($_POST['ticketnumber']);
if($data = $ManageEod->getfeedbackdetails())
 {
	foreach ($data as $i) 
 {	
 	echo json_encode(array( 
    'mark'         => ($i['mark']),
    'description'  => ($i['description'])
)); 	
 }
}
else
{
	echo "Connection Failure";
}
?>