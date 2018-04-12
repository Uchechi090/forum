<?php

	include ("db_config.php");

	function authentication() {
		if(!isset($_SESSION['username']) && !isset($_SESSION['user_id'])) {

			header("location:index.php");


		}	

	}



?>