<?php
	session_start();
	session_destroy();
 
	header('../../views/index.php');
?>