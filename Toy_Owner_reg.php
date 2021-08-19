<?php 
	
	if(isset($_REQUEST['btn_my']))
	{
		
		$name=$_REQUEST['na'];
		$city=$_REQUEST['city'];
		$userName=$_REQUEST['username'];
		$pass=$_REQUEST['pass'];
		$len=strlen($pass);
		$conPass=$_REQUEST['conPass'];
		
		
			if($len <6)
			{
				echo '<script>alert("Password length should be greater than 6");</script>';
			}
			else if($pass!=$conPass)
			{
				echo '<script>alert("Password and confirm password must be match");</script>';
				
			}
			else
			{
				$con=mysqli_connect("localhost","root","","toylibrary");
				$s="select * from toyowner";
				$res=mysqli_query($con,$s);
				$row=mysqli_num_rows($res);
				
				$s2="insert into toyowner values('','$name','$city','$userName','$pass')";
				if(mysqli_query($con,$s2))
				{
					echo '<script>alert("Registration Successfull")</script>';
					header("location:Toy_Owner_login.php");
				}
				
			}
		
	}
	
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<link rel="stylesheet" href="css\bootstrap.min.css">
		<link rel="stylesheet" href="style.css">
	<style>
		.regbox{
			font-size:17px;
			background-color:#FFA500;
			border:1px solid #000;
			width:500px;
			padding:25px;
			
		}
		
	</style>
	</head>
	<body><div class="container-fluid">
		<div class="row">
			<div class="offset-sm-1 col-sm-2"><img src="Space_ECE_logo.png" width="100" height="80" class="img-fluid mt-5"></div>
			<div class="offset-sm-5 col-sm-3 "><br><p style="color:white; font-size:40px;"><br>Toy Library</style></div>
		</div>
	</div><br>
	<nav class="navbar  navbar-expand-sm navbar-light box" style="background-color:#FFA500;">
  		 <a class="navbar-brand" href="index.html">Toy Library</a>
   		 <ul class="navbar-nav">
      			<li class="nav-item active w3-large"><a class="nav-link " href="index.html">Home</a></li>
    		<ul>	 
	</nav><br><br><br>
		<div class="container">
		<div class="row">
			
			<div class="offset-sm-3 col-sm-5 regbox">
					<form>
					<div class="form-group ">
						<h3>Register Here</h3>
						<lable>Name</lable>
						<input type="textbox" name="na" class="form-control" required>
						<lable>Town/City</lable>
						<input type="textbox" name="price" class="form-control" required>
						<lable>UserName</lable>
						<input type="textbox" name="username" class="form-control" required>
						<lable>Password</lable>
						<input type="password" name="pass" class="form-control" required>
						<lable>Confirm Password</lable>
						<input type="password" name="conPass" class="form-control" required><br>
						<button type="submit" name="btn_my" class="btn btn-primary">Register</button>
					</div>
				</form></div>
			</div></div><br><br><br>
		<script  src="js\jquery.js"></script>
		<script src="js\bootstrap.min.js"></script>
	</body>
</html>
