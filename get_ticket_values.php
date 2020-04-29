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
 $sql="SELECT `description`, `status`, `estimatedtime`, `login_time`,`logout_time`,`remainingtime`,`completepercentage`,`comments`,`is_subticket`,`main_ticket_no`,`istesting`,`iteration_no` from `eodtable` WHERE `ticketnumber`= $ticketnumber ;";
 $result=mysqli_query($db,$sql);
 if(mysqli_num_rows($result)>0)
 {
	while($i=mysqli_fetch_assoc($result))
 {	
 	
 	echo json_encode( array( 
 	'description'        => ($i['description']),
    'status'             => ($i['status']),
    'estimatedtime'      => ($i['estimatedtime']),
    'login_time'         => ($i['login_time']),
    'logout_time'        => ($i['logout_time']),
    'remainingtime'      => ($i['remainingtime']),
    'completepercentage' => ($i['completepercentage']),
    'comments'           => ($i['comments']),
    'is_subticket'       => ($i['is_subticket']),
    'main_ticket_no'     => ($i['main_ticket_no']),
    'istesting'          => ($i['istesting']),
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