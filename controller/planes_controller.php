<?php
include_once('../model/dbconn.php');

class Planes extends DbConnection {
     public function __construct(){
          parent::__construct();
     }

     public function get_planes_w_category_one(){
          // $sql = "SELECT * FROM flights WHERE fromm = '$depc' AND too = '$arrc' AND dep_date = '$depdate' AND arr_date ='$retdate'";
          $sql = "SELECT * FROM planes WHERE category = '1'";
          // $sql = "SELECT id, plane, timee, cost FROM planes ORDER BY plane";
          $query = $this->connection->query($sql);

          if($query->num_rows > 0){

               $data = array();

               while($row = $query->fetch_assoc()){

                    $data[] = $row;

               }

               return $data;

          } else {

               return false;
          
          }

     }

     public function get_planes_w_category_two(){

          $sql = "SELECT * FROM planes WHERE category = '2'";

          $query = $this->connection->query($sql);

          if($query->num_rows > 0){
          
               $data = array();

               while($row = $query->fetch_assoc()){

                    $data[] = $row;

               }

               return $data;
          
          } else {

               return false;
          
          }


     }

     public function escape_string($value){

          return $this->connection->real_escape_string($value);

     }
}