<?php
	session_start();
	include('db/db_config.php');
    include("db/authentication.php");
    authentication();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css">
<title>Signup</title>
</head>
<body>
	<?php	
		if (array_key_exists('submit',$_POST)){
			$error = array();  //initializing array
			
							if(empty($_POST['firstname'])){
								$error[]="please enter firstname";
			
							}
							else{
								$firstname=mysqli_real_escape_string($db,$_POST['firstname']);
							}

							if(empty($_POST['lastname'])){
								$error[]="please enter lastname";
			
							}
							else{
								$lastname=mysqli_real_escape_string($db,$_POST['lastname']);
							}

							if(empty($_POST['email'])){
								$error[]="please enter email";
			
							}
							else{
								$email=mysqli_real_escape_string($db,$_POST['email']);
							}

							if(empty($_POST['phone_no'])){
								$error[]="please enter your phone number";
			
							}
							else{
								$phone=mysqli_real_escape_string($db,$_POST['phone_no']);
							}

							  if(empty($_POST['gender'])){
								$error[]="please enter email";
			
							}
							else{
								$email=mysqli_real_escape_string($db,$_POST['gender']);
							}

							  if(empty($_POST['date_of_birth'])){
								$error[]="please enter email";
			
							}
							else{
								$email=mysqli_real_escape_string($db,$_POST['date_of_birth']);
							}

							  if(empty($_POST['state_of_origin'])){
								$error[]="please enter email";
			
							}
							else{
								$email=mysqli_real_escape_string($db,$_POST['state_of_origin']);
							}

							  if(empty($_POST['nationality'])){
								$error[]="please enter email";
			
							}
							else{
								$email=mysqli_real_escape_string($db,$_POST['nationality']);
							}


							if(empty($_POST['password'])){
								$error[]="please enter password";
			
							}
							else{
								$password=mysqli_real_escape_string($db,$_POST['password']);
							}

					if(empty($error)){
						$insert= mysqli_query($db,"INSERT INTO forum
													VALUES (Null,
													'".$firstname."',
													'".$lastname."',
													'".$email."',
													'".$phone_no."',
													 '".$gender."',
													'".$date_of_birth."',
													'".$state_of_origin."',
													 '".$nationality."',
													'".$username."',
													 '".$password."'
													)  ") 
													or die (mysqli_error($db));
							$msg="user successfully added";

							header("location:index.php?msg=$msg");
							echo $_GET['msg'];


					}

					else{
						// foreach($error as $err){
						//     echo $err."<br/>";
						// }
					}
						 }





?>
		
	
</body>
</html>