<?php
	//start session
	session_start();
 
	//redirect if logged in
	if(isset($_SESSION['user'])){
		header('location:home.php');
	}
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
            <img src="./img/logo.png" style="height: 41px;" alt="">
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
            <form method="POST" action="../controller/login_controller.php">
                <label for="user">Username</label>
                <input class="" name="username" type="text" placeholder="username" required>
                <label for="pass">Password</label>
                <input class="" name="password" type="password" placeholder="password" required>
                <input class="mt-3" name="login" type="submit" value="Login">
            </form>
        </div>
    </nav>
    <div class="container" style="position: absolute;width: 1100px;background: #e9e2ec;height: 100%;right: 1px;">
        <div class="message" style="margin-top: 226px;margin-left: 108px;color: #21294b;">
            <h1>Web Tours</h1>
            <h5 style="color: #222; width: 800px;">
                Welcome to the Web tours site.
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
        </div>
    </div>
    
    
</body>
</html>