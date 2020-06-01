<?php

include('dbconnection.php');
include('managefeedback.php'); 

$ManageFeedback = new ManageFeedback();

ob_start();

$ticketnumber=($_POST['ticketnumber']);
$prefix      =($_POST['prefix']);
$output='';

if($db)
{
	$i=$ManageFeedback->get_timelinedetails($ticketnumber, $prefix);
		foreach($i as $row)
		{
			$output.='<div class="pl-5 timeline_item">
			<div class="pl-5 timeline_content">
			<h5>'.$row["created_at"].' ------------------------------------- '.$row["status"].'</h5>
			<br>
			</div>
			</div>';
			// echo $row['status'] . "<br>";
			// echo $row['created_at'] . "<br>";
		}
		// <h3>'.$row["status"].'</h3>
		ob_end_clean();
		echo json_encode(array('timeline_output'=>$output));
}
else
{
	echo "Database Connection Failed";
}
?>