<?php
// $db_name="bartestdb"; // database name
//    $db_user="bargavi"; // database username
//    $db_pass="manickam"; // database password
//    $db_host="localhost"; // 
//    $error="";
//    $db="";
//    $db=mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
include('dbconnection.php');
   if($_POST['ticketnumber'])
   {
   	$ticketnumber = $_POST['ticketnumber'];
   }
if($db)
 {
 	if($ticketnumber)
 	{
 $sql="SELECT `prefix`,`description`, `status`, `estimated_time`, `login_time`,`logout_time`,`remaining_time`,`complete_percentage`,`comments`,`is_subticket`,`main_ticket_no`,`is_testing`,`iteration_no`,`mark` from `manage_eod` WHERE `ticket_number`= '$ticketnumber';";
 $result=mysqli_query($db,$sql);
 if(mysqli_num_rows($result)>0)
 {
	while($i=mysqli_fetch_assoc($result))
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