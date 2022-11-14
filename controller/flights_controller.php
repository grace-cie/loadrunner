<?php
include_once('../model/dbconn.php');

class Flights extends DbConnection {
     public function __construct(){
          parent::__construct();
     }

     public function check_flights($depc, $arrc, $depdate, $retdate, $isticket, $tseat){
          // $sql = "SELECT * FROM flights WHERE fromm = '$depc' AND too = '$arrc' AND dep_date = '$depdate' AND arr_date ='$retdate'";
          if(!empty($isticket)){
               $sql = "SELECT * FROM flights WHERE fromm = '$depc' 
               AND too = '$arrc' 
               AND dep_date = '$depdate' 
               AND arr_date = '$retdate' 
               AND roundtrip = '$isticket' 
               AND typeseat = '$tseat'";
          } else {
               $sql = "SELECT * FROM flights WHERE fromm = '$depc' 
               AND too = '$arrc' 
               AND dep_date = '$depdate' 
               AND arr_date = '$retdate' 
               AND typeseat = '$tseat'";
          }
          
          $query = $this->connection->query($sql);

          if($query->num_rows > 0){
               $row = $query->fetch_array();
               return $row;
          } else {
               return false;
          }
               
     }

     public function book_flight($data){

          $costumer = $data['customer'];
          $class = $data['class'];
          $flight = $data['flight'];
          $datesched = $data['date_sched'];
          $time = $data['timee'];
          $total = $data['total'];

          

          $search = "SELECT * FROM booked_flights 
          WHERE customer = '$costumer' 
          AND class = '$class'
          AND flight = '$flight'
          AND date_sched = '$datesched'
          AND timee = '$time'";

          $query = $this->connection->query($search);

          if($query->num_rows > 0){

               return false; // -> !

          } else {

               $sql = "INSERT INTO booked_flights (".implode(",", array_keys($data)) . ') VALUES (\'' . implode("','", array_values($data)) . "')"; 

               if($this->connection->query($sql)){
                    return true;
               } else {
                    return mysqli_query($this->connection, $sql);
               }
               
          }
          
          
          


     }

     public function escape_string($value){
          return $this->connection->real_escape_string($value);
     }
}




