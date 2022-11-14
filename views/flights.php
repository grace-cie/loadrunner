<?php
session_start();
//return to login if not logged in
if (!isset($_SESSION['user']) ||(trim ($_SESSION['user']) == '')){
	header('location:../index.php');
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
        <h5 class="position-absolute" style="right: 33px;"><?php echo $row['fname']; ?></h5>
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
     <?php if(isset($_SESSION['message1'])) { ?>
          <div style="z-index: 99" id="toast-warning" class="flex absolute top-5 right-5 items-center p-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
               <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Warning icon</span>
               </div>
               <div class="ml-3 text-sm font-normal"><?php echo $_SESSION['message1']?></div>
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
            <a href="../controller/logout_controller.php" class="btn btn-default mt-2" style="border: 1px solid; width: 90px;height: 30px;">Signoff</a>
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
                                   <option value="Seattle" 
                                   <?php if(isset($_SESSION['depc'])){ echo $_SESSION['depc'] === 'Seattle' ? 'selected="selected" ' : null; }?> >Seattle</option>

                                   <option value="Sydney" 
                                   <?php if(isset($_SESSION['depc'])){ echo $_SESSION['depc'] === 'Sydney' ? 'selected="selected" ' : null; }?> >Sydney</option>
                              </select>
                         </div>
                         <div class="form-group mt-3">
                              <label for="row2">Arrival City: </label>
                              <select class="row2" name="row2" id="row2">
                                   <option></option>
                                   <option value="Seattle" 
                                   <?php if(isset($_SESSION['arrc'])){ echo $_SESSION['arrc'] === 'Seattle' ? 'selected="selected" ' : null; }?> >Seattle</option>
                                   
                                   <option value="Sydney" 
                                   <?php if(isset($_SESSION['arrc'])){ echo $_SESSION['arrc'] === 'Sydney' ? 'selected="selected" ' : null; }?> >Sydney</option>
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
                                   <input type="text" name="date_dep" id="date_dep" value="<?php if(isset($_SESSION['depdate'])){ echo $_SESSION['depdate'];} ?>">
                              </div>
                              <div class="form-group mt-3 d-flex">
                                   <label for="row2" style="width: 166px;">Return Date: </label>
                                   <input type="text" name="date_return" id="date_return" value="<?php if(isset($_SESSION['retdate'])){ echo $_SESSION['retdate'];} ?>">
                              </div>
                              <div class="form-group mt-3">
                                   <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="isticket" value="isticket" id="flexCheckDefault" <?php if(isset($_SESSION['isticket'])){ echo $_SESSION['isticket'] === 'isticket' ? 'checked' : null;} ?> >
                                        <label class="form-check-label" for="flexCheckDefault">
                                             Roundtrip ticket
                                        </label>
                                   </div>
                              </div>
                              <div class="form-group mt-3" required>
                                   <label for="form-check">Type Seat: </label>
                                   <div class="form-check">
                                        <input class="form-check-input" type="radio" name="typeseat" id="flexRadioDefault2" value="First" <?php if(isset($_SESSION['tseat'])){ echo $_SESSION['tseat'] === 'First' ? 'checked' : null; } ?> >
                                        <label class="form-check-label" for="flexRadioDefault2">
                                             First
                                        </label>
                                   </div>
                                   <div class="form-check">
                                        <input class="form-check-input" type="radio" name="typeseat" id="flexRadioDefault1" value="Business" <?php if(isset($_SESSION['tseat'])){ echo $_SESSION['tseat'] === 'Business' ? 'checked' : null; } ?> >
                                        <label class="form-check-label" for="flexRadioDefault1">
                                             Business
                                        </label>
                                   </div>
                                   <div class="form-check">
                                        <input class="form-check-input" type="radio" name="typeseat"id="flexRadioDefault2" value="Coach" <?php if(isset($_SESSION['tseat'])){ echo $_SESSION['tseat'] === 'Coach' ? 'checked' : null; } ?> >
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
          <?php unset($_SESSION['tseat']); ?>
          <?php unset($_SESSION['isticket']); ?>
          <?php unset($_SESSION['retdate']); ?>
          <?php unset($_SESSION['depdate']); ?>
          <?php unset($_SESSION['depc']); ?>
          <?php unset($_SESSION['arrc']); ?>
          <?php unset($_SESSION['message1']); ?>
        </div>
    </div>
    
    <script>
          $('#row1').select2({
               selectOnClose: false,
               placeholder: 'Please Select City',
               // allowClear: true
               
          });
          $('#row2').select2({
               selectOnClose: false,
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