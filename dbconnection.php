<?php

$db_name = "bartestdb"; // database name
$db_user = "bargavi"; // database username
$db_pass = "manickam"; // database password
$db_host = "localhost"; // 
$error   = "";
$db      = "";


// $db_name = "eod"; // database name
// $db_user = "root"; // database username
// $db_pass = ""; // database password
// $db_host = "localhost"; // 
// $error   = "";
// $db      = "";

$db = mysqli_connect("$db_host", "$db_user", "$db_pass", "$db_name");
?>