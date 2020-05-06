<?php

include('dbconnection.php');
include('ManageEod.php');
include('ManageEodLogs.php');
$ManageEod= new ManageEod();
$ManageEodLogs = new ManageEodLogs();
if($db)
 {
 	$a=0;

  if($data = $ManageEod->getRecordForUpdateTable())
 {
	foreach ($data as $i) 
 {	
 	
 	$ticketnumber=$i['ticket_number'];
 	$status=$i['status'];
 	$remainingtime=$i['remaining_time'];
 	$completepercentage=$i['complete_percentage'];
 	$mark=$i['mark'];
 	
 	if(true)
 	{
 		$a=$a+1;

 	$g="";
 	$g.="<tr><td>$a</td><td class='ticket'>$ticketnumber</td><td>$status</td><td>$remainingtime</td><td>$completepercentage</td><td>$mark</td><td><button type='button' class='btn btn-danger edit' id='edit'>Edit</button></td><td><button type='button' class='btn btn-success view' id='view'>View</button></td></tr>";
 	echo $g;
 }
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