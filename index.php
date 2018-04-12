<?php
	 include("db/db_config.php");
	//include("db/authentication.php");
	// authentication();
$msg='';
	 session_start();

  if (isset($_GET['msg'])) {
    	$msg=$_GET['msg'];
    
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forum | GIST</title>
<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
<style type="text/css">
	@charset "utf-8";
/*CSS Document*/
body{
	 background-image: url(images/three.jpg);
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
.header, #user, .nav, .side1, .side2, .content, .footer{
										margin-bottom: 5px}

#header, #footer, #nav{width: 100%;}
#header, #footer{height:100px;}
.side1, .side2, .side3{float:left;
	margin: 20px
}
#logo {float: left;
		vertical-align: center;
		font-size: 70px;
		font-family: ;
		margin: auto 30px;
		}
#user {float: right;}
#username, #logout, #home, #category {float: left;
					margin: 10px;
					}
.clear{clear: both;}
.content { width: 100%;
margin: 20px 40px; }
.side1 {width: 20%;}
.side2 { width: 49.5%; }
.side3 { width: 20% }


/* dashboard */
#user{ margin-right:  30px; }
#username, #logout, #home, #category  {
	margin: 30px 10px;
  color:#FFF;
  text-decoration: none;
  font-size: 20px;
  padding:6px;
  list-style: none;
}
.side2 {
	background-color: #f9f9f9;
	font-size: 2em;
	height: 100%
}
#side1 ul{list-style-type: none;}
#side1 ul li{border: 1px solid #fff;}
#side1 ul li a{
	background-color: #191970;
	color: #fff;
	font-family:Arial;
	font-size:18px;
	display:block;
	padding:10px 20px;
	letter-spacing: 2px;
}
#side1 ul li a:hover{color:#191970;
					background-color: #fff;
					text-decoration: none}


/*  home page */
.nav{ margin-bottom: 30px;
color: white;
background: #191970;
overflow: hidden;
height: 100px;}
h2 {margin-top: 30px;}
.signup{width: 60%;
  border: 30px 0 0 0;
		margin: 30px auto;
		/*//background:#F9F9F9;*/
    opacity: 0.85;
    filter: alpha(opacity=85); /* For IE8 and earlier */
		}
		.signin{
			border-radius: 5px;
		}
    #form{
  
  padding:25px;
  margin:30px auto 0 auto;width:45%;align-items: center;
  justify-content: center;
}
    .contact{
      background-color: #aaa;
    text-align: center;
    align-items: center;
    margin: auto;
    display: block;
  padding: 0 0 50px 0;
  width:100%;
}
.signup-input, textarea, button{
	border-radius:5px;
	box-shadow: ;
  border:1px solid #CCC;
  background:#FFF;
  margin:auto;
  padding:6px;
  width:95%;
}
fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}
 textarea {
  height:100px;
  max-width:100%;
  resize:none;
}

button[type="submit"] {
  cursor:pointer;
  width:99%;
  border:none;
  background:#191970;
  color:#ffF;
  margin:0 0 5px;
  padding:10px;
  font-size:15px;
}

#login_email, #password, #login{margin: 30px 10px 0 10px;
								border:1px solid #CCC;
								border-radius: 5px;
  background:#FFF;
  padding:6px;
								}
#login_email, #password{
  width:30%;}
  #forgot{text-decoration: none;
  	color: #FFF;
  margin:auto 43px auto auto;
  padding:6px;
  float: right;}

/* forgot password */

/* sign in */

/* category */
#post{
  width: 100%;
  height: 100px;
  border-radius: 30px;
  border: 1px solid #191970;
}
#msg{
	height: 20px;
	color: red;
}
</style>
<title>Untitled Document</title>
</head>
<body>
	<div class="container">
		<div class="nav">
			<div id="logo" >gist</div>
			 <div id="user">
				<form action="signin.php" method="post" id="siginin">
					<input type="text" name="uname" id="login_email" placeholder="Username"/>
				<input type="password" name="pword" id="password" placeholder="Password"/>
				<input type="submit" name="login" id="login" value="Login"><br/>
				<a href="forgot.php"><p id="forgot">Forgot Password?</p></a>
			</form>
			</div> 
		</div>
		
		<div class="clear signup ">
			<div id="msg" align="center"><h3><?php echo $msg;?></h3></div>
			<!-- <h2 class="center">Sign Up</h2> -->
			<form method="post" action="signup.php" id="form">
				<fieldset>
				<input type="text" name="fname" placeholder="FirstName" class="signup-input" /> </fieldset>

				<fieldset>
				<input type="text" name="lname" placeholder="LastName" class="signup-input"/></fieldset>

				<fieldset>
				<input type="email" name="email" placeholder="Email Address" class="signup-input" /></fieldset>

				<fieldset>
				<input type="text" name="phoneno" placeholder="Phone Number" class="signup-input"/></fieldset>

				<fieldset>
					<input type="text" name="gender" placeholder="Gender | Male or Female" class="signup-input"/>
				
			</select>

				</fieldset>

				<fieldset>
				<input type="date" name="date_of_birth" placeholder="Date Of Birth" class="signup-input"/></fieldset>

				<fieldset>
				<input type="text" name="state_of_origin" placeholder="State of Origin" class="signup-input"/></fieldset>

				<fieldset>
				<input type="text" name="nationality" placeholder="Nationality" class="signup-input"/></fieldset>

				<fieldset>
				<input type="text" name="username" placeholder="Username" class="signup-input"/></fieldset>

				<fieldset>
				<input type="password" name="password" placeholder="Password" class="signup-input"/></fieldset>

				<fieldset>
				<button type="submit" name="signup"  class="signup-input"/>Sign Up</button></fieldset>
			</form>
			

		</div>
	</div>
</body>
</html>