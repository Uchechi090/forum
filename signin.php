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
<title>Signin</title>
</head>
<body>

<?php 

if(array_key_exists('login', $_POST)){
        $error = array(); //INITIALIZE ARRAY

            if(empty($_POST['uname'])){
                $error[] = "Please enter your username";
            } else {
                $uname = mysqli_real_escape_string($db, $_POST['uname']);
            }

            if(empty($_POST['pword'])){
                $error[] = "Please enter your passowrd";
            } else{
                $pword = mysqli_real_escape_string($db, $_POST['pword']);
            }



            if(empty($error)){ //If error array is empty
                $query = mysqli_query($db, "SELECT * FROM user WHERE username='".$uname."' AND password = '".$pword."' ") or die(mysqli_error($db));

                    if (mysqli_num_rows($query) == 1) {
                            
                            $result = mysqli_fetch_array($query);
                            $_SESSION['username'] = $result['username'];
                            $_SESSION['user_id'] = $result['user_id'];
                            header("location:dashboard.php"); //give login access u can also use redirect instead of header
                        }else{
                            $err_msg = "Invalid Username and Password";

                                       header("location:index.php?error_message=$err_msg"); 
                             }

            } else {
                $err_msg = "Enter your Username and Password";

                            header("location:dashboard.php?error_message=$err_msg"); 
                }
            }
 ?>
	
</body>
</html>
