<?php
session_start();

include('../controller/flights_controller.php');
include_once('../controller/user_controller.php');

$data = new Flights();
$user = new User();

if(isset($_POST['stepthree'])){
     $insert_data = array(
          'customer' => $user->escape_string($_POST['passfullname']),
          'class' => $user->escape_string($_POST['typeseat']),
          'flight' => $user->escape_string($_POST['f_details']),
          'date_sched' => $user->escape_string($_POST['date_details']),
          'timee' => $user->escape_string($_POST['time_details']),
          'total' => $user->escape_string($_POST['total']),
          'credit_card' => $user->escape_string($_POST['crc']),
          'exp_date' => $user->escape_string($_POST['expdate']),
          'total' => $user->escape_string($_POST['total']),
     );
 
     $flight_validate = $data->book_flight($insert_data);

     if(!$flight_validate){
          $_SESSION['flight_validate'] = 'Sorry This Flight is already taken by someone else';
          header('location:./flights3.php');
     } else {
          $message = 'Success! you may exit the page';
     }
}

echo '<pre>';
     print_r($insert_data);
echo '</pre>';

