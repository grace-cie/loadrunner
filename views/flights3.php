<?php

session_start();

include('../controller/flights_controller.php');

$flights = new Flights();

if(isset($_POST['stepthree'])){
     $form1 = $flights->escape_string($_POST['optradio']);
     $form2 = $flights->escape_string($_POST['optradio2']);

     echo $form1.'<br>'.$form2;
          
}