


<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scaled=1.0">
	<title> Add Product</title>
	<style type="text/css">
		label{
			display: block;
			padding-top: 25px;
			height: 15px;
			width: 350px;
		}
		br{
			line-height: 10px;
		}
		body{
			background-color:#000000;
		}
		h1{
			text-align:center;
			color:#00FF66;
		}
		h3{
			color:#00FF66;
		}
		.top{
			margin-top: 100px;
		}
		.Addproduct{
			color:#00FF66;
			margin:auto;
			background:#2b2a33;
			max-width:350px;
			padding:10px;
			border-radius:4px;
		}
		input[type=text]{
			display:inline-block;
			width:100%;
			padding:10px;
			box-sizing:border-box;
			border-radius:4px;
			border: .5px solid;
			margin: 10px 0;
		}
		input[type=submit]{
			width:100%;
			padding:10px;
			margin:10px 0;
			border-radius:4px;
			border:none;
			background:orange;
			font-size;20px;
			cursor:pointer;
		}
		footer{
			text-align:center;
			color:#ffffff;
			background-color:#006600;
			padding 15px 0;
		}
		.bottom{
        		position: fixed;
        		bottom: 0;
        		width: 100%;
        		color: #ffffff;
			background-color:#006600;
			padding: 15px 0;
      		}
	</style>
</head>
<body>
	<main>
	<h1>Product Management</h1>
	<hr>
	<div class="top"></div>
	<div class="Addproduct">
		<h1>Add Product</h1>

<form action="Addproduct.php" method = "POST"> 
            <label for="ptype">Product Type</label>		<input type="text" name ="protype">
            <label for="pname">Product Name</label>		<input type="text" name ="proname">
            <label for="price">Price</label>			<input type="text" name ="Price">
            <label for="quantity">Quantity</label>		<input type="text" name ="ininventroy">
			<input type="submit" value="Update" name= "submit">
	   

		</form>
		<input type= 'button' onclick='javascript:history.back();return false;' value='Previous'>
	</main>
	<footer>
		<div class="bottom"><a href="contactinfo.html" style="color:#ffffff"><i class="fa fa-fw fa-user"></i>Customer Service</a> &copy; nanoCenter</div>
	</footer>
</body>
</html>


<?php
require_once "getconnection.php";
//echo var_dump()

$db = get_connection();
	
	$insert = $db->prepare("insert into Productype (Ptype,pname)
		Values(?,?)");

	$insert = $db->prepare("Insert into Product (pname, price, quantity)
		Values(?, ?, ?)");

	$insert->bind_param("ss", $_POST["protype"], $_POST["proname"]);


	$insert->bind_param("sdi", $_POST["proname"], $_POST["Price"],
		$_POST["ininventroy"]);

        $insert->execute();

	



?>
