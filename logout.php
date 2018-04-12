
<?php
	session_start();
	include('db/db_config.php');
    include("db/authentication.php");
    authentication();


  	unset($_SESSION['user_id']);
	unset($_SESSION['username']);
	header("Location:index.php")
?>
