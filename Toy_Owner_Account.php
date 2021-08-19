<?php
	
	session_start();	
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<link rel="stylesheet" href="css\bootstrap.min.css">
		<link rel="stylesheet" href="style.css">
	</head>
	<style>
		.box4{
			font-weight:bold;
			background-color:#fff;
			width:600px;
			padding:50px;
			margin-top:40px;
			margin-left:250px;
			margin-bottom:40px;
			color:black;
		}
		.btn_style{
			width:300px;
			}
		
	</style>
	<body>
	<div class="container-fluid">
		<div class="row">
			<div class="offset-sm-1 col-sm-2"><img src="Space_ECE_logo.png" width="100" height="80" class="img-fluid mt-5"></div>
			
			<div class="offset-sm-5 col-sm-3 "><br><p style="color:white; font-size:40px;"><br>Toy Library</style></div>
		</div>
	</div><br>
	<nav class="navbar  navbar-expand-sm navbar-light box" style="background-color: #FFA500;">
  		 <a class="navbar-brand" href="index.html">Toy Library</a>
   		 <ul class="navbar-nav">
      			<li class="nav-item active w3-large"><a class="nav-link " href="index.html">Home</a></li>
    		<ul>	 
	</nav>
	
		<div class="container-fluid">
		<div class="row">
			<div class=" col-sm-1 ml-7">
				</div>
			
			<div class="w-100"></div>
			
			<div class="col-sm-3 bg-white text-center"><br>
			<img src="img2.png" width="100px" height="100px" style="border-radius:50%;"><br>
				<?php
					$user=$_SESSION['toyowner'];
					$con=mysqli_connect("localhost","root","","toylibrary");
					$s="select * from toyowner where username='$user'";
					$res=mysqli_query($con,$s);
					$row=mysqli_fetch_assoc($res);
					echo "<br>";
					echo "<h5 class='text-secondary'>Name: ".$row['name']. "<br>";
					echo "Town/City: ".$row['city']. "<br><br>";
					echo '<form>
						<input type="hidden" name="getid" value='.$row['id'].'>
						<br><button type="submit" class="btn btn-primary btn_style" name="btn_my" >Update</button><br>
						<br><button type="submit" class="btn btn-primary btn_style" name="btn_add">Add</button><br>
						<br><button type="submit" class="btn btn-primary btn_style" name="btn_view">View Product</button><br>
					        </form>';
				?>
			</div>
		
	
		<script  src="js\jquery.js"></script>
		<script src="js\bootstrap.min.js"></script>	
	</body>
</html>
<?php 

	if(isset($_REQUEST['btn_my']))
	{	
		$id=$_REQUEST['getid'];
		echo '<form class="text-white"><div class="offset-sm-2 col-sm-8 box4"><div class="form-group">
			<input type="hidden" name="getme" value='.$id.'>
			Name: <input type="textbox" name="getna" class="form-control " style="border:1px solid #000">
			City: <input type="textbox" name="getcity" class="form-control" style="border:1px solid #000">
			Product: <input type="textbox" name="getproduct" class="form-control" style="border:1px solid #000">
			Price: <input type="textbox" name="getprice" class="form-control" style="border:1px solid #000"><br>
			<button type="submit" class="btn btn-primary" name="but">Submit</button>
		        </div></div></form>';
		
	}
	if(isset($_REQUEST['but']))
	{	
		$id=$_REQUEST['getme'];
		$name1=$_REQUEST['getna'];
		$city1=$_REQUEST['getcity'];
		$product1=$_REQUEST['getproduct'];
		$price1=$_REQUEST['getprice'];
		if($name1!="" && $city1!="" && $product1!="" && $price1)
		{
			$con=mysqli_connect("localhost","root","","toylibrary");
			$s="UPDATE kfarm set name='$name1',city='$city1',product='$product1',price='$price1' where id='$id'";
			$res=mysqli_query($con,$s);
			if($res)
			{
				echo '<script>alert("Update Successfully..!!!");</script>';
				header("location: farmerInfo.php");
			}
			else
				echo '<script>alert("Update Failed..!!!");</script>';
		}
		else
		{
			echo '<script>alert("All fields are required");</script>';
		}
	}

	if(isset($_REQUEST['btn_add']))
	{	
		$id=$_REQUEST['getid'];
		echo '<form class="text-white"><div class=" offset-sm-2 col-sm-8 box4"><div class="form-group">
			<input type="hidden" name="getmyid" value='.$id.'>
			Product: <input type="textbox" name="productna" class="form-control" style="border:1px solid #000">
			Price: <input type="textbox" name="price" class="form-control" style="border:1px solid #000">
			Brand: <input type="textbox" name="getbrand" class="form-control" style="border:1px solid #000">
			Description: <input type="textbox" name="description" class="form-control" style="border:1px solid #000">
			
			Year: <input type="textbox" name="getyear" class="form-control" style="border:1px solid #000">
			color: <input type="textbox" name="getcolor" class="form-control" style="border:1px solid #000">
			Discount: <input type="textbox" name="discount" class="form-control" style="border:1px solid #000">
			Model: <input type="textbox" name="model" class="form-control" style="border:1px solid #000">
			Stock: <input type="textbox" name="stock" class="form-control" style="border:1px solid #000"><br>
			<button type="submit" class="btn btn-primary" name="but_add">Submit</button>
		        </div></div></form>';
		
	}
	if(isset($_REQUEST['but_add']))
	{
		$id1=$_REQUEST['getmyid'];
		$proname=$_REQUEST['productna'];
		$proprice=$_REQUEST['price'];
		$probrand=$_REQUEST['getbrand'];
		$prodes=$_REQUEST['description'];
		$proyear=$_REQUEST['getyear'];
		$procolor=$_REQUEST['getcolor'];
		$prodiscount=$_REQUEST['discount'];
		$promodel=$_REQUEST['model'];
		$prostock=$_REQUEST['stock'];
		if($proname!="")
		{
			$con2=mysqli_connect("localhost","root","","toylibrary");
			$s3="insert into product values('$id1','$proname','$proprice','$probrand','$prodes','$proyear','$procolor','$prodiscount','$promodel','$prostock')";
			$res2=mysqli_query($con2,$s3);
			if($res)
			{
				echo '<script>alert("Added Successfully..!!!");</script>';
			}
			else
				echo '<script>alert("Failed..!!!");</script>';
		}
	}
?>
	