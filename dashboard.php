<?php
	session_start();
	include('db/db_config.php');
    include("db/authentication.php");
    authentication();


    $username = $_SESSION['username'];
    $user_id = $_SESSION['user_id'];

    $select = mysqli_query($db, "SELECT * FROM category")or die(mysqli_error($db));
    $query = mysqli_query($db, "SELECT * FROM user WHERE username = '".$username."' AND user_id = '".$user_id."' ")or die(mysqli_error($db));
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- <link rel="stylesheet" type="text/css" href="style.css">
 --><title>GIST | Dashboard</title>

<style type="text/css">
	@charset "utf-8";
/*CSS Document*/
body{
      background-image: url(images/ten.jpg);
       background-repeat: no-repeat;
    background-size: cover;
    background-attachment :fixed;

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
		.nav{ margin-bottom: 30px;
color: white;
background: #191970;
overflow: hidden;
height: 100px;}
.header, #user, .nav, .side1, .side2, .content, .footer{
										margin-bottom: 5px}
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
#user{ margin-right:  30px; }
#username, #logout, #home, #category  {
	margin: 30px 10px;
  color:#FFF;
  text-decoration: none;
  font-size: 20px;
  padding:6px;
  list-style: none;
}
.clear{clear: both;}

.side1 {width: 20%;
			background-color: rgba(255,255,255,0.8);
		 	color: #000;
		 	margin-right: 30px;
		 	text-align: justify;
		 	text-transform: uppercase;
		 	border-top-right-radius: 20px;
		 	border-bottom-left-radius: 20px;}

.side2 { width: 49.5%; }
.side3 { width: 20% }


.side2 {
	float: left;
}
.side1 p{
	margin: 10px 10px;
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size:20px;
}
h3{
	margin: 10px;
	font-size: 24px;
}
span{
	font-size: 40px;
	text-align: center;
}
#side1 ul{list-style-type: none;}
#side1 ul li{border: 1px solid #fff;}
#side1 a{
	background-color: #191970;
	color: #fff;
	font-family:Arial;
	font-size:18px;
	display:block;
	padding:10px 20px;
	letter-spacing: 2px;
	border-bottom-left-radius: 20px;
}
#side1 a:hover{color:#191970;
					background-color: rgba(240, 180, 140, 0.4);
					text-decoration: none;
				border-bottom-left-radius: 20px;}
.nav{ margin-bottom: 30px;
color: white;
background: #191970;
overflow: hidden;
height: 100px;}
fieldset{
	border-radius: 20px;
}

#post{background-color: rgba(255,255,255,0.5);
  border-radius: 30px;
  border: 1px solid #191970;
  
		 }
#post a
	{
		color:#000;
		font-family:Arial, Helvetica, sans-serif;
		font-size:18px;
		letter-spacing:2px;
		padding:24px 15px;
		text-decoration:none;
		display:block;
	}
	 #post a:hover
	 {background-color: rgba(210,180,140,0.5);
	 	
	 	color: #fff;
	 }
	 #post a:hover:first-child
	 {
	 	border-top-right-radius: 30px;
	 	border-top-left-radius: 30px;
	 	color: #fff;
	 }
	  #post a:hover:last-child
	 {
	 	border-bottom-right-radius: 30px;
	 	border-bottom-left-radius: 30px;
	 	color: #fff;
	 }

</style>
</head>
<body>
	<div class="container">
		<div class="nav">
			<div id="logo">gist</div>
			<div id="user">
					<a id="username" href=""><p><?php echo $username?></p></a>
					<a id="category" href="category.php"><p>CATEGORY</p></a>
					<a id="logout" href="logout.php"><p>LOGOUT</p></a>
					
				
			</div>
		</div>
		<div class="content clear">
			<div class="side1" id="side1">
				
					<h3>Your Details</h3>
				
				<?php
			$res=mysqli_fetch_array($query);
			
			$name=$res['firstname'].' '.$res['lastname'];
			

			

			echo '<p><span>.</span> '.$name.'</p>'.'</br>';
			echo '<p><span>.</span> Gender: '.$res["gender"].'</p>'.'</br>';
			echo '<p><span>.</span> DOB: '.$res["date_of_birth"].'</p>'.'</br>';
			echo '<p><span>.</span> State: '.$res["state_of_origin"].'</p>'.'</br>';
			echo '<p><span>.</span> Nationality '.$res["nationality"].'</p>'.'</br>';
			echo '<a href=change_password>Change Password</a>';


		?>
				
			</div>

			<div id="side2" class="side2 ">
				<div id="post">
				
				<?php
		while ($result=mysqli_fetch_array($select)) {
			
			$category_name=$result['category_name'];
			$category_id=$result['category_id'];
			

			echo '<a href=post.php?category_id='.$category_id.'&category_name='.$category_name.'>'.$category_name.'</a>';

		?>
		
		<?php } ?>
		</div>
			</div>
		</div>
	</div>
</body>
</html>