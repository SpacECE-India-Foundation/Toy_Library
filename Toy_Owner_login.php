<?php

	
	session_start();
	
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<link rel="stylesheet" href="css\bootstrap.min.css">
		<link rel="stylesheet" href="style.css">
		<style>
			.loginbox{
				margin-left:60px;
				width:400px;
				padding:10px;
				margin-top:5px;
				font-weight:bold;
				color:white;
				font-size:18px;
			}
		</style>
	</head>
	<body><body><div class="container-fluid">
		<div class="row">
			<div class="offset-sm-1 col-sm-2"><img src="Space_ECE_logo.png" width="100" height="80" class="img-fluid mt-5"></div>
			
			<div class="offset-sm-5 col-sm-3 "><br><p style="color:white; font-size:40px;"><br>Toy Owner Login</style></div>
		</div>
	</div><br>
	<nav class="navbar  navbar-expand-sm navbar-light box" style="background-color: #FFA500;">
  		 <a class="navbar-brand" href="index.html">Toy Library</a>
   		 <ul class="navbar-nav">
      			<li class="nav-item active w3-large"><a class="nav-link " href="index.html">Home</a></li>
    		<ul>	 
	</nav>
	<br><br><br>
		<div class="container">
		<div class="row">
		<div class="offset-sm-4 col-sm-1"><img src="img2.png" width="80px" height="80px" style="border-radius:50%;"></div>
		<div class="col-sm-3"><br><h3><p style="color:white; padding-left:10px;">Login here</h3></div>
		<div class="w-100"></div>
		<div class="offset-sm-3 col-sm-4">
		<div class="loginbox">
		
		<form>
				<div class="form-group">
				<lable>UserName</lable>
				 <input type="textbox" name="na" class="form-control">
				</div>
				<div class="form-group">
				<lable>Password</lable>
				<input type="password" name="pa" class="form-control"><br>
				</div>
			<button type="submit"  name="but" class="btn btn-primary" style="width:100px;">Login</button>
			</div>
		</form>
		</div></div></div></div><br><br><br>
		<script  src="js\jquery.js"></script>
		<script src="js\bootstrap.min.js"></script>
	</body>
</html>

<?php	
	
	if(isset($_REQUEST['but']))
	{
		if(($_REQUEST['na']=="") || ($_REQUEST['pa']==""))
		{
			echo '<script>alert("All fields are required");</script>';
		}
		else
		{
			
			$con=mysqli_connect("localhost","root","","toylibrary");
			$name=$_REQUEST["na"];
			$pass=$_REQUEST["pa"];
	
			$s="select * from toyowner where username='$name' && password='$pass' ";
			$res=mysqli_query($con,$s);

			if(mysqli_num_rows($res)==1)
			{	
				$_SESSION['toyowner']=$name;
				header("location:Toy_Owner_Account.php");
			}
			else
			{
				echo "we can't found";
			} 
		}
	}
?>

