<?php
$db_name="bartestdb"; // database name
   $db_user="bargavi"; // database username
   $db_pass="manickam"; // database password
   $db_host="localhost"; // 
   $error="";
   $db="";
   $db=mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
if($db)
 {
 	$a=0;

  $sql="SELECT `ticketnumber`,`status`,`remainingtime`,`completepercentage`,`date` from `eodtable` ORDER BY `date` DESC limit 15;";

 	
 $result=mysqli_query($db,$sql);
 if(mysqli_num_rows($result)>0)
 {
	while($i=mysqli_fetch_assoc($result))
 {	
 	
 	$ticketnumber=$i['ticketnumber'];
 	$status=$i['status'];
 	$remainingtime=$i['remainingtime'];
 	$completepercentage=$i['completepercentage'];
 	$date=$i['date'];
 	
 	if(($ticketnumber!=NULL) && ($status!=NULL) && ($remainingtime!=NULL) )
 		//&& ($completepercentage!=NULL))
 	{
 		$a=$a+1;

 	$g="";
 	$g.="<tr><td>$a</td><td class='ticket'>$ticketnumber</td><td>$status</td><td>$remainingtime</td><td>$completepercentage</td><td>$date</td><td><button type='button' class='btn btn-danger edit' id='edit'>Edit</button></td><td><button type='button' class='btn btn-success view' id='view'>View</button></td></tr>";
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