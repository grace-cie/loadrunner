<?php

session_start();

//return to login if not logged in

// if (!isset($_SESSION['user']) ||(trim ($_SESSION['user']) == '')){
// 	header('location:index.php');
// }

include('../controller/flights_controller.php');
// include('../controller/planes_controller.php');

$flights = new Flights();

if(isset($_POST['steptwo'])){

     $depc = $flights->escape_string($_POST['row1']);
     $arrc = $flights->escape_string($_POST['row2']);
     // $nopass = $flights->escape_string($_POST['no_of_passe']);
     // $seatpref = $flights->escape_string($_POST['flexRadioDefaults']);
     $depdate = $flights->escape_string($_POST['date_dep']);
     $retdate = $flights->escape_string($_POST['date_return']);
     // $isticket = $flights->escape_string($_POST['flexCheckDefault']);
     // $tseat = $flights->escape_string($_POST['flexRadioDefault2']);

     $res = $flights->check_flights($depc, $arrc, $depdate, $retdate);

     if(!$res){
          $_SESSION['message'] = 'The selected inputs has not been found in the database!';
          header('location:./flights.php');
     } else {
          $_SESSION['fmessage'] = 'Flights found! you may choose flights now';

          // $planes = new Planes();
          
          // $plane_list = $planes->get_planes();

          // echo '<pre>';
          //      print_r($plane_list);

          //      // foreach($plane_list as $list){
          //      //      echo $list['plane'];
          //      //      echo $list['timee'];
          //      //      echo $list['cost'];
          //      // }
          // echo '</pre>';

          // print_r($res);
     }
          
     
}else{
     $_SESSION['message'] = 'You need to select flights first';
	header('location:./flights.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!--jquery-->
     <script
     src="https://code.jquery.com/jquery-3.6.1.js"
     integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
     crossorigin="anonymous"></script>
     <!--jquery-->

     <!--flatpickr-->
     <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
     <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> -->
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
    </nav>
    <?php
		    	if(isset($_SESSION['fmessage'])){
		    		?>
		    			<div class="alert alert-info text-center" style="position: absolute; z-index: 1; width: 100%;">
					     <?php echo $_SESSION['fmessage']; ?>
					</div>
		    		<?php
 
		    		unset($_SESSION['fmessage']);
		    	}
		    ?>
    <nav class="navbar" style="background: #e9e2ec; width: 244px; position: absolute; height: 100%;">
        <div class="form position-absolute" style="top: 87px; left: 13px;">
            <a href="./flights.php" class="btn btn-default mt-2" style="border: 1px solid; width: 90px; height: 30px;">Flights</a>
            <br>
            <a class="btn btn-default mt-2" style="border: 1px solid; width: 90px;height: 30px;">Itenerary</a>
            <br>
            <a href="./home.php" class="btn btn-default mt-2" style="border: 1px solid; width: 90px;height: 30px;">Home</a>
            <br>
            <a class="btn btn-default mt-2" style="border: 1px solid; width: 90px;height: 30px;">Sign off</a> 
            <br>
            <a href="../controller/logout_controller.php" class="btn btn-default mt-2" style="border: 1px solid; width: 90px;height: 30px;">Logout</a>
        </div>
    </nav>
    <div class="container" style="position: absolute;width: 1271px;background: #e9e2ec;height: 100%;right: 1px; padding-top: 116px; padding-left: 162px;">
    <h1>Find Flights</h1>
        <div class="form">
          <!-- <form action="flghts2.php" method="post">
               
          </form> -->
          <form action="./flights3.php" method="post">
               <h4 class="mt-5">Flight departing from <strong><?php echo $res['fromm']; ?></strong> to <strong><?php echo $res['too']; ?></strong> on <strong><?php echo $res['dep_date']; ?></strong></h4>
               <table>
                    <thead>
                         <tr>
                              <th>Flight</th>
                              <th>Departure time</th>
                              <th>Cost</th>
                         </tr>
                    </thead>
                    <tbody>
                         
                              <tr>
                                   <td>
                                        <label><input type="radio" id='regular' name="optradio" value="Blue_Sky_Air_780|8am|$801">Blue Sky Air 780</label>
                                   </td>
                                   <td>8am</td>
                                   <td>$801</td>
                              </tr>
                              <tr>
                                   <td>
                                        <label><input type="radio" id='regular' name="optradio" value="Blue_Sky_Air_781|1pm|$714">Blue Sky Air 781</label>
                                   </td>
                                   <td>1pm</td>
                                   <td>$714</td>
                              </tr>
                              <tr>
                                   <td>
                                        <label><input type="radio" id='regular' name="optradio" value="Blue_Sky_Air_782|5pm|$758">Blue Sky Air 782</label>
                                   </td>
                                   <td>5pm</td>
                                   <td>$758</td>
                              </tr>
                              <tr>
                                   <td>
                                        <label><input type="radio" id='regular' name="optradio" value="Blue_Sky_Air_783|11pm|$656">Blue Sky Air 783</label>
                                   </td>
                                   <td>11pm</td>
                                   <td>$656</td>
                              </tr>
                         
                    </tbody>
               </table>
               <h4 class="mt-3">Flight departing from <strong><?php echo $res['too']; ?></strong> to <strong><?php echo $res['fromm']; ?></strong> on <strong><?php echo $res['arr_date']; ?></strong></h4>
               <table>
                    <thead>
                         <tr>
                              <th>Flight</th>
                              <th>Departure time</th>
                              <th>Cost</th>
                         </tr>
                    </thead>
                    <tbody>
                         
                              <tr>
                                   <td>
                                        <label><input type="radio" id='regular' name="optradio2" value="Blue_Sky_Air_870|8am|$801">Blue Sky Air 870</label>
                                   </td>
                                   <td>8am</td>
                                   <td>$801</td>
                              </tr>
                              <tr>
                                   <td>
                                        <label><input type="radio" id='regular' name="optradio2" value="Blue_Sky_Air_871|1pm|$714">Blue Sky Air 871</label>
                                   </td>
                                   <td>1pm</td>
                                   <td>$714</td>
                              </tr>
                              <tr>
                                   <td>
                                        <label><input type="radio" id='regular' name="optradio2" value="Blue_Sky_Air_872|5pm|$758">Blue Sky Air 872</label>
                                   </td>
                                   <td>5pm</td>
                                   <td>$758</td>
                              </tr>
                              <tr>
                                   <td>
                                        <label><input type="radio" id='regular' name="optradio2" value="Blue_Sky_Air_873|11pm|$656">Blue Sky Air 873</label>
                                   </td>
                                   <td>11pm</td>
                                   <td>$656</td>
                              </tr>
                         
                    </tbody>
               </table>
               <input type="submit" name="stepthree" value="Continue">
          </form>

          <!-- <p><?php //echo $res['fromm']; ?></p>
               <p><?php //echo $res['too']; ?></p>
               <p><?php //echo $res['dep_date']; ?></p>
               <p><?php //echo $res['arr_date']; ?></p> -->
        </div>
    </div>
    
    <script>
          $('#row1').select2({
               selectOnClose: true,
               placeholder: 'Please Select City',
               // allowClear: true
               
          });
          $('#row2').select2({
               selectOnClose: true,
               placeholder: 'Please Select City',
               // allowClear: true
          });
    </script>
    <script>
     $("#date_dep").flatpickr({
          altInput: true,
          // altFormat: "F j, Y",
          dateFormat: "d/m/Y",
     });
     $("#date_return").flatpickr({
          altInput: true,
          // altFormat: "F j, Y",
          dateFormat: "d/m/Y",
     });
    </script>
</body>
<style>
     table, th, td {
          border: 2px solid #E9E2EC;
          border-collapse: collapse;
          font-size: 15px;
          text-align: center;
          width: 500px;
     }
     td{
          background-color: #f2f2f2;
     }
     th{
          background-color: #607276;
     }    
</style>
</html>


