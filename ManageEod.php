<?php
include("dbconnection.php");

class ManageEod
{
	private $conn;
    private $readConn;
    private $table;
    
    public function __construct()
    {
        global $msTableDb, $readerMsDb,$db;
        $this->conn = $db;
        $this->readConn = $db;
        $this->table = "manage_eod";
	}
	
    public function getRecordForUpdateTable()
    {
        $sql = "SELECT * FROM `" . $this->table ."` ;" ;
        $sql="SELECT `ticket_number`,`status`,`remaining_time`,`complete_percentage`,`mark` from `" . $this->table ."` ORDER BY `date` DESC LIMIT 15;";
        $result = mysqli_query( $this->readConn,$sql); 
        //or die("ERROR ON" . get_class($this) . " LINE " . __LINE__ . " " . mysqli_error()." Query ".$sql);
        $data = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row_data = mysqli_fetch_assoc($result)) {
                array_push($data,$row_data);
            }
            return $data;
        } else {
            return $data;
        }

    }

    public function getEodIdByTicketnumber($ticketnumber)
    {
        $sql = "SELECT id FROM " . $this->table ."  WHERE ticket_number=".$ticketnumber." ;" ;
        $result = mysqli_query( $this->readConn,$sql);
        $result = mysqli_fetch_array($result);
        return $result["id"];
        //return $result;
        //or die("ERROR ON" . get_class($this) . " LINE " . __LINE__ . " " . mysqli_error()." Query ".$sql);
        
    }

    public function getRecordByTicketnumber($ticketnumber)
    {
        $sql = "SELECT `estimated_time`,`remaining_time`,`complete_percentage`  FROM " . $this->table ."  WHERE ticket_number=".$ticketnumber." ;" ;
        $result = mysqli_query( $this->readConn,$sql);
        $result = mysqli_fetch_assoc($result);
        return $result;
        //return $result;
        //or die("ERROR ON" . get_class($this) . " LINE " . __LINE__ . " " . mysqli_error()." Query ".$sql); 
    }

    public function getStatusByTicketnumber($ticketnumber)
    {
        $sql = "SELECT `status`, `mark`  FROM " . $this->table ."  WHERE ticket_number=".$ticketnumber." ;" ;
        $result = mysqli_query( $this->readConn,$sql);
        $result = mysqli_fetch_assoc($result);
        return $result;
        //return $result;
        //or die("ERROR ON" . get_class($this) . " LINE " . __LINE__ . " " . mysqli_error()." Query ".$sql); 
    }


    public function getRecordsByTicketnumber($ticketnumber)
    {
        $sql = "SELECT `description`, `status`, `estimated_time`, `login_time`,`logout_time`,`remaining_time`,`complete_percentage`,`comments`,`is_subticket`,`main_ticket_no`,`is_testing`,`iteration_no`,`mark`  FROM " . $this->table ."  WHERE ticket_number=".$ticketnumber." ;" ;
        $result = mysqli_query( $this->readConn,$sql);
        $result = mysqli_fetch_assoc($result);
        return $result;
        //return $result;
        //or die("ERROR ON" . get_class($this) . " LINE " . __LINE__ . " " . mysqli_error()." Query ".$sql); 
    }

    
    public function insert($form_fields=[])
    {
        // Insert code here
	    $key = array_keys($form_fields);
	    $val = array_values($form_fields);
	    $sql = "INSERT INTO ".$this->table." (" . implode(', ', $key) . ") "
	         . "VALUES ('" . implode("', '", $val) . "')";
	    $result = mysqli_query($this->conn,$sql);
        // or die("ERROR ON" . get_class($this) . " LINE " . __LINE__ . " " . mysqli_error()." Query ".$sql);
	    if($result){
	    	return mysqli_insert_id($this->conn);
	    }else{
	    	return false;
	    }


    }
    public function update($form_fields=[],$ticketnumber)
    {
	    foreach($form_fields as $key=>$val) {
	        $cols[] = "$key = '$val'";
	    }
	    $sql = "UPDATE ".$this->table." SET " . implode(', ', $cols) . " WHERE ticket_number='".$ticketnumber."'";
	    $result = mysqli_query($this->conn,$sql);
        // or die("ERROR ON" . get_class($this) . " LINE " . __LINE__ . " " . mysqli_error()." Query ".$sql);
	    if($result){
	    	return true;
	    }else{
	    	return false;
	    }	
	    
	}
    



}