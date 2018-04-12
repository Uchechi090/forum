<?php
	
	session_start();
	
    include("db/authentication.php");
    authentication();


    $username = $_SESSION['username'];
    $user_id = $_SESSION['user_id'];
  	$category_id = $_SESSION['category_id'];
  	$category_name = $_SESSION['category_name'];

	
if (isset($_GET['post_name'])) {
    	$post_name=$_GET['post_name'];
    
    }
if (isset($_GET['post_id']))  {
	$post_id=$_GET['post_id'];
 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
<title>GIST | Posts And Comments</title>
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
.side1, .side2, .side3{float:left;
	margin: 20px
}
.side1 {width: 20%;
			background-color: rgba(255,255,255,0.2);
		 	color: #000;
		 	margin-right: 30px;
		 	text-align: justify;
		 	text-transform: uppercase;
		 	border-radius: 5px;}

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
#side1 a{background-color: rgba(255,255,255,0.3);
	border-radius: 5px;
		color:#000;
		font-family:Arial, Helvetica, sans-serif;
		font-size:18px;
		letter-spacing:2px;
		padding:24px 15px;
		text-decoration:none;
		display:block;
}
#side1 a:hover{color: #fff;;
					background-color:rgba(25,25,112,0.2);
					text-decoration: none;}
#side1 a:hover:first-child{border-top-right-radius: 5px;
						border-top-left-radius: 5px;}
#side1 a:hover:last-child{border-bottom-right-radius: 5px;
						border-bottom-left-radius: 5px;
	 }
.clear{
	clear: both;
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
  
  padding:5px;
  margin:10px;
 width:45%;align-items: center;
  justify-content: center;
}
    
#post{background-color: rgba(255,255,255,0.3);
  border-radius: 5px;
  
		 }
#post a
	{	border-radius: 5px;
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
	 .post_name, .comment
		 {
		 	color:#000;
		font-family:Arial, Helvetica, sans-serif;
		font-size:20px;
		letter-spacing:2px;
		padding:10px;
		display:block;
		background-color: rgba(25,25,112,0.2);
		border:1px solid black;
		width: 50%;
		min-height: 20px;
		border-radius: 10px;
		font-style: bold;
		margin-top: 20px;
		 }
		 
		 .name, .date{
		 	color:#000;
		font-family:Arial, Helvetica, sans-serif;
		font-size:18px;
		letter-spacing:2px;
		padding:10px;margin: 0px 0px 0px 0px;
		background-color: rgba(255,255,255,0.7);
		border:1px solid white;
		border-radius: 10px;
		width: 40%;
		 }
		 .name, .date, .comment{
		 	width: 95%;
		 	margin: 0 auto;
		 }
		 .post_content, #comments
		 {
		 	color:#000;
		font-family:Arial, Helvetica, sans-serif;
		font-size:18px;
		letter-spacing:2px;
		padding:10px;
		display:block;
		background-color: rgba(255,255,255,0.7);
		border:1px solid white;
		border-radius: 10px;
		margin-bottom: 20px;
		 }
		 #comments{
		 	width: 60%;
		 	float: right;
		 	clear: both;
		 }
</style>
<title>Untitled Document</title>
</head>
<body>

	<?php
	
    
	if(array_key_exists('submit2', $_POST)) {
	    $error = '';

 if (empty($_POST['comment'])) {
 	$error= "PLEASE ENTER A COMMENT";
 }  else{
	    $comment = mysqli_real_escape_string($db, $_POST['comment']);
	}


 if ($error === '')  {
    	$insert = mysqli_query($db, "INSERT INTO comment
    		                        VALUES(NULL,
    		                        '".$comment."',
    		                        '".$user_id."',
    		                        '".$post_id."',
    		                        '".$category_id."',
    		                        NOW() ) ")
    		                        or die(mysqli_error($db));
    	$msg = "Comment Successfully Added";

    }  else  {
    	$msg="Error Occured";
    	header("location:dashboard.php?err_msg=$error");
    	}
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
		<div class="content clear">
			<div class="side1" id="side1">
				<div id="">
				
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
			<div id="side2" class="side2 ">
				<div id="">
		<?php
		$query = mysqli_query($db, "SELECT * FROM post WHERE post_id = '".$post_id."' ")or die(mysqli_error($db));
		$query_result=mysqli_fetch_array($query);
		$post_content = $query_result['post_content'];
		echo '<a class="post_name" id="button2" href=post2.php?post_id='.$post_id.'&post_name='.$post_name.'> '.$post_name.'</a>';
        echo "<p class='post_content'> $post_content </p>";
        ?>
    </div>
    <div >
      <?php

        $select= mysqli_query($db, "SELECT * FROM comment WHERE post_id = '".$post_id."' ")or die(mysqli_error($db)) ;
        while
        	($result=mysqli_fetch_array($select)) {
        		$comment=$result['comment'];
        		$date=$result['date'];

			?>
			<div id="comments">
			<?php
			echo '<p class="comment">'.$comment.'</p></br>';
        		echo "<p class='date '> $date </p></br>";
        		echo "<p class ='name '>$username</p>";
			?>
			</div>
        <?php	
        }
?>
</div>
		</div>
		<div id="side3" class="side3 ">
			<div id="post">
		 
		
       <form method="post">
		<textarea rows="8" cols="30" name="comment" placeholder="COMMENT HERE..."></textarea><br/>
		<input type="submit" name="submit2" id="button2" value="POST COMMENT">
         </form>
		
	</div>
			</div>
		
	</div>
</div>
</body>
</html>