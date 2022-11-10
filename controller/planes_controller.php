<?php
include_once('../model/dbconn.php');

class Planes extends DbConnection {
     public function __construct(){
          parent::__construct();
     }

     public function get_planes(){
          // $sql = "SELECT * FROM flights WHERE fromm = '$depc' AND too = '$arrc' AND dep_date = '$depdate' AND arr_date ='$retdate'";
          $sql = "SELECT * FROM planes WHERE category = '1'";
          // $sql = "SELECT id, plane, timee, cost FROM planes ORDER BY plane";
          $query = $this->connection->query($sql);

          

          if($query->num_rows > 0){
               while($row = $query->fetch_assoc()){
                    return $row;
                    // $data['id'] = $row['id'];
                    // $data['plane'] = $row['plane'];
                    // $data['timee'] = $row['timee'];
                    // $data['cost'] = $row['cost'];

                    // return $data;
               }
          } else {
               return false;
          }
               
     }

     public function escape_string($value){
          return $this->connection->real_escape_string($value);
     }
}