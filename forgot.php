<?php

   session_start();

   include("db/db_config.php");

  $error='';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GIST | Forgot Password</title>

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
<body >

    <?php
    
        if(array_key_exists('uppword', $_POST))  {

            $error = '';

            if(empty($_POST['username'])  || empty($_POST['email']))  {

                $error = "*Please fill all fields";
            }  else{
                $username = mysqli_real_escape_string($db, $_POST['username']);
                $email = mysqli_real_escape_string($db, $_POST['email']);
            }
              if($error ==='')  {
                $query = mysqli_query($db, "SELECT * FROM user WHERE username = '".$username."'  AND email = '".$email."' ") or die(mysqli_error($db));
                  if(mysqli_num_rows($query) == 1)  {
                    $result = mysqli_fetch_array($query);
                    $_SESSION['username'] = $result['username'];
                    $_SESSION['user_id'] = $result['user_id'];
                    header("location:change_password.php");
                
                }  else{
                     
                    $error = "*Please reenter your details";

                                    header("location:forgot.php");
            }  
          }else {
                     
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
   
         <legend>Please enter your details</legend>
         <div id="error"><p><?php echo $error;?></p></div>
         <input type="text" name="username" placeholder="Username" />
         <input type="email" name="email" placeholder="Email" />
         <input type="submit" name="uppword"  value="Confirm Username and Email"/> 
   
      </fieldset>
   
   </form>
   </div>
</div>
</body>
</html>