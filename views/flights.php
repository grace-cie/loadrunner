<?php
session_start();
//return to login if not logged in
if (!isset($_SESSION['user']) ||(trim ($_SESSION['user']) == '')){
	header('location:index.php');
}
 
include_once('../controller/user_controller.php');
 
$user = new User();
 
//fetch user data
$sql = "SELECT * FROM users WHERE id = '".$_SESSION['user']."'";
$row = $user->details($sql);
 
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
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
     <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
     <!--flatpickr-->

     <!--bootstrap-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <!--bootstrap-->

     <!--select 2-->
     <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
     <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
     <link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet" />
     <script src="vendor/select2/dist/js/select2.min.js"></script>
     <link href="path/to/select2.min.css" rel="stylesheet" />
     <script src="path/to/select2.min.js"></script>
     <!--select 2-->

    <title>LOADRUNNER</title>
</head>
<style>
     
</style>
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
		    	if(isset($_SESSION['message'])){
		    		?>
		    			<div class="alert alert-info text-center" style="position: absolute; z-index: 1; width: 100%;">
					     <?php echo $_SESSION['message']; ?>
					</div>
		    		<?php
 
		    		unset($_SESSION['message']);
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
          <form action="flghts2.php" method="post">
               <div class="group d-flex">
                    <div class="group1">
                         <div class="form-group">
                              <label for="row1">Departure City: </label>
                              <select class="row1" name="row1" id="row1">
                                   <option></option>
                                   <option value="Seattle">Seattle</option>
                                   <option value="Sydney">Sydney</option>
                              </select>
                         </div>
                         <div class="form-group mt-3">
                              <label for="row2">Arrival City: </label>
                              <select class="row2" name="row2" id="row2">
                                   <option></option>
                                   <option value="Seattle">Seattle</option>
                                   <option value="Sydney">Sydney</option>
                              </select>
                         </div>
                         <div class="form-group mt-3">
                              <label for="row2">No. of Passengers: </label>
                              <input type="number" name="no_of_passe" id="no_of_passe">
                         </div>
                         <div class="form-group mt-3">
                              <label for="form-check">Seating Preferences: </label>
                              <div class="form-check">
                                   <input class="form-check-input" type="radio" name="flexRadioDefaults" id="flexRadioDefault2">
                                   <label class="form-check-label" for="flexRadioDefault2">
                                        None
                                   </label>
                              </div>
                              <div class="form-check">
                                   <input class="form-check-input" type="radio" name="flexRadioDefaults" id="flexRadioDefault1">
                                   <label class="form-check-label" for="flexRadioDefault1">
                                        Aisle
                                   </label>
                              </div>
                              <div class="form-check">
                                   <input class="form-check-input" type="radio" name="flexRadioDefaults" id="flexRadioDefault2">
                                   <label class="form-check-label" for="flexRadioDefault2">
                                        Window
                                   </label>
                              </div>
                         </div>
                    </div>
                    <div class="group2 ms-5">
                              <div class="form-group d-flex">
                                   <label for="row1" style="width: 166px;">Departure Date: </label>
                                   <input type="text" name="date_dep" id="date_dep">
                              </div>
                              <div class="form-group mt-3 d-flex">
                                   <label for="row2" style="width: 166px;">Return Date: </label>
                                   <input type="text" name="date_return" id="date_return">
                              </div>
                              <div class="form-group mt-3">
                                   <div class="form-check">
                                   <input class="form-check-input" type="checkbox" value="isticket" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                             Ticket
                                        </label>
                                   </div>
                              </div>
                              <div class="form-group mt-3" required>
                                   <label for="form-check">Type Seat: </label>
                                   <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                             First
                                        </label>
                                   </div>
                                   <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                             Business
                                        </label>
                                   </div>
                                   <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                             Coach
                                        </label>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
               <center>
                    <input type="submit" name="steptwo" value="Continue">
               </center>
          </form>
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
</html>