<?php
$db_name="bartestdb"; // database name
   $db_user="bargavi"; // database username
   $db_pass="manickam"; // database password
   $db_host="localhost"; // 
   $error="";
   $db="";
   session_start();
   echo "inside the db file";
   $ticketnumber=$description=$status=$estimatedtime=$login_time=$logout_time=$remainingtime=$completepercentage=$comments=$is_subticket=$no_ofsubtickets=$subticketno=$istesting=$iteration_no="";
  
   $db=mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
   // $ticketnumber=($_POST['ticketnumber']);
   // echo "hi inside the db file ".$ticketnumber;

   if($_POST)
   {
   	$ticketnumber = mysqli_real_escape_string($db, $_POST['ticketnumber']);
  	$description = mysqli_real_escape_string($db, $_POST['description']);
   	$status = mysqli_real_escape_string($db, $_POST['status']);
   	$estimatedtime = mysqli_real_escape_string($db, $_POST['estimatedtime']);
   	$login_time = mysqli_real_escape_string($db, $_POST['login_time']);
   	$logout_time = mysqli_real_escape_string($db, $_POST['logout_time']);
   	$remainingtime = mysqli_real_escape_string($db, $_POST['remainingtime']);
   	$completepercentage = mysqli_real_escape_string($db, $_POST['completepercentage']);
   	$comments = mysqli_real_escape_string($db, $_POST['comments']);
   	$is_subticket = mysqli_real_escape_string($db, $_POST['is_subticket']);
   	$no_ofsubtickets = mysqli_real_escape_string($db, $_POST['no_ofsubtickets']);
   	$subticketno = mysqli_real_escape_string($db, $_POST['subticketno']);
   	$istesting = mysqli_real_escape_string($db, $_POST['istesting']);
   	$iteration_no = mysqli_real_escape_string($db, $_POST['iteration_no']);
   }
   else
   {
   	echo "there is no values in post";
   }
if($db)
 {
 	echo "connected successfully";
 	$store="INSERT INTO `eodtable` (`ticketnumber`, `description`, `status`, `estimatedtime`, `login_time`,`logout_time`,`remainingtime`,`completepercentage`,`comments`,`is_subticket`,`no_ofsubtickets`,`subticketno`,`istesting`,`iteration_no`) VALUES ('$ticketnumber','$description','$status','$estimatedtime','$login_time','$logout_time','$remainingtime','$completepercentage','$comments','$is_subticket','$no_ofsubtickets','$subticketno','$istesting','$iteration_no')";
   echo $store;
 	if(mysqli_query($db,$store)){
 		echo " inserted into db";
 	}
 	else
 	{
 		echo "not inserted";
 	}

 }
else
{
	echo "connection failure";
}

?>