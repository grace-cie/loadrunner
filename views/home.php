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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
		    	if(isset($_SESSION['message'])){
		    		?>
		    			<div class="alert alert-info text-center" style="position: absolute; z-index: 1; width: 100%;">
					        <?php echo $_SESSION['message'].' '.$row['fname']; ?>
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
            <a class="btn btn-default mt-2" style="border: 1px solid; width: 90px;height: 30px;">Home</a>
            <br>
            <a class="btn btn-default mt-2" style="border: 1px solid; width: 90px;height: 30px;">Sign off</a> 
            <br>
            <a href="../controller/logout_controller.php" class="btn btn-default mt-2" style="border: 1px solid; width: 90px;height: 30px;">Logout</a>
        </div>
    </nav>
    <div class="container" style="position: absolute;width: 1100px;background: #e9e2ec;height: 100%;right: 1px;">
        <div class="message" style="margin-top: 226px;margin-left: 108px;color: #21294b;">
            <h5 style="color: #222; width: 800px;">
                Welcome <strong><?php echo $row['fname'] ?></strong>, to the Web tours site.
                To make reservation, please enter your account information to the left.
                If you haven't registered yet, <strong>sign up now</strong> to get access to all our resources.
                To configure the server options, use <strong>administration</strong> link.
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                This product uses parts of the SMT Kernel, Copyright © 1991-99 <strong>iMatrix Corporation</strong>
            </h5>
            <!-- <p>Name: <?php //echo $row['fname']; ?></p>
			<p>Username: <?php //echo $row['username']; ?></p> -->
        </div>
    </div>
    
    
</body>
</html>