<?php
	
	session_start();	
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<link rel="stylesheet" href="css\bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	
	<style>
		.box4{
	position: absolute;
	top:50px;
	right:100px;
	font-weight:bold;
	background-color:#fff;
	width:600px;
	padding:50px;
	margin-top:40px;
	margin-left:250px;
	margin-bottom:40px;
	color:black;
	box-shadow:5px 15px 10px rgba(0,0,0,0.3);
	border:1px solid black;
}
.btn_style{
	width:200px;
}
.close-btn{
	color:#656565;
	position:absolute;
	right:50px;
	top:20px;
	cursor:pointer;
}
.close-btn:hover{
	color:#BFBFBF;
}
.sidebar{
	position:fixed;
	top:0;
	left:0;
	bottom:0;
	z-index: 100;
}
.navbar{
	position: fixed;
	z-index: 101;
}
	</style>
	</head>
	<body>
	
	<nav class="navbar  navbar-expand-sm navbar-light" style="background-color:#1b3752; width:100%;">
  		 <a class="navbar-brand text-white" href="index.html">Toy Library</a>
   		 <ul class="navbar-nav">
      			<li class="nav-item active w3-large"><a class="nav-link text-white" href="index.html">Home</a></li>
    		<ul>	 
	</nav>
	
		<div class="container-fluid">
		<div class="row">
			<div class=" col-sm-1 ml-7">
				</div>
			
			<div class="w-100"></div>
		<div class="col-sm-2 text-center sidebar" style="background-color:#F8A800;" ><br>
			<div class=""><img src="img2.png" width="100px" height="100px" style="border-radius:50%; margin-top:50px;"><br>
				<?php
					$user=$_SESSION['toyowner'];
					$con=mysqli_connect("localhost","root","","toylibrary");
					$s="select * from toyowner where username='$user'";
					$res=mysqli_query($con,$s);
					$row=mysqli_fetch_assoc($res);
					echo "<br>";
					echo "<h5 class='text-secondary'>Welcome ".$row['name']. "<br>";
					echo '<form>
						<input type="hidden" name="getid" value='.$row['id'].'>
						<br><button type="submit" class="btn btn-primary btn_style" name="btn_my" >Update</button><br>
						<br><button type="submit" class="btn btn-primary btn_style" name="btn_add">Add</button><br>
						<br><button type="submit" class="btn btn-primary btn_style" name="btn_view">View Product</button>
					        </form>';
				?>
		</div></div>
		<br><br><div class="offset-sm-2 col-sm-6  text-center">
		<div class="col-10">
      		<!--<h2>Product List</h2>-->
      	</div>
			<br><br>
			<table class="table table-striped table-hover">
				<thead>
					<tr >
					<th scope="col">Product</th>
					<th scope="col">Image</th>
					<th scope="col">Price</th>
					<th scope="col" >Brand</th>
					<th scope="col">Description</th>
					<th></th><th></th><th></th><th></th><th></th>
					<th scope="col" >Year</th>
					<th scope="col">Color</th>
					<th scope="col">Discount</th>
					<th scope="col">Model</th>
					<th scope="col">Stock</th>
					</tr>
				</thead>
				<tbody>
				<?php
						$user=$_SESSION['toyowner'];
						$con=mysqli_connect("localhost","root","","toylibrary");
						$s="select * from toyowner where username='$user'";
						$res=mysqli_query($con,$s);
						$row=mysqli_fetch_assoc($res);
						$id=$row['id'];
						$s2="select * from product where owner='$id'";
						$res2=mysqli_query($con,$s2);
						while($row2=mysqli_fetch_assoc($res2))
						{
							echo "<tr><td scope='row'>".$row2['pro_name']."</td><td><img src=".$row2['filename']." height='100px' width='100px'></td><td>".$row2['price']."</td><td>".$row2['brand']."</td><td colspan='6'>".$row2['description']."</td><td>".$row2['year']."</td><td>".$row2['color']."</td><td>".$row2['discount']."</td><td>".$row2['Model']."</td><td>".$row2['stock']."</td>
							<td><form><input type='hidden' name='owner_id' value=".$row2["owner"]."><input type='hidden' name='proname' value=".$row2["pro_name"]."><button type='submit' class='btn btn-danger' name='btn_delete'><i class='fas fa-trash-alt'></i></button><br><br><button type='submit' class='btn btn-primary' name='btn_edit'><i class='fas fa-edit'></i></button></i></button></form></td></tr>";
						}
						

					?>
					
				</tbody>
				</table>
		</div>
		<div class="w-100"></div>
	
		<script  src="js\jquery.js"></script>
		<script src="js\bootstrap.min.js"></script>	
		
		
	</script>
	</body>
