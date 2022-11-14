<?php

session_start();

include('../controller/flights_controller.php');
include_once('../controller/user_controller.php');
 
$user = new User();
 
//fetch user data
$sql = "SELECT * FROM users WHERE id = '".$_SESSION['user']."'";
$row = $user->details($sql);

$flights = new Flights();

if(isset($_POST['stepthree'])){
     $form1 = $flights->escape_string($_POST['optradio']);
     $form2 = $flights->escape_string($_POST['optradio2']);

     echo $form1.'<br>'.$form2;

     $get_f_val = $form1;
     $get_s_val = $form2;

     $get_f_price = explode('|', $get_f_val);
     $get_s_price = explode('|', $get_s_val);

     $fprice= $get_f_price[3];
     $sprice = $get_s_price[3];

     $_SESSION['state_fprice'] = $fprice;
     $_SESSION['state_sprice'] = $sprice;
     
     $total = $_SESSION['state_fprice']  + $_SESSION['state_fprice'];
          
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
     <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

     <!--jquery-->
     <script
     src="https://code.jquery.com/jquery-3.6.1.js"
     integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
     crossorigin="anonymous"></script>
     <!--jquery-->

     <!--flatpickr-->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
     <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
     <!--flatpickr-->

     <!--bootstrap-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <!--bootstrap-->

     <!--select 2-->
     <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
     <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
     <link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet" />
     <script src="vendor/select2/dist/js/select2.min.js"></script>
     <link href="path/to/select2.min.css" rel="stylesheet" />
     <script src="path/to/select2.min.js"></script> -->
     <!--select 2-->

    <title>LOADRUNNER</title>
</head>
<body>
    <nav class="navbar" style="background: #21294b; color: white;">
        <div>
            
        </div>
        <div class="container-fluid d-flex">
            <img src="../img/logo.png" style="height: 41px;" alt="">
            <span class="navbar-brand mb-0 h1 position-absolute" style="left: 65px;">Web Tours</span>
        </div>
        <h5 class="position-absolute" style="right: 33px;"><?php echo $row['fname']; ?></h5>
    </nav>
          <?php
		    	if(isset($_SESSION['fmessage'])){
		    		?>
		    			<div class="alert alert-info text-center" style="position: absolute; z-index: 1; width: 100%;">
					     <?php echo $_SESSION['fmessage']; ?>
					</div>
		    		<?php
 
		    	//unset($_SESSION['fmessage']);
		    	}
		?>
          <?php if(isset($_SESSION['flight_validate'])) { ?>
               <div style="z-index: 99" id="toast-warning" class="flex absolute top-5 right-5 items-center p-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
                    <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
                         <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                         <span class="sr-only">Warning icon</span>
                    </div>
                    <div class="ml-3 text-sm font-normal"><?php echo $_SESSION['flight_validate']?></div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-warning" aria-label="Close">
                         <span class="sr-only">Close</span>
                         <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
               </div>
          <?php } ?>
    <nav class="navbar" style="background: #e9e2ec; width: 244px; position: absolute; height: 100%;">
        <div class="form position-absolute" style="top: 87px; left: 13px;">
            <a href="./flights.php" class="btn btn-default mt-2" style="border: 1px solid; width: 90px; height: 30px;">Flights</a>
            <br>
            <a class="btn btn-default mt-2" style="border: 1px solid; width: 90px;height: 30px;">Itenerary</a>
            <br>
            <a href="./home.php" class="btn btn-default mt-2" style="border: 1px solid; width: 90px;height: 30px;">Home</a>
            <br>
            <a href="../controller/logout_controller.php" class="btn btn-default mt-2" style="border: 1px solid; width: 90px;height: 30px;">Sign off</a>
        </div>
    </nav>
    <div class="container" style="position: absolute;width: 1271px;background: #e9e2ec;height: 100%;right: 1px; padding-top: 116px; padding-left: 162px;">
    <h1>Payment Details</h1>
        <div class="form">
          <!-- <form action="flghts2.php" method="post">
               
          </form> -->
          <form action="./flight_invoice.php" method="post" style="width: 334px;">
               <fieldset>
                    <label for="fname">First Name : </label>
                    <input type="text" name="fname" id="fname" value="<?php echo $row['fname']; ?>"><br>

                    <label for="lname">Last Name :</label>
                    <input type="text" name="lname" id="lname" value="<?php echo $row['lname']; ?>"><br>

                    <label for="streetadd">Street Address :</label>
                    <input type="text" name="streetadd" id="streetadd" value=""><br>

                    <label for="CSZ">City/State/Zip :</label>
                    <input type="text" name="CSZ" id="CSZ" value=""><br>

                    <label for="passfullname">Passenger Names :</label>
                    <input type="text" name="passfullname" id="passfullname" value="<?php echo $row['fname'].' '.$row['lname']; ?>"><br>

                    <?php if(isset($_SESSION['isticket'])){ echo empty($_SESSION['isticket']) 
                         ? '<p name="total">Total for 1 ticket is = <strong>$'. $_SESSION['state_fprice'] .'</strong></p><br>
                              <input type="text" name="total" value="'. $_SESSION['state_fprice'].'" hidden><br>' 
                         : '<p name="total">Total for 2 ticket(s) is = <strong>$'. $_SESSION['state_fprice']  + $_SESSION['state_sprice'] .'</strong></p><br>
                              <input type="text" name="total" value="'. $_SESSION['state_fprice']  + $_SESSION['state_sprice'] .'" hidden><br>'; } ?>
                         
                         <input type="text" name="f_details" value="<?php echo $_SESSION['from'].'|'.$_SESSION['to'] ?>" hidden>
                         <input type="text" name="date_details" value="<?php echo $_SESSION['departure'].'|'.$_SESSION['arrival']?>" hidden>
                         <input type="text" name="time_details" value="<?php echo $_SESSION['departure_time'].'|'.$_SESSION['arrival_time'] ?>" hidden>
                         <input type="text" name="typeseat" value="<?php echo $_SESSION['tseat'] ?>" hidden>

                    <label for="crc">Credit Card : </label>
                    <input type="text" name="crc" id="crc" value=""><br>

                    <label for="crc">Exp Date : </label><input type="text" name="expdate" id="expdate" value=""><br>

                    <div class="form-check">
                         <input class="form-check-input" type="checkbox" name="savecredit" value="isticket" id="flexCheckDefault">
                         <label class="form-check-label" for="flexCheckDefault">
                              Save this Credit Card Information
                         </label>
                    </div>
               </fieldset>
               <input type="submit" name="stepthree" value="Continue">
          </form>
          <?php //unset($_SESSION['isticket']) ?>

          <!-- <p><?php //echo $res['fromm']; ?></p>
               <p><?php //echo $res['too']; ?></p>
               <p><?php //echo $res['dep_date']; ?></p>
               <p><?php //echo $res['arr_date']; ?></p> -->
        </div>
    </div>
    
     <script>
          $("#expdate").flatpickr({
               altInput: true,
               // altFormat: "F j, Y",
               dateFormat: "d/m/Y",
          });
     </script>
</body>
</html>