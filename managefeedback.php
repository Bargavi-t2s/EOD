<?php
include("dbconnection.php");

class ManageFeedback
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

	public function checkTicket($ticketnumber,$prefix)
    {
        $sql = "SELECT `ticket_number` FROM " . $this->table ." WHERE ticket_number=".$ticketnumber." AND prefix='".$prefix."';" ;
        $result = mysqli_query( $this->readConn,$sql);
        $result = mysqli_fetch_assoc($result);
        return $result;
    }


    public function insert($form_fields=[])
    {
        // Insert code here
        $key = array_keys($form_fields);
        $val = array_values($form_fields);
        $sql = "INSERT INTO manage_feedback (" . implode(', ', $key) . ") "
             . "VALUES ('" . implode("', '", $val) . "')";  
        echo $sql;

        $result = mysqli_query($this->conn,$sql);
        if($result){
            return mysqli_insert_id($this->conn);
        }else{
            return false;
        }


    }
}
?>