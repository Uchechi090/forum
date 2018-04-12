<?php

   session_start();

   include("db/authentication.php");

   authentication();

  $username = $_SESSION['username'];
    $user_id = $_SESSION['user_id'];

    $error='';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GIST | Change Password</title>
    <style type="text/css">
      @charset "utf-8";
/*CSS Document*/
body{
   background-image: url(images/three.jpg);
   background-attachment :fixed;
       background-repeat: no-repeat;
    background-size: 100%;

}

*{
  margin:0;
  padding:0;
}
.center{
  align-items: center;
  text-align: center;
}

.container{
      width:100%;
      margin:auto;

    }

#logo {float: left;
    vertical-align: center;
    font-size: 70px;
    font-family: ;
    margin: auto 30px;
    }

.clear{clear: both;}

.nav{ margin-bottom: 30px;
color: white;
background: #191970;
overflow: hidden;
height: 100px;}

    form{
  
  padding:25px;
  margin:30px auto 0 auto;width:60%;align-items: center;
  justify-content: center;
}
    
/*fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}*/
 legend{
  font-size: 30px;
  font-weight: bold;
  font-family: Helvetica, sans-serif;
  color: #fff;
 }
input{
  border-radius:5px;
  box-shadow: ;
  border:1px solid #CCC;
  background:#FFF;
  margin:10px auto;
  padding:6px;
  width:80%;
}

button {
   border-radius:5px;
  box-shadow: ;
  border:1px solid #CCC;
  background:#FFF;
  margin:10px auto;
  cursor:pointer;
  background:#191970;
  color:#ffF;
  padding: 20px;
  width: 90%;
  font-size:15px;
}
#error{
  height: 20px;
  color: red;
}
    </style>
</head>
<body>

    <?php
    
        if(array_key_exists('uppword', $_POST))  {

            $error = '';

            if(empty($_POST['pword1']))  {

                $error = "*Please enter a New Password";
            } else {
                $pword1 = mysqli_real_escape_string($db, $_POST['pword1']);
            }

            if(empty($_POST['pword2']))  {

                $error = "*Please Confirm Your Password";
            }  else{
                $pword2 = mysqli_real_escape_string($db, $_POST['pword2']);
            }

            if($_POST['pword1']!==$_POST['pword2'])  {

                $error = "Passwords Entered do not Match";
            } else {
                ($_POST['pword1']===$_POST['pword2']);
            }

            if($error ==='')  {

                $query = mysqli_query($db, "UPDATE user SET password = '".$pword1."'  
                                                  WHERE username ='".$username."'
                                                  ") or die(mysqli_error($db));
                                    $msg = "Password Changed Successfully";
                                    header("location:index.php?msg=$msg");
            }  else {

               

                    
                    
                
            
            }
      
        }
    
    ?>
     <div class="container center">
    <div class="nav">
      <div id="logo" >gist</div>
       
    </div>
     
     <div class="center">
    <form action=""  method="POST" class="center">
      
      <fieldset style="width: 500px;">
   
         <legend>Change Password</legend>
    <div id="error"><h3><?php echo $error;?></h3></div>
         <input type="password" name="pword1" placeholder="New Password" />
         <input type="password" name="pword2" placeholder="Confirm New Password" />
         <input type="submit" name="uppword"  value="Click to Change Password"/> 
   
      </fieldset>
   
   </form>
</div>
</div>
</body>
</html>