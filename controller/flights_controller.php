<?php
include_once('../model/dbconn.php');

class Flights extends DbConnection {
     public function __construct(){
          parent::__construct();
     }

     public function check_flights($depc, $arrc, $depdate, $retdate){
          // $sql = "SELECT * FROM flights WHERE fromm = '$depc' AND too = '$arrc' AND dep_date = '$depdate' AND arr_date ='$retdate'";
          $sql = "SELECT * FROM flights WHERE fromm = '$depc' AND too = '$arrc' AND dep_date = '$depdate' AND arr_date ='$retdate'";
          $query = $this->connection->query($sql);

          if($query->num_rows > 0){
               $row = $query->fetch_array();
               return $row;
          } else {
               return false;
          }
               
     }

     public function escape_string($value){
          return $this->connection->real_escape_string($value);
     }
}




