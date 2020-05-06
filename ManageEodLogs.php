<?php

class ManageEodLogs
{
    private $conn;
    private $readConn;
    private $table;
    
    public function __construct()
    {
        global $msTableDb, $readerMsDb,$db;
        $this->conn = $db;
        $this->readConn = $db;
        $this->table = "manage_eod_logs";
    }
    public function getAllRecords()
    {
        $sql = "SELECT * FROM " . $this->table ;
        $result = mysqli_query($sql, $this->readConn) or die("ERROR ON" . get_class($this) . " LINE " . __LINE__ . " " . mysqli_error()." Query ".$sql);
        $data = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row_data = mysqli_fetch_array($result)) {
                $data[$row_data["id"]] = $row_data;
            }
            return $data;
        } else {
            return $data;
        }

    }

    public function getRecordsById($id=0)
    {
        $sql = "SELECT * FROM " . $this->table." WHERE id=".$id ;
        $result = mysqli_query($sql, $this->readConn) or die("ERROR ON" . get_class($this) . " LINE " . __LINE__ . " " . mysqli_error()." Query ".$sql);
        $data = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row_data = mysqli_fetch_array($result)) {
                $data[$row_data["id"]] = $row_data;
            }
            return $data;
        } else {
            return $data;
        }

    }
    public function insert($form_fields=[])
    {
        // Insert code here
        $key = array_keys($form_fields);
        $val = array_values($form_fields);
        $sql = "INSERT INTO ".$this->table." (" . implode(', ', $key) . ") "
             . "VALUES ('" . implode("', '", $val) . "')";
        $result = mysqli_query($this->conn,$sql);
         //or die("ERROR ON" . get_class($this) . " LINE " . __LINE__ . " " . mysqli_error()." Query ".$sql);
        if($result){
            return mysqli_insert_id($this->conn);
        }else{
            return false;
        }


    }
    public function update($form_fields=[],$id=0,$field="id")
    {
        // Update code here
        $cols = array();
        foreach($form_fields as $key=>$val) {
            $cols[] = "$key = '$val'";
        }
        $sql = "UPDATE ".$this->table." SET " . implode(',', $cols) . " WHERE ".$field."='".$id."'";
        $result = mysqli_query($sql, $this->conn) or die("ERROR ON" . get_class($this) . " LINE " . __LINE__ . " " . mysqli_error()." Query ".$sql);
        if($result){
            return true;
        }else{
            return false;
        }   
        
    }
    



}