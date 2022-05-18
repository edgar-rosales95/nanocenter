


<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scaled=1.0">
	<title> Shipping Orders</title>
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
		.register{
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
	<div class="register">
		<h1> Shipping Orders</h1>

<form action="register.php" method = "POST"> 
            <label for="productid">Product ID</label>		<input type="text" name ="productid">
			<input type="submit" value="Shipped" name= "submitd">
	   

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





if (isset($_POST["Register"])){
    unset($_POST["Register"]);
//	echo var_dump($_POST);

    $db = get_connection();
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (strlen($username) == 0 || strlen($password) == 0){
	    $_SESSION['error'] = "Username and/or password cannot be empty!";
	    header("Location: register.php");
    }

	


	$insert = $db->prepare("Insert into Customer (pname, price, quantity)
		Values(?, ?, ?)");

	$insert->bind_param("sfi", $_POST["firstname"], $_POST["lastname"],
		$_POST["address"], $_POST["phone"], $_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT));

        $insert->execute();

	


}
?>
