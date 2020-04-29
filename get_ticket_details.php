<?php
   include('dbconnection.php');
if($db)
 {
 	$a=0;

  $sql="SELECT `ticketnumber`,`status`,`remainingtime`,`completepercentage`,`mark` from `eodtable` ORDER BY `date` DESC LIMIT 15;";

 	
 $result=mysqli_query($db,$sql);
 if(mysqli_num_rows($result)>0)
 {
	while($i=mysqli_fetch_assoc($result))
 {	
 	
 	$ticketnumber=$i['ticketnumber'];
 	$status=$i['status'];
 	$remainingtime=$i['remainingtime'];
 	$completepercentage=$i['completepercentage'];
 	$mark=$i['mark'];
 	
 	if(($ticketnumber!=NULL) && ($status!=NULL) && ($remainingtime!=NULL) )
 		//&& ($completepercentage!=NULL))
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