</html>
<?php 
	if(isset($_REQUEST['btn_delete']))
	{
		$id=$_REQUEST['owner_id'];
		$proname=$_REQUEST['proname'];
		$con=mysqli_connect("localhost","root","","toylibrary");
			$s="delete from product where owner='$id' AND pro_name='$proname'";
			$res=mysqli_query($con,$s);
			if($res)
			{
				echo '<script>alert("Delete Successfully..!!!");window.location="Toy_Owner_Account.php";</script>';
			}
			else
				echo '<script>alert("Delete Failed..!!!");</script>';
		
	}
	if(isset($_REQUEST['btn_edit']))
	{	
		
		echo '<div class=" offset-sm-2 col-sm-8 box4" id="add_product"><form class="" method="POST" enctype="multipart/form-data" ><div class="form-group">
		   
			<label for="show" class="close-btn fas fa-times"></label>
			Product: <input type="textbox" name="productna" class="form-control">
			Price: <input type="textbox" name="price" class="form-control">
			Brand: <input type="textbox" name="getbrand" class="form-control">
			Description: <input type="textbox" name="description" class="form-control" >
			
			Year: <input type="textbox" name="getyear" class="form-control">
			color: <input type="textbox" name="getcolor" class="form-control">
			Discount: <input type="textbox" name="discount" class="form-control">
			Model: <input type="textbox" name="model" class="form-control">
			Stock: <input type="textbox" name="stock" class="form-control"><br>
			<input type="file"  name="uploadfile" value="" /><br><br>
			<button type="submit" class="btn btn-primary" name="but_edit_pro">Submit</button>
		        </div></form></div>';
			echo "<script> document.querySelector('.close-btn').addEventListener('click',()=>{
				document.querySelector('.box4').style.display='none';
			});
				</script>";	
		
	}
	if(isset($_REQUEST['but_edit_pro']))
	{	
		$id=$_REQUEST['owner_id'];
		$proname=$_REQUEST['proname'];
		$productna=$_REQUEST['productna'];
		$price=$_REQUEST['price'];
		$getbrand=$_REQUEST['getbrand'];
		$description=$_REQUEST['description'];
		$getyear=$_REQUEST['getyear'];
		$getcolor=$_REQUEST['getcolor'];
		$discount=$_REQUEST['discount'];
		$model=$_REQUEST['model'];
		$stock=$_REQUEST['stock'];
		$filename = $_FILES["uploadfile"]["name"];
    	$tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = "images/".$filename;
		$con=mysqli_connect("localhost","root","","toylibrary");
		if($productna!="") 
		{
			
			$s="UPDATE product set pro_name='$productna'where owner='$id'AND pro_name='$proname'";
			$res=mysqli_query($con,$s);
			if($res)
			{
				echo '<script>alert("Product Name Updated Successfully");window.location="Toy_Owner_Account.php";</script>';
				
			}
			else
				echo '<script>alert("Update Failed..!!!");</script>';
		}
		if($price!="")
		{
			$s="UPDATE product set price='$price' where owner='$id'AND pro_name='$proname'";
			$res=mysqli_query($con,$s);
			if($res)
			{
				echo '<script>alert("Price Updated Successfully");window.location="Toy_Owner_Account.php";</script>';
				
			}
			else
				echo '<script>alert("Update Failed..!!!");</script>';
		}
		if($getbrand!="")
		{
			$s="UPDATE product set brand='$getbrand' where owner='$id'AND pro_name='$proname'";
			$res=mysqli_query($con,$s);
			if($res)
			{
				echo '<script>alert("Brand Updated Successfully");window.location="Toy_Owner_Account.php";</script>';
				
			}
			else
				echo '<script>alert("Update Failed..!!!");</script>';
		}
		if($description!="")
		{
			$s="UPDATE product set description='$description' where owner='$id'AND pro_name='$proname'";
			$res=mysqli_query($con,$s);
			if($res)
			{
				echo '<script>alert("Description Updated Successfully");window.location="Toy_Owner_Account.php";</script>';
				
			}
			else
				echo '<script>alert("Update Failed..!!!");</script>';
		}
		if($getyear!="")
		{
			$s="UPDATE product set year='$getyear' where owner='$id'AND pro_name='$proname'";
			$res=mysqli_query($con,$s);
			if($res)
			{
				echo '<script>alert("Year Updated Successfully");window.location="Toy_Owner_Account.php";</script>';
				
			}
			else
				echo '<script>alert("Update Failed..!!!");</script>';
		}
		if($getcolor!="")
		{
			$s="UPDATE product set color='$getcolor' where owner='$id'AND pro_name='$proname'";
			$res=mysqli_query($con,$s);
			if($res)
			{
				echo '<script>alert("Color Updated Successfully");window.location="Toy_Owner_Account.php";</script>';
				
			}
			else
				echo '<script>alert("Update Failed..!!!");</script>';
		}
		if($discount!="")
		{
			$s="UPDATE product set discount='$discount' where owner='$id'AND pro_name='$proname'";
			$res=mysqli_query($con,$s);
			if($res)
			{
				echo '<script>alert("Discount Updated Successfully");window.location="Toy_Owner_Account.php";</script>';
				
			}
			else
				echo '<script>alert("Update Failed..!!!");</script>';
		}
		if($model!="")
		{
			$s="UPDATE product set Model='$model' where owner='$id'AND pro_name='$proname'";
			$res=mysqli_query($con,$s);
			if($res)
			{
				echo '<script>alert("Model Updated Successfully");window.location="Toy_Owner_Account.php";</script>';
				
			}
			else
				echo '<script>alert("Update Failed..!!!");</script>';
		}
		if($stock!="")
		{
			$s="UPDATE product set stock='$stock' where owner='$id'AND pro_name='$proname'";
			$res=mysqli_query($con,$s);
			if($res)
			{
				echo '<script>alert("Stock Updated Successfully");window.location="Toy_Owner_Account.php";</script>';
				
			}
			else
				echo '<script>alert("Update Failed..!!!");</script>';
		}
		if($filename!="")
		{
			$s="UPDATE product set filename='$folder' where owner='$id'AND pro_name='$proname'";
			$res=mysqli_query($con,$s);
			if($res)
			{
				echo '<script>alert("Image Updated Successfully");window.location="Toy_Owner_Account.php";</script>';
				
			}
			else
				echo '<script>alert("Update Failed..!!!");</script>';
		}
		
	}
	if(isset($_REQUEST['btn_add']))
	{	
		$id=$_REQUEST['getid'];
		echo '<div class=" offset-sm-2 col-sm-8 box4" id="add_product"><form class="" method="POST" enctype="multipart/form-data" ><div class="form-group">
		  
		   <label for="show" class="close-btn fas fa-times"></label>
		  <input type="hidden" name="getmyid" value='.$id.'>
			Product: <input type="textbox" name="productna" class="form-control">
			Price: <input type="textbox" name="price" class="form-control">
			Brand: <input type="textbox" name="getbrand" class="form-control">
			Description: <input type="textbox" name="description" class="form-control" >
			
			Year: <input type="textbox" name="getyear" class="form-control">
			color: <input type="textbox" name="getcolor" class="form-control">
			Discount: <input type="textbox" name="discount" class="form-control">
			Model: <input type="textbox" name="model" class="form-control">
			Stock: <input type="textbox" name="stock" class="form-control"><br>
			<input type="file"  name="uploadfile" value="" /><br><br>
			<button type="submit" class="btn btn-primary" name="but_add">Submit</button>
		        </div></form></div>';
				echo "<script> document.querySelector('.close-btn').addEventListener('click',()=>{
					document.querySelector('.box4').style.display='none';
				});
					</script>";
	}
	if(isset($_POST['but_add']))
	{	
		$msg = "";
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
		$filename = $_FILES["uploadfile"]["name"];
    	$tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = "images/".$filename;
		if($proname!="")
		{
			$con2=mysqli_connect("localhost","root","","toylibrary");
			$s3="insert into product values('$id1','$proname','$proprice','$probrand','$prodes','$proyear','$procolor','$prodiscount','$promodel','$prostock','$folder')";
			$res2=mysqli_query($con2,$s3);
			if($res)
			{	
				if (move_uploaded_file($tempname, $folder))  {
					$msg = "Image uploaded successfully";
				}else{
					$msg = "Failed to upload image";
				}
				echo '<script>alert("Product Added Successfully..!!!");window.location="Toy_Owner_Account.php";</script>';
			}
			else
				echo '<script>alert("Failed..!!!");</script>';
		}
	}
?>
	