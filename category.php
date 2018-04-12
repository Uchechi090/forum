<?php
	include("db/db_config.php");
	session_start();
	include('db/db_config.php');
    include("db/authentication.php");
    authentication();


    $username = $_SESSION['username'];
    $user_id = $_SESSION['user_id'];

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GIST | Category</title>
<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
<style type="text/css">
	@charset "utf-8";
/*CSS Document*/
*{
	margin:0;
	padding:0;
}
body{
	background-image: url(images/eight.jpg);
	background-attachment :fixed;
       background-repeat: no-repeat;
    background-size: cover;
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
										margin-bottom: 5px;}
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

#user{ margin-right:  30px; }
#username, #logout, #home, #category  {
	margin: 30px 10px;
  color:#FFF;
  text-decoration: none;
  font-size: 20px;
  padding:6px;
  list-style: none;
}
.add, .btn{ border: 1px solid #fff;
	font-family:Arial;
	font-size:18px;
	display:block;
	padding:10px 20px;
	letter-spacing: 2px;
	margin:auto;
  padding:6px;
  width:80%;
  margin-top: 10px;
}
/*  home page */
.nav{ margin-bottom: 30px;

color: white;
background: #191970;
overflow: hidden;
height: 100px;}

form{
  
  padding:25px;
  margin:30px auto 0 auto;width:45%;align-items: center;
  justify-content: center;
}
    
#post{background-color: rgba(255,255,255,0.6);
  border-radius: 5px;
  width: 
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
	 {background-color: rgba(210,180,140,0.7);
	 	
	 	color: #fff;
	 }
	 #post a:hover:first-child
	 {
	 	border-top-right-radius: 5px;
	 	border-top-left-radius: 5px;
	 	color: #fff;
	 }
	  #post a:hover:last-child
	 {
	 	border-bottom-right-radius: 5px;
	 	border-bottom-left-radius: 5px;
	 	color: #fff;
	 }
	 .add{
	 	width: 80%;
	 }
</style>
<title>Untitled Document</title>
</head>
<body>

<?php
					if(array_key_exists('addbtn', $_POST)){

						if(empty($_POST['add'])){
							$err = "Input A Category";
							header("location:category.php?error=$err");
						}else{
						$category_added = mysqli_real_escape_string($db, $_POST['add']);

						$add = mysqli_query($db, "INSERT INTO category 
															VALUES(NULL, 
															'".$category_added."'
														)") 
						or die (mysqli_error($db));
					}
					header("location:category.php");
					}
				?>
	
	<div class="container">
		<div class="nav">
			<div id="logo">gist</div>
			<div id="user">
					<a id="username" href="dashboard.php"><p><?php echo $username?></p></a>
					<a id="category" href="category.php"><p>CATEGORY</p></a>
					<a id="logout" href="logout.php"><p>LOGOUT</p></a>
			</div>
		</div>
		
				<div id="post">
				
				<?php
				$select = mysqli_query($db, "SELECT * FROM category")or die(mysqli_error($db));
				while ($result=mysqli_fetch_array($select)) {
			
				$_SESSION['category_name']=$result['category_name'];
				$_SESSION['category_id']=$result['category_id'];
				

				echo '<a href=post.php?category_id='.$_SESSION['category_id'].'&category_name='.$_SESSION['category_name'].'>'.$_SESSION['category_name'].'</a>';

				?>
				
				<?php } ?>
				
				<form action="" method="post">
				<input type="text" name="add" placeholder="Add Category" class="add" />
				<input type="submit" name="addbtn" value="Add" class="btn" /></form>
				</div>
			
	</div>




</body>
</html>